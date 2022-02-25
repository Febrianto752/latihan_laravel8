
@extends('layouts/main')

@section('title', $title)


@section('content')
  <h1 class="mb-5">Daftar Post</h1>
  
  @foreach ($posts as $index=>$post)
    <article class="border-bottom border-dark mb-5">
      <h2 ><a href="/blog/{{ $post->slug }}" class="text-decoration-none text-secondary">{{ $post->title }}</a></h2>
      <p>Author : <a href="#">{{ $post->user->name }}</a>, Kategori : <a href="/categories/{{ $post->category->slug }}">{{ $post->category->name }}</a></p>
      <p>{{ $post->excerpt }} <a href="/blog/{{ $post->slug }}">Read more...</a></p>
    </article>
  @endforeach
  
@endsection