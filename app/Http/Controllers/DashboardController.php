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

        $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/company-job-firebase.json');
        $firebase = (new Factory)
            ->withServiceAccount($serviceAccount)
            ->withDatabaseUri('https://company-job.firebaseio.com')
            ->create();
        $database = $firebase->getDatabase();

        $ref = $database
        ->getReference('department');
        $departments = $ref->getValue();
        foreach ($departments as $department){
            if ($department['name'] == "Admin" || $department == null) {

            }else{
                $dataJob = $database->getReference('DataJob')->orderByChild('department')->equalTo($department['name']);
                $Jobs = $dataJob->getSnapshot()->numChildren();
                $chart[] = collect(
                    [
                        'label' => $department['name'],
                        'data' => $Jobs
                        ]
                );
            }
        }

        $ref2 = $database
        ->getReference('department');
        $departments2 = $ref2->getValue();
        foreach ($departments2 as $department2){
            if ($department2['name'] == "Admin" || $department2 == null) {

            }else{

                $dataUser = $database->getReference('users')->orderByChild('department')->equalTo($department2['name']);
                $Users = $dataUser->getSnapshot()->numChildren();
                $user[] = collect(
                    [
                        'label' => $department2['name'],
                        'data' => $Users
                        ]
                );
            }
        }

        $userid = Session::get('userid');
        $nama = Session::get('nama');
        $foto = Session::get('foto');
        if(!Session::get('userid')){
            return redirect('/login');
        }else{
            return view('dashboard',['chart' => $chart, 'user' => $user, 'userid' => $userid, 'nama' => $nama, 'foto' => $foto]);
        }
        // return view('dashboard');
    }
    public function chart(Request $request)
    {



            // dd($nama);
        return view('admin/siswa', compact('all_akun', 'Nama'));
    }
}
