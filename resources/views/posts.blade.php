
@extends('layouts/main')

@section('title', $title)


@section('content')
  <h1 class="mb-3 text-center">{{ $title }}</h1>

  <div class="row mb-4 justify-content-center">
    <div class="col-md-6">
      <form action="/posts" method="GET">
        <div class="input-group mb-3">
          @if (request('category'))
              <input type="hidden" name="category" value="{{ request('category') }}">
          @endif

          @if (request('author'))
          <input type="hidden" name="author" value="{{ request('author') }}">
          @endif
          <input type="text" class="form-control" placeholder="Search keyword..." aria-label="Recipient's username" aria-describedby="button-addon2" name="keyword" value="{{ request('keyword') }}">
          <button class="btn btn-outline-secondary" type="submit" id="btn-search">Search</button>
        </div>
      </form>
      
    </div>
  </div>

  @if ($posts->count())
    <div class="card mb-5 text-center">
      <img src="/images/banner-web-1.jpg" class="card-img-top" alt="{{ $posts[0]->category->name }}" style="object-fit: cover; height: 400px;">
      <div class="card-body">
        <h3 class="card-title"><a href="/posts/{{ $posts[0]->slug }}" class="text-decoration-none text-secondary">{{ $posts[0]->title }}</a></h3>
        <p class="card-text mb-0">Author : <a href="/posts?author={{ $posts[0]->author->username }}">{{ $posts[0]->author->name }}</a>, Kategori : <a href="/posts?category={{ $posts[0]->category->slug }}">{{ $posts[0]->category->name }}</a> </p>
        <p class="card-text"><small class="text-muted">created {{ $posts[0]->created_at->diffForHumans() }}</small></p>
        <p>{{ $posts[0]->excerpt }}...</p>
        <a href="/posts/{{ $posts[0]->slug }}" class="btn btn-primary">Read more</a>
      </div>
    </div>
  

  
  <div class="row">
    @foreach($posts->skip(1) as $post)
    <div class="col-md-4">
      <div class="position-absolute px-3 py-3 rounded" style="background-color: rgba(0, 0, 0, .6); z-index: 1;"><a href="/posts?category={{ $post->category->slug }}" class="text-white text-decoration-none">{{ $post->category->name }}</a></div>
      {{-- <p class="position-absolute">Hello World</p> --}}
      <div class="card mb-4">
        <img src="/images/banner-web-2.jpg" class="card-img-top" alt="{{ $post->category->name }}">
        <div class="card-body">
          <h5 class="card-title"><a href="/posts/{{ $post->slug }}" class="text-decoration-none text-secondary">{{ $post->title }}</a></h5>
          <p class="card-text">Author : <a href="/posts?author={{ $post->author->username }}">{{ $post->author->name }}</a></p>
          <p class="card-text">{{ $post->excerpt }}</p>
          <a href="/posts/{{ $post->slug }}" class="btn btn-primary">Read More</a>
        </div>
      </div>
    </div>
    @endforeach
  </div>

  @else
    <p class="fs-4 text-center">No Post Found!</p>
  @endif

  {{ $posts->links() }}
  
@endsection