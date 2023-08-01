@extends('layout.main')

@section('title', 'Match')

@section('content')

<div class="jumbotron jumbotron-fluid bg-light py-5 px-1" style="height: 200px;">
    <div class="container">
      <h1 class="display-5 text-dark" data-aos="flip-left" data-aos-duration="1000">Mutual like with you..</h1>
    </div>
</div>

<div class="d-flex flex-row flex-wrap">
    @foreach ($others as $other)
        <div class="card m-2" style="width: 18rem;">
            <div class="card-img" style="background-image: url({{ asset('/storage') . '/' . $other->User->image }} )"></div>
            <div class="card-body">
                <h5 class="card-title">{{ $other->User->username }}</h5>
                <p class="card-text">{{ $other->User->field }}</p>
                <form action="/chat" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{ $other->User->id }}">
                    <input type="hidden" name="price" value="500">
                    <button type="submit" class="btn" style="background-color: #FFD369; border: 2px solid #FFD369;">Chat</button>
                </form>
            </div>
        </div>
    @endforeach
</div>

<div style="height: 400px;"> </div>

@endsection
