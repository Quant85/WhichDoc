@extends('layouts.dashboard')
@section('content')
<div id="ciao" class="d-flex justify-content-center align-items-center">        
        <!-- container bianco -->
        <div class="main_white card d-flex flex-row">
            
            @include('_partials.left-side-bar')
            <div class="show-content d-flex">
                <div class="left-show">
  
                    
                    
                    
                    
                    
                    </div>
                    <div class="right-show">
                        <div class="container_top d-flex">
                                <div class="container_dati">
                                    <h3>@if(optional($medico->profile)->genere = 'maschio')
                                        Dottor {{$medico->nome}} {{$medico->cognome}}
                                        
                                        @else
                                        Dottoressa {{$medico->nome}} {{$medico->cognome}} 
                                        
                                        @endif
                                    </h3>
                                    <div><strong>CITTA: </strong>{{optional($medico->profile)->città}}</div>
                                <div><strong>INDIRIZZO: </strong>{{$medico->indirizzo}}</div>
                                <div><strong>EMAIL: </strong>{{$medico->email}}</div>
                                <div><strong>NUMERO TELEFONO: </strong>{{optional($medico->profile)->cellulare}}</div>
                                <div><strong>P.IVA: </strong>{{optional($medico->profile)->piva}}</div>
                                @if(optional($medico->profile)->disabilità = true)
                                <strong>Accetto disabilità</strong>
                                @else{
                                    <strong>Non accetto disabilità</strong>
                                }
                                @endif
                                
                            </div>
                            <div class="container_img d-flex">
                                <img src="{{asset('storage/' . (optional($medico->profile)->foto))}}" alt="">     
                            </div>
                        </div>
                        <div class="container_bottom">
                            <div><strong>BIOGRAFIA: </strong>{{optional($medico->profile)->bio}}</div>                        
                        </div>
                        
                </div>
            </div>
            
            
            
        </div>
        <!-- /container bianco -->      
    </div>
@endsection
