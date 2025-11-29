<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mail;

class MailController extends Controller
{
    public function index()
    {
        return view('cms.mails.list');
    }

    public function ajax(Request $request)
    {       

        $data = [];

        $columns = array( 
            0 =>'id',
            1 =>'title',
            2 =>'is_sent',
            3 =>'action'
        );

        $sortable = [0, 1, 2, 3, 4];

        $sqlRec = Mail::query();

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
                '1' => $row->name,
                '2' => '<span class="item-active" style="color: #0b3663;"><i class="fa fa-'.($row->is_sent ? 'check-square' : 'times').'"></i></span>',
                '3' => '<a href="'.url('cms/mails/'.$row->id.'/edit').'" class="action-edit"><i class="fa fa-eye"></i></a>',
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
        return view('cms.mails.form', ['item' => Mail::findOrFail($id), 'editing' => true]);
    }
}
