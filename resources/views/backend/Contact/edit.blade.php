@extends('backend.layouts.site')
@section('content')

<div class="row">
    <div class="col-12 text-center">
        <h1 class="text-primary">contact ma'lumotlarini o'zgartirish</h1>
    </div>

    <div class="col-12 text-right">
        <a href="{{route('contacts.index')}}" class="btn btn-icon btn-round btn-warning text-white">
            <i data-feather='home'></i>
        </a>
    </div>

    <div class="col-12">
        <form action="{{route('contacts.update', $contact->id)}}" method="post">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="name">Ismi</label>
                        <input type="text" value="{{old('name',$contact->name)}}" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="contact nomini kiriting">
                        @error('name') <small id="emailHelp2" class="form-text text-muted text-danger">{{$message}}</small> @enderror
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" value="{{old('email',$contact->email)}}" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Icon nomini kiriting">
                        @error('email') <small id="emailHelp2" class="form-text text-muted text-danger">{{$message}}</small> @enderror
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="phone">Nomer</label>
                        <input type="text" value="{{old('phone',$contact->phone)}}" name="phone" class="form-control @error('phone') is-invalid @enderror" id="email" placeholder="Icon nomini kiriting">
                        @error('phone') <small id="emailHelp2" class="form-text text-muted text-danger">{{$message}}</small> @enderror
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="message">Xabar</label>
                        <textarea name="message" class="form-control @error('message') is-invalid @enderror" id="message" placeholder="Xabarni kiriting">{{ old('message', $contact->message) }}</textarea>
                        @error('message')
                            <small id="emailHelp2" class="form-text text-muted text-danger">{{ $message }}</small>
                        @enderror
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
