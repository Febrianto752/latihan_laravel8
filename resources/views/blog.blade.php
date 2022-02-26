
@extends('layouts/main')

@section('title', $title)


@section('content')
  <h1 class="mb-5">{{ $title }}</h1>

  @if ($posts->count())
    <div class="card mb-5 text-center">
      <img src="/images/banner-web-1.jpg" class="card-img-top" alt="{{ $posts[0]->category->name }}" style="object-fit: cover; height: 400px;">
      <div class="card-body">
        <h3 class="card-title"><a href="/blog/{{ $posts[0]->slug }}" class="text-decoration-none text-secondary">{{ $posts[0]->title }}</a></h3>
        <p class="card-text mb-0">Author : <a href="/authors/{{ $posts[0]->author->username }}">{{ $posts[0]->author->name }}</a>, Kategori : <a href="/categories/{{ $posts[0]->category->slug }}">{{ $posts[0]->category->name }}</a> </p>
        <p class="card-text"><small class="text-muted">created {{ $posts[0]->created_at->diffForHumans() }}</small></p>
        <p>{{ $posts[0]->excerpt }}...</p>
        <a href="/blog/{{ $posts[0]->slug }}" class="btn btn-primary">Read more</a>
      </div>
    </div>
  @else
    <p class="fs-4">No Post Found!</p>
  @endif

  
  <div class="row">
    @foreach($posts->skip(1) as $post)
    <div class="col-md-4">
      <div class="position-absolute px-3 py-3 rounded" style="background-color: rgba(0, 0, 0, .6); z-index: 1;"><a href="/categories/{{ $post->category->slug }}" class="text-white text-decoration-none">{{ $post->category->name }}</a></div>
      {{-- <p class="position-absolute">Hello World</p> --}}
      <div class="card mb-4">
        <img src="/images/banner-web-2.jpg" class="card-img-top" alt="{{ $post->category->name }}">
        <div class="card-body">
          <h5 class="card-title"><a href="/blog/{{ $post->slug }}" class="text-decoration-none text-secondary">{{ $post->title }}</a></h5>
          <p class="card-text">Author : <a href="/authors/{{ $post->author->username }}">{{ $post->author->name }}</a></p>
          <p class="card-text">{{ $post->excerpt }}</p>
          <a href="/blog/{{ $post->slug }}" class="btn btn-primary">Read More</a>
        </div>
      </div>
    </div>
    @endforeach
  </div>

  
  
@endsection