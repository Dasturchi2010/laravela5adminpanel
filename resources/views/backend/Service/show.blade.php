@extends('backend.layouts.site')
@section('content')

<div class="row">
    <div class="col-12 text-center my-4">
        <h1 class="display-5 text-primary">Service haqida ma'lumot</h1>
    </div>

    <div class="col-12 text-right mb-3">
        <a href="{{ route('services.index') }}" class="btn btn-warning text-white">
            <i data-feather='home'></i>
        </a>
    </div>

    <div class="col-lg-12">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h4 class="card-title text-white">Service ma'lumotlari</h4>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <tr>
                        <th>ID:</th>
                        <td>{{ $service->id }}</td>
                    </tr>
                    <tr>
                        <th>Title:</th>
                        <td>{{ $service->title }}</td>
                    </tr>
                    <tr>
                        <th>Icon nomi:</th>
                        <td>{{ $service->icon_name }}</td>
                    </tr>
                    <tr>
                        <th>created_at:</th>
                        <td>{{ $service->created_at }}</td>
                    </tr>
                    <tr>
                        <th>updated_at:</th>
                        <td>{{ $service->updated_at }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>


</div>

@endsection
