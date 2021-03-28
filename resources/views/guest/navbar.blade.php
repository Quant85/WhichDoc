<nav class="d-flex container-fluid nav_principale">
    <div class="container-lg ">
        <div class="row">
            <div class="logo col-md-2">
                <img src="{{asset('img/logo.jpeg')}}" alt="">
            </div>
            <div class="search_bar col-md-5">
              <form action="{{route('doctors.index'/* ,$medico->id */)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('GET')
                {{-- <div class="search-box">
                    <input type="text" placeholder="Type to search..">
                    <div class="search-icon"><i class="fas fa-search"></i></div>
                    <div class="cancel-icon"> <i class="fas fa-times"></i> </div>
                    <div class="search-data"></div>
                </div> --}}

                @if (count($specializzazioni)>0)
                  <select class=" selectpicker form-control @error('specializzazione') is-invalid @enderror" name="specializzazione" id="specializzazione" multiple>
                      <optgroup label="Area Medica">
                          @foreach ($specializzazioni as $specializzazione)
                              <option value="{{$specializzazione->descrizione}}">{{$specializzazione->descrizione}}</option>    
                          @endforeach
                      </optgroup>
                  </select>
                @endif
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
            </div>
            <div class="login col-md-5">
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
    </div>
</nav>

<div class="hamburger">
    <!--Navbar-->
  <nav class="navbar navbar-light amber lighten-4 mb-4">

    <!-- Navbar brand -->
    <a class="navbar-brand" href="#"><img src="{{asset('img/logo.jpeg')}}" alt=""></a>

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



<script>
    
  //Hamburger
    $(document).ready(function () {
    $('.first-button').on('click', function () {

      $('.animated-icon1').toggleClass('open');
    });
    $('.second-button').on('click', function () {

      $('.animated-icon2').toggleClass('open');
    });
    $('.third-button').on('click', function () {

      $('.animated-icon3').toggleClass('open');
    });
  });
  // End Hamburger

</script>

