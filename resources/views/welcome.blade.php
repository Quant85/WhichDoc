@extends('layouts.app')

@section('content')
    <header>
        @include('guest.navbar') 
    </header>
    <div class="content">
        <div class="title m-b-md">
            WhichDoc? <i class="fas fa-user-md"></i>
        </div>
        <h1>Trova lo specialista che fa al caso tuo.</h1>
        <script src="https://cdn.lordicon.com/libs/frhvbuzj/lord-icon-2.0.2.js"></script>
<lord-icon
    src="https://cdn.lordicon.com/wkutyeqr.json"
    trigger="hover"
    colors="primary:#121331,secondary:#08a88a"
    style="width:128px;height:128px">
</lord-icon>
    </div>
@endsection