@extends('apps.layout')

@section('content')
<section id="content">

    <div class="page page-tables-datatables">

        <div class="pageheader">

            <h2>Department <span>// Data Department</span></h2>

            <div class="page-bar">

                <ul class="page-breadcrumb">
                    <li>
                        <a href="{{url('dashboard')}}"><i class="fa fa-home"></i> Company Job</a>
                    </li>
                    <li>
                        <a>Master</a>
                    </li>
                    <li>
                        <a href="{{url('department')}}">Department</a>
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
                        <h1 class="custom-font"><strong>Table</strong> Department</h1>
                        <div class="note"><strong>All</strong> Data Department</div>
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
                                        <th>ID</th>
                                        <th>Department Name</th>
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

<!-- Modal -->
<div class="modal fade" id="edit_department" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title custom-font">Update Department</h3>
            </div>
            <div class="modal-body">
                <div class="row">

                    <div class="form-group col-sm-12">
                        <label for="first-name">Department Name</label>
                        <input type="hidden" id="id_department">
                        <input type="text" id="e_department_field" class="form-control"
                            placeholder="Department Name....">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button onclick="update_department()" class="btn btn-success btn-ef btn-ef-3 btn-ef-3c"><i
                        class="fa fa-arrow-right"></i>
                    Submit</button>
                <button class="btn btn-lightred btn-ef btn-ef-4 btn-ef-4c" data-dismiss="modal"><i
                        class="fa fa-arrow-left"></i> Cancel</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="delete_department" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title custom-font">Delete this Data?</h3>
            </div>
            <div class="modal-body">
                Are you sure you want to delete Data
            </div>
            <div class="modal-footer">
                <button id="btn_delete"  class="btn btn-success btn-ef btn-ef-3 btn-ef-3c"><i class="fa fa-arrow-right"></i> Delete</button>
                <button class="btn btn-lightred btn-ef btn-ef-4 btn-ef-4c" data-dismiss="modal"><i class="fa fa-arrow-left"></i> Cancel</button>
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
        var tblMhs = firebase.database().ref().child('department');
        tblMhs.on("value", function(snap) {
            obj = [];
            $.each(snap.val(), function(index, element) {
            if (element) {
                obj2 = [element.id,element.name,'<button data-toggle="modal" onclick="openEditModal('+element.id+', \'' + element.name + '\')" class="btn btn-info updateData">Update</button>\
            <button data-toggle="modal" data-target="#remove-modal" class="btn btn-danger removeData" onclick="modal_delete('+element.id+')">Delete</button></td>'];
            obj.push(obj2);
            }
            });
        addTable(obj);
        console.log(obj);
    });

    function addTable(data){
    $('#basic-usage').DataTable().clear().draw();
    $('#basic-usage').DataTable().rows.add(data).draw();
    }
    });

    function modal_delete(id){
        $('#delete_department').modal('show');
        $( "#btn_delete" ).click(function() {
            delete_data(id);
        });


    }
    firebase.database().ref('department').limitToLast(1).on("child_added", snap => {
       lastIndex = snap.child("id").val();
    });

    function openEditModal(id, name){
    $("#id_department").val(id);
    $("#e_department_field").val(name);
    $('#edit_department').modal('show');
        // alert(nama_roles);
    }

 function save_department(){
        var name = $('#department_field').val();
		var id = parseInt(lastIndex + 1);
        firebase.database().ref('department/' + id).set({
            id: id,
			name: name,
        });
        // Reassign lastID value
        lastIndex = id;
        $('#add_department').modal('hide');
        alert('Berhasil di Tambah!!')
        $('#department_field').val('');
 }

 function update_department(){
        var id = $('#id_department').val();
        var name = $('#e_department_field').val();
        firebase.database().ref('department/' + id).set({
            id: id,
			name: name,
        });
        $('#edit_department').modal('hide');
        alert('Berhasil di Ubah!!')
 }
 function delete_data(id){
    firebase.database().ref('department/' + id).remove();
    alert('Data Berhasil Di Hapus!!')
    $('#delete_department').modal('hide');
 }
</script>

@endsection