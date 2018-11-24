<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Role;
use App\Http\Requests\RoleRequest;
use App\Http\Requests\EditRoleRequest;
use Illuminate\Support\Facades\DB;
class RoleController extends Controller
{
    //
    public function index(){

        $admin=Role::where('name','administrator')->get();
        $roleId=$admin[0]->id;
        $roles = DB::select('select * from roles where id !=1');

      return view('Role.index',compact(['roles','admin']));
       // return $admin;
    }
    public function edit($id){
        $role=Role::findOrFail($id);
        return view('Role.edit',compact('role'));

    }
    public function create(){
        return view('Role.create');
    }
    public function update(EditRoleRequest $request,$id){
        $role=Role::find($id);

        $role->update($request->all());
        session::flash('update_role','نقش آپدیت شد');
        return redirect('roles');
    }

    public function store(RoleRequest $request){
        $role=new Role;
        $role->name=$request->name;
        if($request->description) {
            $role->description = $request->description;
        }
        $role->save();
        return redirect('roles');
    }
    public function destroy($id){
    $role=Role::findOrFail($id);
    $users=$role->users;
    foreach($users as $item){
        $item->pivot->delete();
    }
    $role->delete();
    return redirect('roles');
    }
}
