@extends('frontend.layouts.site')
@section('front_content')

    <div class="container">
       <div class="row">
          <div class="col-12 text-center mt-2 mb-2">
            <h1 class="portfolio_taital">My <span class="portfolio_taital_1">Portifolio</span></h1>
          </div>

                @foreach ($portifolios as $portifolio)
                    <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
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

@endsection
