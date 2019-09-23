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

                        <div class="text-center"><h3 class="text-light text-white"><span class="text-lightred">M</span>INOVATE</h3></div>

                        <div class="container w-420 p-15 bg-white mt-40 text-center">

                            <h2 class="text-light text-greensea">Sign Up</h2>

                            <form name="form" class="form-validation mt-20">

                                <p class="help-block text-left">
                                    Enter your personal details below:
                                </p>

                                <div class="form-group" id="foto" >
                                <img src="{{asset('assets/images/profil.png')}}" id="foto_default" class="img-circle size-90x90" alt="Image preview...">
                                </div>
                                <label>Foto profil</label>
                                <div class="form-group">
                                        <input type="file" onchange="previewFile()" class="form-control underline-input" placeholder="Select Picture">
                                </div>

                                <div class="form-group">
                                    <input type="text" id="nama_field" class="form-control underline-input" placeholder="Full Name">
                                </div>
                                <div class="form-group">
                                        <input type="text" id="phone_field" class="form-control underline-input" placeholder="Phone">
                                    </div>

                                <div class="form-group">
                                    <input type="email" id="email_field" class="form-control underline-input" placeholder="Email">
                                </div>

                                <div class="form-group">
                                    <input type="password" id="password_field" placeholder="Password" class="form-control underline-input">
                                </div>

                                <div class="form-group text-left">
                                    <label class="checkbox checkbox-custom-alt checkbox-custom-sm inline-block">
                                        <input type="checkbox"><i></i> I agree to the <a href="javascript:;">Terms of Service</a> &amp; <a href="javascript:;">Privacy Policy</a>
                                    </label>
                                </div>

                            </form>

                            <div class="bg-slategray lt wrap-reset mt-20 text-left">
                                <p class="m-0">
                                    <a onclick="signup()" class="btn btn-greensea b-0 text-uppercase pull-right">Submit</a>
                                    <a href="{{url('/')}}" class="btn btn-lightred b-0 text-uppercase">Back</a>
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
        <script>window.jQuery || document.write('<script src="{{asset("assets/js/vendor/jquery/jquery-1.11.2.min.js")}}"><\/script>')</script>

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

    var Foto = "";
    function signup(){

        var userEmail = document.getElementById("email_field").value;
        var userPass = document.getElementById("password_field").value;
        var userNama = document.getElementById("nama_field").value;
        var userPhone = document.getElementById("phone_field").value;

    firebase.auth().createUserWithEmailAndPassword(userEmail, userPass).catch(function(error) {
        // Handle Errors here.
        var errorCode = error.code;
        var errorMessage = error.message;

        window.alert("Error : " + errorMessage);

    });

    firebase.auth().onAuthStateChanged(function(user) {
    if (user) {
        // User is signed in.

        var user = firebase.auth().currentUser;

        if(user != null){

        // alert(userid+" "+userNama+" "+userEmail+" "+userPass);

        firebase.database().ref('users/' + user.uid).set({
        userid: user.uid,
        foto: Foto,
        nama: userNama,
        phone: userPhone,
        email: userEmail,
        password : userPass
            }, function(error) {
            if (error) {
            // The write failed...
            alert("gagal");
            } else {
            // Data saved successfully!
            alert("berhasil");
            firebase.auth().signOut();
            window.location.href = "{{url('/')}}";
            }
        });

        }
    } else {
        // No user is signed in.

    }
    });

    }

    function logout(){
    firebase.auth().signOut();
    }


    var storageRef = firebase.storage().ref();
        var imagesRef = storageRef.child('images');

        function previewFile(){
        var file =document.querySelector('input[type=file]').files[0];
        var metadata = {
        contentType: 'image/jpeg'
        };
        var uploadTask = storageRef.child('images/' + file.name).put(file, metadata);
        uploadTask.on(firebase.storage.TaskEvent.STATE_CHANGED,
        function(snapshot) {
            var progress = (snapshot.bytesTransferred / snapshot.totalBytes) * 100;
            console.log('Upload is ' + progress + '% done');
            switch (snapshot.state) {
                case firebase.storage.TaskState.PAUSED:
                    console.log('Upload is paused');
                    break;
                case firebase.storage.TaskState.RUNNING:
                    console.log('Upload is running');
                    break;
            }
            }, function(error) {
                console.log('error while uploading')
            }, function() {
                var starsRef = storageRef.child('images/'+ file.name);
                starsRef.getDownloadURL().then(function(url) {
                    // document.querySelector('#preview').src=url;
                    $('#foto_default').hide();
                    $('#foto').html('<img src="'+url+'" id="preview" class="img-circle size-90x90" alt="Image preview...">')
                    Foto = url;
                    // alert(Foto);
                });
            });
        }

        </script>

    </body>
</html>
