@extends('layouts/main')

@section('title', $title)
  
@section('content')
<div class="row justify-content-center text-center mt-5">
  <div class="col-md-8">

    @if(session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <p>{{ session('success') }}</p>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

    @endif

    {{-- @if($errors->has('credentials'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <p>{{ $errors->get('credentials')[0] }}</p>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif --}}
    @if(session()->has('loginError'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <p>{{ session('loginError') }}</p>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

    @endif



    <main class="form-signin">
      <form action="/login" method="post">
        @csrf
        <h1 class="h3 mb-3 fw-normal font-weight fw-bolder">Please sign in</h1>
    
        <div class="form-floating">
          <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="name@example.com" autofocus required value="{{ old('email') }}">
          <label for="email">Email address</label>
          @error('email')
          <div class="invalid-feedback text-start">
            <p>{{ $message }}</p>
          </div>
          @enderror
        </div>
        <div class="form-floating">
          <input type="password" name="password" class="form-control @error('email') is-invalid @enderror" id="password" placeholder="Password">
          <label for="password">Password</label>
          @error('password')
          <div class="invalid-feedback text-start">
            <p>{{ $message }}</p>
          </div>
          @enderror
        </div>

        <button class="w-100 btn btn-lg btn-primary mt-4" type="submit">Sign in</button>
        
      </form>

      <p class="mt-4">Not have an account? <a href="/register">Register</a></p>
      <p class="mt-5 mb-3 text-muted">&copy; 2017–2021</p>
    </main>
  </div>
</div>

@endsection