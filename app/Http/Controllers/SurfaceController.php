<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Surface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class SurfaceController extends Controller
{
    public function index()
    {
        return view('cms.surfaces.list');
    }

    public function ajax(Request $request)
    {       

        $data = [];

        $columns = array( 
            0 =>'id',
            1 =>'title',
            2 =>'is_active',
            3 =>'action'
        );

        $sortable = [0, 1, 2, 3, 4];

        $sqlRec = Surface::query();

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
                '2' => '<span class="item-active" style="color: #0b3663;"><i class="fa fa-'.($row->is_active ? 'check-square' : 'times').'"></i></span>',
                '3' => '<a href="'.url('cms/surfaces/'.$row->id.'/edit').'" class="action-edit"><i class="fa fa-edit"></i></a><a href="'.url('cms/surfaces').'" class="action-delete confirmation" data-id="'.$row->id.'"><i class="fa fa-trash"></i><form id="delete-form'.$row->id.'" action="'.url('cms/surfaces/'.$row->id).'" method="POST" style="display: none;">'.csrf_field().'<input type="hidden" name="_method" value="delete" /></form></a>',
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
        $products = Product::where('is_active', 1 )->get();
        return view('cms.surfaces.form', ['item' => new Surface(), 'editing' => false, 'products' => $products]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:191'],
            'priority' => ['nullable', 'numeric'],
            'product_id' => ['required', 'array', 'max:6'],
            'product_id.*' => ['required', 'integer'],
            'default_value' => ['required', 'numeric'],
            'value_from' => ['required', 'numeric'],
            'value_to' => ['required', 'numeric'],
        ]);
        
        Surface::create([
            'title' => $request->title,
            'priority' => $request->priority,
            'default_value' => $request->default_value, 
            'value_from' => $request->value_from,
            'value_to' => $request->value_to,
            'product_id' => $request->product_ids,
            'is_active' => $request->is_active ? 1 : 0,
        ]);

        Cache::forget( 'surfaces');

        session()->flash('success', 'Dodato.');

        return redirect('cms/surfaces');
    }
    
    public function edit($id)
    {
        $products = Product::where('is_active', 1 )->get();
        return view('cms.surfaces.form', ['item' => Surface::findOrFail($id), 'editing' => true, 'products' => $products]);
    }

    public function update(Request $request, $id)
    {
        $item = Surface::findOrFail($id);
        
        $request->validate([
            'title' => ['required', 'string', 'max:191'],
            'priority' => ['nullable', 'numeric'],
            'product_id' => ['required', 'array', 'max:6'],
            'product_id.*' => ['required', 'integer'],
            'default_value' => ['required', 'numeric'],
            'value_from' => ['required', 'numeric'],
            'value_to' => ['required', 'numeric'],
        ]);
        
        
        $item->title = $request->title;
        $item->product_id = $request->product_ids;
        $item->default_value = $request->default_value;
        $item->value_from = $request->value_from;
        $item->value_to = $request->value_to;
        $item->priority = $request->priority;
        $item->is_active = $request->is_active ? 1 : 0;
        
        $item->save();

        Cache::forget( 'surfaces');

        session()->flash('success', 'Izmjenjeno.');

        return redirect('cms/surfaces');
    }

    public function destroy($id)
    {
        $item = Surface::findOrFail($id);    
        $item->delete();

        Cache::forget( 'surfaces');

        session()->flash('success', 'Obrisano.');
        
        return redirect('cms/surfaces');
    }
}
