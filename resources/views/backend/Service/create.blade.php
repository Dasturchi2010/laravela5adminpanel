@extends('backend.layouts.site')

@section('content')

@include('backend.layouts.message')

<div class="row">
    <div class="col-12 text-center">
        <h1 class="text-primary">Yangi Service qo'shish</h1>
    </div>

    <div class="col-12 text-right mb-3">
        <a href="{{ route('services.index') }}" class="btn btn-warning text-white">
            <i data-feather='home'></i>
        </a>
    </div>

    <div class="col-12">
        <form action="{{ route('services.store') }}" method="POST" >
            @csrf

            <div class="row">
                <!-- Ism -->
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="title">Table nomi</label>
                        <input type="text" name="title" id="title" value="{{ old('title') }}" class="form-control @error('title') is-invalid @enderror" placeholder="Title nomini kiriting">
                        @error('title')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <!-- Email -->
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="icon_name">Icon nomi</label>
                        <input type="text" name="icon_name" id="icon_name" value="{{ old('icon_name') }}" class="form-control @error('icon_name') is-invalid @enderror" placeholder="Icon nomini kiriting">
                        @error('icon_name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>


                <!-- Yuborish tugmasi -->
                <div class="col-12">
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Qo'shish</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection
