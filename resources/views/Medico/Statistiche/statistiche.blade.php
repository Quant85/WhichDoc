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
          <div id="app">
            <h3>Statistiche Messaggi Mensili</h3>
            <chart-month-messages-component></chart-month-messages-component>
            <br>
            <h3>Statistiche Messaggi Annuali</h3>
            <chart-years-messages-component></chart-years-messages-component>

            <h3>Statistiche Recensioni Mensili</h3>
            <chart-month-retings-component></chart-month-retings-component>
            
            <h3>Statistiche Recensioni Annuali</h3>
            <chart-years-ratings-component></chart-years-ratings-component>
          </div>  
        </nav>      
    </div>
    <!-- /container bianco -->      
  </div>
@endsection
