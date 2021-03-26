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