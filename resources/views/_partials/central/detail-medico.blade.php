
<nav class="show_content d-flex flex-column">

    <div class="top d-flex flex-row">
        <div class="top_left"></div>
        <div class="top_right"></div>
    </div>

    <div class="bottom d-flex flex-row">
        <div class="bottom_left d-flex justify-content-around flex-column">
            <div class="bottom_left_header">
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

                <div class="badge-specializzazioni">
                    <small>Specializzazioni: </small>
                    @if (count($medico->Specializzaziones) > 0 )
                        @foreach ($medico->Specializzaziones as $specializzazione)
                        <span class="badge badge-pill badge-light" style="font-size: 0.8rem;color: rgb(44, 44, 44); background-color: rgb(27, 171, 184);"><strong>{{$specializzazione->descrizione}}</strong></span>                      
                        @endforeach
                        @else
                        N/a
                    @endif
                </div>
                {{-- End Specializzazioni --}}

                <div><strong>CITT&Agrave;: </strong>{{optional($medico->profile)->città}}</div>
                <div><strong>INDIRIZZO: </strong>{{$medico->indirizzo}}</div>
                <div class="email_show"><strong>EMAIL: </strong>{{$medico->email}}</div>
                <div><strong>CONTATTO TELEFONICO: </strong>{{optional($medico->profile)->cellulare}}</div>
                <div><strong>P.IVA: </strong>{{optional($medico->profile)->piva}}</div>
            </div>
            <div class="bottom_left_main">
                <div class="disabilita_show">
                    @if(optional($medico->profile)->disabilità == true)
                        <strong>Disability Friendly On <i class="far fa-grin-squint"></i></strong>
                    @else
                        <strong>Disability Friendly Off <i class="far fa-dizzy"></i></strong>
                    @endif
                </div>
                <div class="card text-dark bg-info mb-3" style="max-width: 36rem;">
                    <div class="card-header"><h5 class="card-title">Prestazioni</h5></div>
                    <div class="card-body">
                        
                        @if (count($medico->prestaziones) > 0 )
                        <ul class="list-unstyled">
                            @foreach ($medico->prestaziones as $prestazione)
                                <li>
                                    <span class="badge badge-pill badge-light" style="font-size: 0.8rem;color: rgb(44, 44, 44);"><strong>{{$prestazione->nome}}  <i class="fas fa-euro-sign px-2"></i > {{$prestazione->prezzo}}</strong></span>  
                                    <span class="badge badge-pill badge-light" style="font-size: 0.8rem;color: rgb(44, 44, 44);"><strong>
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
            </div>
            <div class="bottom_left_footer">
                @include('_partials.central.form-recensioni')
            </div>
        </div>
        @include('_partials.central.form-messaggi')
    </div>
</nav>
