<?php

namespace App\Http\Controllers;

use App\Models\Dimension;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class DimensionController extends Controller
{
public function index()
    {
        return view('cms.dimensions.list');
    }

    public function ajax(Request $request)
    {       

        $data = [];

        $columns = array( 
            0 =>'id',
            1 =>'dimension1',
            2 =>'dimension2',
            3 =>'action'
        );

        $sortable = [0, 1, 2, 3, 4];

        $sqlRec = Dimension::query();

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
                '1' => $row->dimension1,
                '2' => $row->dimension2,
                '3' => $row->price,
                '4' => '<a href="'.url('cms/dimensions/'.$row->id.'/edit').'" class="action-edit"><i class="fa fa-edit"></i></a><a href="'.url('cms/dimensions').'" class="action-delete confirmation" data-id="'.$row->id.'"><i class="fa fa-trash"></i><form id="delete-form'.$row->id.'" action="'.url('cms/dimensions/'.$row->id).'" method="POST" style="display: none;">'.csrf_field().'<input type="hidden" name="_method" value="delete" /></form></a>',
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
        return view('cms.dimensions.form', ['item' => new Dimension(), 'editing' => false, 'products' => $products]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'price' => ['required', 'numeric'],
            'dimension1' => ['required', 'numeric'],
            'dimension2' => ['required', 'numeric'],
            'product_ids' => ['required', 'array', 'max:6'],
            'product_ids.*' => ['required', 'integer'],
        ]);
        
        Dimension::create([
            'price' => $request->price,
            'dimension1' => $request->dimension1,
            'dimension2' => $request->dimension2,
            'product_id' => $request->product_ids,
        ]);

        Cache::forget( 'dimensions');

        session()->flash('success', 'Dodato.');

        return redirect('cms/dimensions');
    }
    
    public function edit($id)
    {
        $products = Product::where('is_active', 1 )->get();
        return view('cms.dimensions.form', ['item' => Dimension::findOrFail($id), 'editing' => true, 'products' => $products]);
    }

    public function update(Request $request, $id)
    {
        $item = Dimension::findOrFail($id);
        
        $request->validate([
            'price' => ['required', 'numeric'],
            'dimension1' => ['required', 'numeric'],
            'dimension2' => ['required', 'numeric'],
            'product_ids' => ['required', 'array', 'max:6'],
            'product_ids.*' => ['required', 'integer'],
        ]);
        
        
        $item->price = $request->price;
        $item->product_id = $request->product_ids;
        $item->dimension1 = $request->dimension1;
        $item->dimension2 = $request->dimension2 ;

        $item->save();

        Cache::forget( 'dimensions');

        session()->flash('success', 'Izmjenjeno.');

        return redirect('cms/dimensions');
    }

    public function destroy($id)
    {
        $item = Dimension::findOrFail($id);    
        $item->delete();

        Cache::forget( 'dimensions');

        session()->flash('success', 'Obrisano.');
        
        return redirect('cms/dimensions');
    }
}
