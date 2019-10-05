<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Redirect;
class UserController extends Controller
{
    public function index(){
        $userid = Session::get('userid');
        $nama = Session::get('nama');
        $foto = Session::get('foto');
        $ac_data = "active";
        return view('Data.User.user', ['ac_data' => $ac_data, 'userid' => $userid, 'nama' => $nama, 'foto' => $foto]);
    }
}
