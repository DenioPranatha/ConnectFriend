@extends('layout.main')

@section('title', 'Register ConnectFriend')

@section('content')
<div class="container mt-4 w-50">
    <h1 class="mb-4 text-center">Register to ConnectFriend</h1>
    <div class="mb-3 text-center">
        Have an account? <a href="/login">Login</a>
    </div>
    <form action="/register" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username" value="{{ old('username') }}" required>
            @error('username')
            <div class="text-danger text-xl">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="gender" class="form-label">Gender</label>
            <select class="form-select" id="gender" name="gender" required>
                <option value="">Select Gender</option>
                <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
            </select>
            @error('gender')
            <div class="text-danger text-xl">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="field" class="form-label">Job Field</label>
            <input type="text" class="form-control" id="field" name="field" value="{{ old('field') }}" required>
            @error('field')
            <div class="text-danger text-xl">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="linkedin">Your LinkedIn URL</label>
            <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon3">https://www.linkedin.com/in/</span>
            </div>
            <input type="text" class="form-control" id="linkedin" aria-describedby="basic-addon3" name="linkedin" value="{{ old('linkedin') }}">
            </div>
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">Phone Number</label>
            <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}" required>
            @error('field')
            <div class="text-danger text-xl">
                {{ $message }}
            </div>
            @enderror
        </div>


        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
            @error('password')
            <div class="text-danger text-xl">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="image">Input image</label>
            <input type="file" class="form-control-file" id="image" name="image">
            @error('image')
            <div class="text-danger text-xl">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <?php $price = 1000; ?>
            Price for Registration = {{ $price }}
            <input type="hidden" class="form-control-file" id="price" name="price" value="{{ $price }}">
        </div>

        <div class="d-flex justify-content-end mb-5">
            <button type="submit" class="btn" style="background-color: #FFD369;">Register</button>
        </div>
    </form>
</div>

@endsection
