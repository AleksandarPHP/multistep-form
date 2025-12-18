<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\Accessory;
use App\Models\AccessoryItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class AccessoryItemController extends Controller
{
    public function index($id)
    {
        return view('cms.accessory-items.list',['id'=> $id]);
    }

    public function ajax(Request $request, $id)
    {       

        $data = [];

        $columns = array( 
            0 =>'id',
            1 =>'title',
            2 =>'is_active',
            3 =>'action'
        );

        $sortable = [0, 1, 2, 3, 4];

        $sqlRec = AccessoryItem::query();
        
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
            $options = [];
            if ($row->option) {
                foreach($row->option as $option) {
                    $options[] = $option->title;
                }
            }
            $data[] = [
                '0' => $row->id,
                '1' => $row->title,
                '2' => '<span class="item-active" style="color: #0b3663;"><i class="fa fa-'.($row->is_active ? 'check-square' : 'times').'"></i></span>',
                '3' => '<a href="'.url('cms/accessory-items/'.$row->id.'/edit').'" class="action-edit"><i class="fa fa-edit"></i></a><a href="'.url('cms/accessory-items').'" class="action-delete confirmation" data-id="'.$row->id.'"><i class="fa fa-trash"></i><form id="delete-form'.$row->id.'" action="'.url('cms/accessory-items/'.$row->id).'" method="POST" style="display: none;">'.csrf_field().'<input type="hidden" name="_method" value="delete" /></form></a>',
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
        $options = Accessory::where('is_active', 1)->get();
        return view('cms.accessory-items.form', ['item' => new AccessoryItem(), 'editing' => false, 'options' => $options]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:191'],
        ]);

        $image = $request->image;
        if($request->hasFile('image')) $image = Helper::saveImage($request->image, 'accessory-items', $request->title, $image);
    
        
        $option = AccessoryItem::create([
            'title' => $request->title,
            'priority' => $request->priority,
            'price' => $request->price,
            'is_active' => $request->is_active,
            // 'option_id' => $request->option_ids,
            'image' => $image
        ]);
        $option->option()->sync($request->option_ids);

        Cache::forget( 'accessory-items');

        session()->flash('success', 'Dodato.');

        return redirect('cms/accessories');
    }
    
    public function edit($id)
    {
        $options = Accessory::where('is_active', 1)->get();
        return view('cms.accessory-items.form', ['item' => AccessoryItem::findOrFail($id), 'editing' => true, 'options' => $options]);
    }

    public function update(Request $request, $id)
    {
        $item = AccessoryItem::findOrFail($id);
        
        $request->validate([
            'title' => ['required', 'string', 'max:191'],
            'priority' => ['nullable', 'string'],
            'price' => ['required', 'string'],
            'is_active' => ['nullable', 'string', 'in:1'],
            'image' => ['nullable', 'mimes:jpeg,png,svg,webp', 'image', 'max:5000'],
        ]);
        
        $image = $item->image;
        if($request->hasFile('image')) $image = Helper::saveImage($request->image, 'accessory-items', $item->title, $image);
        else if($item->title != $item->title && !is_null($image)) $image = Helper::renameImage($image, 'accessory-items', $item->title);
        
        $item->title = $request->title;
        $item->price = $request->price;
        $item->priority = $request->priority;
        $item->is_active = $request->is_active ? 1 : 0;
        $item->image = $image;
        $item->option()->sync($request->option_ids);
        
        $item->save();

        Cache::forget( 'accessory_item');

        session()->flash('success', 'Izmjenjeno.');

        return redirect('cms/accessories');
    }

    public function destroy($id)
    {
        $user = AccessoryItem::findOrFail($id);    
        $user->delete();

        Cache::forget( 'accessory_item');

        session()->flash('success', 'Obrisano.');
        
        return redirect('cms/accessories');
    }
}
