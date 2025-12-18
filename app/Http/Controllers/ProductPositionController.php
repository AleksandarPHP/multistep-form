<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\ProductPosition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ProductPositionController extends Controller
{
    public function index()
    {
        return view('cms.product_position.list');
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

        $sqlRec = ProductPosition::query();

        $search = $request['search']['value'];
        if(!empty($search) && !is_null($search) && is_string($search) && $search!="") {
            $sqlRec->where(function($q) use ($search) {
                $q->whereRaw("(name like ? or id like ? or email like ?)", ["%$search%", "%$search%", "%$search%"]);
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
                '3' => '<a href="'.url('cms/product-position/'.$row->id.'/edit').'" class="action-edit"><i class="fa fa-edit"></i></a><a href="'.url('cms/product-position').'" class="action-delete confirmation" data-id="'.$row->id.'"><i class="fa fa-trash"></i><form id="delete-form'.$row->id.'" action="'.url('cms/product-position/'.$row->id).'" method="POST" style="display: none;">'.csrf_field().'<input type="hidden" name="_method" value="delete" /></form></a>',
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
        return view('cms.product_position.form', ['item' => new ProductPosition(), 'editing' => false]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:191'],
        ]);

        $image = $request->image;
        if($request->hasFile('image')) $image = Helper::saveImage($request->image, 'product_position', $request->title, $image);
    
        
        ProductPosition::create([
            'title' => $request->name,
            'order' => $request->order,
            'image' => $image
        ]);

        Cache::forget( 'product_position');

        session()->flash('success', 'Dodato.');

        return redirect('cms/product-position');
    }
    
    public function edit($id)
    {
        return view('cms.product_position.form', ['item' => ProductPosition::findOrFail($id), 'editing' => true]);
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
        $item = ProductPosition::findOrFail($id);
        
        $request->validate([
            'title' => ['required', 'string', 'max:191'],
            'order' => ['nullable', 'string'],
            'is_active' => ['nullable', 'string', 'in:1'],
            'price' => ['required', 'string'],
            'image' => ['nullable', 'mimes:jpeg,png,svg,webp', 'image', 'max:5000'],
        ]);
        
        $image = $item->image;
        if($request->hasFile('image')) $image = Helper::saveImage($request->image, 'ProduktePosition', $item->title, $image);
        else if($item->title != $item->title && !is_null($image)) $image = Helper::renameImage($image, 'ProduktePosition', $item->title);
        
        $item->title = $request->title;
        $item->order = $request->order;
        $item->price = $request->price;
        $item->is_active = $request->is_active ? 1 : 0;
        $item->floor = $request->floor ? 1 : 0;
        $item->image = $image;
        
        $item->save();

        Cache::forget( 'product_position');

        session()->flash('success', 'Izmjenjeno.');

        return redirect('cms/product-position');
    }

    public function destroy($id)
    {
        $user = ProductPosition::findOrFail($id);    
        $user->delete();

        Cache::forget( 'product_position');

        session()->flash('success', 'Obrisano.');
        
        return redirect('cms/product-position');
    }
}
