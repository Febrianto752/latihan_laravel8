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


    <main class="form-signin">
      <form >
        <h1 class="h3 mb-3 fw-normal font-weight fw-bolder">Please sign in</h1>
    
        <div class="form-floating">
          <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
          <label for="floatingInput">Email address</label>
        </div>
        <div class="form-floating">
          <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
          <label for="floatingPassword">Password</label>
        </div>

        <button class="w-100 btn btn-lg btn-primary mt-4" type="submit">Sign in</button>
        
      </form>

      <p class="mt-4">Not have an account? <a href="/register">Register</a></p>
      <p class="mt-5 mb-3 text-muted">&copy; 2017–2021</p>
    </main>
  </div>
</div>

@endsection