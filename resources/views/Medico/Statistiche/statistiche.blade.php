@extends('layouts.dashboard')

@section('content')
  <div id="ciao" class="d-flex justify-content-center align-items-center">        
    <!-- container bianco -->
    <div id="main_statistiche" class="main_white card d-flex flex-row">
        @include('_partials.left-side-bar')        
        <nav class="d-flex flex-column">
          <div id="pagina_statistiche" class="welcome_doc_stat">
            <h2>Benvenuto nella tua Area Statistiche</h2>
            @if (optional(Auth::user()->profile)->genere)
                <h3><i class="fas fa-user-md" style="font-size: 2.2rem;"></i>
                @if (optional(Auth::user()->profile)->genere == 'femmina')
                    <span>Dott.ssa </span>
                @else
                    <span>Dott.</span> 
                @endif
                {{Auth::user()->nome}} {{Auth::user()->cognome}}</h3>
            @endif
          </div>
          {{-- Statistiche --}}
          <div id="app" class="d-flex flex-column flex-wrap">
            {{--Sezione Messaggi --}}
            <div class="statistiche_container">
              <div class="statistiche_mese_anno">
                <h3>Messaggi Mensili</h3>
                <chart-month-messages-component></chart-month-messages-component>
              </div>
              <div class="statistiche_anni">
                <h3>Messaggi Annuali</h3>
                <chart-years-messages-component></chart-years-messages-component>
              </div>
            </div>
            {{--End Sezione Messaggi --}}

            {{-- Sezione Recensioni --}}
            <div class="statistiche_container">
              <div class="statistiche_mese_anno">
                <h3>Recensioni Mensili</h3>
                <chart-month-retings-component></chart-month-retings-component>
              </div>
              <div class="statistiche_anni">
                <h3>Recensioni Annuali</h3>
                <chart-years-ratings-component></chart-years-ratings-component>
              </div>
            </div>
            {{--End Sezione Recensioni --}}

            {{-- <h3>Statistiche Mensili per Fasce di Voti</h3>
            <chart-month-vote-component></chart-month-vote-component> --}}
          </div>  
          {{-- End Statistiche --}}
        </nav>      
    </div>
    <!-- /container bianco -->      
  </div>
@endsection
