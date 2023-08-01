<nav class="px-5 navbar navbar-expand-lg navbar-light" style="background-color: #FFD369;">
    <a class="navbar-brand" href="/">ConnectFriend</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

      <div class="justify-content-between d-flex flex-row">
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/myFriends">My Friends</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/top-up">Top Up </a>
                </li>
              </ul>
          </div>
          @if (auth()->check())
            <div>
                <a href="/logout" type="button" class="mx-5 btn btn-light">Log Out</a>
            </div>
          @else
            <div>
                <a href="/login" type="button" class="mx-5 btn btn-light">Log In</a>
            </div>
          @endif
      </div>
  </nav>
