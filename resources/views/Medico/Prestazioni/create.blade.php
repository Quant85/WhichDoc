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

                    <h1>Create a new Prestazione</h1>
                    <form action="{{route('medico.prestazione.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="nome">Nome</label>
                            <input class="form-control" type="text" name="nome" id="nome" value="{{ old('nome')}}">
                        </div>

                        @error('nome')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <div class="form-group">
                            <label for="tipo" class="labels" style="font-size: 1.25rem"> Prestazione disponibile in remoto</label>
                            <input type="checkbox" class="form-control" value="remoto" name="tipo" {{optional($medico->prestazione)->tipo === 'remoto' ? 'checked' : ''}} style="height: 25px;">
                        </div>

                        <div class="form-group">
                            <label for="tipo" class="labels" style="font-size: 1.25rem"> Prestazione disponibile in loco</label>
                            <input type="checkbox" class="form-control" value="in-loco" name="tipo" {{optional($medico->prestazione)->tipo === 'in-loco' ? 'checked' : ''}} style="height: 25px;">
                        </div>
                        @error('tipo')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        

                        <div class="form-group">
                            <label for="prezzo">Prezzo prestazione</label>
                            <input class="form-control" type="number" name="prezzo" id="prezzo" value="{{ old('prezzo')}}">
                        </div>
                        @error('prezzo')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror


                        <div class="form-group">
                            <label for="descrizione">descrizione prestazione</label>
                            <input class="form-control" type="textarea" name="descrizione" id="descrizione" value="{{ old('descrizione')}}">
                        </div>
                        @error('descrizione')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

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
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>    
        </nav>      
    </div>
    <!-- /container bianco -->      
</div>
@endsection