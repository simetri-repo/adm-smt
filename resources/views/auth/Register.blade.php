<!DOCTYPE html>
<html dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
    <title>admin sinarmetrindo - login</title>
    <!-- Custom CSS -->
    <link href="dist/css/style.min.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <div class="main-wrapper">
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <div class="preloader">
            <div class="lds-ripple">
                <div class="lds-pos"></div>
                <div class="lds-pos"></div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center bg-dark">
            <div class="auth-box bg-dark">
                <div id="loginform">
                    <div class="text-center p-t-20 p-b-20 border-bottom border-secondary">
                        {{-- <span class="db"><img src="assets/images/logo.png" alt="logo" /></span> --}}
                        <h2 class="db text-light">Sign In.</h2>
                    </div>
                    <!-- Form -->
                    <form class="form-horizontal m-t-20" method="POST" action="{{ url('regist_save') }}">
                        @csrf
                        <div class="row p-b-0">
                            <div class="col-12">

                                <!-- email -->
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-danger text-white " id="basic-addon1"><i
                                                class="ti-email"></i></span>
                                    </div>
                                    <input type="text" class="form-control form-control-lg @error('email'){{ 'is-invalid' }}

                                        @enderror" placeholder="Email Address" aria-label="Username"
                                        aria-describedby="basic-addon1" name="email" value="{{ old('email') }}">
                                    <div class="invalid-feedback">
                                        @error('email'){{ $message }}

                                        @enderror
                                    </div>

                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-warning text-white" id="basic-addon2"><i
                                                class="ti-lock"></i></span>
                                    </div>
                                    <input type="password" class="form-control form-control-lg @error('password'){{ 'is-invalid' }}

                                        @enderror" placeholder="Password" aria-label="Password"
                                        aria-describedby="basic-addon1" name="password" value="{{ old('password') }}">
                                    <div class="invalid-feedback">
                                        @error('password'){{ $message }}

                                        @enderror
                                    </div>
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-info text-white" id="basic-addon2"><i
                                                class="ti-lock"></i></span>
                                    </div>
                                    <input type="password" class="form-control form-control-lg @error('repassword'){{ 'is-invalid' }}

                                        @enderror" placeholder=" Confirm Password" aria-label="Password"
                                        aria-describedby="basic-addon1" name="repassword"
                                        value="{{ old('repassword') }}">
                                    <div class="invalid-feedback">
                                        @error('repassword'){{ $message }}

                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <div class="p-t-20">
                                        <a class="btn btn-info" href="{{ url('login') }}" type="button"><i
                                                class="fa fa-chevron-left m-r-5"></i> Back to Login.</a>
                                        <button class="btn btn-success float-right" type="submit">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper scss in scafholding.scss -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper scss in scafholding.scss -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right Sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right Sidebar -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- All Required js -->
    <!-- ============================================================== -->
    <script src="assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- ============================================================== -->
    <!-- This page plugin js -->
    <!-- ============================================================== -->
    <script>
        $('[data-toggle="tooltip"]').tooltip();
    $(".preloader").fadeOut();
    // ============================================================== 
    // Login and Recover Password 
    // ============================================================== 
   
    $('#to-login').click(function(){
        
        $("#recoverform").hide();
        $("#loginform").fadeIn();
    });
    </script>

</body>

</html>