@extends('layouts.dashboard')

@section('content')            
    <div id="ciao" class="d-flex justify-content-center align-items-center">        
        <!-- container bianco -->
        <div class="main_white card d-flex flex-row">
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
            <div class="card d-flex justify-content-center w-25 h-100 m-auto p-5" style="width: 18rem; position:relative;">
              <i class="fas fa-check-circle" style="font-size: 8rem; position: absolute; top:-25%; left: 50%; transform: translate(-50%,0); color: rgb(30, 235, 47);"></i>
              <div class="card-body">
                <h4 class="card-title">Messaggio Inviato con successo al: <br>
                  @if ($medico->genere === 'maschio')
                    Dott. <span>{{$medico->nome}} {{$medico->cognome}}</span></h4>
                  @endif
                    Dott.ssa <span>{{$medico->nome}} {{$medico->cognome}}</span></h4>
                <a name="" id="" class="btn btn-primary m-2" href="{{route('medico.showProfile',[$medico->id])}}" role="button">Torna al Profilo</a>
              </div>
            </div>
        </div>
        <!-- /container bianco -->      
    </div>
@endsection


