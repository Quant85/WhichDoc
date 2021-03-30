@extends('layouts.dashboard')

@section('content')
    <div id="ciao" class="d-flex justify-content-center align-items-center">        
        <!-- container bianco -->
        <div class="main_white card d-flex flex-row">
            @include('_partials.left-side-bar')        
            <nav id="message" class="d-flex flex-column">
                <div class="top d-flex flex-row">
                    <div class="top_left"></div>
                    <div class="top_right"></div>
                </div>

                <div class="bottom d-flex flex-row">
                    <div  class="bottom_left d-flex justify-content-around flex-column">      
                        <h1>Gestione Messaggi Ricevuti</h1>
                        <div class="container">
                            @foreach ($medico->messages as $message)
                            <div class="messages_wrap my-4">
                                <table class="table table-striped">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th scope="col">Mittente</th>
                                            <th scope="col">Testo Messaggio</th>
                                            <th scope="col">Email Mittente</th>
                                            <th scope="col">Telefono Mittente</th>
                                            <th scope="col">Ricevuto</th>
                                            <th colspan = 2>Azioni</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    
                                        <tr>
                                            <td>{{$message->nome_paziente}}</td>
                                            <td>
                                                <div class="form-group">
                                                    <label for=""></label>
                                                    <textarea class="form-control"
                                                                rows="1" disabled 
                                                                style="border: 0px solid transparent">{{$message->testo_messaggio}}</textarea>
                                                </div>
                                            </td>
                                            <td>{{$message->email}}</td>
                                            <td>{{$message->cellulare}}</td>
                                            <td>{{\Carbon\Carbon::createFromTimeStamp(strtotime($message->created_at))->diffForHumans()}}
                                            </td>
                                            <td>
                                                <a href="{{route('medico.messaggi.show', $message->id)}}" class="btn btn-info"><i class="far fa-eye"></i></a>
                                            </td>
                                            {{-- Botton trigger Modal --}}
                                            <td>
                                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#destroy-{{ $message->id }}"><i class="fas fa-trash-alt"></i></button>
                                            </td>
                                            {{-- Start Add Modal -  --}}
                                            <div class="modal fade" id="destroy-{{ $message->id }}" tabindex="-1" role="dialog" aria-labelledby="message-destroy-{{ $message->id }}" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    <h5 class="modal-title" id="#destroy-{{ $message->id }} title">Elimina Messaggio di {{$message->nome_paziente}}</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    </div>
                                                    <div class="modal-body">
                                                    🚨 Sei sicuro di volerlo cancellare? 🚨 <br> 🚨 E se poi te ne penti?! 🚨
                                                    </div>
                                                    <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-door-closed"></i></button>
                                                    <form action="{{ route('medico.messaggi.destroy', $message->id)}}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-danger" type="submit"><i class="fas fa-bomb"></i></button>
                                                    </form>
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
