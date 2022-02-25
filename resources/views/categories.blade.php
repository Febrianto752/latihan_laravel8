@extends('layouts/main')

@section('title', $title)

@section('content')
  <h1 class="mb-5">Daftar Post Kategori</h1>
  <ul class="list-group">
  @foreach ($categories as $index => $category)
  
    <li class="list-group-item" aria-current="true"><a href="/categories/{{ $category->slug }}">{{ $category->name }}</a></li>

  @endforeach
  </ul>
@endsection