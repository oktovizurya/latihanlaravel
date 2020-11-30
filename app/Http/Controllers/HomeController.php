<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

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
        $data["pengguna"] = DB::table("pengguna")->get(); 
        return view('home',$data);
    }
    public function simpan(Request $request)
    {
        DB::table("pengguna")->insert([
            'nama'=>$request->nama,
            'username'=>$request->username,
            'email'=>$request->email,
            'password'=>$request->password,
            'jk'=>$request->jk,
            'agama'=>$request->agama,
            'biografi'=>$request->biografi,
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at'=> date('Y-m-d H:i:s')
        ]);
        return redirect('/home')->with('status','data berhasil ditambahkan');
    }
}
