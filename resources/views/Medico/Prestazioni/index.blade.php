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

                    <main id="panel-main">
                      <div class="row container">
                        <div class="col-sm-12">
                          <h1 class="display-3">Riepilogo Prestazioni Mediche</h1>   
                          <div>
                            <a name="" id="" class="btn btn-primary" href="{{route('medico.prestazione.create')}}" role="button">Nuova Prestazione</a> 
                          </div>          
                          @foreach($medico->prestaziones as $prestazione)
                          <table class="table table-striped">
                            <thead>
                                <tr>
                                  <td>ID</td>
                                  <td>Nome</td>
                                  <td>Tipo</td>
                                  <td>Prezzo</td>
                                  <td>Descrizione</td>
                                  <td>Created</td>
                                  <td>Updated</td>
                                  <td colspan = 3>Actions</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{$prestazione->id}}</td>
                                    <td>{{$prestazione->nome}}</td>
                                    <td>{{$prestazione->tipo}}</td>
                                    <td>{{$prestazione->prezzo}}</td>
                                    <td>
                                      <textarea  cols="20" rows="2" disabled>{{$prestazione->descrizione}}
                                      </textarea>
                                    </td>
                                    <td>{{$prestazione->created_at}}</td>
                                    <td>{{$prestazione->updated_at}}</td>
                                    <td>
                                        <a href="{{ route('medico.prestazione.edit',$prestazione->id)}}" class="btn btn-primary">Edit</a>
                                    </td>
                                    <td>
                                        <form action="{{ route('medico.prestazione.destroy', $prestazione->id)}}" method="post">
                                          @csrf
                                          @method('DELETE')
                                          <button class="btn btn-danger" type="submit">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                              </tbody>
                            </table>
                            @endforeach
                        <div>
                      </div>
                      <div class="col-sm-12">

                        @if(session()->get('success'))
                          <div class="alert alert-success">
                            {{ session()->get('success') }}  
                          </div>
                        @endif
                      </div>

                    </main>
                  {{-- tabella riepilogativa prestazioni --}}
                </div>
          </div>    
        </nav>      
    </div>
    <!-- /container bianco -->      
  </div>
@endsection