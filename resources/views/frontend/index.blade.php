<!DOCTYPE html>
<html lang="en">

<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>{{$setting->brand_name}}</title>
    <meta name="keywords" content="{{$setting->keywords}}">
    <meta name="description" content="{{$setting->description}}">
    <meta name="author" content="{{$setting->author}}">
    <!-- bootstrap css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/bootstrap.min.css') }}">
    <!-- style css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/style.css') }}">
    <!-- Responsive-->
    <link rel="stylesheet" href="{{ asset('frontend/css/responsive.css') }}">
    <!-- fevicon -->
    <link rel="icon" href="{{ asset('/strage/' . $setting->logo) }}" type="image/gif" />
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/css/jquery.mCustomScrollbar.min.css') }}">
    <!-- Tweaks for older IEs-->
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <!-- fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
    <!-- font awesome css -->
    <link rel="stylesheet" href="{{ asset('frontend/path/to/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
    <!-- header section start -->
    <div class="header_section">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="logo"><a href="{{route('site.index')}}"><img src="{{ asset('frontend/images/logo.png') }}"></a></div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
          @include('frontend.layouts.navbar')
                </div>
            </nav>
            @include('backend.layouts.message')
        </div>
        <!-- banner section start -->
        <div class="banner_section layout_padding">
            <section class="slide-wrapper">
                <div class="container-fluid">
                    <div id="myCarousel" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                            <li data-target="#myCarousel" data-slide-to="1"></li>
                            <li data-target="#myCarousel" data-slide-to="2"></li>
                            <li data-target="#myCarousel" data-slide-to="3"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="banner_taital_main">
                                                <h3 class="banner_text">Hello <br>Diyor's Blog</h3>
                                                <h1 class="banner_taital">Web Developer</h1>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="social_icon">
                                                <ul>
                                                    <li><a href="{{$setting->instagram_link}}"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                                    <li><a href="{{$setting->telegram_link}}"><i class="bi bi-telegram" aria-hidden="true"></i></a></li>
                                                    <li><a href="{{$setting->youtube_link}}"><i class="bi bi-youtube" aria-hidden="true"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="banner_taital_main">
                                                <h3 class="banner_text">Hello Am <br>Joy Seno</h3>
                                                <h1 class="banner_taital">UI/UX Designer</h1>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="social_icon">
                                                <ul>
                                                    <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="banner_taital_main">
                                                <h3 class="banner_text">Hello Am <br>Joy Seno</h3>
                                                <h1 class="banner_taital">UI/UX Designer</h1>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="social_icon">
                                                <ul>
                                                    <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="banner_taital_main">
                                                <h3 class="banner_text">Hello Am <br>Joy Seno</h3>
                                                <h1 class="banner_taital">UI/UX Designer</h1>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="social_icon">
                                                <ul>
                                                    <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <div class="container">
                <div class="video_bt">
                    <div class="play_icon"><img src="{{ asset('frontend/images/play-icon.png') }}"></div>
                </div>
            </div>
        </div>
        <!-- banner section end -->
    </div>
    <!-- header section end -->
    <!-- services section start -->
    <div class="services_section layout_padding">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h1 class="services_taital">Mening <span class="portfolio_taital_1">Hobbylarim</span></h1>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="services_section_2">
                <div class="row">
                    @foreach ($services as $service)
                    <div class="col-lg-3 col-sm-6 mb-3">
                        <div class="box_main ">
                            <div class="app_icon"><i class="bi bi-{{ $service->icon_name }}"></i></div>
                            <div class="app_icon_1"><i class="bi bi-{{ $service->icon_name }}"></i></div>
                            <h4 class="services_text active">{{ $service->title }}</h4>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- services section end -->
    <!-- portfolio section start -->
    <div class="portfolio_section layout_padding">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h1 class="portfolio_taital">Mening qilgan  <span class="portfolio_taital_1">Saytlarim</span></h1>
                </div>
            </div>
            <div class="portfolio_section">
                <div class="row">
                    @foreach ($portifolios as $portifolio)
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="container_main">
                            <img style="height: 250px" src="{{ asset('/storage/' . $portifolio->img) }}" alt="Portfolio Image" class="image img-fluid">
                            <div class="overlay">
                                <div class="text">
                                    <div class="btn_main">
                                        <div class="buy_bt">
                                            <a target="__blank" href="{{ $portifolio->link }}">Link</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- portfolio section end -->

    <!-- blog section start -->
    <div class="blog_section layout_padding">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h1 class="blog_taital">Men Telegramimdagi  <span class="blog_taital_1">ma'lumotlar</span></h1>
                    <p class="blog_text">Sizga yoqishi mumkin</p>
                </div>
            </div>
        </div>
        <div class="blog_section_2">
            <div class="container">
                <div class="row">
                    @foreach ($blogs as $blog)
                    <div class="col-md-4">
                        <div class="card">
                            <img src="{{asset('/storage/' . $blog->photo)}}" style="height: 250px" class="card-img-top" alt="img error">
                            <div class="card-body">
                                <h5 class="card-title">{{$blog->title}}</h5>
                                <p class="card-text m-0 mb-3">{{Str::limit($blog->mini_text,60)}}</p>
                                <a href="{{route('site.blog.detail' , $blog->slug)}}" class="btn btn-primary">Ko'rish</a>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
    <!-- blog section end -->
    <!-- contact section start -->
    <div class="contact_section layout_padding">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h1 class="contact_taital">Men bilan <span class="contact_taital_1">bog'lanish</span></h1>
                </div>
            </div>
            <div class="contact_section_2">
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{ route('send_contact') }}" method="post">
                            @csrf
                            @method('POST')
                            <div class="mail_section_1">
                                <input type="text" class="mail_text" placeholder="Sizning Ismimgiz" name="name" value="{{old('name')}}" required>
                                <p class="text-danger">@error('name') {{$message}} @enderror</p>
                                <input type="text" class="mail_text" placeholder="Sizning Emailingiz" name="email" value="{{old('email')}}" required>
                                <p class="text-danger">@error('email') {{$message}} @enderror</p>
                                <input type="text" class="mail_text" placeholder="Sizning Nomeringiz" name="phone" value="{{old('phone')}}" required>
                                <p class="text-danger">@error('phone') {{$message}} @enderror</p>
                                <textarea class="massage-bt" placeholder="Sizning Habaringiz" rows="5" id="comment" name="message" required>{{old('message')}}</textarea>
                                <div class="send_bt">
                                    <button type="submit" class="btn btn-warning" style="background-color: #ffcc00; color: #fff; font-size: 18px; font-weight: bold; border: none; border-radius: 8px; padding: 10px 20px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2); transition: transform 0.3s, box-shadow 0.3s;">
                                        Yuborish
                                    </button>
                                </div>

                                <style>
                                    .send_bt button:hover {
                                        transform: scale(1.05);
                                        box-shadow: 0 6px 10px rgba(0, 0, 0, 0.3);
                                    }
                                    .send_bt button:active {
                                        transform: scale(0.98);
                                        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
                                    }
                                </style>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- contact section end -->


    <!-- footer section start -->
    <div class="footer_section">
        <div class="container">
            <div class="location_text">
                <ul>
                    <li>
                        <a href="{{$setting->telegram_link}}"><i class="bi bi-telegram" aria-hidden="true"></i></a>
                    </li>
                    <li>
                        <a href="{{$setting->instagram_link}}"><i class="bi bi-instagram" aria-hidden="true"></i></a>
                    </li>
                    <li>
                        <a href="{{$setting->youtube_link}}"><i class="bi bi-youtube" aria-hidden="true"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- footer section end -->
    <!-- copyright section start -->
    <div class="copyright_section">
        <div class="container">
            <p class="copyright_text">2024 All Rights Reserved</p>
        </div>
    </div>
    <!-- copyright section end -->
    <!-- Javascript files-->
    <script src="{{ asset('frontend/js/jquery.min.js') }}"></script>
    <script src="{{ asset('frontend/js/popper.min.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery-3.0.0.min.js') }}"></script>
    <script src="{{ asset('frontend/js/plugin.js') }}"></script>
    <!-- sidebar -->
    <script src="{{ asset('frontend/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <script src="{{ asset('frontend/js/custom.js') }}"></script>
    <script>
        $('#myCarousel').carousel({
            interval: false
        });

        //scroll slides on swipe for touch enabled devices

        $("#myCarousel").on("touchstart", function(event) {

            var yClick = event.originalEvent.touches[0].pageY;
            $(this).one("touchmove", function(event) {

                var yMove = event.originalEvent.touches[0].pageY;
                if (Math.floor(yClick - yMove) > 1) {
                    $(".carousel").carousel('next');
                } else if (Math.floor(yClick - yMove) < -1) {
                    $(".carousel").carousel('prev');
                }
            });
            $(".carousel").on("touchend", function() {
                $(this).off("touchmove");
            });
        });

    </script>
</body>

</html>
