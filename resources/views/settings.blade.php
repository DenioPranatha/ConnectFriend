@extends('layout.main')

@section('title', 'Settings')

@section('content')

<div class="jumbotron jumbotron-fluid bg-light py-5 px-1" style="height: 200px;">
    <div class="container">
      <h1 class="display-5 text-dark" data-aos="flip-left" data-aos-duration="1000">Settings..</h1>
    </div>
</div>

<div class="d-flex flex-row flex-wrap">
    <div class="card m-2" style="width: 18rem;">
        {{-- <div class="card-img" style="background-image: url({{ asset('/storage') . '/' . $other->User->image }} )"></div> --}}
        <div class="card-body">
            <h5 class="card-title">Disappear</h5>
            <p class="card-text">
                This item will allow your picture disappear from other user's search.
            </p>
            <p class="card-text">Price: 50
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-coin" viewBox="0 0 16 16">
                <path d="M5.5 9.511c.076.954.83 1.697 2.182 1.785V12h.6v-.709c1.4-.098 2.218-.846 2.218-1.932 0-.987-.626-1.496-1.745-1.76l-.473-.112V5.57c.6.068.982.396 1.074.85h1.052c-.076-.919-.864-1.638-2.126-1.716V4h-.6v.719c-1.195.117-2.01.836-2.01 1.853 0 .9.606 1.472 1.613 1.707l.397.098v2.034c-.615-.093-1.022-.43-1.114-.9H5.5zm2.177-2.166c-.59-.137-.91-.416-.91-.836 0-.47.345-.822.915-.925v1.76h-.005zm.692 1.193c.717.166 1.048.435 1.048.91 0 .542-.412.914-1.135.982V8.518l.087.02z"/>
                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                <path d="M8 13.5a5.5 5.5 0 1 1 0-11 5.5 5.5 0 0 1 0 11zm0 .5A6 6 0 1 0 8 2a6 6 0 0 0 0 12z"/>
            </svg>


            </p>
            <form action="/buyDisappear" method="post">
                @csrf
                <input type="hidden" name="price" value="500">
                <button type="submit" class="btn" style="background-color: #FFD369; border: 2px solid #FFD369;">Buy</button>
            </form>
        </div>
    </div>
</div>

<div style="height: 400px;"> </div>

@endsection
