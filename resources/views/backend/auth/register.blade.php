<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>Login</title>
    <link rel="apple-touch-icon" href="{{asset('backend/app-assets/images/ico/apple-icon-120.png')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('backend/app-assets/images/ico/favicon.ico')}}">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('backend/app-assets/vendors/css/vendors.min.css')}}">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('backend/app-assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('backend/app-assets/css/bootstrap-extended.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('backend/app-assets/css/colors.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('backend/app-assets/css/components.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('backend/app-assets/css/themes/dark-layout.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('backend/app-assets/css/themes/bordered-layout.min.css')}}">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('backend/app-assets/css/core/menu/menu-types/vertical-menu.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('backend/app-assets/css/plugins/forms/form-validation.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('backend/app-assets/css/pages/page-auth.min.css')}}">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('backend/assets/css/style.css')}}">
    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->


<!-- BEGIN: Body-->
<body class="vertical-layout vertical-menu-modern blank-page navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="blank-page">
    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <div class="auth-wrapper auth-v2">
                    <div class="auth-inner row m-0">
                         <!-- Brand logo-->
                         <a class="brand-logo d-flex align-items-center" href="{{ route('dashboard') }}">
                            <img width="40" src="{{ asset('/storage/' . $setting->logo) }}" alt="Logo of website">
                            <h2 class="brand-text m-0 ml-1">{{ $setting->brand_name }}</h2>
                        </a>
                        <!-- /Brand logo-->
                        <!-- /Brand logo-->
                        <!-- Left Text-->
                        <div class="d-none d-lg-flex col-lg-8 align-items-center p-5">

                            <div class="w-100 d-lg-flex align-items-center justify-content-center px-5"><img class="img-fluid" src="{{asset('backend/app-assets/images/pages/register-v2.svg')}}" alt="Login V2" /></div>
                        </div>
                        <!-- /Left Text-->
                        <!-- Login-->
                        <div class="d-flex col-lg-4 align-items-center auth-bg px-2 p-lg-5">
                            <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">
                                <h4 class="card-title mb-1">Assalomu alaykum! 👋</h4>
                                <p class="card-text mb-2">Saytimizga xush kelibsiz . Quydagi formani to'ldiring</p>
                                <form class="auth-login-form mt-2" action="{{route('register')}}" method="POST">
                                    @csrf
                                    @method('POST')
                                    <div class="form-group">
                                        <label class="form-label" for="register-name">Ismingiz</label>
                                        <input class="form-control" id="register-name" type="text" name="name" placeholder="ismingizni kiriting" aria-describedby="register-name" autofocus="" tabindex="1" />
                                        <p class="text-danger">@error('name') {{$message}} @enderror </p>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="register-email">Email</label>
                                        <input class="form-control" id="register-email" type="text" name="email" placeholder="alicoder@gmail.com" aria-describedby="register-name" autofocus="" tabindex="1" />
                                        <p class="text-danger">@error('email') {{$message}} @enderror </p>
                                    </div>
                                    <div class="form-group">
                                        <div class="d-flex justify-content-between">
                                            <label for="register-password">Parol</label>
                                        </div>
                                        <div class="input-group input-group-merge form-password-toggle">
                                            <input class="form-control form-control-merge" id="register-password" type="password" name="password" placeholder="············" aria-describedby="register-password" tabindex="2" />
                                            <div class="input-group-append"><span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span></div>
                                            <p class="text-danger">@error('password') {{$message}} @enderror</p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="d-flex justify-content-between">
                                            <label for="password_confirmation">Parolni takrorlang</label>
                                        </div>
                                        <div class="input-group input-group-merge form-password-toggle">
                                            <input class="form-control form-control-merge" id="password_confirmation" type="password" name="password_confirmation" placeholder="············" aria-describedby="register-password" tabindex="2" />
                                            <div class="input-group-append"><span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span></div>
                                            <p class="text-danger">@error('password_confirmation') {{$message}} @enderror</p>
                                        </div>
                                    </div>
                                    <button class="btn btn-primary btn-block" tabindex="4">Ro'yxatdan o'tish</button>
                                </form>
                                <p class="text-center mt-2"><span>Sizda login bormi?</span><a href="{{route('login')}}"><span>&nbsp;Kirish</span></a></p>
                            </div>
                        </div>
                        <!-- /Login-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Content-->


    <!-- BEGIN: Vendor JS-->
    <script src="{{asset('backend/app-assets/vendors/js/vendors.min.js')}}"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{asset('backend/app-assets/vendors/js/forms/validation/jquery.validate.min.js')}}"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{asset('backend/app-assets/js/core/app-menu.min.js')}}"></script>
    <script src="{{asset('backend/app-assets/js/core/app.min.js')}}"></script>
    <!-- END: Theme JS-->


    <!-- BEGIN: Page JS-->
    <script src="{{asset('backend/app-assets/js/scripts/pages/page-auth-login.js')}}"></script>
    <!-- END: Page JS-->

    <script>
        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 14
                    , height: 14
                });
            }
        })

    </script>
</body>
<!-- END: Body-->
</html>
