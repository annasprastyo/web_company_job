@extends('apps.layout')

@section('content')
<section id="content">

    <div class="page page-tables-datatables">

        <div class="pageheader">

            <h2>User <span>// Data User</span></h2>

            <div class="page-bar">

                <ul class="page-breadcrumb">
                    <li>
                        <a href="{{url('dashboard')}}"><i class="fa fa-home"></i> Company Job</a>
                    </li>
                    <li>
                        <a>Data</a>
                    </li>
                    <li>
                        <a href="{{url('user')}}">User</a>
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
                        <h1 class="custom-font"><strong>Table</strong> User</h1>
                        <div class="note"><strong>All</strong> Data User</div>
                        <ul class="controls">
                            <li>
                                <a role="button" data-toggle="modal" data-target="#add_department" tabindex="0"
                                    id="add-entry"><i class="fa fa-plus mr-5"></i> Add
                                    Data</a>
                            </li>
                        </ul>
                    </div>
                    <!-- /tile header -->

                    <!-- tile body -->
                    <div class="tile-body">
                        <div class="table-responsive">
                            <table class="table table-custom" id="basic-usage">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Department</th>
                                        <th>Email</th>
                                        <th>Foto</th>
                                        <th>Phone</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
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

<!--/ CONTENT -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="{{asset('assets/js/vendor/datatables/js/jquery.dataTables.min.js')}}"></script>
<script>


</script>
@include('firebase.config_firebase');
<script>

    var database = firebase.database();
    var lastIndex = 0;

    $(function () {

        var obj = [];
        var obj2 = [];
        var No = 0;
        var tblMhs = firebase.database().ref().child('users');
        tblMhs.on("value", function(snap) {
            obj = [];
            No = 1
            $.each(snap.val(), function(index, element) {
            if (element) {
                obj2 = [No,element.nama,element.department,element.email,
                '<img src='+element.foto+' height="42" width="42">',
                element.phone,'<button data-toggle="modal" data-target="#remove-modal" class="btn btn-danger removeData" onclick="delete_data('+element.id+')">Delete</button></td>'];
            obj.push(obj2);
            No = parseInt(No + 1);
            }
            });
        addTable(obj);
    });

    function addTable(data){
    $('#basic-usage').DataTable().clear().draw();
    $('#basic-usage').DataTable().rows.add(data).draw();
    }
    });

 function delete_data(id){
    firebase.database().ref('department/' + id).remove();
 }
</script>

@endsection
