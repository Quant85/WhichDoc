<div class="left_side d-flex justify-content-between flex-column">
    <div class="sidebar_top">
        <div class="logo">
            <!-- logo -->
            <a class="navbar-brand" href="{{ url('/') }}">
                <div class="immagine">
                    <img src="{{optional(Auth::user()->profile)->foto ? asset( 'storage/'.Auth::user()->profile->foto) : asset('img/default/dottori.jpg')}}" alt="">
                </div>
                {{-- <img src="{{asset('img/WhichDoc-logo.png')}}" alt=""> --}}
            </a>
        </div>
    </div>

    <div class="sidebar_bottom d-flex">
        <div class="sidebar_main ">
            <!-- lista link -->
            <ul class="list-unstyled">
                <li><a type="button" class="btn btn-primary" href="{{ url('/medico/home') }}"><i 
                        class="fas fa-tachometer-alt" style="font-size: 1.5rem;"></i>Dashboard </a></li>
                <li><a type="button" class="btn btn-primary" href="{{ route('medico.profilo.index') }}"><i
                            class="fas fa-user-md" style="font-size: 1.5rem;"></i>Modifica Profilo</a></li>
                <li><a type="button" class="btn btn-primary" href="{{ route('medico.messaggi.index') }}"><i 
                            class="fas fa-comment-medical" style="font-size: 1.5rem;"></i>Messaggi Ricevuti</a></li>
            </ul>
            <hr class="divider">
            <ul class="list-unstyled">
                <li><a type="button" class="btn btn-primary" href="{{ route('medico.recensioni.index') }}"><i
                            class="fas fa-pen-nib" style="font-size: 1.5rem;"></i>Recensioni Ricevute</a></li>
                <li><a type="button" class="btn btn-primary" href="#"><i 
                            class="fas fa-piggy-bank" style="font-size: 1.5rem;"></i>Sponsorizzazioni</a></li>
                <li><a type="button" class="btn btn-primary" href="{{ route('medico.statistiche') }}"><i 
                            class="fas fa-chart-line" style="font-size: 1.5rem;"></i>Statistiche</a></li>
                
            </ul>
            <!-- /lista link -->
        </div>


        <div class="sidebar_foot">
            <!-- link UR-->
            <ul class="list-unstyled">
                @guest
                    <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                    @if (Route::has('register'))
                        <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->nome }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
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
