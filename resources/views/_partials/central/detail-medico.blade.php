<div id="profilo_medico">
    <div class="profilo_container d-flex justify-content-center flex-column">
        <div class="dati_medico">
            <div class="a_container d-flex justify-content-center">
                <!-- immagine medico -->
                <div class="img_medico_profilo">
                    <img src="{{optional($medico->profile)->foto ? asset( 'storage/'.$medico->profile->foto) : asset('img/default/dottori.jpg') }}" alt="foto profilo">
                </div>
                <!-- /immagine medico -->
        
                <div class="middle_medico_profilo d-flex">
                    
                    <!-- biografia medico -->
                    <div class="bio_medico_profilo d-flex justify-content-between flex-column">
                        <div class="name d-flex justify-content-center">
                            {{-- Doc Nome Cognome --}}
                            <h2 class="text-uppercase">
                                @if(optional($medico->profile)->genere === 'maschio')
                                    <span>Dott.</span> 
                                    <span>{{$medico->cognome}}</span>
                                    <span>{{$medico->nome}}</span>
                                @else
                                    <span>Dott.</span> 
                                    <span>{{$medico->cognome}}</span>
                                    <span>{{$medico->nome}}</span>
                                @endif
                            </h2>
                            {{-- End Doc Nome Cognome --}}
                        </div>
                        <div class="dati_specifici_medico_profilo">
                            <ul>
                                <li>Email<span>{{$medico->email}}</span></li>
                                <li>Telefono<span>{{optional($medico->profile)->cellulare}}</span></li>
                                <li>Partita iva<span>{{optional($medico->profile)->piva}}</span></li>
                                <li>Indirizzo
                                    <span>{{$medico->indirizzo}}</span>
                                    <span>{{optional($medico->profile)->città}}</span>
                                </li>
                            </ul>
                        </div>
                        <div>
                            <h5><strong>Biografia</strong></h5>
                            {!!optional($medico->profile)->bio!!}
                        </div>                        
                    </div>
                    <!-- /biografia medico -->    
                </div>
                    {{-- Specializzazioni --}}

                <div class="specializzazioni_medico_profilo ">
                    <div class="special_container d-flex flex-column">
                        @if (count($medico->Specializzaziones) > 0 )
                            @foreach ($medico->Specializzaziones as $specializzazione)
                                <span class="badge badge-pill badge-info">
                                    {{$specializzazione->descrizione}}
                                </span>                      
                            @endforeach
                        @else
                            <span class="badge badge-pill badge-info"><small>Il medico non ha inserito specializzazioni</small></span>
                        @endif
                        
                    </div>
                </div>
                {{-- End Specializzazioni --}}
            </div>
        </div>
        <div class="b_container">
                <!-- prestazioni medico -->
                    <div class="sfondo">
                        <div class="card prestazioni_medico_profilo">
                            <div class="card-header"><h5 class="card-title">Prestazioni</h5></div>
                            <div class="card-body">
                                @if (count($medico->prestaziones) > 0 )
                                <ul class="list-unstyled">
                                    @foreach ($medico->prestaziones as $prestazione)
                                        <li>
                                            <span class="badge badge-pill badge-light" style="font-size: 0.8rem;"><strong>{{$prestazione->nome}}  <i class="fas fa-euro-sign px-2"></i > {{$prestazione->prezzo}}</strong></span>  
                                            <span class="badge badge-pill badge-light" style="font-size: 0.8rem;"><strong>
                                                @if ($prestazione->disabilità)
                                                    Disability Friendly  
                                                    <i class="fas fa-thumbs-up"></i>
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
                    </div>
                    <!-- /prestazioni medico -->
            <div class="form_m_r">
                <div class="form_medico_profilo d-flex">
                    <!-- form -->
                    @include('_partials.central.form-messaggi')
                        @include('_partials.central.form-recensioni')
                    <!-- /form -->
                </div>
            </div>
        </div>
        <div class="c_container">
            <div class="container_recensioni">
                <div class="container_recensioni_medico_profilo d-flex justify-content-around owl-carousel owl-theme">
                    @foreach ($medico->ratings as $rating)
                        <div id="accordion{{$rating->id}}" class="pordue">
                            <div class="card">
                                <div class="card-header" id="headingOne{{$rating->id}}">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne{{$rating->id}}" aria-expanded="true" aria-controls="collapseOne{{$rating->id}}">
                                            {{$rating->nome_utente}} {{$rating->voto}}
                                        </button>
                                    </h5>
                                </div>

                                <div id="collapseOne{{$rating->id}}" class="collapse show" aria-labelledby="headingOne{{$rating->id}}" data-parent="#accordion{{$rating->id}}">
                                    <div class="card-body">
                                        {{$rating->body}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        @include('guest.footer')
    </div>
</div>