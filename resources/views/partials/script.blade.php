<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
    window.jQuery || document.write('<script src="assets/js/vendor/jquery/jquery-1.11.2.min.js"><\/script>')
</script>

<script src="{{asset('assets/js/vendor/bootstrap/bootstrap.min.js')}}"></script>

<script src="{{asset('assets/js/vendor/jRespond/jRespond.min.js')}}"></script>

<script src="{{asset('assets/js/vendor/d3/d3.min.js')}}"></script>
<script src="{{asset('assets/js/vendor/d3/d3.layout.min.js')}}"></script>

<script src="{{asset('assets/js/vendor/rickshaw/rickshaw.min.js')}}"></script>

<script src="{{asset('assets/js/vendor/sparkline/jquery.sparkline.min.js')}}"></script>

<script src="{{asset('assets/js/vendor/slimscroll/jquery.slimscroll.min.js')}}"></script>

<script src="{{asset('assets/js/vendor/animsition/js/jquery.animsition.min.js')}}"></script>

<script src="{{asset('assets/js/vendor/daterangepicker/moment.min.js')}}"></script>
<script src="{{asset('assets/js/vendor/daterangepicker/daterangepicker.js')}}"></script>

<script src="{{asset('assets/js/vendor/screenfull/screenfull.min.js')}}"></script>

<script src="{{asset('assets/js/vendor/flot/jquery.flot.min.js')}}"></script>
<script src="{{asset('assets/js/vendor/flot-tooltip/jquery.flot.tooltip.min.js')}}"></script>
<script src="{{asset('assets/js/vendor/flot-spline/jquery.flot.spline.min.js')}}"></script>

<script src="{{asset('assets/js/vendor/easypiechart/jquery.easypiechart.min.js')}}"></script>

<script src="{{asset('assets/js/vendor/raphael/raphael-min.js')}}"></script>
<script src="{{asset('assets/js/vendor/morris/morris.min.js')}}"></script>

<script src="{{asset('assets/js/vendor/owl-carousel/owl.carousel.min.js')}}"></script>

<script src="{{asset('assets/js/vendor/datetimepicker/js/bootstrap-datetimepicker.min.js')}}"></script>

<script src="{{asset('assets/js/vendor/datatables/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/js/vendor/datatables/extensions/ColReorder/js/dataTables.colReorder.min.js')}}"></script>
<script src="{{asset('assets/js/vendor/datatables/extensions/Responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('assets/js/vendor/datatables/extensions/ColVis/js/dataTables.colVis.min.js')}}"></script>
<script src="{{asset('assets/js/vendor/datatables/extensions/TableTools/js/dataTables.tableTools.min.js')}}"></script>
<script src="{{asset('assets/js/vendor/datatables/extensions/dataTables.bootstrap.js')}}"></script>

<script src="{{asset('assets/js/vendor/summernote/summernote.min.js')}}"></script>

<script src="{{asset('assets/js/vendor/coolclock/coolclock.js')}}"></script>
<script src="{{asset('assets/js/vendor/coolclock/excanvas.js')}}"></script>
<script src="{{asset('assets/js/vendor/toastr/toastr.min.js')}}"></script>
<script src="{{asset('assets/js/vendor/flot/jquery.flot.pie.min.js')}}"></script>
<script src="{{asset('assets/js/vendor/jRespond/jRespond.min.js')}}"></script>
<script src="{{asset('assets/js/vendor/toastr/toastr.min.js')}}"></script>

<!--/ vendor javascripts -->




<!-- ============================================
        ============== Custom JavaScripts ===============
        ============================================= -->
<script src="{{asset('assets/js/main.js')}}"></script>
<!--/ custom javascripts -->

<script>


        </script>
        <!--/ Page Specific Scripts -->
@include('firebase.config_firebase');
<script>
    toastr.options = {
  "closeButton": true,
  "debug": false,
  "newestOnTop": false,
  "progressBar": true,
  "positionClass": "toast-top-right",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "5800",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}

    var password_old = "";
    firebase.auth().onAuthStateChanged(function(user) {
        if (user) {

            var user = firebase.auth().currentUser;
            // alert(user);

            if(user != null){

                $userid = <?php echo json_encode($userid) ?>;

        firebase.database().ref('/users/' + $userid).once('value').then(function(snapshot) {

        var Nama = (snapshot.val() && snapshot.val().nama) || 'Anonymous';
        var Phone = (snapshot.val() && snapshot.val().phone) || 'Anonymous';
        var Email = (snapshot.val() && snapshot.val().email) || 'Anonymous';
        var Foto = (snapshot.val() && snapshot.val().foto) || 'Anonymous';
        password_old = (snapshot.val() && snapshot.val().password) || 'Anonymous';


        $("#nama_field").val(Nama);
        $("#phone_field").val(Phone);
        $("#email_field").val(Email);
        $("#foto_field").attr('src', Foto);

            });
            }
        } else {
        }
    });


    function profile_edit(){
        var userNama = $("#nama_field").val();
        var userPhone =$("#phone_field").val();
        var userEmail = $("#email_field").val();
        var Foto = $('#foto_field').attr('src');

        var password = $('#password_field').val();
        var r_password = $('#r_password_field').val();

        if(password != r_password){
            alert('Password Tidak Sama!!')
        }else{
            if (password == "") {
                firebase.database().ref('users/' + $userid).set({
                    userid: $userid,
                    foto: Foto,
                    email: userEmail,
                    nama: userNama,
                    phone: userPhone,
                    password: password_old,
                        }, function(error) {
                        if (error) {
                        alert("gagal");
                        } else {
                        // alert("berhasil");
                        }
                    });
            }else{
                firebase.database().ref('users/' + $userid).set({
                    userid: $userid,
                    foto: Foto,
                    email: userEmail,
                    nama: userNama,
                    phone: userPhone,
                    password: password,
                        }, function(error) {
                        if (error) {
                        alert("gagal");
                        } else {
                            var user = firebase.auth().currentUser;
                            var newPassword = password;
                            user.updatePassword(newPassword).then(function() {
                            // Update successful.
                            }).catch(function(error) {
                            });
                            // alert("berhasil");
                        }
                    });
            }
        }
        $.ajax({
            type: "post",
            url: "{{url('loginPost')}}",
            data: {
                _token: "{{csrf_token()}}",
                userid: $userid,
                nama: userNama,
                foto: Foto,
                email: userEmail
                },
                success: function (data) {
                if(data == 1){
                    alert("berhasil");
                    location.reload();
                }else{
                    alert("error")
                }
                }
            });
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
                    $('#foto_field').attr('src', url);
                    Foto = url;
                    // alert(Foto);
                });
            });
        }

        function logout($id) {
            firebase.auth().signOut();
                $.ajax({
                    type: "get",
                    url: "{{ url('logout') }}",
                    data: {
                        _token: "{{csrf_token()}}",
                        id_logout: $id
                    },
                    success: function (data) {
                        if(data == 1){
						    toastr["success"]("Logout Success");
						    window.location.href = "{{url('/dashboard')}}";
                        }else{
                            alert("error");
                        }
                    }
                });
	    }

</script>





<!-- ===============================================
        ============== Page Specific Scripts ===============
        ================================================ --






        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
<script>
    (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='https://www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X','auto');ga('send','pageview');
</script>
