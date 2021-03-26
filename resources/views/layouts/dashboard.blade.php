<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@include('_partials.head')

<body>
    {{-- <div id="app"></div> --}}
    <main>
        @yield('content')
    </main> 
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>

</body>
</html>