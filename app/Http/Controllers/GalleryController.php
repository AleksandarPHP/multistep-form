<?php

namespace App\Http\Controllers;

use App\Models\Apartment;
use Illuminate\Http\Request;
use App\Models\Gallery;
use App\Models\Album;
use App\Helpers\Helper;
use Cache;
use Illuminate\Support\Facades\Log;

class GalleryController extends Controller
{

    public function index()
    {
        return view('cms.gallery.list');
    }

    public function ajax(Request $request)
    {       

        $data = [];

        $columns = array( 
            0 =>'id',
            1 =>'title',
            2 =>'action'
        );

        $sortable = [0, 1, 2];

        $sqlRec = Album::query();

        $search = $request['search']['value'];
        if(!empty($search) && !is_null($search) && is_string($search) && $search!="") {
            $sqlRec->where(function($q) use ($search) {
                $q->whereRaw("(title like ? or id like ?)", ["%$search%", "%$search%"]);
            });
        }
        
        $totalRecords = $sqlRec->count();

        $order = $request['order'];
        if(!empty($order) && !is_null($order) && is_array($order))
            foreach($order as $key => $value) {
                if(in_array($value['column'], $sortable) && ($value['dir'] == "asc" || $value['dir'] == "desc"))
                    $sqlRec->orderBy($columns[$value['column']], $value['dir']);
            }
        
        $length = (intval($request['length']) > 0) ? intval($request['length']) : 10;
        $start = intval($request['start']);
        $rows = $sqlRec->take($length)->skip($start)->get();
        
        foreach($rows as $row) {
            $data[] = [
                '0' => $row->id,
                '1' => '<a href="'.url('cms/albums/'.$row->id.'/edit').'" class="action-edit">'.$row->title.'</a>',
                '2' => '<a href="'.url('cms/galleries/'.$row->id.'/edit').'" class="action-edit"><i class="fa fa-edit"></i></a>',
            ];
        }
        
        $json_data = array(
                    "draw"            => intval($request['draw']),  
                    "recordsTotal"    => intval($totalRecords),  
                    "recordsFiltered" => intval($totalRecords), 
                    "data"            => $data   
                    );
            
        return json_encode($json_data);
    }

    public function edit($id)
    {
        $images = Gallery::where('album_id', $id)->get();
        $album = Album::findOrFail($id);
        return view('cms.gallery.form', ['images' => $images, 'album' => $album]);
    }

    public function upload(Request $request, $id)
    {
        $request->validate([
            'files' => ['required', 'mimes:jpeg,png,webp', 'image', 'max:5000'],
        ], [
            'files.required' => 'Slika je obavezna.',
            'files.mimes' => 'Slika mora biti jpg ili png.',
            'files.image' => 'Datoteka mora biti slika.',
            'files.max' => 'Slika može biti maksimalno 5MB.'
        ]);    
        
        $image = $request->file('files'); 
        $name = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);

        $galleryname = Helper::saveImage($image, 'gallery', $name);
        
        Gallery::create([
            'image' => $galleryname,
            'album_id' => $id,
        ]);

        Cache::forget('gallery');

        return response()->json('Uspešno ste dodali sliku.', 200);
    }

    public function delete($id)
    {
        $item = Gallery::findOrFail($id);
        
        if(Helper::deleteImage($item->image)) {
            $item->delete();
        } else {
            return back()->withErrors('Došlo je do greške.');
        }

        Cache::forget('gallery');

        session()->flash('success', 'Obrisano.');

        return back();
    }
}
