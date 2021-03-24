@extends('layouts.app')

@section('content')   

<main class="content">
    @include('guest.jumbotron')
    @include('guest.ricerca')
    @include('guest.sponsorizzati')
    @include('guest.iphone_frame')
    @include('guest.statistiche')
    @include('guest.footer')
    @include('guest.our')
</main>

@endsection