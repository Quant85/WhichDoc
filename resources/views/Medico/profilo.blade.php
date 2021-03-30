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
          <div class="bottom_left d-flex justify-content-around flex-column col-8">
            <form action="{{route('medico.profilo.update',$medico->id)}}" method="post" enctype="multipart/form-data">
              @method('PATCH') 
              @csrf
              {{-- <div class="bottom_left_header"></div> --}}
              <div class="bottom_left_header"> 
                @if(session()->get('success'))
                  <div class="alert alert-success">
                    {{ session()->get('success') }}  
                  </div>
                @endif 
                @if (optional(Auth::user()->profile)->id)
                  <h2 class="text-left">Aggiorna il tuo profilo</h2>
                @else
                  <h2 class="text-left">Crea il tuo profilo</h2>
                @endif
                <div class="col-12 d-flex">                        
                  <div class="col-6">
                    <label for="nome" class="labels">Nome</label>
                    <input type="text" name="nome" class="form-control" placeholder="first name" value="{{old('nome') ? old('nome') : $medico->nome}}">
                  </div>
                  @error('nome')
                  <div class="alert alert-danger">{{ $message }}</div>
                  @enderror

                  <div class="col-6">
                    <label for="cognome" class="labels">Cognome</label>
                    <input type="text" name="cognome" class="form-control" value="{{old('cognome') ? old('cognome') : $medico->cognome}}" placeholder="surname">
                  </div>
                  @error('cognome')
                  <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>

                <div class="col-12 d-flex py-2">
                  <div class="EMAIL col-5">
                    <label for="email" class="labels">Email</label>
                    <input type="text" name="email" class="form-control" value="{{old('email') ? old('email') : $medico->email}}" placeholder="email">
                  </div>
                  @error('email')
                  <div class="alert alert-danger">{{ $message }}</div>
                  @enderror

                  <div class="CELLULARE col-3">
                    <label for="cellulare"  class="labels">Contact Number</label>
                    <input type="text" name="cellulare" class="form-control" value="{{old('cellulare') ? old('cellulare') : optional($medico->profile)->cellulare}}" placeholder="number">
                  </div>
                  @error('cellulare')
                  <div class="alert alert-danger">{{ $message }}</div>
                  @enderror

                    <div class="INDIRIZZO col-4">
                      <label for="indirizzo" class="labels">Indirizzo</label>
                      <input type="text" name="indirizzo" class="form-control" value="{{old('indirizzo') ? old('indirizzo')  : $medico->indirizzo}}" placeholder="address">
                    </div>
                    @error('indirizzo')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>


                <div class="col-12 d-flex py-2">
                  <div class="CITTA col-6">
                    <label for="città" class="labels">Città</label>
                    <input type="text" name="città" class="form-control" value="{{old('città') ? old('città') : optional($medico->profile)->città}} " placeholder="address">
                  </div>
                  @error('città')
                  <div class="alert alert-danger">{{ $message }}</div>
                  @enderror

                  <div class="PARTITA-IVA col-6">
                    <label for="piva" class="labels">PIVA</label>
                    <input type="text" name="piva" class="form-control" value="{{old('piva') ? old('piva') : optional($medico->profile)->piva}}" placeholder="address">
                  </div>
                  @error('piva')
                  <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>

                <div class="form-group col-12 p-2">
                  <label for="bio">Bio-Curriculare</label>
                  <textarea id="bio" class="ckeditor form-control " name="bio" cols="50" rows="10">{{old('bio') ? old('bio') : optional($medico->profile)->bio}}</textarea>
                </div>
                @error('bio')
                  <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <div class="col-12 d-flex justify-content-around">
                  <div class="GENERE">
                    <h4>Genere</h4>
                    <div class="d-flex">
                      <label for="genere" class="labels"><i class="fas fa-male" style="font-size: 1.8rem"></i> Uomo</label>
                      <input type="radio" class="form-control" value="maschio" name="genere" {{optional($medico->profile)->genere === 'maschio' ? 'checked' : ''}}>
                      <label for="genere" class="labels px-3"><i class="fas fa-female" style="font-size: 1.8rem"></i> Donna </label>
                      <input type="radio" id="donna" class="form-control" value="femmina" name="genere" {{optional($medico->profile)->genere === 'femmina' ? 'checked' : ''}}>
                    </div>
                  </div>
                  @error('genere')
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
  
                  <div class="DISABILITA">
                    <h4 class="py-2">Disability Friendly</h4>
                    <label class="px-2" for="disabilità"><i class="fas fa-hand-holding-heart px-3" style="font-size: 1.8rem"></i> Attenzione alle disabilità: </label>
                    <input type="checkbox" name="disabilità" class="switch-input" value="1" {{ optional($medico->profile)->disabilità === 1 ? 'checked="checked"' : '' }}/> <br>
                  </div>
                  @error('disabilità')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>
                
              </div>
              <!-- <div class="bottom_left_footer"></div> -->
            </div>

              <div class="bottom_right d-flex">
                <div class="bottom_right_top">

                  <img src="{{optional($medico->profile)->foto ? asset( 'storage/'.$medico->profile->foto) : asset('img/default/dottori.jpg') }}" alt="foto profilo">

                  <div class="form-group">
                    <label for="foto"><i class="far fa-images" title="Carica immagine profilo"></i></label>
                    <input type="file" class="form-control-file" name="foto" id="foto" placeholder="cerca" aria-describedby="fotoHelper">
                    <small id="fotoHelper" class="form-text text-muted">Carica la tua foto profilo</small>
                  </div>
                  @error('foto')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror


                  <div class="form-group col-12 select_specializzazione">
                    <label for="specializzazione" class=" col-form-label text-md-right">{{ __('Specializzazione') }}</label>
                    <div class="col-md-12">
                      @if (count($specializzazioni)>0)
                          <select class="form-control " name="specializzazione[]" id="specializzazine" multiple>
                          @foreach ($specializzazioni as $id => $specializzazione)
                            @if (old('specializzazione'))
                                <option value="{{$specializzazione->id}}" {{in_array($specializzazione->id, old('specializzazione')) ? 'selected' : ' '}}>{{$specializzazione->descrizione}} </option>    
                              @else
                                <option value="{{$specializzazione->id}}" {{$medico->Specializzaziones->contains($specializzazione->id) ? 'selected' : ' '}}>{{$specializzazione->descrizione}}</option>    
                              @endif
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
                  <div class="sub_menu_profile">
                    <nav class="nav justify-content-center d-flex flex-column">
                    <button type="submit" class="btn btn-primary m-2 d-flex justify-content-center"><i class="fas fa-sign-in-alt px-3"></i><i class="fas fa-user"></i></button>
                      <a name="" id="" class="btn btn-primary m-2" href="{{route('medico.prestazione.index')}}" role="button">Riepilogo Prestazioni</a>    
                      <a name="" id="" class="btn btn-primary m-2" href="{{route('medico.showProfile',[$medico->id])}}" role="button">Vedi Profilo</a>
                    </nav>
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
                                
              </div>
            </form>
          </div>
        </div>
      </nav>      
      <!-- /container bianco -->      
    </div>
  </div>
    <script src="//cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
  <script type="text/javascript">
      $(document).ready(function() {
        $('.ckeditor').ckeditor();
      });
  </script>
@endsection