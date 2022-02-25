@extends('layouts/main')

@section('title', $title)

@section('content')
  <h1 class="mb-5">Halaman Daftar Post Berdasarkan Kategori <span class="text-info">{{ $category->name }}</span></h1>


  
  @foreach ($posts as $index => $post)
  
  <article class="mb-4">
    <h2 ><a href="/blog/{{ $post->slug }}">{{ $post->title }}</a></h2>
    <p>{{ $post->excerpt }}</p>
  </article>
  
  @endforeach
 

@endsection