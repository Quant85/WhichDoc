@extends('layouts.dashboard')
@section('content')
<div id="ciao" class="d-flex justify-content-center align-items-center">        
        <!-- container bianco -->
        <div class="main_white card d-flex flex-row">
            
            @include('_partials.left-side-bar')
            <div class="show-content d-flex">
                <div class="left-show">
                    
                        <div><strong>NOME: </strong>{{$medico->nome}}</div>
                        <div><strong>COGNOME: </strong>{{$medico->cognome}}</div>
                        <div><strong>EMAIL: </strong>{{$medico->email}}</div>
                        <div><strong>NUMERO TELEFONO: </strong>{{optional($medico->profile)->cellulare}}</div>
                        <div><strong>CITTA: </strong>{{optional($medico->profile)->città}}</div>
                        <div><strong>INDIRIZZO: </strong>{{$medico->indirizzo}}</div>
                        <div><strong>P.IVA: </strong>{{optional($medico->profile)->piva}}</div>
                        <div><strong>GENERE: </strong>{{optional($medico->profile)->genere}}</div>
                        <div><strong>BIOGRAFIA: </strong>{{optional($medico->profile)->bio}}</div>

                        @if(optional($medico->profile)->disabilità = true)
                            <strong>Accetto disabilità</strong>
                        @else{
                            <strong>Non accetto disabilità</strong>
                        }
                        @endif
                        {{$medico->profile->cv}}




                    
                </div>
                <div class="right-show">
                <img src="{{asset('storage/' . (optional($medico->profile)->foto))}}" alt="">
                </div>
            </div>
            
            
            
        </div>
        <!-- /container bianco -->      
    </div>
@endsection