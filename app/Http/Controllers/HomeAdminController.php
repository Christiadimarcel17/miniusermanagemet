<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class HomeAdminController extends Controller
{
    public function index(){

        $admin = DB::table('users')->where('role','=','admin')->get();
        return view('dashadmin.adminmanage',compact('admin'));
    }

    public function create(){
        return view('dashadmin.createadmin');
    }
    public function store(Request $request){
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect('/adminmanage');
    }

    public function edit($id){
        $user = User::findorfail($id);
        return view('dashadmin.editadmin',compact('user'));
    }

    public function update(Request $request, $id){
        $user = User::findorfail($id);
        $user->update($request->all());

        return redirect('/adminmanage');
    }

    public function destroy($id){
        $user = User::find($id)->delete();
        return back();
    }
}
