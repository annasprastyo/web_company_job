<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Redirect;
class DepartmentController extends Controller
{
    public function index(){
        $userid = Session::get('userid');
        $nama = Session::get('nama');
        $foto = Session::get('foto');
        $ac_mas = "active";
        return view('master.department', ['ac_mas' => $ac_mas, 'userid' => $userid, 'nama' => $nama, 'foto' => $foto]);
    }
}
