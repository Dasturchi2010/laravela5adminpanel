@extends('frontend.layouts.site')
@section('front_content')

<div class="container py-5">
    <div class="row">
        <div class="col-12 text-center mb-5">
            <h1 class="portfolio_taital">My <span class="portfolio_taital_1">Services</span></h1>
            <p class="text-muted">Explore the variety of services we offer, tailored to meet your needs.</p>z
        </div>

        @foreach ($blogs as $blog)
        <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
            <div class="card shadow-sm h-100 border-0 rounded">
                <img src="{{ asset('/storage/' . $blog->photo) }}" style="height: 400px; width: 800px; object-fit: cover;" class="card-img-top rounded-top" alt="Image not found">
                <div class="card-body d-flex flex-column">
                    <h4 class="date_text text-muted">{{ \Carbon\Carbon::parse($blog->date)->format('d.m.y') }}</h4>
                    <h5 class="card-title text-primary font-weight-bold">{{ $blog->title }}</h5>
                    <p class="card-text text-secondary">{{ Str::limit($blog->mini_text, 80) }}</p>
                    <div class="mt-auto">
                        <a href="{{ route('site.blog.detail', $blog->slug) }}" class="btn btn-primary w-100">Read More</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection
