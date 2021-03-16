@extends('layouts.dashboard')

@section('content')

<div class="container main_white align-items-start card d-flex flex-row mt-5">
  @include('_partials.left-side-bar')

@if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
    <br/>
  @endif
  <div class="edit-right-content">
  <form action="{{route('medico.profilo.update',$medico->id)}}" method="post" enctype="multipart/form-data">
    
    @method('PATCH') 
    @csrf
    <div class="container rounded bg-white mt-5 mb-5">
      <div class="row">
        <div class="col-md-3 border-right">
          <div class="d-flex flex-column align-items-center text-center p-3 py-5">

            <img src="{{optional($medico->profile)->foto ? asset( 'storage/'.$medico->profile->foto) : asset('img/default/dottori.jpg') }}" alt="foto profilo"style="width: 350px; border-radius:10px"> 
            
            <div class="form-group">
              
              <label for="foto"><i class="far fa-images"style="font-size: 40px; color: blue; margin-top: 20px; cursor: pointer;" title="Carica immagine profilo"></i></label>
              <input type="file" class="form-control-file" name="foto" id="foto" placeholder="cerca" aria-describedby="fotoHelper" 
              style="
                opacity: 0;
                position: absolute;
                z-index: -1;">
              <small id="fotoHelper" class="form-text text-muted">Carica la tua foto profilo</small>
            </div>
            @error('foto')
              <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="form-group">
              <label for="cv"><i class="fas fa-file-pdf"style="font-size: 40px; color: blue; margin-top: 20px; cursor: pointer;" title="Carica il tuo cv"></i></label>
              <input type="file" class="form-control-file" name="cv" id="cv" placeholder="cerca" accept="{{-- image/*, --}}.pdf" aria-describedby="cvHelper" style="
                opacity: 0;
                position: absolute;
                z-index: -1;">
              <small id="cvHelper" class="form-text text-muted">Carica il tuo cv.pdf/img</small>
            </div>
            @error('cv')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

          </div>
        </div>
        <div class="col-md-5 border-right">
          <div class="p-3 py-5">
            <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="text-right">Profile Settings</h4>

          </div>
          <div class="row mt-2">
            <div class="col-md-6">
              <label for="nome" class="labels">Nome</label>
              <input type="text" name="nome" class="form-control" placeholder="first name" value="{{old('nome') ? old('nome') : $medico->nome}}">
            </div>
            @error('nome')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="col-md-6">
              <label for="cognome" class="labels">Cognome</label>
              <input type="text" name="cognome" class="form-control" value="{{old('cognome') ? old('cognome') : $medico->cognome}}" placeholder="surname">
            </div>
            @error('cognome')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="row mt-2">
            <div class="col-md-12">
              <label for="email" class="labels">Email</label>
              <input type="text" name="email" class="form-control" value="{{old('email') ? old('email') : $medico->email}}" placeholder="email">
            </div>
            @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="row mt-2">
            <div class="col-md-12">
              <label for="cellulare"  class="labels">Contact Number</label>
              <input type="text" name="cellulare" class="form-control" value="{{old('cellulare') ? old('cellulare') : optional($medico->profile)->cellulare}}" placeholder="number">
            </div>
            @error('cellulare')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="row mt-2">
            <div class="col-md-12">
              <label for="indirizzo" class="labels">Indirizzo</label>
              <input type="text" name="indirizzo" class="form-control" value="{{old('indirizzo') ? old('indirizzo')  : $medico->indirizzo}}" placeholder="address">
            </div>
            @error('indirizzo')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="row mt-2">
            <div class="col-md-12">
              <label for="città" class="labels">Città</label>
              <input type="text" name="città" class="form-control" value="{{old('città') ? old('città') : optional($medico->profile)->città}} " placeholder="address">
            </div>
            @error('città')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="row mt-2">
            <div class="col-md-12">
              <label for="piva" class="labels">PIVA</label>
              <input type="text" name="piva" class="form-control" value="{{old('piva') ? old('piva') : optional($medico->profile)->piva}}" placeholder="address">
            </div>
            @error('piva')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="row mt-2">
            <div class="col-md-4">
              <h4>Genere</h4>
              <label for="genere" class="labels" style="font-size: 1.25rem"><i class="fas fa-male"></i> Uomo</label>
              <input type="radio" class="form-control" value="maschio" name="genere" {{optional($medico->profile)->genere === 'maschio' ? 'checked' : ''}} style="height: 25px;">

              <label for="genere" class="labels" style="font-size: 1.25rem"><i class="fas fa-female"></i> Donna </label>
              <input type="radio" id="donna" class="form-control" value="femmina" name="genere" {{optional($medico->profile)->genere === 'femmina' ? 'checked' : ''}} style="height: 25px;">
            </div>
            @error('genere')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            {{-- <div class="custom-control custom-switch">
              <h4>Disability Friendly</h4>
              <input id="disabilità" type="checkbox" name="disabilità" class="custom-control-input" {{ optional($medico->profile)->disabilità === 1 ? 'checked="checked"' : '' }}/>
              <label class="custom-control-label" for="disabilità">Disability Friendl</label>
            </div>
            @error('disabilità')
              <div class="alert alert-danger">{{ $message }}</div>
            @enderror --}}

            <div class="col-md-6">
              <h4>Disability Friendly</h4>
              <label for="disabilità" class="labels" style="font-size: 1.25rem"><i class="far fa-grin-squint"></i> On</label>
              <input type="radio" class="form-control" value="1" name="disabilità" {{optional($medico->profile)->disabilità == '1' ? 'checked' : ''}} style="height: 25px;">

              <label for="disabilità" class="labels" style="font-size: 1.25rem"><i class="far fa-dizzy"></i> Off </label>
              <input type="radio" id="off" class="form-control" value="0" name="disabilità" {{optional($medico->profile)->disabilità == '0' ? 'checked' : ''}} style="height: 25px;">
            </div>
            @error('disabilità')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror       
            
          </div>
        </div>
      

      </div>
      <div class="col-md-4">
          <div class="p-3 py-5">
            <div class="d-flex flex-column justify-content-between align-items-center experience">
              <div class="row mt-2">
                <div class="form-group col-md-12">
                    <label for="bio">Bio:</label>
                    <textarea id="bio" class="form-control " name="bio" cols="50" rows="10">{{old('bio') ? old('bio') : optional($medico->profile)->bio}}</textarea>
                </div>
                @error('bio')
                  <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>
              {{-- <div class="row mt-2">
                <div class="form-group col-md-12">
                    <label for="cv">Qui potrebbe andare il form del CV:</label>
                    <textarea id="cv" class="form-control " name="cv" cols="50" rows="10">{{$medico->profile->cv}}</textarea>
                </div>
                @error('cv')
                  <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div> --}}
              <div class="form-group row">
              <label for="specializzazione" class="col-md-8 col-form-label text-md-right">{{ __('Specializzazione') }}</label>
              <div class="col-md-12">
                @if (count($specializzazioni)>0)
                    <select class="form-control" name="specializzazione[]" id="specializzazine" multiple>
                      <optgroup label="Area Medica">
                        @foreach ($specializzazioni as $specializzazione)
                            <option value="{{$specializzazione->id}}">{{$specializzazione->descrizione}}</option>    
                        @endforeach
                      </optgroup>
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
          </div>
          <div class="col-md-12 d-flex justify-content-center align-items-center p-3">
            <button type="submit" class="btn btn-primary d-flex justify-content-center"><i class="fas fa-sign-in-alt px-3"></i><i class="fas fa-user"></i></button>
    
          </div>
      </div>
    </div>
  </form>
</div>
</div>
@endsection