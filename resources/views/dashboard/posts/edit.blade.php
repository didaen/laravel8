@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">

        {{-- AWAL JUDUL HALAMAN --}}
        <h1 class="h2">Edit Post</h1>
        {{-- AWAL JUDUL HALAMAN --}}

    </div>
    <div class="col-lg-8">

        {{-- AWAL FORM EDIT POST --}}
        <form method="post" action="/dashboard/posts/{{ $post->slug }}" class="mb-5" enctype="multipart/form-data">
          @method('put')
          @csrf

            {{-- AWAL TITLE POST --}}
            <div class="mb-3">
              <label for="title" class="form-label">Title</label>
              <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" required autofocus value="{{ old('title', $post->title) }}">
              @error('title')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            {{-- AKHIR TITLE POST --}}

            {{-- AWAL SLUG POST --}}
            <div class="mb-3">
              <label for="slug" class="form-label">Slug</label>
              <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" required value="{{ old('slug', $post->slug) }}">
              @error('slug')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            {{-- AKHIR SLUG POST --}}

            {{-- AWAL CATEGORY POST --}}
            <div class="mb-3">
              <label for="category" class="form-label">Category</label>
              <select class="form-select @error('category_id') is-invalid @enderror" name="category_id">
                @foreach ($categories as $category)
                  @if(old('category_id', $post->category_id) == $category->id)
                    <option value="{{ $category->id }}" selected>{{ $category->name }}</option> 
                  @else
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                  @endif
                @endforeach
              </select>
            </div>
            {{-- AKHIR CATEGORY POST --}}

            {{-- AWAL BODY POST --}}
            <div class="mb-3">
              <label for="body" class="form-label">Body</label>
              @error('body')
                <p class="text-danger">{{ $message }}</p>
              @enderror
              <input id="body" type="hidden" name="body" required value="{{ old('body', $post->body) }}">
              <trix-editor input="body"></trix-editor>
            </div>
            {{-- AKHIR BODY POST --}}

            {{-- AWAL BUTTON UPDATE POST --}}
            <button type="submit" class="btn btn-primary">Update Post</button>
            {{-- AKHIR BUTTON UPDATE POST --}}

          </form>
          {{-- AKHIR EDIT FORM --}}

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

    </script>
@endsection