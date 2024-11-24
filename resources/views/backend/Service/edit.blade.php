@extends('backend.layouts.site')
@section('content')

<div class="row">
    <div class="col-12 text-center">
        <h1 class="text-primary">Service ma'lumotlarini o'zgartirish</h1>
    </div>

    <div class="col-12 text-right">
        <a href="{{route('services.index')}}" class="btn btn-icon btn-round btn-warning text-white">
            <i data-feather='home'></i>
        </a>
    </div>

    <div class="col-12">
        <form action="{{route('services.update', $service->id)}}" method="post">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="title">Title nomi</label>
                        <input type="text" value="{{old('title',$service->title)}}" name="title" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="Service nomini kiriting">
                        @error('title') <small id="emailHelp2" class="form-text text-muted text-danger">{{$message}}</small> @enderror
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="icon_name">Icon nomi</label>
                        <input type="text" value="{{old('icon_name',$service->icon_name)}}" name="icon_name" class="form-control @error('icon_name') is-invalid @enderror" id="email" placeholder="Icon nomini kiriting">
                        @error('icon_name') <small id="emailHelp2" class="form-text text-muted text-danger">{{$message}}</small> @enderror
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <button type="submit" class="btn btn-warning text-white">O'zgartirish</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection
