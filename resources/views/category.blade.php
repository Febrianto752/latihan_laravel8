{{-- Tidak Terpakai lagi tergantikan oleh view posts  --}}

@extends('layouts/main')

@section('title', $title)

@section('content')
  <h1 class="mb-5">Halaman Daftar Post Berdasarkan Kategori <span class="text-info">{{ $category->name }}</span></h1>


  
  @foreach ($posts as $index => $post)
  
  <article class="border-bottom border-dark mb-5">
    <h2 ><a href="/posts/{{ $post->slug }}" class="text-decoration-none text-secondary">{{ $post->title }}</a></h2>
    <p>Author : <a href="/authors/{{ $post->author->username }}">{{ $post->author->name }}</a>, Kategori : <a href="/categories/{{ $post->category->slug }}">{{ $post->category->name }}</a></p>
    <p>{{ $post->excerpt }} <a href="/posts/{{ $post->slug }}">Read more...</a></p>
  </article>
  
  @endforeach
 

@endsection