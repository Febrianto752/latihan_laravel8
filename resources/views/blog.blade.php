
@extends('layouts/main')

@section('title', $title)


@section('content')
  <h1 class="mb-5">Daftar Post</h1>
  
  @foreach ($posts as $index=>$post)
  <article>
    <h2 ><a href="/blog/{{ $post['slug'] }}">{{ $post['title'] }}</a></h2>
    <p>Author : {{ $post['author'] }}</p>
    <p>{{ $post['body'] }}</p>
  </article>
  @endforeach
  
@endsection