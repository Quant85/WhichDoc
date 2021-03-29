<div id="form_recensioni">
    <h4>Lascia una recensione</h4>
        <form action="{{route('medico.recensione.store',$medico->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form_input_message">                        
                <!-- nome -->
                <!-- <label for="nome_paziente"><strong>NOME</strong></label> -->
                <input for="nome_utente" id="nome_utente" type="text" class="form-control" name="nome_utente"  required autocomplete="off" autofocus placeholder="Nome"
                value="{{ old('nome_utente')}}">
            </div>
            @error('nome_utente')
                    <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <!-- testo -->
            <!-- <label for="testo_messaggio"><strong>MESSAGGIO</strong></label> -->
            <textarea class="form-control" name="body" id="body" rows="1" placeholder="Recensione" required>{{ old('body')}}</textarea>

            @error('body')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="vote_box">
                @for ($i = 1; $i <= 5; $i++)
                <label for="voto">{{$i}} </label>
                <input type="radio" name="voto" class="switch-input" value="{{$i}}"/>
                @endfor
            </div>
            @error('voto')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <button type="submit" class="btn btn-primary">INVIO</button>
        </form>
</div>