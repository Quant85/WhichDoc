@extends('layouts.dashboard')

@section('content')            
    <div id="ciao" class="d-flex justify-content-center align-items-center">        
        <!-- container bianco -->
        <div class="main_white card d-flex flex-row">
            
            @include('_partials.left-side-bar')
            
            @include('_partials.central.detail-medico')
            
        </div>
        <!-- /container bianco -->      
    </div>
@endsection
