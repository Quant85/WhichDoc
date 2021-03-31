@extends('layouts.dashboard')

@section('content')
    <div id="ciao" class="d-flex justify-content-center align-items-center">        
        <!-- container bianco -->
        <div class="main_white card d-flex flex-row">
            @include('_partials.left-side-bar')        
            <nav id="recensioni" class="d-flex flex-column">
                <div class="bottom d-flex flex-row">
                    <div class="bottom_left d-flex justify-content-around flex-column">      
                        <h1>Recensioni
                            @if (optional(Auth::user()->profile)->genere)
                                
                                @if (optional(Auth::user()->profile)->genere == 'femmina')
                                    <span>della Dott.ssa </span>
                                @else
                                    <span>del Dott.</span> 
                                @endif
                                {{Auth::user()->cognome}} {{Auth::user()->nome}}
                            @endif
                            <i class="fas fa-user-md" style="font-size: 2.2rem;"></i>
                        </h1>
                        <div class="container">
                            @foreach ($medico->ratings as $rating)
                            <div class="reating_wrap my-4">
                                <table class="table table-striped">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th scope="col">Nome Paziente Recensore</th>
                                            <th scope="col">Testo Recensione</th>
                                            <th scope="col">Voto</th>
                                            <th scope="col">Ricevuto</th>
                                            <th colspan = 2>Azioni</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><span class="text-capitalize">{{$rating->nome_utente}}</span></td>
                                            <td>
                                                <div class="body_text text-truncate"><p class="d-inline-block text-truncate" style="max-width: 150px; ver">
                                                    {{$rating->body}}
                                                    </p>
                                                </div>
                                            </td>
                                            <td>{{$rating->voto}}</td>
                                            
                                            <td>{{\Carbon\Carbon::createFromTimeStamp(strtotime($rating->created_at))->diffForHumans()}}
                                            </td>
                                    
                                            {{-- Botton trigger Modal --}}
                                            <td>
                                                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#show-{{ $rating->id }}"><i class="far fa-eye"></i></button>
                                            </td>
                                            
                                            {{-- Start Add Modal -  --}}
                                            <div class="modal fade" id="show-{{ $rating->id }}" tabindex="-1" role="dialog" aria-labelledby="rating-show-{{ $rating->id }}" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="#show-{{ $rating->id }} title"> Recensione di: {{$rating->nome_utente}}<i class="fas fa-broom"></i></h5>
    
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>{{$rating->body}}</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-door-closed"></i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- End Add Model --}}
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>    
            </nav>      
        </div>
        <!-- /container bianco -->      
    </div>
@endsection
<style>
    table > thead,
    table > tbody{
        text-align: center;
    }
table > tbody> div > textarea.form-control {
    background-color: blue !important;

}
table > tbody > tr > td > div > textarea{
    background-color: transparent !important;
    border:  2px inset black !important;
}
</style>
