<div id="profilo_medico">

    <!-- <div class="top d-flex flex-row">
        <div class="top_left"></div>
        <div class="top_right"></div>
    </div> -->
    <div class="jumbo_medico_profilo">
    @auth
        <a href="{{ url('/medico/home') }}"><i class="fas fa-home"></i></a>
    @else
        <a href="{{ url('/search') }}"><i class="fas fa-arrow-circle-left"></i></a>
    @endauth
    </div>
    <div class="main_medico_profilo">
        <div class="top_medico_profilo d-flex">
            <!-- immagine medico -->
            <div class="img_medico_profilo">
                <img src="{{optional($medico->profile)->foto ? asset( 'storage/'.$medico->profile->foto) : asset('img/default/dottori.jpg') }}" alt="foto profilo">
            </div>
            <!-- /immagine medico -->

            <!-- dati medico -->
            <div class="dati_medico_profilo">
                {{-- Doc Nome Cognome --}}
                <h3>
                    @if(optional($medico->profile)->genere === 'maschio')
                        Dott. {{$medico->cognome}} {{$medico->nome}}
                    @else
                        Dott.ssa {{$medico->cognome}} {{$medico->nome}}
                    @endif
                </h3>
                {{-- End Doc Nome Cognome --}}

                {{-- Specializzazioni --}}

                <div class="specializzazioni_medico_profilo">
                    @if (count($medico->Specializzaziones) > 0 )
                        @foreach ($medico->Specializzaziones as $specializzazione)
                        <span class="badge badge-pill badge-light" style="font-size: 18px;color: rgb(44, 44, 44); background-color: #53e2ba;"><strong>{{$specializzazione->descrizione}}</strong></span>                      
                        @endforeach
                        @else
                        N/a
                    @endif
                </div>
                {{-- End Specializzazioni --}}

                <div class="dati_specifici_medico_profilo">
                    <div><strong>CITT&Agrave;: </strong>{{optional($medico->profile)->città}}</div>
                    <div><strong>INDIRIZZO: </strong>{{$medico->indirizzo}}</div>
                    <div class="email_show"><strong>EMAIL: </strong>{{$medico->email}}</div>
                    <div><strong>CONTATTO TELEFONICO: </strong>{{optional($medico->profile)->cellulare}}</div>
                    <div><strong>P.IVA: </strong>{{optional($medico->profile)->piva}}</div>
                </div>
                
                <div class="disabilita_medico_profilo">
                    @if(optional($medico->profile)->disabilità == true)
                        <strong>Disability Friendly On <i class="far fa-grin-squint" style="color:#53e2ba"></i></strong>
                    @else
                        <strong>Disability Friendly Off <i class="far fa-dizzy" style="color: red"></i></strong>
                    @endif
                </div>

                 <!-- prestazioni medico -->
            <div class="card prestazioni_medico_profilo" style="max-width: 36rem;">
                <div class="card-header"><h5 class="card-title">Prestazioni</h5></div>
                <div class="card-body">
                    @if (count($medico->prestaziones) > 0 )
                    <ul class="list-unstyled">
                        @foreach ($medico->prestaziones as $prestazione)
                            <li>
                                <span class="badge badge-pill badge-light" style="font-size: 0.8rem;"><strong>{{$prestazione->nome}}  <i class="fas fa-euro-sign px-2"></i > {{$prestazione->prezzo}}</strong></span>  
                                <span class="badge badge-pill badge-light" style="font-size: 0.8rem;"><strong>
                                    @if ($prestazione->disabilità)
                                        Disability Friendly  <i class="fas fa-thumbs-up"></i>
                                    @endif
                                </strong></span> 
                            </li>
                        @endforeach
                        @else
                            N/a
                        @endif
                    </ul>
                </div>
            </div>
            <!-- /prestazioni medico -->
            </div>
            <!-- /dati medico -->
            
        </div>
        <div class="middle_medico_profilo d-flex">
            <!-- biografia medico -->
            <div class="bio_medico_profilo">
                <div><strong>BIOGRAFIA:<br> </strong>{!!optional($medico->profile)->bio!!}</div>                        
            </div>
            <!-- /biografia medico -->    
        </div>

        <div class="container_recensioni_medico_profilo d-flex">
            @foreach ($medico->ratings as $rating)
            <div class="card_recensioni_medico_profilo">
                <strong>{{$rating->nome_utente}}</strong><br>
                <small>VOTO: {{$rating->voto}}</small>
                <div class="corpo_recensione">{{$rating->body}}</div>
            </div>
            @endforeach
        </div>
      
        <div class="form_medico_profilo d-flex">
            <!-- form -->
                @include('_partials.central.form-messaggi')
                @include('_partials.central.form-recensioni')
            <!-- /form -->
        </div>
    </div>
</div>
