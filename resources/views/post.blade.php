@extends('layouts/main')

@section('title', $title)

@section('content')
  <h1 class="mb-5">Halaman Post</h1>
  <article>
    <h2>{{ $post['title'] }}</h2>
    <p>Author : {{ $post['author'] }}</p>
    <p>{{ $post['body'] }}</p>
  </article>
@endsection