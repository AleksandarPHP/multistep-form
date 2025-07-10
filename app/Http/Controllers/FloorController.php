<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Floor;
use Cache;
use App\Helpers\Helper;

class FloorController extends Controller
{
    public function __construct()
    {
        $this->allowedLangs = ['sr', 'en'];
    }

    public function index()
    {
        return view('cms.floors.list');
    }

    public function ajax(Request $request)
    {       

        $data = [];

        $columns = array( 
            0 =>'id',
            1 =>'title',
            2 =>'email',
            5 =>'action'
        );

        $sortable = [0, 1, 2, 3, 4];

        $sqlRec = Floor::query();

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
                '2' => '<a href="'.url('cms/floors/'.$row->id.'/edit').'" class="action-edit"><i class="fa fa-edit"></i></a>',
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
        return view('cms.floors.form', ['item' => Floor::findOrFail($id), 'editing' => true]);
    }

    public function update(Request $request, $id)
    {
        $item = Floor::findOrFail($id);
        $request->validate([
            'title' => ['required', 'string', 'max:191'],
            'image' => ['nullable', 'mimes:jpeg,png,svg', 'image', 'max:5000'],
        ]);

        $image = $item->image;
        if ($request->hasFile('image')) {
            $image = Helper::saveImage($request->image, 'Floor', $request->title, $image);
        }

        $item ->title = $request->title;
        $item ->image = $image;
        $item->save();

        Cache::forget( 'floor');

        session()->flash('success', 'Dodato.');

        return redirect('cms/floors');
    }
}
