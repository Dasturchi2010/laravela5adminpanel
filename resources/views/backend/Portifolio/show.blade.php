@extends('backend.layouts.site')
@section('content')
    <div class="row">
        <div class="col-12 text-center my-4">
            <h1 class="display-5 text-primary">Portifolio haqida ma'lumot</h1>
        </div>

        <div class="col-12 text-right mb-3">
            <a href="{{ route('portifolios.index') }}" class="btn btn-warning text-white">
                <i data-feather='home'></i>
            </a>
        </div>

        <div class="col-lg-6">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h4 class="card-title text-white">Portifolio ma'lumotlari</h4>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <tr>
                            <th>ID:</th>
                            <td>{{ $portifolio->id }}</td>
                        </tr>
                        <tr>
                            <th>Link:</th>
                            <td>{{ $portifolio->link }}</td>
                        </tr>
                        <tr>
                            <th>created_at:</th>
                            <td>{{ $portifolio->created_at }}</td>
                        </tr>
                        <tr>
                            <th>updated_at:</th>
                            <td>{{ $portifolio->updated_at }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <style>
                img {
                    border-radius: 5px;
                }
            </style>
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h4 class="card-title text-white">Portifolio rasmi</h4>
                </div>
                <div class="card-body text-center">
                    @if ($portifolio->img == null)
                        <img height="250" width="250" class="border" src="{{ asset('public/images/m.png') }}"
                            alt="Rasm yo'q">
                    @else
                        <img height="250" width="250" class="border" src="{{ asset('/storage/' . $portifolio->img) }}"
                            alt="portifolio rasmi">
                    @endif
                </div>
            </div>
        </div>

    </div>
@endsection
