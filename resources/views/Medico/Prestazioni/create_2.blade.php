<div class="bottom_left d-flex justify-content-around  flex-column">      
  <div class="wrap ">
      <form class="d-flex flex-column col-12" action="{{route('medico.prestazione.store')}}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="box-1 d-flex justify-content-around">
              <div class="form-group col-4">
                  <label for="nome">Nome</label>
                  <input class="form-control" type="text" name="nome" id="nome" value="{{ old('nome')}}">
              </div>

              @error('nome')
                  <div class="alert alert-danger">{{ $message }}</div>
              @enderror
              <div class="form-group col-2">
                  <label for="prezzo">Prezzo prestazione <i class="fas fa-euro-sign"></i></label>
                  <input class="form-control" step="0.10" min="0" type="number" name="prezzo" id="prezzo" value="{{ old('prezzo')}}">
              </div>
              @error('prezzo')
                  <div class="alert alert-danger">{{ $message }}</div>
              @enderror

              <div class="form-group col-4">
                  <label for="descrizione">Descrizione</label>
                  <input class="form-control" type="textarea" name="descrizione" id="descrizione" value="{{ old('descrizione')}}">
              </div>
              @error('descrizione')
                  <div class="alert alert-danger">{{ $message }}</div>
              @enderror
          </div>

          <div class="box-2 d-flex justify-content-around">
              <div class="form-group col-2">
                  <label for="tipo" class="labels" style="font-size: 1.25rem">Remoto<i class="fas fa-phone-laptop px-2"></i></label>
                  <input type="radio" class="form-control" value="remoto" name="tipo" {{optional($medico->prestazione)->tipo === 'remoto' ? 'checked' : ''}} style="height: 25px;">
              </div>

              <div class="form-group col-2">
                  <label for="tipo" class="labels" style="font-size: 1.25rem"><i class="fas fa-phone-laptop px-2"></i>Entrambi<i class="fas fa-route px-2"></i></label>
                  <input type="radio" class="form-control" value="entrambi" name="tipo" {{optional($medico->prestazione)->tipo === 'entrambi' ? 'checked' : ''}} style="height: 25px;">
              </div>

              <div class="form-group col-2">
                  <label for="tipo" class="labels" style="font-size: 1.25rem">Loco<i class="fas fa-route px-2"></i></label>
                  <input type="radio" class="form-control" value="in-loco" name="tipo" {{optional($medico->prestazione)->tipo === 'in-loco' ? 'checked' : ''}} style="height: 25px;">
              </div>
              
              @error('tipo')
                  <div class="alert alert-danger">{{ $message }}</div>
              @enderror
          </div>
          
          <div class="col-md-12 d-flex justify-content-around pb-4">
            <div class="dis_left col-md-4 d-flex">
              <h4 class="px-2">Disability Friendly</h4>
              <label for="disabilità" class="labels px-2" style="font-size: 1.25rem"><i class="far fa-grin-squint"></i> On</label>
              <input type="radio" class="form-control" value="1" name="disabilità" {{optional($medico->profile)->disabilità == '1' ? 'checked' : ''}} style="height: 25px;">
  
              <label for="disabilità" class="labels px-3" style="font-size: 1.25rem"><i class="far fa-dizzy"></i> Off </label>
              <input type="radio" id="off" class="form-control" value="0" name="disabilità" {{optional($medico->profile)->disabilità == '0' ? 'checked' : ''}} style="height: 25px;">
              @error('disabilità')
                  <div class="alert alert-danger">{{ $message }}</div>
              @enderror       
            </div>

            <button id="nw_prestazione" type="submit" class="btn btn-primary w-25" style="font-size: 1.2rem">Crea Prestazione</button>
          </div>
      </form>
  </div>
</div>