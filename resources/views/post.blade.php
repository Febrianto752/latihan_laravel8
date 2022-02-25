

@extends('layouts/main')

@section('title', $title)

@section('content')

  <h1 class="mb-5">Halaman Post</h1>
  <p>Author : <a href="#">{{ $post->user->name }}</a>, Kategori : <a href="/categories/{{ $category->slug }}">{{ $category->name }}</a></p>
  <article>
    <h2>{{ $post->title }}</h2>
    <p>{!! $post->body !!}</p>
    <a href="/blog">Back To Post List</a>
  </article>
@endsection