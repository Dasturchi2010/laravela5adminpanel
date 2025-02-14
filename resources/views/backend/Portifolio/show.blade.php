@extends('backend.layouts.site')
@section('content')
    <div class="row align-items-center" >
        <div class="col-12 text-center my-4">
            <h1 class="display-5 text-primary">Portifolio haqida ma'lumot</h1>
        </div>

        <div class="col-12 text-right mb-3">
            <form action="{{ route('portifolios.destroy', $portifolio->id) }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button onclick="return confirm('Tasdiqlash')" type="submit" class="btn btn-danger text-white">
                    <i data-feather='trash'></i>
                </button>
            </form>
            <a href="{{ route('portifolios.edit' ,  $portifolio->id) }}" class="btn btn-warning text-white">
                <i data-feather='edit'></i>
            </a>
            <a href="{{ route('portifolios.index') }}" class="btn btn-primary text-white">
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

            <img class="card-image-top" height="300" src="{{ asset('/storage/' . $portifolio->img) }}" alt="img error">

        </div>

    </div>
@endsection
