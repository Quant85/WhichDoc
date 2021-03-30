<div id="form_message" class="bottom_right_bottom">
    <h5>Contatta</h5>
    <form action="{{route('message.store',$medico->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form_input_message">                        
            <!-- nome -->
            <!-- <label for="nome_paziente"><strong>NOME</strong></label> -->
            <input for="nome_paziente" id="nome_paziente" type="text" class="form-control" name="nome_paziente"  required autocomplete="nome_paziente" autofocus placeholder="Nome/Cognome"
            value="{{ old('nome_paziente')}}">
        </div>
        @error('nome_paziente')
                <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="form_input_message">
            <!-- email -->
            <!-- <label for="email"><strong>EMAIL</strong></label> -->
            <input for="email" id="email" type="email" class="form-control" name="email" autocomplete="email" autofocus placeholder="Email"
            value="{{ old('nome_paziente')}}" required>
        </div>

        @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="form_input_message">
            <!-- numero cellulare -->
            <!-- <label for="cellulare"><strong>NUMERO DI TELEFONO</strong></label> -->
            <input id="cellulare" type="text" class="form-control" name="cellulare" autocomplete="cellulare" autofocus placeholder="N.Tel."
            value="{{ old('cellulare')}}">
        </div>

        @error('cellulare')
                <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <!-- testo -->
        <!-- <label for="testo_messaggio"><strong>MESSAGGIO</strong></label> -->
        <textarea class="form-control" name="testo_messaggio" id="testo_messaggio" rows="1" placeholder="Inserisci il messaggio" required>{{ old('testo_messaggio')}}</textarea>

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
