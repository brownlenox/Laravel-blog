<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand ms-2" href="#">MyJobs</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mx-auto">
            <li class="nav-item">
              <a class="nav-link active" href="{{ route('home') }}">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="{{ route('posts.create') }}">Posts</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="#">Jobs</a>
              </li>
          </ul>
          <ul class="navbar-nav me-3">
            @guest
            <li class="nav-item">
                <a class="nav-link active" href="{{ route('login') }}">Login</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="{{ route('register-user') }}">Register</a>
              </li>
              @else
              <li class="nav-item">
                <a class="nav-link active" href="{{ route('signout') }}">Log out</a>
              </li>
              @endguest
          </ul>
        </div>
      </nav>
  </header>