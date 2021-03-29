<nav class="d-flex nav_principale">
    <div class="container_nav d-flex justify-content-between">
            <div class="logo">
                <a href="{{ url('/') }}">
                    <img src="{{asset('img/logo.jpeg')}}" alt="">
                </a>
            </div>

            <div class="login">
                @if (Route::has('login'))
                    <div class="top-right links d-flex justify-content-around">
                        @auth
                            <div class="loggedin">
                                <span class="notification"><i class="far fa-bell"></i></span>
                                <div><a class="justify-content-flex-end" href="{{ url('/medico/home') }}">Home</a></div>
                            </div>
                        @else
                            <a class="btn btn-grad-secondary" href="{{ route('login') }}">Login</a>

                            @if (Route::has('register'))
                                <a class="btn btn-grad" href="{{ route('register') }}">Sei un medico? Registrati</a>
                            @endif
                        @endauth
                    </div>
                @endif
            </div>
    </div>
</nav>

<div class="hamburger">
    <!--Navbar-->
  <nav class="navbar navbar-light amber lighten-4 mb-4">

    <!-- Navbar brand -->
    <a class="navbar-brand" href="#"><img class="logo" src="{{asset('img/logo.jpeg')}}" alt=""></a>

    <!-- Collapse button -->
    <button class="navbar-toggler first-button" type="button" data-toggle="collapse" data-target="#navbarSupportedContent20"
      aria-controls="navbarSupportedContent20" aria-expanded="false" aria-label="Toggle navigation">
      <div class="animated-icon1"><span></span><span></span><span></span></div>
    </button>

    <!-- Collapsible content -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent20">

      <!-- Links -->
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          @if (Route::has('login'))
              <div class="top-right links">
                  @auth
                      <a href="{{ url('/medico/home') }}">Home</a>
                  @else
                      <a href="{{ route('login') }}">Login</a>

                      @if (Route::has('register'))
                          <a href="{{ route('register') }}">Register</a>
                      @endif
                  @endauth
              </div>
          @endif
          {{-- <a class="nav-link" href="#"><span class="sr-only">(current)</span></a> --}}
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Features</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Pricing</a>
        </li>
      </ul>
      <!-- Links -->

    </div>
    <!-- Collapsible content -->

  </nav>
  <!--/.Navbar-->
</div>
