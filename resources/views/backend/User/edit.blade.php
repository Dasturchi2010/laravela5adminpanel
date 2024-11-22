@extends('backend.layouts.site')
@section('content')

<div class="row">
    <div class="col-12 text-center">
        <h1 class="text-primary">User ma'lumotlarini o'zgartirish</h1>
    </div>

    <div class="col-12 text-right">
        <a href="{{route('users.index')}}" class="btn btn-icon btn-round btn-warning text-white">
            <i data-feather='home'></i>
        </a>
    </div>

    <div class="col-12">
        <form action="{{route('users.update', $user->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="name">Ismi</label>
                        <input type="text" value="{{old('name',$user->name)}}" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="User ismini kiriting">
                        @error('name') <small id="emailHelp2" class="form-text text-muted text-danger">{{$message}}</small> @enderror
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" value="{{old('email',$user->email)}}" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Email kiriting">
                        @error('email') <small id="emailHelp2" class="form-text text-muted text-danger">{{$message}}</small> @enderror
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label>Rasmi</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="image" name="image">
                            <label class="custom-file-label" for="image">Tanlash</label>
                        </div>
                        <span class="text-danger">@error('image') {{$message}} @enderror</span>
                    </div>
                </div>

                <div class="col-12">
                    <div class="form-group">
                        <label for="password">Parol kiriting</label>
                        <input type="password" value="{{old('password')}}" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Parol kiriting">
                        @error('password') <small id="emailHelp2" class="form-text text-muted text-danger">{{$message}}</small> @enderror
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="password_confirmation">Parolni takrorlang</label>
                        <input type="password" value="{{old('password_confirmation')}}" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" placeholder="Parol kiriting">
                        @error('password_confirmation') <small id="emailHelp2" class="form-text text-muted text-danger">{{$message}}</small> @enderror
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="roles">Role tanlang</label>
                        <select class="form-control @error('roles') is-invalid @enderror" name="roles" id="roles">
                            <option>Tanlash</option>
                            @foreach ($roles as $role)
                            <option  value="{{$role->name}}">{{$role->name}}</option>
                            @endforeach
                        </select>
                        @error('roles') <small id="emailHelp2" class="form-text text-muted text-danger">{{$message}}</small> @enderror
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
