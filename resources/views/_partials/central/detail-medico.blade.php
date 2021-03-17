div
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
                        Dottor {{$medico->cognome}} {{$medico->nome}}
                    @else
                        Dottoressa {{$medico->cognome}} {{$medico->nome}}
                    @endif
                </h3>
                {{-- End Doc Nome Cognome --}}

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
            <div class="bottom_right_bottom">
            </div>
        </div>
    </div>

</nav>
