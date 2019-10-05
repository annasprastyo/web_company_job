<!-- ===============================================
            ================= HEADER Content ===================
            ================================================ -->
<section id="header" class="scheme-light">
    <header class="clearfix">

        <!-- Branding -->
        <div class="branding scheme-light">
            <a class="brand" href="{{url('dashboard')}}">
                <span><strong>COMPANY</strong>JOB</span>
            </a>
            <a role="button" tabindex="0" class="offcanvas-toggle visible-xs-inline"><i class="fa fa-bars"></i></a>
        </div>
        <!-- Branding end -->


        <!-- Search -->
        {{-- <div class="search" id="main-search">
            <input type="text" class="form-control underline-input" placeholder="Search...">
        </div> --}}
        <!-- Search end -->




        <!-- Right-side navigation -->
        <ul class="nav-right pull-right list-inline">

            <li class="dropdown messages">



                <div class="dropdown-menu pull-right with-arrow panel panel-default animated littleFadeInDown"
                    role="menu">

                </div>

            </li>

            <li class="dropdown notifications">



                <div class="dropdown-menu pull-right with-arrow panel panel-default animated littleFadeInLeft">


                </div>

            </li>

            <li class="dropdown nav-profile">

                <a href class="dropdown-toggle" data-toggle="dropdown">
                    <img src="{{$foto}}" alt="" class="img-circle size-30x30">
                    <span>{{$nama}}<i class="fa fa-angle-down"></i></span>
                </a>

                <ul class="dropdown-menu animated littleFadeInRight" role="menu">

                    <li>
                        <a data-toggle="modal" data-target="#myModal" role="button" tabindex="0">
                            <i class="fa fa-cog"></i>Settings
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a data-toggle="modal" data-target="#myModal3" role="button" tabindex="0">
                            <i class="fa fa-sign-out"></i>Logout
                        </a>
                    </li>

                </ul>

            </li>

            {{-- <li class="toggle-right-sidebar pull-right">
                <a role="button" tabindex="0">
                    <i class="fa fa-comments"></i>
                </a>
            </li> --}}
        </ul>
        <!-- Right-side navigation end -->



    </header>

</section>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">


                <div role="tabpanel" class="tab-pane active" id="settingsTab">

                    <div class="wrap-reset">

                        <form class="profile-settings">

                            <div class="row">
                                <div class="form-group col-md-12 legend">
                                    <h4><strong>Pengaturan</strong> Pribadi</h4>
                                    <p>Pengaturan akun pribadi Anda</p>
                                </div>
                            </div>

                            <div class="row">

                                <div class="form-group col-sm-6">
                                    <label for="first-name">Nama Lengkap</label>
                                    <input type="text" id="nama_field" class="form-control" value="John">
                                </div>

                                <div class="form-group col-sm-6">
                                    <label for="">Kontak</label>
                                    <input type="text" id="phone_field" class="form-control" value="Phone">
                                </div>


                            </div>

                            <div class="row">

                                <div class="form-group col-sm-12">
                                    <label for="email">E-mail</label>
                                    <input type="email" id="email_field" class="form-control" value="johny.d@tattek.com"
                                        readonly>
                                </div>

                            </div>
                            <div>
                                <div class="form-group col-sm-6">
                                    <label for="avatar">Pilih Foto</label>
                                    <input type="file" onchange="previewFile()" class="filestyle" data-buttonText="Find file"
                                        data-iconName="fa fa-inbox">
                                    <span class="help-block">Allowed files: gif, png, jpg. Max file size 1Mb</span>
                                </div>


                                <div class="form-group col-sm-6">
                                    <img align="center" id="foto_field" src="{{asset('assets/images/profil.png')}}"
                                        class="form-control img-circle size-100x100" alt="Image preview...">
                                </div>
                            </div>

                            <div class="row">
                            </div>


                        </form>

                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <button onclick="profile_edit()" class="btn btn-success btn-ef btn-ef-3 btn-ef-3c"><i class="fa fa-arrow-right"></i>
                    Submit</button>
                <button class="btn btn-lightred btn-ef btn-ef-4 btn-ef-4c" data-dismiss="modal"><i
                        class="fa fa-arrow-left"></i> Cancel</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title custom-font">Logout</h3>
            </div>
            <div class="modal-body">
                Are you sure you want to sign out?
            </div>
            <div class="modal-footer">
                <button onclick="logout(0)" class="btn btn-success btn-ef btn-ef-3 btn-ef-3c"><i class="fa fa-arrow-right"></i> Logout</button>
                <button class="btn btn-lightred btn-ef btn-ef-4 btn-ef-4c" data-dismiss="modal"><i class="fa fa-arrow-left"></i> Cancel</button>
            </div>
        </div>
    </div>
</div>
<!--/ HEADER Content  -->
