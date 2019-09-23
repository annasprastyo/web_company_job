@extends('apps.layout')

@section('content')

<!-- ====================================================
            ================= CONTENT ===============================
            ===================================================== -->
<section id="content">

    <div class="page page-profile">

        <div class="pageheader">

            <h2>Profile Page <span>// You can place subtitle here</span></h2>

            <div class="page-bar">

                <ul class="page-breadcrumb">
                    <li>
                        <a href="{{url('dashboard')}}"><i class="fa fa-home"></i> Company Job</a>
                    </li>
                    <li>
                        <a href="{{url('profile')}}">Profile Page</a>
                    </li>
                </ul>

            </div>

        </div>

        <!-- page content -->
        <div class="pagecontent">


            <!-- row -->
            <div class="row">






                <!-- col -->
                <div class="col-md-12">

                    <!-- tile -->
                    <section class="tile tile-simple">

                        <!-- tile widget -->
                        <div class="tile-widget p-30 text-center">

                            <div class="thumb thumb-xl">
                                <img class="img-circle" src="{{$foto}}" alt="">
                            </div>
                            <h4 class="mb-0"><strong>{{$nama}}</strong></h4>
                            <h5 class="mb-0"><strong>{{$email}}</strong></h5>
                            <span class="text-muted">Admin</span>

                        </div>
                        <!-- /tile widget -->
                    </section>
                    <!-- /tile -->

                </div>
                <!-- /col -->

            </div>
            <!-- /row -->



        </div>
        <!-- /page content -->
</section>
@endsection
