@extends('apps.layout')

@section('content')
<section id="content">

    <div class="page page-tables-datatables">

        <div class="pageheader">

            <h2>Job <span>// Data Job</span></h2>

            <div class="page-bar">

                <ul class="page-breadcrumb">
                    <li>
                        <a href="{{url('dashboard')}}"><i class="fa fa-home"></i> Company Job</a>
                    </li>
                    <li>
                        <a>Data</a>
                    </li>
                    <li>
                        <a href="{{url('job')}}">Job</a>
                    </li>
                </ul>

            </div>

        </div>

        <!-- row -->
        <div class="row">
            <!-- col -->
            <div class="col-md-12">


                <!-- tile -->
                <section class="tile">

                    <!-- tile header -->
                    <div class="tile-header dvd dvd-btm">
                        <h1 class="custom-font"><strong>Table</strong> Job</h1>
                        <div class="note"><strong>All</strong> Data Job</div>
                        <ul class="controls">
                            {{-- <li>
                                <a role="button" data-toggle="modal" data-target="#add_department" tabindex="0"
                                    id="add-entry"><i class="fa fa-plus mr-5"></i> Add
                                    Data</a>
                            </li> --}}
                        </ul>
                    </div>
                    <!-- /tile header -->

                    <!-- tile body -->
                    <div class="tile-body">
                        <table class="table table-custom dt-responsive" id="responsive-usage" width="100%">
                            <thead>
                            <tr>
                                <th>ID Job</th>
                                <th>Judul</th>
                                <th>Nama</th>
                                <th>Action</th>
                                <th class="none">Foto</th>
                                <th class="none">Kepada Departmnet</th>
                                <th class="none">Deskripsi</th>
                                <th class="none">Date Line</th>
                                <th class="none">Dibuat Oleh</th>
                                <th class="none">Diterima Oleh</th>
                            </tr>
                            </thead>
                            <tbody>
                                    @foreach($Job as $Jobs)
                                    <tr>
                                        <td>{{ $Jobs['id_job'] }}</td>
                                        <td>{{ $Jobs['judul'] }}</td>
                                        <td>{{ $Jobs['created_by'] }}</td>
                                        <td>
                                            <button onclick="viewdetail({{ $Jobs['id_job'] }})" class="btn btn-info"><i class="fa fa-eye"></i> View</button>
                                        </td>
                                        <td align="center"><img height="80" width="80" src="{{ $Jobs['image'] }}" alt=""></td>
                                        <td>{{ $Jobs['department'] }}</td>
                                        <td>{{ $Jobs['deskripsi'] }}</td>
                                        <td>{{ $Jobs['dodate'] }}</td>
                                        <td>{{ $Jobs['created_by'] }}</td>
                                        <td>{{ $Jobs['receive_by'] }}</td>
                                    </tr>
                                    @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /tile body -->

                </section>
                <!-- /tile -->

            </div>
            <!-- /col -->
        </div>
        <!-- /row -->

    </div>

</section>

<!-- Modal -->
<div class="modal fade" id="modal_detail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title custom-font">Detail Job</h3>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div id="data_head">

                        </div>

                        <div class="col-md-12">
                            <section class="tile">

                                <!-- tile header -->
                                <div class="tile-header dvd dvd-btm">
                                    <h1 class="custom-font"><strong>Detail</strong> Rows</h1>
                                </div>
                                <!-- /tile header -->
                                <!-- tile body -->
                                <div class="tile-body p-0">

                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Deskripsi</th>
                                                <th>status</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tbody">

                                        </tbody>
                                    </table>

                                </div>
                                <!-- /tile body -->

                            </section>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-lightred btn-ef btn-ef-4 btn-ef-4c" data-dismiss="modal"><i
                            class="fa fa-arrow-left"></i> Cancel</button>
                </div>
            </div>
        </div>
    </div>
<div id="detail_data"></div>

<!--/ CONTENT -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="{{asset('assets/js/vendor/datatables/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/js/vendor/datatables/extensions/Responsive/js/dataTables.responsive.min.js')}}"></script>
<script>


</script>
@include('firebase.config_firebase');
<script>
     $(document).ready(function() {
        var table3 = $('#responsive-usage').DataTable({
                    "aoColumnDefs": [
                      { 'bSortable': false, 'aTargets': [ "no-sort" ] }
                    ]
                });
        });

        function viewdetail(id){
        var user = firebase.auth().currentUser;
                    firebase.database().ref('/DataJob/'+id).once('value').then(function(snapshot) {
                    var id_job = (snapshot.val() && snapshot.val().id_job) || 'Anonymous';
                    var judul = (snapshot.val() && snapshot.val().judul) || 'Anonymous';
                    var Foto = (snapshot.val() && snapshot.val().image) || 'Anonymous';
                    var department = (snapshot.val() && snapshot.val().department) || 'Anonymous';
                    var deskripsi = (snapshot.val() && snapshot.val().deskripsi) || 'Anonymous';
                    var dodate = (snapshot.val() && snapshot.val().dodate) || 'Anonymous';
                    var id_user = (snapshot.val() && snapshot.val().id_user) || 'Anonymous';
                    var id_receive = (snapshot.val() && snapshot.val().id_receive) || 'Anonymous';
                    firebase.database().ref('/users/' + id_user).once('value').then(function(snapshot1) {
                        var created_by = (snapshot1.val() && snapshot1.val().nama) || 'Anonymous';

                    firebase.database().ref('/users/' + id_receive).once('value').then(function(snapshot2) {
                        var receive_by = (snapshot2.val() && snapshot2.val().nama) || 'Belum ada penerima';

                    var data_head = '<div class="col-sm-5">\
                        <div class="form-group col-sm-12">\
                            <label><strong>Image :</strong></label>\
                        </div>\
                        <div class="form-group col-sm-12">\
                            <img align="center" class="form-control img-circle size-200x200"\
                                src="'+Foto+'" height="40" width="40" alt="">\
                        </div>\
                    </div>\
                    <div class="col-sm-6">\
                        <div class="form-group col-sm-12">\
                            <label><strong>ID Job :</strong></label>\
                            <label>' +id_job+'</label>\
                        </div>\
                        <div class="form-group col-sm-12">\
                            <label><strong>Judul :</strong></label>\
                            <label>' +judul+'</label>\
                        </div>\
                        <div class="form-group col-sm-12">\
                            <label><strong>Kepada Departemen :</strong></label>\
                            <label>' +department+'</label>\
                        </div>\
                        <div class="form-group col-sm-12">\
                            <label><strong>Batas Waktu :</strong></label>\
                            <label>' +dodate+'</label>\
                        </div>\
                        <div class="form-group col-sm-12">\
                            <label><strong>Dibuat Oleh :</strong></label>\
                            <label>' +created_by+'</label>\
                        </div>\
                        <div class="form-group col-sm-12">\
                            <label><strong>Diterima Oleh :</strong></label>\
                            <label> '+receive_by+'</label>\
                        </div>\
                    </div>\
                    <div class="col-sm-12">\
                        <div class="form-group col-sm-12">\
                            <label><strong>Deskripsi :</strong></label>\
                        </div>\
                        <div class="form-group col-sm-12">\
                            <label>'+deskripsi+'</label>\
                        </div>\
                    </div>'

                    $('#data_head').html(data_head);
                })
            })
        });
        firebase.database().ref('/DataDetailJob').orderByChild('id_job').equalTo(id).once('value').then(snap => {
        var htmls = [];
        var no = 1;
        snap.forEach(child => {
        var key = child.key;
        var childData = child.val();
               var checkbox = '';
               if(childData.isdone == 1){
                    checkbox = '<input disabled checked type="checkbox"><i></i> selesai</label>';
                }else{
                    checkbox = '<input disabled type="checkbox"><i></i> selesai</label>';
                }
                htmls.push('<tr>\
                <td style="vertical-align: middle;">'+no+'</td>\
                <td style="vertical-align: middle;">'+childData.deskripsi+'</td>\
                <td>\
                    <label class="checkbox checkbox-custom-alt checkbox-custom-sm">\
                    '+checkbox+'\
                </td>\
                </tr>');

            no = parseInt(no + 1)
        });
        console.log(htmls);
        $('#tbody').html(htmls);
    });
    $('#modal_detail').modal('show');
    }

 function delete_data(id){
    firebase.database().ref('department/' + id).remove();
 }
</script>

@endsection
