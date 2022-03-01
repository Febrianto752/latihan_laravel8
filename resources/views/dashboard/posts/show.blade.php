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
        <form class="d-inline-block">
            <button class="btn btn-warning"><span data-feather="edit"></span> edit</button>
        </form>
        <form class="d-inline-block">
            <button class="btn btn-danger"><span data-feather="x-circle"></span> delete</button>
        </form>
        <article class="fs-5 my-4">
            <img src="/images/banner-web-1.jpg" alt="$post->title" class="img-fluid mb-4">
            {!! $post->body !!}
        </article>
    </div>
</div>

@endsection
