<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\File;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $nama1 = DB::table('users')->select('name')->distinct()->get()->pluck('name')->first();
        $user = Auth::user();
        $nama = $user['name'];
        $email = $user['email'];
        $role = $user['role'];
        $data = DB::table('users')->get();

        return view('dashuser.home',compact('nama','email','data','user','role'));
    }

    public function edit($id){
        $user= User::findorfail($id);
        return view('dashuser.modal',compact('user'));
    }

    public function update(Request $request,$id){

         //return redirect('/home');

        if($request->hasFile('foto')){
            $filename = $request->foto->getClientOriginalName();
            $request->foto->storeAs('foto',$filename,'public');
            Auth()->user()->update(['foto'=>$filename]);
        }
        return redirect('/home');
    }

}
