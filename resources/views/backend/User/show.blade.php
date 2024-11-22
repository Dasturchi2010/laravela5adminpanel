@extends('backend.layouts.site')
@section('content')

<div class="row">
    <div class="col-12 text-center my-4">
        <h1 class="display-5 text-primary">User haqida ma'lumot</h1>
    </div>

    <div class="col-12 text-right mb-3">
        <a href="{{ route('users.index') }}" class="btn btn-warning text-white">
            <i data-feather='home'></i>
        </a>
    </div>

    <div class="col-lg-6">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h4 class="card-title text-white">User ma'lumotlari</h4>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <tr>
                        <th>ID:</th>
                        <td>{{ $user->id }}</td>
                    </tr>
                    <tr>
                        <th>Ismi:</th>
                        <td>{{ $user->name }}</td>
                    </tr>
                    <tr>
                        <th>Email:</th>
                        <td>{{ $user->email }}</td>
                    </tr>
                    <tr>
                        <th>Role:</th>
                        <td>
                            @foreach ($user->roles as $role)
                                <span class="badge badge-info">{{ $role->name }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>created_at:</th>
                        <td>{{ $user->created_at }}</td>
                    </tr>
                    <tr>
                        <th>updated_at:</th>
                        <td>{{ $user->updated_at }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h4 class="card-title text-white">User rasmi</h4>
            </div>
            <div class="card-body text-center">
                @if($user->image == null)
                    <img height="250" width="250" class="rounded-circle border"
                         src="{{ asset('public/images/m.png') }}" alt="Rasm yo'q">
                @else
                    <img height="250" width="250" class="rounded-circle border"
                         src="{{ asset('/storage/' . $user->image) }}" alt="User rasmi">
                @endif
            </div>
        </div>
    </div>
</div>

@endsection
