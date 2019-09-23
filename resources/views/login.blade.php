<!doctype html>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Company Job - Admin Dashboard</title>
    <link rel="icon" type="image/ico" href="{{asset('assets/images/favicon.ico')}}" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">




    <!-- ============================================
        ================= Stylesheets ===================
        ============================================= -->
    <!-- vendor css files -->
    <link rel="stylesheet" href="{{asset('assets/css/vendor/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/vendor/animate.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/vendor/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/js/vendor/animsition/css/animsition.min.css')}}">

    <!-- project main css files -->
    <link rel="stylesheet" href="{{asset('assets/css/main.css')}}">
    <!--/ stylesheets -->

    <script src="{{asset('assets/js/vendor/modernizr/modernizr-2.8.3-respond-1.4.2.min.js')}}"></script>

</head>

<body id="minovate" class="appWrapper">


    <!-- ====================================================
        ================= Application Content ===================
        ===================================================== -->
    <div id="wrap" class="animsition">




        <div class="page page-core page-login">

            <div class="text-center">
                <h3 class="text-light text-white"><span class="text-lightred">COMPANY</span> JOB</h3>
            </div>

            <div class="container w-420 p-15 bg-white mt-40 text-center">


                <h2 class="text-light text-greensea" onclick="logout()">Log In</h2>

                <form name="form" class="form-validation mt-20" novalidate="">

                    <div class="form-group">
                        <input type="email" id="email_field" class="form-control underline-input" placeholder="Email">
                    </div>

                    <div class="form-group">
                        <input type="password" id="password_field" placeholder="Password"
                            class="form-control underline-input">
                    </div>

                    <div class="form-group mt-20">
                        <a style="width:25%" class="btn btn-greensea b-0 br-2 mr-5" onclick="login()">Login</a>

                        {{-- <a href="forgotpass.html" class="pull-right mt-10">Forgot Password?</a> --}}
                    </div>

                </form>

                <hr class="b-3x">


                <div class="bg-slategray lt wrap-reset mt-40">
                    <p class="m-0">
                        <a style="cursor:pointer;" class="text-uppercase" onclick="signup()">Create an account</a>
                    </p>
                </div>

            </div>

        </div>



    </div>
    <!--/ Application Content -->

    <!-- ============================================
        ============== Vendor JavaScripts ===============
        ============================================= -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script>
        window.jQuery || document.write('<script src="{{asset("assets/js/vendor/jquery/jquery-1.11.2.min.js")}}"><\/script>')
    </script>

    <script src="{{asset('assets/js/vendor/bootstrap/bootstrap.min.js')}}"></script>

    <script src="{{asset('assets/js/vendor/jRespond/jRespond.min.js')}}"></script>

    <script src="{{asset('assets/js/vendor/sparkline/jquery.sparkline.min.js')}}"></script>

    <script src="{{asset('assets/js/vendor/slimscroll/jquery.slimscroll.min.js')}}"></script>

    <script src="{{asset('assets/js/vendor/animsition/js/jquery.animsition.min.js')}}"></script>

    <script src="{{asset('assets/js/vendor/screenfull/screenfull.min.js')}}"></script>

    <script src="{{asset('assets/js/main.js')}}"></script>

    {{-- firebase --}}
    <script src="https://www.gstatic.com/firebasejs/5.10.1/firebase.js"></script>
    <script>
        // Initialize Firebase
        var config = {
            apiKey: "AIzaSyD0m_YgqNHdjjxchfe0-R1nBrGxKYhQrFM",
            authDomain: "company-job.firebaseapp.com",
            databaseURL: "https://company-job.firebaseio.com",
            projectId: "company-job",
            storageBucket: "company-job.appspot.com",
            messagingSenderId: "721635683345",
            appId: "1:721635683345:web:cbd0f314d63ff8f22295b0"
    };
    // Initialize Firebase
    firebase.initializeApp(config);

            function login(){

                var userEmail = $('#email_field').val();
                var userPass = $('#password_field').val();

                // alert(userEmail+" "+userPass)
                if (userEmail == "" && userPass == "") {
                    alert('Email dan Password Harus Di isi');
                }else if(userEmail == ""){
                    alert('Email Harus Di isi');
                }else if (userPass == "") {
                    alert('Password Harus Di isi');
                }else{
                firebase.auth().signInWithEmailAndPassword(userEmail, userPass).catch(function(error) {
                    // Handle Errors here.
                    var errorCode = error.code;
                    var errorMessage = error.message;

                    window.alert("Error : " + errorMessage);

                });

                firebase.auth().onAuthStateChanged(function(user) {
                if (user) {
                    // User is signed in.
                    var user = firebase.auth().currentUser;
                    firebase.database().ref('/users/' + user.uid).once('value').then(function(snapshot) {
                    var Nama = (snapshot.val() && snapshot.val().nama) || 'Anonymous';
                    var Foto = (snapshot.val() && snapshot.val().foto) || 'Anonymous';
                    var Email = (snapshot.val() && snapshot.val().email) || 'Anonymous';
                    var Department = (snapshot.val() && snapshot.val().department) || 'Anonymous';

                    if (Department == "Admin") {
                        $.ajax({
                            type: "post",
                            url: "{{url('loginPost')}}",
                            data: {
                                _token: "{{csrf_token()}}",
                                userid: user.uid,
                                nama: Nama,
                                foto: Foto,
                                email: Email
                            },
                            success: function (data) {
                                // console.log(data);
                                if(data == 1){
                                    alert("Berhasil Masuk")
                                    window.location.href = "{{url('/login')}}";
                                }else{
                                    alert("error");
                                }
                            }
                        });
                    }else{
                        firebase.auth().signOut();
                        alert('Tidak Terdaftar Sebagai Admin!!');
                    }

                    });
                }
                });
            }
            }

            function signup(){
                window.location.href = "{{url('signup')}}";
            }

    </script>

</body>

</html>
