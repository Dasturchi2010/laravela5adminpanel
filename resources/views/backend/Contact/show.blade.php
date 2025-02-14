@extends('backend.layouts.site')
@section('content')

<div class="row">
    <div class="col-12 text-center my-4">
        <h1 class="display-5 text-primary">contact haqida ma'lumot</h1>
    </div>
    <div class="col-12 text-right mb-3">
        <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST" style="display: inline;">
            @csrf
            @method('DELETE')
            <button onclick="return confirm('Tasdiqlash')" type="submit" class="btn btn-danger text-white">
                <i data-feather='trash'></i>
            </button>
        </form>
        <a href="{{ route('contacts.edit' ,  $contact->id) }}" class="btn btn-warning text-white">
            <i data-feather='edit'></i>
        </a>
        <a href="{{ route('contacts.index') }}" class="btn btn-primary text-white">
            <i data-feather='home'></i>
        </a>
    </div>

    <div class="col-lg-12">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h4 class="card-title text-white">contact ma'lumotlari</h4>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <tr>
                        <th>ID:</th>
                        <td>{{ $contact->id }}</td>
                    </tr>
                    <tr>
                        <th>Ismi:</th>
                        <td>{{ $contact->name }}</td>
                    </tr>
                    <tr>
                        <th>Email:</th>
                        <td>{{ $contact->email }}</td>
                    </tr>
                    <tr>
                        <th>Nomer:</th>
                        <td>{{ $contact->phone }}</td>
                    </tr>
                    <tr>
                        <th>Habar:</th>
                        <td>{{ $contact->message }}</td>
                    </tr>
                    <tr>
                        <th>created_at:</th>
                        <td>{{ $contact->created_at }}</td>
                    </tr>
                    <tr>
                        <th>updated_at:</th>
                        <td>{{ $contact->updated_at }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>


</div>

@endsection
