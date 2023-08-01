@extends('layout.main')

@section('title', 'Home')

@section('content')

<div class="jumbotron jumbotron-fluid bg-light py-5 px-1" style="height: 200px;">
    <div class="container">
        @if(auth()->check())
            <h1 class="display-5 text-dark">Hi, {{ auth()->user()->username }}!</h1>
        @endif
        <h1 class="display-5 text-dark" data-aos="flip-left" data-aos-duration="1000">Find best job friend now..</h1>
    </div>
</div>

<div class="d-flex flex-row my-5" data-aos="fade-up">
    <form action="/events#section5">
        @csrf
        <div id="bubble-box mx-5">
            <input type="text" name="search-event" id="search-event" placeholder="Search name or jobfield" class="no-outline" value={{ request('search-name') }}>
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
            </svg>
        </div>
    </form>

    <div style="width: 20px;"></div>
    <button class="btn mx-2" style="background-color: #FFD369;" value="All">All</button>
    <button class="btn mx-2" style="background-color: #FFD369;" value="Computer Science">Computer Science</button>
    <button class="btn mx-2" style="background-color: #FFD369;" value="Design">Design</button>
    <button class="btn mx-2" style="background-color: #FFD369;" value="Web Programming">Web Programming</button>


</div>

<div class="d-flex flex-row flex-wrap">
    @foreach ($users as $user)
        <div class="card m-2" style="width: 18rem;">
            <div class="card-img" style="background-image: url({{ asset('/storage') . '/' . $user->image }} )"></div>
            <div class="card-body">
                <h5 class="card-title">{{ $user->username }}</h5>
                <p class="card-text">{{ $user->field }}</p>
                <div class="d-flex flex-row justify-content-end">
                    <form class="p-2" action="/thumb" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{ $user->id }}">
                        <button type="submit" class="btn" style="background-color: #FFD369; border: 2px solid #FFD369;">Thumb's Up!</button>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
</div>

<div style="height: 400px;"> </div>
@endsection
