@extends('layouts.dashboard')

@section('content')
  <div id="ciao" class="d-flex justify-content-center align-items-center">        
    <!-- container bianco -->
    <div class="main_white card d-flex flex-row">
      @include('_partials.left-side-bar')
      <nav id="prestazioni" class="d-flex flex-column">
          <div class="bottom d-flex flex-row">
            <div class="bottom_left d-flex justify-content-around flex-column">      
              <h1>Prestazioni 
                @if (optional(Auth::user()->profile)->genere)
                    @if (optional(Auth::user()->profile)->genere == 'femmina')
                      <span>della Dott.ssa </span>
                    @else
                      <span>del Dott.</span> 
                    @endif
                    {{Auth::user()->cognome}} {{Auth::user()->nome}}
                @endif
                <i class="fas fa-user-md" style="font-size: 2.2rem;"></i>
              </h1>
              @include('Medico.Prestazioni.create_2')        
              <div class="container">
                <div class="row container">
                  <div class="col-sm-12">  
                    <div class="col-sm-12">
                      @if(session()->get('success'))
                        <div class="alert alert-success">
                          {{ session()->get('success') }}  
                        </div>
                      @endif
                    </div>
                    {{-- <div>
                      <a class="btn_prest btn btn-primary" href="{{route('medico.prestazione.create')}}" role="button">Nuova Prestazione</a> 
                    </div>  --}}         
                    @foreach($medico->prestaziones as $prestazione)
                      <div class="tab_wrap my-4">
                        <table class="table table-striped">
                          <thead class="thead-dark">
                            <tr>
                              <th>ID</th>
                              <th>Nome</th>
                              <th>Tipo</th>
                              <th>Prezzo</th>
                              <th>Descrizione</th>
                              <th>Created</th>
                              <th>Updated</td>
                              <th colspan = 3>Actions</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>{{$prestazione->id}}</td>
                              <td><span class="text-capitalize">{{$prestazione->nome}}</span></td>
                              <td><span class="text-capitalize">{{$prestazione->tipo}}</span></td>
                              <td><span class="text-capitalize">{{$prestazione->prezzo}}</span></td>
                              <td>
                                <div class="body_text text-truncate">
                                  <p class="d-inline-block text-truncate" style="max-width: 150px; ver">
                                    {{$prestazione->descrizione}}
                                    </p>
                                </div>
                              </td>
                              <td>{{$prestazione->created_at}}</td>
                              <td>{{$prestazione->updated_at}}</td>
                              <td>
                                <a href="{{ route('medico.prestazione.edit',$prestazione->id)}}" class="btn btn-info"><i class="far fa-eye"></i></a>
                              </td>
                              <td>
                                <form action="{{ route('medico.prestazione.destroy', $prestazione->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit"><i class="fas fa-bomb"></i></button>
                                </form>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    @endforeach
                  <div>
                </div>
              </div>
              {{-- tabella riepilogativa prestazioni --}}
            </div>
        </div>    
      </nav>      
    </div>
    <!-- /container bianco -->      
  </div>
@endsection