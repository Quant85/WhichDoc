@extends('layouts.app')

@section('content')   

    <main class="content">
            <div class="search_bar">
              <search-component></search-component>
            </div>
        @include('guest.jumbotron')
        @include('guest.ricerca')
        @include('guest.sponsorizzati')
        @include('guest.iphone_frame')
        @include('guest.statistiche')
    </main>
    @include('guest.footer')
    @include('guest.our')

@endsection