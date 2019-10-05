<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Session;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use Redirect;
class JobController extends Controller
{
    public function index(){

        $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/company-job-firebase.json');
        $firebase = (new Factory)
            ->withServiceAccount($serviceAccount)
            ->withDatabaseUri('https://company-job.firebaseio.com')
            ->create();
        $database = $firebase->getDatabase();

        $ref = $database
        ->getReference('DataJob');
        $DataJobs = $ref->getValue();
        foreach ($DataJobs as $DataJob){
            if ($DataJob == null) {

            }else{
                if($DataJob['id_receive'] == "null"){
                    $receive = "Belum ada penerima";
                }else{
                    $Users = $database->getReference('users/'.$DataJob['id_receive']);
                    $User = $Users->getValue();
                    $receive = $User["nama"];
                }

                $Job[] = (
                    [
                        'id_job' => $DataJob['id_job'],
                        'judul' => $DataJob['judul'],
                        'department' => $DataJob['department'],
                        'deskripsi' => $DataJob['deskripsi'],
                        'dodate' => $DataJob['dodate'],
                        'image' => $DataJob['image'],
                        'created_by' => $DataJob['nama'],
                        'receive_by' => $receive
                        ]
                );
            }
        }

        // dd($Job);
        $userid = Session::get('userid');
        $nama = Session::get('nama');
        $foto = Session::get('foto');
        $ac_data = "active";
        return view('Data.Job.job', ['ac_data' => $ac_data, 'Job' => $Job, 'userid' => $userid, 'nama' => $nama, 'foto' => $foto]);
    }

    function countDept(Request $request){
        $name = $request->name;

        $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/company-job-firebase.json');
        $firebase = (new Factory)
            ->withServiceAccount($serviceAccount)
            ->withDatabaseUri('https://company-job.firebaseio.com')
            ->create();
        $database = $firebase->getDatabase();
        $dataDp = $database->getReference('DataJob')->orderByChild('department')->equalTo($name);
        $count = $dataDp->getSnapshot()->numChildren();
        echo $count;
    }

}
