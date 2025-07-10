<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Floor;
use Cache;
use App\Helpers\Helper;

class SliderController extends Controller
{
    public function index()
    {
        return view('cms.sliders.list');
    }

    public function ajax(Request $request)
    {       

        $data = [];

        $columns = array( 
            0 =>'id',
            1 =>'title',
            2 =>'is_active',
            4 =>'action'
        );

        $sortable = [0, 1, 2, 3, 4];

        $sqlRec = Slider::query();

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
                '1' => $row->title,
                '2' => $row->is_active,
                '3' => '<a href="'.url('cms/sliders/'.$row->id.'/edit').'" class="action-edit"><i class="fa fa-edit"></i></a>',
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

    public function edit(Request $request, $id)
    {
        $lang = $request->lang ?? 'sr';

        return view('cms.sliders.form', ['item' => Slider::findOrFail($id), 'editing' => true, 'lang' => $lang]);
    }

    public function update(Request $request, $id)
    {
        $item = Slider::findOrFail($id);
        $lang = $request->language ?? 'sr';
        $request->validate([
            'title' => ['nullable', 'string', 'max:191'],
            'subtitle' => ['nullable', 'string', 'max:191'],
            'text' => ['nullable', 'string'],
            'image' => ['nullable', 'mimes:jpeg,png,svg,webp', 'image', 'max:5000'],
        ]);
        // dd($item->title);

        $image = $item->image1;
        if($request->hasFile('image1')) $image = Helper::saveImage($request->image1, 'Slider', $item->title, $image);
        else if($item->title != $item->title && !is_null($image)) $image = Helper::renameImage($image, 'Slider', $item->title);
        $image2 = $item->image2;
        if($request->hasFile('image2')) $image2 = Helper::saveImage($request->image2, 'Slider', $item->title, $image2);
        else if($item->title != $item->title && !is_null($image2)) $image2 = Helper::renameImage($image2, 'Slider', $item->title);

        $image3 = $item->image3;
        if($request->hasFile('image3')) $image3 = Helper::saveImage($request->image3, 'Slider', $item->title, $image3);
        else if($item->title != $item->title && !is_null($image3)) $image3 = Helper::renameImage($image3, 'Slider', $item->title);

        $image4 = $item->image4;
        if($request->hasFile('image4')) $image4 = Helper::saveImage($request->image4, 'Slider', $item->title, $image4);
        else if($item->title != $item->title && !is_null($image4)) $image4 = Helper::renameImage($image4, 'Slider', $item->title);

        $item->setTranslation('title', $lang, $request->input('title'));
        $item->setTranslation('subtitle', $lang, $request->input('subtitle'));
        $item->setTranslation('text', $lang, $request->input('text'));


        if($lang=='sr') {      
            $item->image1 = $image;
            $item->image2 = $image2;
            $item->image3 = $image3;
            $item->image4 = $image4;
        }

        $item->save();

        Cache::forget( 'Slide');

        session()->flash('success', 'Dodato.');

        return redirect('cms/sliders');
    }
}
