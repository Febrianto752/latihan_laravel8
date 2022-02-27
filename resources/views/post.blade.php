

@extends('layouts/main')

@section('title', $title)

@section('content')
  <div class="row justify-content-center">
    <div class="col-md-8">
      <h1 class="mb-5">Post : {{ $post->title }}</h1>
      <p>Author : <a href="/posts?author={{ $post->author->username }}">{{ $post->author->name }}</a>, Kategori : <a href="/posts?category={{ $category->slug }}">{{ $category->name }}</a></p>
      <article class="fs-5 mb-5">
        <img src="/images/banner-web-1.jpg" alt="$post->title" class="img-fluid mb-4">
        {!! $post->body !!}
        <a href="/posts">Back To Post List</a>
      </article>
    </div>
  </div>
@endsection