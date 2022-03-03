@extends('dashboard/layouts/main')

@section('content')
<div class="d-flex flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">My Post</h1>

</div>

<div class="row">
    <div class="col-lg-8">
        <h1 class="mb-5">Post : {{ $post->title }}</h1>
        <a href="/dashboard/posts" class="btn btn-info"><span data-feather="corner-down-left"></span> Back To All My
            Post</a>
        <form action="/dashboard/posts/{{ $post->slug }}/edit" class="d-inline-block">
            @csrf
            <button class="btn btn-warning"><span data-feather="edit"></span> edit</button>
        </form>
        <form action="/dashboard/posts/{{ $post->slug }}" method="post" class="d-inline-block">
            @csrf
            @method('delete')
            <button class="btn btn-danger" onclick="return confirm('Are You Sure To Delete It?')"><span
                    data-feather="x-circle"></span>
                delete</button>
        </form>
        <article class="fs-5 my-4">
            @if($post->image)
            <img src="{{ asset("storage/{$post->image}") }}" alt="$post->title" class="img-fluid mb-4">
            @else
            <img src="/images/banner-web-1.jpg" alt="$post->title" class="img-fluid mb-4">
            @endif
            {!! $post->body !!}
        </article>
    </div>
</div>

@endsection
