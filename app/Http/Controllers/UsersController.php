<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Cache;

class UsersController extends Controller
{
    public function index()
    {
        return view('cms.users.list');
    }

    public function ajax(Request $request)
    {       

        $data = [];

        $columns = array( 
            0 =>'id',
            1 =>'name',
            2 =>'email',
            3 =>'is_active',
            4 =>'email_notifications',
            5 =>'action'
        );

        $sortable = [0, 1, 2, 3, 4];

        $sqlRec = User::query();

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
                '1' => $row->name,
                '2' => $row->email,
                '3' => '<span class="item-active" style="color: #0b3663;"><i class="fa fa-'.($row->is_active ? 'check-square' : 'times').'"></i></span>',
                '4' => '<span class="item-active" style="color: #0b3663;"><i class="fa fa-'.($row->email_notifications ? 'check-square' : 'times').'"></i></span>',
                '5' => '<a href="'.url('cms/users/'.$row->id.'/edit').'" class="action-edit"><i class="fa fa-edit"></i></a><a href="'.url('cms/users').'" class="action-delete confirmation" data-id="'.$row->id.'"><i class="fa fa-trash"></i><form id="delete-form'.$row->id.'" action="'.url('cms/users/'.$row->id).'" method="POST" style="display: none;">'.csrf_field().'<input type="hidden" name="_method" value="delete" /></form></a>',
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
        return view('cms.users.form', ['user' => new User(), 'editing' => false]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:191'],
            'email' => ['required', 'string', 'email', 'max:191', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'is_active' => ['nullable', 'string', 'in:1'],
            'email_notifications' => ['nullable', 'string', 'in:1'],
        ]);
        
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'is_active' => $request->is_active ? 1 : 0,
            'email_notifications' => $request->email_notifications ? 1 : 0,
            'email_verified_at' => Carbon::now()
        ]);

        Cache::forget( 'users');

        session()->flash('success', 'Dodato.');

        return redirect('cms/users');
    }
    
    public function edit($id)
    {
        return view('cms.users.form', ['user' => User::findOrFail($id), 'editing' => true]);
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        
        $request->validate([
            'name' => ['required', 'string', 'max:191'],
            'email' => ['required', 'string', 'email', 'max:191', 'unique:users,email,'.$user->id],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
            'is_active' => ['nullable', 'string', 'in:1'],
            'email_notifications' => ['nullable', 'string', 'in:1'],
        ]);
        
        $user->name = $request->name;
        
        if(!is_null($request->password)) $user->password = Hash::make($request->password);

        $user->email = $request->email;
        $user->is_active = $request->is_active ? 1 : 0;
        $user->email_notifications = $request->email_notifications ? 1 : 0;
        
        $user->save();

        Cache::forget( 'users');

        session()->flash('success', 'Izmjenjeno.');

        return redirect('cms/users');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);    
        $user->delete();

        Cache::forget( 'users');

        session()->flash('success', 'Obrisano.');
        
        return redirect('cms/users');
    }
}
