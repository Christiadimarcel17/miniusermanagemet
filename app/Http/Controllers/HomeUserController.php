<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class HomeUserController extends Controller
{
    public function index(){

        $user = DB::table('users')->where('role','=','user')->get();
        return view('dashadmin.usermanage',compact('user'));
    }

    public function create(){
        return view('dashadmin.createuser');
    }
    public function store(Request $request){
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect('/usermanage');
    }

    public function edit($id){
        $user = User::findorfail($id);
        return view('dashadmin.edituser',compact('user'));
    }

    public function update(Request $request, $id){
        $user = User::findorfail($id);
        $user->update($request->all());

        return redirect('/usermanage');
    }

    public function destroy($id){
        $user = User::find($id)->delete();
        return back();
    }
}
