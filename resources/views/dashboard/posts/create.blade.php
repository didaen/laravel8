@extends('dashboard.layouts.main')

@section('container')

    {{-- AWAL JUDUL --}}
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Create New Post</h1>
    </div>
    {{-- AKHIR JUDUL --}}

    <div class="col-lg-8">

        {{-- AWAL FORM --}}
        <form method="post" action="/dashboard/posts" class="mb-5" enctype="multipart/form-data">
            @csrf

            {{-- AWAL FIELD TITLE --}}
            <div class="mb-3">
              <label for="title" class="form-label">Title</label>
              <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" required autofocus value="{{ old('title') }}">
              @error('title')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            {{-- AKHIR FIELD TITLE --}}

            {{-- AWAL FIELD SLUG --}}
            <div class="mb-3">
              <label for="slug" class="form-label">Slug</label>
              <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" required value="{{ old('slug') }}">
              @error('slug')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            {{-- AKHIR FIELD TITLE --}}

            {{-- AWAL FIELD CATEGORY --}}
            <div class="mb-3">
              <label for="category" class="form-label">Category</label>
              <select class="form-select @error('category_id') is-invalid @enderror" name="category_id">
                @foreach ($categories as $category)
                  @if(old('category_id') == $category->id)
                    <option value="{{ $category->id }}" selected>{{ $category->name }}</option> 
                  @else
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                  @endif
                @endforeach
              </select>
            </div>
            {{-- AKHIR FIELD CATEGORY --}}

            {{-- AWAL FIELD FOTO --}}
            <div class="mb-3">
              <label for="image" class="form-label @error('image') is-invalid @enderror">Post Image</label>
              <img class="img-preview img-fluid mb-3 col-sm-5">
              <input class="form-control" type="file" id="image" name="image" onchange="previewImage()">
              @error('image')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            {{-- AKHIR FIELD FOTO --}}

            {{-- AWAL FIELD BODY --}}
            <div class="mb-3">
              <label for="body" class="form-label">Body</label>
              @error('body')
                <p class="text-danger">{{ $message }}</p>
              @enderror
              <input id="body" type="hidden" name="body" required value="{{ old('body') }}">
              <trix-editor input="body"></trix-editor>
            </div>
            {{-- AKHIR FIELD BODY --}}

            {{-- AWAL BUTTON CREATE POST --}}
            <button type="submit" class="btn btn-primary">Create Post</button>
            {{-- AWAL BUTTON CREATE POST --}}

          </form>
          {{-- AKHIR FORM --}}
    </div>
    {{-- <a href="/dashboard/posts/checkSlug">Coba klik</a> --}}
    <script>
      // Ambil component dengan id title kemudian masukkan ke const title
      const title = document.querySelector('#title');

      // Ambil component dengan id slug kemudian masukkan ke const slug
      const slug = document.querySelector('#slug');

      // Event handler untuk menangani ketika ada perubahan atau permintaan slug
      title.addEventListener('change', function() {
        fetch('/dashboard/posts/checkSlug?title=' + title.value)
          .then(response => response.json())
          .then(data => slug.value = data.slug)

        // console.log('OK');
      });

      // Menonaktifkan fungsi menambahkan attachment trix editor via JS
      document.addEventListener('trix-file-accept', function(e) {
        e.preventDefault();
      });

      // Membuat fungsi imagePreview yang akan digunakan untuk menampilkan preview gambar yang dipilih
      function previewImage() {

        // Ambil komponen dengan id image
        const image = document.querySelector('#image');
  
        // Ambil komponen dengan class img-preview
        const imgPreview = document.querySelector('.img-preview');

        // Membuat display imgPreview menjadi block
        imgPreview.style.display = 'block';

        // Membuat instance dari class FileReader()
        const oFReader = new FileReader();

        // Mengambil URL dari image
        oFReader.readAsDataURL(image.files[0]);

        // Saat URL didapat jalankan function untuk mengganti attribute src dari imgPreview menjadi URL oFReader
        oFReader.onload = function(oFREvent) {
          imgPreview.src = oFREvent.target.result;
        }
      }

    </script>
@endsection