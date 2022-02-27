@extends('layouts/main')

@section('title', $title)

@section('content')
  <h1 class="mb-5">Daftar Post Kategori</h1>

  <div class="row">
    @foreach ($categories as $index => $category)
    <div class="col">
      <a href="/posts?category={{ $category->slug }}">
        <div class="card bg-dark text-white">
          <img src="https://source.unsplash.com/random/500x500?{{ $category->name }}" class="card-img" alt="{{ $category->name }}">
          <div class="card-img-overlay border border-primary d-flex align-items-center p-0">
            <h5 class="card-title py-4 flex-fill text-center" style="background-color: rgba(0, 0, 0, .7)">{{ $category->name }}</h5>
          </div>
        </div>
      </a>
    </div>
    @endforeach
  </div>

@endsection