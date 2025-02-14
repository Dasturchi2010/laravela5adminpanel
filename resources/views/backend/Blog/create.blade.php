@extends('backend.layouts.site')

@section('css')
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
@endsection


@section('content')

@include('backend.layouts.message')

<div class="row">
    <div class="col-12 text-center">
        <h1 class="text-primary">Yangi Blog qo'shish</h1>
    </div>

    <div class="col-12 text-right mb-3">
        <a href="{{ route('blogs.index') }}" class="btn btn-warning text-white">
            <i data-feather='home'></i>
        </a>
    </div>

    <div class="col-12">
        <form class="form" action="{{ route('blogs.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title" value="{{ old('title') }}" class="form-control @error('title') is-invalid @enderror" placeholder="Servis nomini kiriting">
                        @error('title')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>


                <div class="col-4">
                    <div class="form-group">
                        <label>Asosiy Rasm</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="photo" name="photo">
                            <label class="custom-file-label" for="photo">Tanlash</label>
                        </div>
                        <p class="text-danger">@error('photo') {{$message}} @enderror</p>
                    </div>
                </div>


                <div class="col-4">
                    <!-- Date -->
                    <div class="form-group">
                        <label for="date">Sana</label>
                        <input type="date" name="date" id="date" value="{{ old('date') }}" class="form-control @error('date') is-invalid @enderror">
                        @error('date')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="col-4">
                    <!-- Author -->
                    <div class="form-group">
                        <label for="author">Muallif</label>
                        <input type="text" name="author" id="author" value="{{ old('author') }}" class="form-control @error('author') is-invalid @enderror" placeholder="Muallif ismini kiriting">
                        @error('author')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="col-12">
                    <!-- Mini Text -->
                    <div class="form-group">
                        <label for="mini_text">Mini Matn</label>
                        <input type="text" name="mini_text" id="mini_text" value="{{ old('mini_text') }}" class="form-control @error('mini_text') is-invalid @enderror" placeholder="Qisqa tavsif kiriting">
                        @error('mini_text')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>


                <!-- Quill Editor for Info -->
                <div class="col-12">
                    <div class="form-group">
                        <label for="info">Ma'lumot</label>
                        <div id="editor-container-info" style="height: 200px;">
                            {!! old('info') !!}
                        </div>
                        <input type="hidden" name="info" id="info">
                        <span class="text-danger">@error('info') {{$message}} @enderror</span>
                    </div>
                </div>


                <div class="col-12">
                    <div class="form-group">
                        <label>Qo'shimcha Rasmlar</label>
                        <div class="custom-file">
                            <input type="file" multiple class="custom-file-input @error('images.*') is-invalid @enderror" id="images" name="images[]">
                            <label class="custom-file-label" for="images">Tanlash</label>
                        </div>
                        @error('images.*')
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


@section('js')
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize Quill editor
        var quillInfo = new Quill('#editor-container-info', {
            theme: 'snow'
        });

        // Handle form submission
        var form = document.querySelector('.form');
        form.onsubmit = function(e) {
            // Quill editor content to hidden input
            var editorInfoContent = quillInfo.root.innerHTML;
            document.querySelector('#info').value = editorInfoContent;

            // Debug: Ensure info has content
            console.log('Info Content:', editorInfoContent);
        };
    });
</script>

@endsection

