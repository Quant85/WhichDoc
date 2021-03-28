<div class="sponsorizzati">
    <div class="container_sponsorizzati d-flex flex-column">
        <h2>I nostri medici</h2>
        <div class="card_container d-flex justify-content-between owl-carousel owl-theme flex-column">
            
            {{-- Card Medico sponsiorizzato --}}
            @foreach($medici as $medico)
            <div class="card card_sponsorizzato flex-row" >
                <div class="foto_medico"><img src="{{optional($medico->profile)->foto ? asset( 'storage/'.$medico->profile->foto) : asset('img/default/dottori.jpg') }}" alt="foto profilo"></div>
                <div class="dettagli">
                    <div>{{$medico->nome }}</div>
                    <div>{{$medico->cognome}}</div>
                    <div>{{$medico->specializzazione}}</div>
                    <div>{{optional($medico->profile)->città}}</div>
                    <div>*****</div>
                </div>
            </div>
            @endforeach
            {{-- End Card Medico specializzato --}}
            
        </div>

    </div>
</div>
