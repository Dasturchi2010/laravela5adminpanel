@extends('backend.layouts.site')
@section('content')

<div class="col-12 text-center">
    <h1 class="text-primary">Sozlamalar</h1>
</div>

@include('backend.layouts.message')

<div class="col-12">
    <form action="{{route('settings.update', $setting->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="mb-1 col-6">
                <label class="form-label" for="title">Title</label>
                <input value="{{$setting->title}}" class="form-control @error('title') is-invalid @enderror" type="text" id="title" name="title" placeholder="Enter title" required>
                <p class="text-danger">@error('title') {{$message}} @enderror</p>
            </div>

            <div class="mb-1 col-6">
                <div class="form-group">
                    <label>Profile pic</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="customFile" name="logo">
                        <label class="custom-file-label" for="customFile">Choose profile pic</label>
                    </div>
                    <p class="text-danger">@error('logo') {{$message}} @enderror</p>
                </div>
            </div>

            <div class="mb-1 col-6">
                <label class="form-label" for="brand_name">Brand Name</label>
                <input value="{{$setting->brand_name}}" class="form-control @error('brand_name') is-invalid @enderror" type="text" id="brand_name" name="brand_name" placeholder="Enter brand Name" required>
                <p class="text-danger">@error('brand_name') {{$message}} @enderror</p>
            </div>

            <div class="mb-1 col-6">
                <label class="form-label" for="description">Description</label>
                <input value="{{$setting->description}}" class="form-control @error('description') is-invalid @enderror" type="text" id="description" name="description" placeholder="Enter description" required>
                <p class="text-danger">@error('description') {{$message}} @enderror</p>
            </div>

            <div class="mb-1 col-4">
                <label class="form-label" for="telegram_link">Telegram havola</label>
                <input value="{{$setting->telegram_link}}" class="form-control @error('telegram_link') is-invalid @enderror" type="text" id="telegram_link" name="telegram_link" placeholder="Enter telegram link" required>
                <p class="text-danger">@error('telegram_link') {{$message}} @enderror</p>
            </div>
            <div class="mb-1 col-4">
                <label class="form-label" for="instagram_link">Instagram havola</label>
                <input value="{{$setting->instagram_link}}" class="form-control @error('instagram_link') is-invalid @enderror" type="text" id="instagram_link" name="instagram_link" placeholder="Enter instagram link" required>
                <p class="text-danger">@error('instagram_link') {{$message}} @enderror</p>
            </div>
            <div class="mb-1 col-4">
                <label class="form-label" for="youtube_link">YouTube havola</label>
                <input value="{{$setting->youtube_link}}" class="form-control @error('youtube_link') is-invalid @enderror" type="text" id="youtube_link" name="youtube_link" placeholder="Enter youtube link" required>
                <p class="text-danger">@error('youtube_link') {{$message}} @enderror</p>
            </div>
            <div class="mb-1 col-12">
                <label class="form-label" for="keywords">keywords</label>
                <input value="{{$setting->keywords}}" class="form-control @error('keywords') is-invalid @enderror" type="text" id="keywords" name="keywords" placeholder="Enter keywords" required>
                <p class="text-danger">@error('keywords') {{$message}} @enderror</p>
            </div>
            <div class="col-12">
                <input value="{{$setting->author}}" class="form-control @error('author') is-invalid @enderror" type="hidden" id="author" name="author" placeholder="Enter author" required>
                <button type="submit" class="btn btn-primary btn-sm">Yangilash</button>
            </div>
        </div>
    </form>
</div>


@endsection
