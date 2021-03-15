<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@include('_partials.head')

<body>
    {{-- <div id="app"></div> --}}
    <main>
        @yield('content')
    </main> 
</body>
</html>