@extends('frontend.layouts.site')
@section('front_content')

<div class="container">
    <div class="row">
        <div class="col-12 text-center">
            <h1>{{$blog->title}}</h1>
        </div>
        <div class="col-12 text-center">
         <img style="height: 500px" src="{{asset('/storage/' . $blog->photo)}}" alt="img error">
        </div>
        <div class="col-12">
            <h1>{!!$blog->text!!}</h1>
        </div>

        @foreach ($images as $image )
        <div class="col-3">
            <img style="height: 200px" class="card-img-top" src="{{asset('/storage/uploads/' . $image)}}" alt="img error">
           </div>
        @endforeach

        <div class="col-12 mb-3 mt-2">
            <h1>{{$blog->author}} - {{$blog->date}} </h1>
        </div>
</div>
</div>




@endsection
