@extends('backend.layouts.site')

@section('content')

@include('backend.layouts.message')

<div class="row">
    <div class="col-12 text-center">
        <h1 class="text-primary">Yangi user qo'shish</h1>
    </div>

    <div class="col-12 text-right mb-3">
        <a href="{{ route('users.index') }}" class="btn btn-warning text-white">
            <i data-feather='home'></i>
        </a>
    </div>

    <div class="col-12">
        <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <!-- Ism -->
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="name">Ism</label>
                        <input type="text" name="name" id="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" placeholder="Foydalanuvchi ismini kiriting">
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <!-- Email -->
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" placeholder="Email kiriting">
                        @error('email')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <!-- Parol -->
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="password">Parol</label>
                        <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="Parol kiriting">
                        @error('password')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
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

                <!-- Rol tanlash -->
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="roles">Rol tanlash</label>
                        <select name="roles" id="roles" class="form-control @error('roles') is-invalid @enderror">
                            <option value="" disabled selected>Tanlang</option>
                            @foreach($roles as $role)
                                <option value="{{ $role->name }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                        @error('roles')
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
