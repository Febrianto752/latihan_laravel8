@extends('layouts/main')

@section('title', $title)
  
@section('content')
<div class="row justify-content-center mt-5">
  <div class="col-md-8">
    <main class="form-signin">
      <form action="/register" method="post">
        @csrf
        <h1 class="h3 mb-3 fw-normal font-weight fw-bolder text-center">Registration Form</h1>
    
        <div class="form-floating">
          <input type="text" class="form-control @error('name') is-invalid @enderror" id="fullname" name="name" placeholder="Your Full Name ..." value="{{ old('name') }}">
          <label for="fullname">Full Name</label>
          @error('name')
          <div id="validationServer03Feedback" class="invalid-feedback mb-1">
            {{ $message }}
          </div>
          @enderror
        </div>
        <div class="form-floating">
          <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" placeholder="Your Username ..." value="{{ old('username') }}">
          <label for="username">Username</label>
          @error('username')
          <div id="validationServer03Feedback" class="invalid-feedback mb-1">
            {{ $message }}
          </div>
          @enderror
        </div>

        <div class="form-floating">
          <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Your Email..." name="email" value="{{ old('email') }}">
          <label for="email">Email address</label>
          @error('email')
          <div id="validationServer03Feedback" class="invalid-feedback mb-1">
            {{ $message }}
          </div>
          @enderror
        </div>

        <div class="form-floating">
          <input type="password" class="form-control @error('password') is-invalid @enderror " id="floatingPassword" placeholder="Your Password..." name="password">
          <label for="floatingPassword">Password</label>
          @error('password')
          <div id="validationServer03Feedback" class="invalid-feedback mb-1">
            {{ $message }}
          </div>
          @enderror
        </div>

        <div class="form-floating">
          <input type="password" class="form-control @error('confirm_password') is-invalid @enderror " id="floatingPassword" placeholder="Your Password..." name="confirm_password">
          <label for="confirm_password">Confirm Password</label>
          @error('confirm_password')
          <div id="validationServer03Feedback" class="invalid-feedback mb-1">
            {{ $message }}
          </div>
          @enderror
        </div>


        <button class="w-100 btn btn-lg btn-primary mt-4" type="submit">Register</button>
        
      </form>

      <p class="mt-4 text-center">Already an account? <a href="/login">Login</a></p>
      <p class="mt-5 mb-3 text-muted text-center">&copy; 2017–2021</p>
    </main>
  </div>
</div>

@endsection