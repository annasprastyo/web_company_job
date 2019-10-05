<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use Redirect;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $userid = Session::get('userid');
        $nama = Session::get('nama');
        $foto = Session::get('foto');
        $ac_dash = "active";
        if(!Session::get('userid')){
            return redirect('/login');
        }else{
            return view('dashboard',['ac_dash' => $ac_dash, 'userid' => $userid, 'nama' => $nama, 'foto' => $foto]);
        }
        // return view('dashboard');
    }
    public function chart(Request $request)
    {



            // dd($nama);
        return view('admin/siswa', compact('all_akun', 'Nama'));
    }
}
