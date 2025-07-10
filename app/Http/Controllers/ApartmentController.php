<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Apartment;
use App\Models\Floor;
use Cache;
use App\Helpers\Helper;

class ApartmentController extends Controller
{
    public function index()
    {
        return view('cms.apartments.list');
    }

    public function ajax(Request $request)
    {       

        $data = [];

        $columns = array( 
            0 =>'id',
            1 =>'title',
            2 =>'status',
            3 =>'floor',
            4 =>'action'
        );

        $sortable = [0, 1, 2, 3, 4];

        $sqlRec = Apartment::query();

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
                '2' => $row->floor->title,
                '3' => $row->status == 1 ? 'Izdavanje' : ($row->status == 2 ? 'Prodaja' : 'Naruceno'),
                '4' => '<a href="'.url('cms/apartments/'.$row->id.'/edit').'" class="action-edit"><i class="fa fa-edit"></i></a>',
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

    public function create()
    {
        return view('cms.apartments.form', ['item' => new Apartment(), 'editing' => false, 'floors' => Floor::all()]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:191'],
            'apt_number' => ['required', 'numeric'],
            'floor' => ['required', 'string', 'max:191'],
            'pdf' => ['nullable', 'file', 'mimes:jpg,jpeg,png,pdf,docx', 'max:102400'],
            'surface' => ['nullable', 'numeric'],
            'rooms' => ['nullable', 'array'],
            'status' => ['required', 'numeric'],
            'image' => ['nullable', 'mimes:jpeg,png,svg', 'image', 'max:5000'],
            'image2' => ['nullable', 'mimes:jpeg,png,svg', 'image', 'max:5000'],
        ]);

        $image = null;
        if ($request->hasFile('image')) {
            $image = Helper::saveImage($request->image, 'apartament', $request->title);
        }

        $image2 = null;
        if ($request->hasFile('image2')) {
            $image2 = Helper::saveImage($request->image2, 'apartament', $request->title);
        }

        $pdf = null;
        if ($request->hasFile('pdf')) {
            $pdf = Helper::saveFile($request->pdf, 'apartament', $request->title);
        }

        Apartment::create([
            'title' => $request->title,
            'apt_number' => $request->apt_number,
            'floor_id' => $request->floor,
            'pdf' => $pdf,
            'surface' => $request->surface,
            'rooms' => $request->rooms,
            // 'rooms' => json_encode($request->rooms),
            'status' => $request->status,
            'image' => $image,
            'image2' => $image2,
        ]);

        Cache::forget( 'apartment');

        session()->flash('success', 'Dodato.');

        return redirect('cms/apartments');
    }

    public function edit($id)
    {
        return view('cms.apartments.form', ['item' => Apartment::findOrFail($id), 'editing' => true, 'floors' => Floor::all()]);
    }

    public function update(Request $request, $id)
    {
        $item = Apartment::findOrFail($id);
        $request->validate([
            'title' => ['required', 'string', 'max:191'],
            'apt_number' => ['required', 'numeric'],
            'floor' => ['required', 'string', 'max:191'],
            'pdf' => ['nullable', 'file', 'mimes:jpg,jpeg,png,pdf,docx', 'max:102400'],
            'surface' => ['nullable', 'numeric'],
            'rooms' => ['nullable', 'array'],
            'status' => ['required', 'numeric'],
            'image' => ['nullable', 'mimes:jpeg,png,svg', 'image', 'max:5000'],
            'image2' => ['nullable', 'mimes:jpeg,png,svg', 'image', 'max:5000'],
        ]);

        $image = $item->image;
        if ($request->hasFile('image')) {
            $image = Helper::saveImage($request->image, 'apartament', $request->title, $image);
        }

        $image2 = $item->image2;
        if ($request->hasFile('image2')) {
            $image2 = Helper::saveImage($request->image2, 'apartament', $request->title, $image2);
        }

        $pdf = $item->pdf;
        if ($request->hasFile('pdf')) {
            $pdf = Helper::saveFile($request->pdf, 'apartament', $request->title, $pdf);
        }

        $item ->title = $request->title;
        $item ->apt_number = $request->apt_number;
        $item ->floor_id = $request->floor;
        $item ->pdf = $pdf;
        $item ->surface = $request->surface;
        $item ->rooms = $request->rooms;
        $item ->status = $request->status;
        $item ->image = $image;
        $item ->image2 = $image2;
        $item->save();

        Cache::forget( 'apartment');

        session()->flash('success', 'Dodato.');

        return redirect('cms/apartments');
    }
}
