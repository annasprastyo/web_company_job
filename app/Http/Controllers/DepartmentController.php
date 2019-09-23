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
        return view('master.department', ['userid' => $userid, 'nama' => $nama, 'foto' => $foto]);
    }
}
