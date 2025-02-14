@extends('frontend.layouts.site')
@section('front_content')

    <div class="container">
       <div class="row">
          <div class="col-12 text-center mt-2 mb-2">
            <h1 class="portfolio_taital">My <span class="portfolio_taital_1">Services</span></h1>
          </div>

          @foreach ($services as $service)

                <div class="col-lg-3 col-sm-6 mb-5">
                    <div class="box_main ">
                        <div class="app_icon">
                            <i class="bi bi-{{$service->icon_name}}"></i>
                        </div>
                        <div class="app_icon_1">
                            <i class="bi bi-{{$service->icon_name}}"></i>
                        </div>
                        <h4 class="services_text active">{{$service->title}}</h4>
                    </div>
                </div>
                @endforeach

          </div>
       </div>

@endsection
