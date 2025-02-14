@extends('backend.layouts.site')

@section('content')

<div class="row">
    <!-- Sarlavha -->
    <div class="col-12 text-center my-4">
        <h1 class="display-5 text-primary">Blog haqida ma'lumot</h1>
    </div>

    <!-- Tugmalar -->
    <div class="col-12 text-right mb-3">
        <!-- O'chirish -->
        <form action="{{ route('blogs.destroy', $blog->id) }}" method="POST" style="display: inline;">
            @csrf
            @method('DELETE')
            <button onclick="return confirm('o\'chirishni xohlaysizmi?')" type="submit" class="btn btn-danger">
                <i data-feather="trash"></i>
            </button>
        </form>

        <!-- Tahrirlash -->
        <a href="{{ route('blogs.edit', $blog->id) }}" class="btn btn-warning text-white">
            <i data-feather="edit"></i>
        </a>

        <!-- Blog ro'yxati -->
        <a href="{{ route('blogs.index') }}" class="btn btn-primary text-white">
            <i data-feather="home"></i>
        </a>
    </div>

    <!-- Blog tafsilotlari -->
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th>Title:</th>
                        <td>{{ $blog->title }}</td>
                    </tr>
                    <tr>
                        <th>Sana:</th>
                        <td>{{ $blog->date }}</td>
                    </tr>
                    <tr>
                        <th>Muallif:</th>
                        <td>{{ $blog->author }}</td>
                    </tr>
                    <tr>
                        <th>Mini Text:</th>
                        <td>{{ $blog->mini_text }}</td>
                    </tr>
                    <tr>
                        <th>Text:</th>
                        <td>{!! $blog->text !!}</td>
                    </tr>
                    <tr>
                        <th>Asosiy Rasm:</th>
                        <td>
                            @if($blog->photo)
                                <img style="height: 100px" src="{{ asset('storage/' . $blog->photo) }}" alt="Asosiy rasm" class="img-fluid" style="max-width: 200px;">
                            @else
                                Rasm yuklanmagan
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Qo'shimcha Rasmlar:</th>
                        <td>
                            @if($blog->images)
                                @foreach(json_decode($blog->images) as $image)
                                    <img style="height: 100px" src="{{ asset('storage/uploads/' . $image) }}" alt="Qo'shimcha rasm" class="img-fluid mr-2" style="max-width: 100px;">
                                @endforeach
                            @else
                                Qo'shimcha rasmlar yo'q
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Yaratilgan Sana:</th>
                        <td>{{ $blog->created_at->format('Y-m-d H:i') }}</td>
                    </tr>
                    <tr>
                        <th>Yangilangan Sana:</th>
                        <td>{{ $blog->updated_at->format('Y-m-d H:i') }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
