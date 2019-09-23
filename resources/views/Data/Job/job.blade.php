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
                                <th>Tittle</th>
                                <th>Name</th>
                                <th>Action</th>
                                <th class="none">Foto</th>
                                <th class="none">To Departmnet</th>
                                <th class="none">Description</th>
                                <th class="none">Date Line</th>
                                <th class="none">Created By</th>
                                <th class="none">Receive By</th>
                            </tr>
                            </thead>
                            <tbody>
                                    @foreach($Job as $Jobs)
                                    <tr>
                                        <td>{{ $Jobs['id_job'] }}</td>
                                        <td>{{ $Jobs['judul'] }}</td>
                                        <td>{{ $Jobs['created_by'] }}</td>
                                        <td>
                                            <button onclick="viewdetail({{ $Jobs['id_job'] }})" class="btn btn-info">View</button>
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
<div class="modal fade" id="add_department" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title custom-font">Add Department</h3>
            </div>
            <div class="modal-body">
                <div class="row">

                    <div class="form-group col-sm-12">
                        <label for="first-name">Department Name</label>
                        <input type="text" id="department_field" class="form-control" placeholder="Department Name....">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button onclick="save_department()" class="btn btn-success btn-ef btn-ef-3 btn-ef-3c"><i
                        class="fa fa-arrow-right"></i>
                    Submit</button>
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
        $.ajax({
            type: "get",
            url: "{{url('DetailJob')}}",
            data: {
                _token: "{{csrf_token()}}",
                id_job: id
                },
                success: function (data) {
                    $('#detail_data').html(data)
                }
            });
    }

 function delete_data(id){
    firebase.database().ref('department/' + id).remove();
 }
</script>

@endsection
