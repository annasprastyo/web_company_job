<!-- ===============================================
            ================= HEADER Content ===================
            ================================================ -->
<section id="header">
    <header class="clearfix">

        <!-- Branding -->
        <div class="branding">
            <a class="brand" href="{{url('dashboard')}}">
                <span><strong>COMPANY</strong>JOB</span>
            </a>
            <a role="button" tabindex="0" class="offcanvas-toggle visible-xs-inline"><i class="fa fa-bars"></i></a>
        </div>
        <!-- Branding end -->


        <!-- Search -->
        <div class="search" id="main-search">
            <input type="text" class="form-control underline-input" placeholder="Search...">
        </div>
        <!-- Search end -->




        <!-- Right-side navigation -->
        <ul class="nav-right pull-right list-inline">

            <li class="dropdown messages">

                <a href class="dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-envelope"></i>
                    <span class="badge bg-lightred">4</span>
                </a>

                <div class="dropdown-menu pull-right with-arrow panel panel-default animated littleFadeInDown"
                    role="menu">

                    <div class="panel-heading">
                        You have <strong>4</strong> messages
                    </div>

                    <ul class="list-group">

                        <li class="list-group-item">
                            <a role="button" tabindex="0" class="media">
                                <span class="pull-left media-object thumb thumb-sm">
                                    <img src="assets/images/ici-avatar.jpg" alt="" class="img-circle">
                                </span>
                                <div class="media-body">
                                    <span class="block">Imrich sent you a message</span>
                                    <small class="text-muted">12 minutes ago</small>
                                </div>
                            </a>
                        </li>

                        <li class="list-group-item">
                            <a role="button" tabindex="0" class="media">
                                <span class="pull-left media-object  thumb thumb-sm">
                                    <img src="assets/images/peter-avatar.jpg" alt="" class="img-circle">
                                </span>
                                <div class="media-body">
                                    <span class="block">Peter sent you a message</span>
                                    <small class="text-muted">46 minutes ago</small>
                                </div>
                            </a>
                        </li>

                        <li class="list-group-item">
                            <a role="button" tabindex="0" class="media">
                                <span class="pull-left media-object  thumb thumb-sm">
                                    <img src="assets/images/random-avatar1.jpg" alt="" class="img-circle">
                                </span>
                                <div class="media-body">
                                    <span class="block">Bill sent you a message</span>
                                    <small class="text-muted">1 hour ago</small>
                                </div>
                            </a>
                        </li>

                        <li class="list-group-item">
                            <a role="button" tabindex="0" class="media">
                                <span class="pull-left media-object  thumb thumb-sm">
                                    <img src="assets/images/random-avatar3.jpg" alt="" class="img-circle">
                                </span>
                                <div class="media-body">
                                    <span class="block">Ken sent you a message</span>
                                    <small class="text-muted">3 hours ago</small>
                                </div>
                            </a>
                        </li>

                    </ul>

                    <div class="panel-footer">
                        <a role="button" tabindex="0">Show all messages <i class="pull-right fa fa-angle-right"></i></a>
                    </div>

                </div>

            </li>

            <li class="dropdown notifications">

                <a href class="dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-bell"></i>
                    <span class="badge bg-lightred">3</span>
                </a>

                <div class="dropdown-menu pull-right with-arrow panel panel-default animated littleFadeInLeft">

                    <div class="panel-heading">
                        You have <strong>3</strong> notifications
                    </div>

                    <ul class="list-group">

                        <li class="list-group-item">
                            <a role="button" tabindex="0" class="media">
                                <span class="pull-left media-object media-icon bg-danger">
                                    <i class="fa fa-ban"></i>
                                </span>
                                <div class="media-body">
                                    <span class="block">User Imrich cancelled account</span>
                                    <small class="text-muted">6 minutes ago</small>
                                </div>
                            </a>
                        </li>

                        <li class="list-group-item">
                            <a role="button" tabindex="0" class="media">
                                <span class="pull-left media-object media-icon bg-primary">
                                    <i class="fa fa-bolt"></i>
                                </span>
                                <div class="media-body">
                                    <span class="block">New user registered</span>
                                    <small class="text-muted">12 minutes ago</small>
                                </div>
                            </a>
                        </li>

                        <li class="list-group-item">
                            <a role="button" tabindex="0" class="media">
                                <span class="pull-left media-object media-icon bg-greensea">
                                    <i class="fa fa-lock"></i>
                                </span>
                                <div class="media-body">
                                    <span class="block">User Robert locked account</span>
                                    <small class="text-muted">18 minutes ago</small>
                                </div>
                            </a>
                        </li>

                    </ul>

                    <div class="panel-footer">
                        <a role="button" tabindex="0">Show all notifications <i
                                class="fa fa-angle-right pull-right"></i></a>
                    </div>

                </div>

            </li>

            <li class="dropdown nav-profile">

                <a href class="dropdown-toggle" data-toggle="dropdown">
                    <img src="{{$foto}}" alt="" class="img-circle size-30x30">
                    <span>{{$nama}}<i class="fa fa-angle-down"></i></span>
                </a>

                <ul class="dropdown-menu animated littleFadeInRight" role="menu">

                    <li>
                        <a href="{{url('profile')}}" role="button" tabindex="0">
                            {{-- <span class="badge bg-greensea pull-right">86%</span> --}}
                            <i class="fa fa-user"></i>Profile
                        </a>
                    </li>
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

            <li class="toggle-right-sidebar pull-right">
                <a role="button" tabindex="0">
                    <i class="fa fa-comments"></i>
                </a>
            </li>
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
                                    <h4><strong>Personal</strong> Settings</h4>
                                    <p>Your personal account settings</p>
                                </div>
                            </div>

                            <div class="row">

                                <div class="form-group col-sm-6">
                                    <label for="first-name">Fullname Name</label>
                                    <input type="text" id="nama_field" class="form-control" value="John">
                                </div>

                                <div class="form-group col-sm-6">
                                    <label for="phone">Phone</label>
                                    <input type="number" id="phone_field" class="form-control" value="Phone">
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
                                <div class="form-group col-md-12 legend">
                                    <h4><strong>Security</strong> Settings</h4>
                                    <p>Secure your account</p>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-sm-12">
                                    <label for="password">Current Password</label>
                                    <input type="password" class="form-control" id="password" value="secretpassword"
                                        readonly>
                                </div>

                                <div class="form-group col-sm-6">
                                    <label for="new-password">New Password</label>
                                    <input type="password" id="password_field" class="form-control" id="new-password">
                                </div>

                                <div class="form-group col-sm-6">
                                    <label for="new-password-repeat">New Password Repeat</label>
                                    <input type="password" id="r_password_field" class="form-control" id="new-password-repeat">
                                </div>

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
