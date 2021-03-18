
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
            <div class="bottom_left_footer"></div>
        </div>
        <div class="bottom_right d-flex justify-content-around flex-column">
            <div class="bottom_right_top">
                <img src="{{optional($medico->profile)->foto ? asset( 'storage/'.$medico->profile->foto) : asset('img/default/dottori.jpg') }}" alt="foto profilo">
            </div>
            <div class="container_bottom">
                <div><strong>BIOGRAFIA: </strong>{!!optional($medico->profile)->bio!!}</div>                        
            </div>
            <div class="bottom_right_bottom form_message">
                <h3>CONTATTA IL MEDICO</h3>
                <form action="{{route('message.store',$medico->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form_input_message">                        
                        <!-- nome -->
                        <!-- <label for="nome_paziente"><strong>NOME</strong></label> -->
                        <input for="nome_paziente" id="nome_paziente" type="text" class="form-control" name="nome_paziente"  required autocomplete="nome_paziente" autofocus placeholder="Inserisci il tuo nome completo"
                        value="{{ old('nome_paziente')}}">
                    </div>
                    @error('nome_paziente')
                            <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="form_input_message">
                        <!-- email -->
                        <!-- <label for="email"><strong>EMAIL</strong></label> -->
                        <input for="email" id="email" type="email" class="form-control" name="email" autocomplete="email" autofocus placeholder="Inserisci la tua email"
                        value="{{ old('nome_paziente')}}" required>
                    </div>

                    @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="form_input_message">
                        <!-- numero cellulare -->
                        <!-- <label for="cellulare"><strong>NUMERO DI TELEFONO</strong></label> -->
                        <input id="cellulare" type="text" class="form-control" name="cellulare" autocomplete="cellulare" autofocus placeholder="Inserisci un numero di telefono"
                        value="{{ old('cellulare')}}">
                    </div>

                    @error('cellulare')
                            <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <!-- testo -->
                    <!-- <label for="testo_messaggio"><strong>MESSAGGIO</strong></label> -->
                    <textarea class="form-control" name="testo_messaggio" id="testo_messaggio" rows="3" placeholder="Inserisci il messaggio" required>{{ old('testo_messaggio')}}</textarea>

                    @error('testo_messaggio')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="disability_friendly">
                        <label for="disabilità">Dichiaro di appartenere alla legge 104/92 </label>
                        <input type="checkbox" name="disabilità" class="switch-input" value="1"/>
                    </div>
                    @error('disabilità')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <button type="submit" class="btn">INVIO</button>
                </form>
            </div>
        </div>
    </div>

</nav>
