<div class="left_side d-flex justify-content-between flex-column">
    <div class="sidebar_top">
        <div class="logo">
            <!-- logo -->
            <a class="navbar-brand" href="{{ url('/') }}">LOGO</a>
        </div>
    </div>

    <div class="sidebar_bottom d-flex">
        <div class="sidebar_main ">
            <!-- lista link -->
            <ul class="list-unstyled">
                <li><a href="{{ url('/medico/home') }}"><i class="fas fa-tachometer-alt fa-lg fa-fw"></i>Dashboard</a></li>
                <li><a href="{{route('medico.profilo.index')}}"><i class="fas fa-book-open fa-lg fa-fw"></i>Mio Profilo</a></li>
                <li><a href="#"><i class="fas fa-book-open fa-lg fa-fw"></i>Messaggi Ricevuti</a></li>
                <li><a href="#"><i class="fas fa-folder-open fa-lg fa-fw"></i>Statistiche</a></li>
                <li><a href="#"><i class="fas fa-print fa-lg fa-fw"></i>Sponsorizzazioni</a></li>
            </ul>
            <!-- /lista link -->
        </div>
            
            
        <div class="sidebar_foot">
            <!-- link UR-->
            <ul class="list-unstyled">
                @guest
                    <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                    @if (Route::has('register'))
                        <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                    @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->nome }}
                            </a>
                            
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"onclick="event.preventDefault();document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                @endguest
            </ul>
        </div>
    </div>
    <!-- /link UR-->
</div>