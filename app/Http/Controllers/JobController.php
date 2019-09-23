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
        return view('Data.Job.job', ['Job' => $Job, 'userid' => $userid, 'nama' => $nama, 'foto' => $foto]);
    }

    function DetailJob(Request $request){

        $id_job = $request->id_job;

        $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/company-job-firebase.json');
        $firebase = (new Factory)
            ->withServiceAccount($serviceAccount)
            ->withDatabaseUri('https://company-job.firebaseio.com')
            ->create();
        $database = $firebase->getDatabase();

        $DataJobs = $database->getReference('DataJob/'.$id_job);
        $DataJob = $DataJobs->getValue();

        $Detailref = $database->getReference('DataDetailJob');
        $DetailJobs = $Detailref->getValue();
        foreach ($DetailJobs as $DetailJob){
            if($DetailJob == "null" || $DetailJob["id_job"] != $id_job){

            }else{
                $DetailData[] = $DetailJob;
            }
        }
        echo View('Data.Job.detail_job', ['DataJob' => $DataJob, 'DetilData' => $DetailData]);
    }
}
