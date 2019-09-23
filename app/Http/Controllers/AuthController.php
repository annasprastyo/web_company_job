<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Redirect;

class AuthController extends Controller
{
    public function index(){
        if(!Session::get('userid')){
            // dd(Session::get('userid'));
            return view('login');
        }else{
        return Redirect('dashboard');
        }
    }
    public function signup(){
        return view('signup');
    }

    public function loginPost(Request $request)
    {
        $userid = $request->userid;
        $nama = $request->nama;
        $foto = $request->foto;
        $email = $request->email;
            if($userid){
                Session::put('userid',$userid);
                Session::put('nama',$nama);
                Session::put('foto',$foto);
                Session::put('email',$email);
                echo 1;
         }
    }

    public function logout(){
        Session::flush();
        Redirect::back();
        echo 1;
    }

    public function profile(){
        $userid = Session::get('userid');
        $nama = Session::get('nama');
        $foto = Session::get('foto');
        $email = Session::get('email');
        return view('profile',['userid' => $userid, 'nama' => $nama, 'foto' => $foto, 'email' => $email]);
    }
}

