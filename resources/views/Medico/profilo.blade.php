@extends('layouts.dashboard')

@section('content')
<div id="ciao" class="d-flex justify-content-center align-items-center">        
  <!-- container bianco -->
  <div class="main_white card d-flex flex-row">
    
    @include('_partials.left-side-bar')        
    <nav class="d-flex flex-column">
      <div class="top d-flex flex-row">
        <div class="top_left"></div>
        <div class="top_right"></div>
      </div>
      
      <div class="bottom d-flex flex-row">
        <div class="bottom_left d-flex justify-content-around flex-column">
          <form action="{{route('medico.profilo.update',$medico->id)}}" method="post" enctype="multipart/form-data">
            @method('PATCH') 
            @csrf
            {{-- <div class="bottom_left_header"></div> --}}
            <div class="bottom_left_header">  
              <h4 class="text-right">Profile Settings</h4>
                    <div class="">                        
                      <div class="">
                        <label for="nome" class="labels">Nome</label>
                        <input type="text" name="nome" class="form-control" placeholder="first name" value="{{old('nome') ? old('nome') : $medico->nome}}">
                      </div>
                      @error('nome')
                      <div class="alert alert-danger">{{ $message }}</div>
                      @enderror

                      <div class="">
                        <label for="cognome" class="labels">Cognome</label>
                        <input type="text" name="cognome" class="form-control" value="{{old('cognome') ? old('cognome') : $medico->cognome}}" placeholder="surname">
                      </div>
                      @error('cognome')
                      <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>

                    <div class="EMAIL">
                      <div class="EMAIL">
                        <label for="email" class="labels">Email</label>
                        <input type="text" name="email" class="form-control" value="{{old('email') ? old('email') : $medico->email}}" placeholder="email">
                      </div>
                      @error('email')
                      <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>

                    <div class="CELLULARE">
                      <div class="CELLULARE">
                        <label for="cellulare"  class="labels">Contact Number</label>
                        <input type="text" name="cellulare" class="form-control" value="{{old('cellulare') ? old('cellulare') : optional($medico->profile)->cellulare}}" placeholder="number">
                      </div>
                      @error('cellulare')
                      <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>

                    <div class="INDIRIZZO">
                      <div class="INDIRIZZO">
                        <label for="indirizzo" class="labels">Indirizzo</label>
                        <input type="text" name="indirizzo" class="form-control" value="{{old('indirizzo') ? old('indirizzo')  : $medico->indirizzo}}" placeholder="address">
                      </div>
                      @error('indirizzo')
                      <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>

                    <div class="CITTA">
                      <div class="CITTA">
                        <label for="città" class="labels">Città</label>
                        <input type="text" name="città" class="form-control" value="{{old('città') ? old('città') : optional($medico->profile)->città}} " placeholder="address">
                      </div>
                      @error('città')
                      <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>

                    <div class="PARTITA-IVA">
                      <div class="PARTITA-IVA">
                        <label for="piva" class="labels">PIVA</label>
                        <input type="text" name="piva" class="form-control" value="{{old('piva') ? old('piva') : optional($medico->profile)->piva}}" placeholder="address">
                      </div>
                      @error('piva')
                      <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>

                    <div class="GENERE">
                      <h4>Genere</h4>
                      <label for="genere" class="labels"><i class="fas fa-male"></i> Uomo</label>
                      <input type="radio" class="form-control" value="maschio" name="genere" {{optional($medico->profile)->genere === 'maschio' ? 'checked' : ''}}>
                      <label for="genere" class="labels"><i class="fas fa-female"></i> Donna </label>
                      <input type="radio" id="donna" class="form-control" value="femmina" name="genere" {{optional($medico->profile)->genere === 'femmina' ? 'checked' : ''}}>
                    </div>
                    @error('genere')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror


                    <div class="DISABILITA">
                      <label for="disabilità">Attenzione alle disabilità:</label>
                      <input type="checkbox" name="disabilità" class="switch-input" value="1" {{ optional($medico->profile)->disabilità === 1 ? 'checked="checked"' : '' }}/>
                    </div>
                    @error('disabilità')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror




                    <div class="CV">
                      <label for="cv"><i class="fas fa-file-pdf"style="font-size: 40px; color: blue; margin-top: 20px; cursor: pointer;" title="Carica il tuo cv"></i></label>
                      <input type="file" class="form-control-file" name="cv" id="cv" placeholder="cerca" accept="{{-- image/*, --}}.pdf" aria-describedby="cvHelper" style="opacity: 0; position: absolute; z-index: -1;">
                      <small id="cvHelper" class="form-text text-muted">Carica il tuo cv.pdf/img</small>
                    </div>
                    @error('cv')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                        


                    <div class="form-group">
                      <label for="bio">Bio:</label>
                      <textarea id="bio" class="form-control " name="bio" cols="50" rows="10">{{old('bio') ? old('bio') : optional($medico->profile)->bio}}</textarea>
                    </div>
                    @error('bio')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                <div class="col-md-12 d-flex justify-content-center align-items-center p-3">
                  <button type="submit" class="btn btn-primary d-flex justify-content-center"><i class="fas fa-sign-in-alt px-3"></i><i class="fas fa-user"></i></button>
                </div>
              </div>
              <div class="bottom_left_footer"></div>
            </div>
          

          <div class="bottom_right d-flex flex-column">

            <div class="bottom_right_top">
              @if (optional($medico->profile)->foto)
                <img src="{{asset( 'storage/'.$medico->profile->foto)}}" alt="foto profilo"style="width: 150px; border-radius:10px">              
              @else
                <img class="" src={{asset('img/default/dottori.jpg')}}>
              @endif

              <div class="form-group">
                <label for="foto"><i class="far fa-images" title="Carica immagine profilo"></i></label>
                <input type="file" class="form-control-file" name="foto" id="foto" placeholder="cerca" aria-describedby="fotoHelper">
                <small id="fotoHelper" class="form-text text-muted">Carica la tua foto profilo</small>
              </div>
              @error('foto')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror


              <div class="form-group row">
                <label for="specializzazione" class="col-md-4 col-form-label text-md-right">{{ __('Specializzazione') }}</label>
                <div class="col-md-6">
                  @if (count($specializzazioni)>0)
                      <select class="form-control" name="specializzazione[]" id="specializzazine" multiple>
                      <option value="null" disabled></option>
                      @foreach ($specializzazioni as $specializzazione)
                          <option value="{{$specializzazione->id}}">{{$specializzazione->descrizione}}</option>    
                      @endforeach
                      </select>
                  @endif


                  @error('specializzazione')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
              </div>
            </div>
            <div class="prestazioni">
              <a name="" id="" class="btn btn-primary" href="{{route('medico.prestazione.create')}}" role="button">Nuova Prestazione</a>  
              <a name="" id="" class="btn btn-primary" href="{{route('medico.prestazione.index')}}" role="button">Riepilogo Prestazioni</a>    
            </div>

            <div class="bottom_right_bottom">
              @if ($errors->any())
              <div class="alert alert-danger">
                <ul>
                  @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
              @endif
            </div>
          </div>
          
        </form>
          
      </div>
    </div>
  </nav>      
    <!-- /container bianco -->      
  </div>
@endsection