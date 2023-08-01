@extends('layout.main')

@section('title', 'Login ConnectFriend')

@section('content')

@if(session('registerSuccess'))
  <div class="alert alert-success" role="alert">
    {{ session('registerSuccess') }} Try to login with your account!
  </div>
@endif

@if(session('loginError'))
  <div class="alert alert-danger" role="alert">
    {{ session('loginError') }} Try again!
  </div>
@endif

<div class="container mt-4 w-50">
    <h1 class="text-center mb-5">Login to ConnectFriend</h1>
    <form action="/login" method="post">
        @csrf
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username" value="{{ old('username') }}" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>

        <div class="d-flex justify-content-end">
            <button type="submit" class="btn" style="background-color: #FFD369;">Login</button>
        </div>

        <div class="mb-5">
            Don't have an account? <a href="/register">Register</a>
        </div>
    </form>
</div>

@endsection
