@extends('backend.layouts.site')

@section('content')

@include('backend.layouts.message')

<div class="row">
    <div class="col-12 text-center">
        <h1 class="text-primary">Yangi Portifolio qo'shish</h1>
    </div>

    <div class="col-12 text-right mb-3">
        <a href="{{ route('portifolios.index') }}" class="btn btn-warning text-white" >
            <i data-feather='home'></i>
        </a>
    </div>

    <div class="col-12">
        <form action="{{ route('portifolios.store') }}" method="POST" enctype="multipart/form-data" >
            @csrf

            <div class="row">
                {{-- Rasm --}}
                <div class="col-12">
                    <div class="form-group">
                        <label>Rasmi</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="img" name="img">
                            <label class="custom-file-label" for="img">Tanlash</label>
                        </div>
                        <span class="text-danger">@error('img') {{$message}} @enderror</span>
                    </div>
                </div>
                <!-- link -->
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="link">Link</label>
                        <input type="text" name="link" id="link" value="{{ old('link') }}" class="form-control @error('link') is-invalid @enderror" placeholder="Icon nomini kiriting">
                        @error('link')
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
