@extends('dashboard/layouts/main')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Form Edit Post</h1>
    <a href="/dashboard/posts" class="btn btn-info"><span data-feather="corner-down-left"></span> Back To My
        Posts</a>
</div>

<div class="row">
    <div class="col-lg-8">
        <form action="/dashboard/posts/{{ $post->slug }}" method="post" class="mb-5" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control @error('title') is-invalid  @enderror" id="title" name="title"
                    autofocus value="{{ old('title', $post->title) }}" required>
                @error('title')
                <div class="invalid-feedback">
                    <p>{{ $message }}</p>
                </div>
                @enderror

            </div>
            <div class="mb-3">
                <label for="slug" class="form-label">Slug</label>
                <input type="text" class="form-control @error('slug') is-invalid  @enderror" id="slug" name="slug"
                    required value="{{ old('slug', $post->slug) }}">
                @error('slug')
                <div class="invalid-feedback">
                    <p>{{ $message }}</p>
                </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <select class="form-select" id="category" aria-label="Default select example" name="category_id">
                    @foreach ($categories as $index => $category)
                    @if(old('category_id', $post->category_id) == $category->id)
                    <option value="{{ $index + 1 }}" selected>{{ $category->name }}</option>
                    @else
                    <option value="{{ $index + 1 }}">{{ $category->name }}</option>
                    @endif
                    @endforeach

                </select>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Upload Image</label>
                <input type="hidden" name="old_image" value="{{ $post->image ?? null }}" onchange="return previewImg()">
                @if($post->image)
                <img src="{{ asset("storage/{$post->image}") }}" class="img-thumbnail mb-2 d-block image-preview"
                    alt="image" width="200">
                @else
                <img src="{{ asset("images/no-image.png") }}" class="img-thumbnail mb-2 d-block image-preview"
                    alt="image" width="200">
                @endif
                <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image"
                    onchange="previewImg()">
                @error('image')
                <div class="invalid-feedback">
                    <p>{{ $message }}</p>
                </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="body" class="form-label">Body</label>
                @error('body')
                <p class="text-danger">{{ $message }}</p>
                @enderror
                <input type="hidden" class="form-control" id="body" name="body" value="{{ old('body', $post->body) }}">
                <trix-editor input="body"></trix-editor>
            </div>


            <button type="submit" class="btn btn-primary">Update Post</button>
        </form>

    </div>
</div>

<script>
    const titleInputElem = document.querySelector('#title');
    const slugInputElem = document.querySelector('#slug');

    titleInputElem.addEventListener('change', function () {
        fetch(`/dashboard/posts/checkSlug?title=${titleInputElem.value}`)
            .then((response) => {
                return response.json()
            })
            .then((responseJson) => {
                slugInputElem.value = responseJson.slug
            });
    });

    function previewImg() {
        const imageElem = document.getElementById('image'); // input elem

        const imagePreview = document.getElementsByClassName('image-preview')[0]; // image elem

        // objek untuk wadah penyimpanan suatu file
        const imageFile = new FileReader();

        // membaca url penyimpanan lokal file(mungkin)
        imageFile.readAsDataURL(imageElem.files[0]);

        imageFile.onload = function (e) {
            // e.target.result berisikan banyak kode, sepertinya berisikan konversi url penyimpanan lokal file
            imagePreview.src = e.target.result;

        }
    }

</script>

@endsection
