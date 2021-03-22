@extends('layouts.dashboard')

@section('content')
    <div id="ciao" class="d-flex justify-content-center align-items-center">        
        <!-- container bianco -->
        <div class="main_white card d-flex flex-row">
            @include('_partials.left-side-bar')        
            <nav class="d-flex flex-column">
                <div class="top d-flex flex-row">
                    <div class="top_left"></div>
                    <div class="top_right"></div>
                </div>

                <div class="bottom d-flex flex-row">
                    <div class="bottom_left d-flex justify-content-around flex-column">      
                    <h1>Visualizzazione Recensioni</h1>
                    <div class="container">
                        <table class="table table-striped">
                            <thead >
                                <tr>
                                    <th scope="col">Nome Paziente Recensore</th>
                                    <th scope="col">Testo Recensione</th>
                                    <th scope="col">Voto</th>
                                    <th scope="col">Ricevuto</th>
                                   
                                </tr>
                            </thead>
                            @foreach ($medico->ratings as $rating)
                            <tbody>
                                <tr>
                                    <td>{{$rating->nome_utente}}</td>
                                    <td>
                                        <div class="form-group">
                                            <label for=""></label>
                                            <textarea class="form-control" name="" id="" rows="2" disabled>{{$rating->body}}</textarea>
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
                            @endforeach
                        
                        </table>

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
