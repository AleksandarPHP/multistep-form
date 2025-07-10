<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use Illuminate\Support\Facades\Validator;

class MessageController extends Controller
{
    public function index()
    {
        return view('cms.messages.list');
    }

    public function ajax(Request $request)
    {       

        $data = [];

        $columns = array( 
            0 =>'id',
            1 =>'name',
            2 =>'action'
        );

        $sortable = [0, 1];

        $sqlRec = Message::query();


        $search = $request['search']['value'];
        if(!empty($search) && !is_null($search) && is_string($search) && $search!="") {
            $sqlRec->where(function($q) use ($search) {
                $q->whereRaw("(title like ?)", ["%$search%"]);
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
                '0' => $row->is_send ? '<i class="fa fa-check-square" aria-hidden="true"></i>' : '<i class="fa fa-spinner" aria-hidden="true"></i>',
                '1' => '<a href="'.url('cms/menu/'.$row->id.'/edit').'" class="action-edit">'.$row->name.'</a>',
                '2' => '<a href="'.url('cms/menu/'.$row->id.'/edit').'" class="action-edit"><i class="fa fa-envelope" aria-hidden="true"></i></a>',
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

    public function kontakt(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:191'],
            'email' => ['required', 'email', 'max:191'],
            'tel' => ['required', 'string', 'max:191'],
            'description' => ['required', 'string', 'max:191'],
            'date' => ['required', 'string', 'max:191'],
            'files' => ['nullable', 'array', 'max:3'],
            'files.*' => ['nullable', 'mimes:jpeg,jpg,svg,docs', 'max:5000'],
        ]);           
        
        $request->language = "en";
        if($request->language == "en") {
            app()->setLocale('en');
            setlocale(LC_ALL, 'en_US.UTF-8');
        } else { 
            app()->setLocale('sr');
            setlocale(LC_ALL, 'sr_RS.utf8@latin');
        } 

        if ($validator->fails()) return redirect(url()->previous() .'#kontakt')->withErrors($validator)->withInput();

        Message::create([
            'name' => $request->name,
            'email' => $request->email,
            'tel' => $request->tel,
            'description' => $request->description,
            'date' => $request->date,
            'file' => $request->file,
        ]);

        return redirect()->back()->with(['status' => 'Vasa poruka je uspijesno poslana!']);
    }

    public function edit($id) 
    {
        return view('cms.messages.form', ['item' => Message::findOrFail($id)]);
    }
}
