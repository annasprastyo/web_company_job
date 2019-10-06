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
                                        <th>Nama</th>
                                        <th>Departemen</th>
                                        <th>Email</th>
                                        <th>Foto Profile</th>
                                        <th>Kontak</th>
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

<!--/ CONTENT -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="{{asset('assets/js/vendor/datatables/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/js/vendor/toastr/toastr.min.js')}}"></script>
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
        tblMhs.once("value", function(snap) {
            obj = [];
            No = 1
            $.each(snap.val(), function(index, element) {
            if (element) {
                obj2 = [No,element.nama,element.department,element.email,
                '<img src='+element.foto+' height="42" width="42">',
                element.phone];
            obj.push(obj2);
            No = parseInt(No + 1);
            }
            });
        addTable(obj);


    function addTable(data){
    $('#basic-usage').DataTable().clear().draw();
    $('#basic-usage').DataTable().rows.add(data).draw();
    }
    });
    });



</script>

@endsection
