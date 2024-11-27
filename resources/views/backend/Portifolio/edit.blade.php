@extends('backend.layouts.site')
@section('content')

<div class="row">
    <div class="col-12 text-center">
        <h1 class="text-primary">Portifolio ma'lumotlarini o'zgartirish</h1>
    </div>

    <div class="col-12 text-right">
        <a href="{{route('portifolios.index')}}" class="btn btn-icon btn-round btn-warning text-white">
            <i data-feather='home'></i>
        </a>
    </div>

    <div class="col-12">
        <form action="{{route('portifolios.update', $portifolio->id)}}" method="post"  enctype="multipart/form-data" >
            @csrf
            @method('PUT')
            <div class="row">
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
                <div class="col-12">
                    <div class="form-group">
                        <label for="link">Link</label>
                        <input type="text" value="{{old('link',$portifolio->link)}}" name="link" class="form-control @error('link') is-invalid @enderror" id="email" placeholder="Icon nomini kiriting">
                        @error('link') <small id="emailHelp2" class="form-text text-muted text-danger">{{$message}}</small> @enderror
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
