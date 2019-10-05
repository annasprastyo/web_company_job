@extends('apps.layout')

@section('content')
<!-- ====================================================
            ================= CONTENT ===============================
            ===================================================== -->
<section id="content">

    <div class="page page-dashboard">

        <div class="pageheader">

            <h2>Dashboard <span>// You can place subtitle here</span></h2>

            <div class="page-bar">

                <ul class="page-breadcrumb">
                    <li>
                        <a href="{{url('dashboard')}}"><i class="fa fa-home"></i> Company Job</a>
                    </li>
                    <li>
                        <a href="{{url('dashboard')}}">Dashboard</a>
                    </li>
                </ul>

            </div>

        </div>

        <!-- cards row -->
        <div class="row">

            <!-- col -->
            <div class="card-container col-lg-4 col-sm-6 col-sm-12">
                <div class="card">
                    <div class="front bg-greensea">

                        <!-- row -->
                        <div class="row">
                            <!-- col -->
                            <div class="col-xs-4">
                                <i class="fa fa-users fa-4x"></i>
                            </div>
                            <!-- /col -->
                            <!-- col -->
                            <div class="col-xs-8">
                                <div id="count_user">
                                    <p class="text-strong mb-0">Plase wait</p>
                                </div>

                                <span>Data Users</span>
                            </div>
                            <!-- /col -->
                        </div>
                        <!-- /row -->

                    </div>
                    <div class="back bg-greensea">

                        <!-- row -->
                        <div class="row">
                            <!-- col -->
                            <div class="col-xs-12">
                                    <a href={{url('user')}}><i class="fa fa-ellipsis-h fa-2x"></i> More</a>
                                </div>
                            <!-- /col -->
                        </div>
                        <!-- /row -->

                    </div>
                </div>
            </div>
            <!-- /col -->

            <!-- col -->
            <div class="card-container col-lg-4 col-sm-6 col-sm-12">
                <div class="card">
                    <div class="front bg-lightred">

                        <!-- row -->
                        <div class="row">
                            <!-- col -->
                            <div class="col-xs-4">
                                <i class="fa fa-tasks fa-4x"></i>
                            </div>
                            <!-- /col -->
                            <!-- col -->
                            <div class="col-xs-8">
                                <div id="count_job">
                                    <p class="text-strong mb-0">Plase wait</p>
                                </div>
                                <span>Data Jobs</span>
                            </div>
                            <!-- /col -->
                        </div>
                        <!-- /row -->

                    </div>
                    <div class="back bg-lightred">

                        <!-- row -->
                        <div class="row">
                            <!-- col -->
                            <div class="col-xs-12">
                                <a href={{url('job')}}><i class="fa fa-ellipsis-h fa-2x"></i> More</a>
                            </div>
                            <!-- /col -->
                        </div>
                        <!-- /row -->

                    </div>
                </div>
            </div>
            <!-- /col -->

            <!-- col -->
            <div class="card-container col-lg-4 col-sm-6 col-sm-12">
                <div class="card">
                    <div class="front bg-blue">

                        <!-- row -->
                        <div class="row">
                            <!-- col -->
                            <div class="col-xs-4">
                                <i class="fa fa-briefcase fa-4x"></i>
                            </div>
                            <!-- /col -->
                            <!-- col -->
                            <div class="col-xs-8">
                                <div id="count_department">
                                    <p class="text-strong mb-0">Plase wait</p>
                                </div>
                                <span>Data Departments</span>
                            </div>
                            <!-- /col -->
                        </div>
                        <!-- /row -->

                    </div>
                    <div class="back bg-blue">

                        <!-- row -->
                        <div class="row">
                            <!-- col -->
                            <div class="col-xs-12">
                                    <a href="{{url('department')}}"><i class="fa fa-ellipsis-h fa-2x"></i> More</a>
                            </div>
                            <!-- /col -->
                        </div>
                        <!-- /row -->

                    </div>
                </div>
            </div>

            <div class="page page-charts">

                <div class="pageheader">

                    <h2>Charts Data Job & User <span>// You can place subtitle here</span></h2>

                </div>

                <!-- row -->
                <div class="row">
                    <!-- col -->
                    <div class="col-md-6">

                        <!-- /tile -->
                        <section class="tile">

                            <!-- tile header -->
                            <div class="tile-header dvd dvd-btm">
                                <h1 class="custom-font"><strong>Chart </strong>Data Job</h1>
                            </div>
                            <!-- /tile header -->

                            <!-- tile body -->
                            <div class="tile-body">

                                <div id="pie-chart" style="height: 250px"></div>

                            </div>
                            <!-- /tile body -->

                        </section>
                        <!-- tile -->

                    </div>
                    <!-- /col -->

                    <!-- col -->
                    <div class="col-md-6">

                        <!-- tile -->

                        <!-- /tile -->

                        <!-- tile -->
                        <section class="tile">

                            <!-- tile header -->
                            <div class="tile-header dvd dvd-btm">
                                <h1 class="custom-font"><strong>Chart </strong>Data User</h1>
                            </div>
                            <!-- /tile header -->

                            <!-- tile body -->
                            <div class="tile-body">

                                <div id="donut-chart" style="height: 250px"></div>

                            </div>
                            <!-- /tile body -->

                        </section>
                        <!-- /tile -->


                    </div>
                    <!-- /col -->
                </div>
                <!-- /row -->

            </div>

        </div>
        <!-- /row -->

    </div>


</section>
<!--/ CONTENT -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="{{asset('assets/js/vendor/datatables/js/jquery.dataTables.min.js')}}"></script>
@include('firebase.config_firebase');
<script>
    $(document).ready(function() {

        });



$(window).load(function(){

// Initialize Pie Chart
// function chart(data6){
var ref = firebase.database().ref("DataJob/");

        ref.on("value", function(snapshot) {
            var IT = 0
            var Electro = 0
            var Networking = 0
            var CS = 0
            var Desainer = 0
            snapshot.forEach(uid => {
                        if(uid.val()['department'] == "IT") {
                            IT++
                        } else if(uid.val()['department'] == "Electro") {
                            Electro++
                        } else if(uid.val()['department'] == "Networking") {
                            Networking++
                        } else if(uid.val()['department'] == "Cleaning Service") {
                            CS++
                        } else if(uid.val()['department'] == "Desainer") {
                            Desainer++
                        }
            });

            var chart = [
                    { label: 'IT', data: IT },
                    { label: 'Electro', data: Electro },
                    { label: 'Networking', data: Networking },
                    { label: 'Cleaning Service', data: CS },
                    { label: 'Desainer', data: Desainer }
                ];

                var options6 = {
    series: {
        pie: {
            show: true,
            innerRadius: 0,
            stroke: {
                width: 0
            },
            label: {
                show: true,
                threshold: 0.05
            }
        }
    },
    colors: ['#428bca','#5cb85c','#f0ad4e','#d9534f','#5bc0de','#616f77'],
    grid: {
        hoverable: true,
        clickable: true,
        borderWidth: 0,
        color: '#ccc'
    },
    tooltip: true,
    tooltipOpts: { content: '%s: %p.0%, Data: %y.0'  ,  defaultTheme: false, shifts: { x: 0, y: 20 } }
};

        var plot6 = $.plot($("#pie-chart"), chart, options6);
        $(window).resize(function() {
        // redraw the graph in the correctly sized div
        plot6.resize();
        plot6.setupGrid();
        plot6.draw();
    });


        console.log(IT+" "+Electro+" "+Networking+" "+CS+" "+Desainer);
        });

var ref2 = firebase.database().ref("users/");

    ref2.on("value", function(snapshot) {
    var IT2 = 0
    var Electro2 = 0
    var Networking2 = 0
    var CS2 = 0
    var Desainer2 = 0
    snapshot.forEach(uid => {
                if(uid.val()['department'] == "IT") {
                    IT2++
                } else if(uid.val()['department'] == "Electro") {
                    Electro2++
                } else if(uid.val()['department'] == "Networking") {
                    Networking2++
                } else if(uid.val()['department'] == "Cleaning Service") {
                    CS2++
                } else if(uid.val()['department'] == "Desainer") {
                    Desainer2++
                }
    });

    var user = [
                    { label: 'IT', data: IT2 },
                    { label: 'Electro', data: Electro2 },
                    { label: 'Networking', data: Networking2 },
                    { label: 'Cleaning Service', data: CS2 },
                    { label: 'Desainer', data: Desainer2 }
                ];
        var options7 = {
    series: {
        pie: {
            show: true,
            innerRadius: 0.5,
            stroke: {
                width: 0
            },
            label: {
                show: true,
                threshold: 0.05
            }
        }
    },
    colors: ['#428bca','#5cb85c','#f0ad4e','#d9534f','#5bc0de','#616f77'],
    grid: {
        hoverable: true,
        clickable: true,
        borderWidth: 0,
        color: '#ccc'
    },
    tooltip: true,
    tooltipOpts: { content: '%s: %p.0%, Data: %y.0', defaultTheme: false, shifts: { x: 0, y: 20 }  }
};

var plot7 = $.plot($("#donut-chart"), user, options7);

$(window).resize(function() {
    // redraw the graph in the correctly sized div
    plot7.resize();
    plot7.setupGrid();
    plot7.draw();
});
});

// }
});

    $(document).ready(function() {
    firebase.database().ref().child('users').on('value', function(snapshot) {
        // alert('Count: ' + snapshot.numChildren());
        $('#count_user').html('<p class="text-elg text-strong mb-0">'+snapshot.numChildren()+'</p>');
        });

    firebase.database().ref().child('DataJob').on('value', function(snapshot) {
        // alert('Count: ' + snapshot.numChildren());
        $('#count_job').html('<p class="text-elg text-strong mb-0">'+snapshot.numChildren()+'</p>');
        });

    firebase.database().ref().child('department').on('value', function(snapshot) {
        // alert('Count: ' + snapshot.numChildren());
        if(snapshot.val().name !== "Admin"){
        $('#count_department').html('<p class="text-elg text-strong mb-0">'+snapshot.numChildren()+'</p>');
        }
        });
});
</script>

@endsection
