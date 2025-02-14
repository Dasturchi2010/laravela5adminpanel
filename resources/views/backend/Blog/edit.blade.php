@extends('backend.layouts.site')

@section('css')
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
@endsection

@section('content')

@include('backend.layouts.message')

<div class="row">
    <div class="col-12 text-center">
        <h1 class="text-primary">Blogni Tahrirlash</h1>
    </div>

    <div class="col-12 text-right mb-3">
        <a href="{{ route('blogs.index') }}" class="btn btn-warning text-white">
            <i data-feather='home'></i>
        </a>
    </div>

    <div class="col-12">
        <form  class="form"  action="{{ route('blogs.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT') <!-- PUT method tahrirlash uchun qo'shiladi -->

            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title"
                               value="{{ old('title', $blog->title) }}"
                               class="form-control @error('title') is-invalid @enderror"
                               placeholder="Servis nomini kiriting">
                        @error('title')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="col-4">
                    <div class="form-group">
                        <label>Hozirgi Asosiy Rasm</label>
                        <img src="{{ asset('storage/' . $blog->photo) }}" alt="Rasm yo'q" class="img-thumbnail w-100 mb-2">
                        <label for="photo">Yangi Rasm</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="photo" name="photo">
                            <label class="custom-file-label" for="photo">Tanlash</label>
                        </div>
                        <p class="text-danger">@error('photo') {{$message}} @enderror</p>
                    </div>
                </div>

                <div class="col-4">
                    <div class="form-group">
                        <label for="date">Sana</label>
                        <input type="date" name="date" id="date"
                               value="{{ old('date', $blog->date) }}"
                               class="form-control @error('date') is-invalid @enderror">
                        @error('date')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="col-4">
                    <div class="form-group">
                        <label for="author">Muallif</label>
                        <input type="text" name="author" id="author"
                               value="{{ old('author', $blog->author) }}"
                               class="form-control @error('author') is-invalid @enderror"
                               placeholder="Muallif ismini kiriting">
                        @error('author')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="col-12">
                    <div class="form-group">
                        <label for="mini_text">Mini Matn</label>
                        <input type="text" name="mini_text" id="mini_text"
                               value="{{ old('mini_text', $blog->mini_text) }}"
                               class="form-control @error('mini_text') is-invalid @enderror"
                               placeholder="Qisqa tavsif kiriting">
                        @error('mini_text')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="col-12">
                    <div class="form-group">
                        <label for="info">Ma'lumot</label>
                        <!-- Quill editorini yaratish uchun div -->
                        <div id="editor-container-info">
                            {!! old('info', strip_tags($blog->text)) !!}
                        </div>
                        <input type="hidden" name="info" id="info" value="{{ old('info', strip_tags($blog->text)) }}">
                        @error('info')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="col-12">
                    <div class="form-group">
                        <label>Hozirgi Qo'shimcha Rasmlar</label>
                        <div class="row">
                            @if($blog->images)
                                @foreach(json_decode($blog->images) as $image)
                                    <div class="col-3">
                                        <img src="{{ asset('storage/uploads/' . $image) }}" alt="Rasm yo'q" class="img-thumbnail mb-2">
                                    </div>
                                @endforeach
                            @else
                                <p>Qo'shimcha rasmlar yo'q</p>
                            @endif
                        </div>
                        <label for="images">Yangi Rasmlar</label>
                        <div class="custom-file">
                            <input type="file" multiple class="custom-file-input @error('images.*') is-invalid @enderror" id="images" name="images[]">
                            <label class="custom-file-label" for="images">Tanlash</label>
                        </div>
                        @error('images.*')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="col-12">
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Yangilash</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection


@section('js')
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Quill editorini ishga tushirish
        var quillInfo = new Quill('#editor-container-info', {
            theme: 'snow'
        });

        // Formani yuborishdan oldin Quill editorining tarkibini yashirin inputga qo'yish
        var form = document.querySelector('.form');
        form.onsubmit = function(e) {
            // Quill editoridagi tarkibni yashirin inputga qo'shish
            var editorInfoContent = quillInfo.root.innerHTML;
            document.querySelector('#info').value = editorInfoContent;
        };
    });
</script>

@endsection
