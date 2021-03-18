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
            <div class="message container d-flex justify-content-center">
              <div class="card p-4 d-flex flex-column align-items-md-center" style="border-radius: 25px; border: 2px solid grey;">
                <i class="fas fa-envelope-open-text" style="font-size: 6rem; text-align: center;"></i>
                  <h4 class=" card-title m-5" style="font-size: 1.2rem">
                      Messaggio ricevuto {{\Carbon\Carbon::createFromTimeStamp(strtotime($messaggio->created_at))->diffForHumans()}} <br>
                      da: 
                      <strong>{{$messaggio->nome_paziente}}</strong>
                  </h4>
                  <div class="card-text" style="max-width: 60%">
                    <p class=" text-left text-wrap" 
                    style="font-size: 1.2rem;">{{$messaggio->testo_messaggio}}</p>
                    <address class="card-body">
                      <ul style="list-style: none;">
                        <li>Contatti Mittente:</li>
                        <li ><i class="fas fa-at px-2"></i>Email: <a href="mailto:{{$messaggio->email}}"><strong> {{$messaggio->email}}</strong></a></li>
                        <li class="p-1"><strong><i class="fas fa-mobile-alt px-2"></i>Cell: {{$messaggio->cellulare ? $messaggio->cellulare : 'N/A'}}</strong></li>
                        <li> appartenente alla legge 104: <strong>{{$messaggio->disabilità  ? 'si' : 'no' }} </strong></li>
                      </ul>
                    </address>
                  </div>
                <a class="btn btn-primary m-2" href="mailto:{{$messaggio->email}}" role="button" style="font-size: 1.3rem; color: #094b47; background-color: #15cec4"><i class="fab fa-mailchimp px-3" ></i> Ricontatta </a>
              </div>
            </div>
          </div>
        </div>
      </nav>      
      <!-- /container bianco -->      
    </div>
  </div>

@endsection
