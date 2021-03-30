<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    {{-- cdn fontawesome --}}
    <script src="https://kit.fontawesome.com/fc3e9057b4.js" crossorigin="anonymous"></script>

    {{-- Cdn jQuerry --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    {{-- Cdn Popper --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.green.min.css" />



    <!-- Styles -->
    <link href="{{ asset('css/guest/app.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        <header>
            @include('guest.navbar')
        </header>

        @yield('content')
    </div>


    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        //Hamburger
        $(document).ready(function() {
            $('.first-button').on('click', function() {

                $('.animated-icon1').toggleClass('open');
            });
            $('.second-button').on('click', function() {

                $('.animated-icon2').toggleClass('open');
            });
            $('.third-button').on('click', function() {

                $('.animated-icon3').toggleClass('open');
            });
        });
        // End Hamburger
        // Carousel specializzazioni
        jQuery(document).ready(function($) {
            $('.container_card').owlCarousel({
                loop: true,
                margin: 10,
                nav: false,
                //autoplay:true,
                //autoplayHoverPause:true,
                //autoplayTimeout:3000,
                responsive: {
                    0: {
                        items: 1
                    },
                    500: {
                        items: 2
                    },
                    768: {
                        items: 3
                    },
                    // 769:{items:3},
                    900: {
                        items: 3
                    },
                    1100: {
                        items: 4
                    },
                    1400: {
                        items: 6
                    },
                    2000: {
                        items: 8
                    }
                }
            })
        })
        // Carousel Sponsorizzati 
        jQuery(document).ready(function($) {
            $('.card_container_sponsorizzati').owlCarousel({
                loop: true,
                margin: 10,
                nav: false,
                //autoplay:true,
                //autoplayHoverPause:true,
                //autoplayTimeout:3000,
                responsive: {
                    0: {
                        items: 1
                    },
                    575: {
                        items: 1
                    },
                    768: {
                        items: 2
                    },
                    769: {
                        items: 2
                    },
                    900: {
                        items: 2
                    },
                    1100: {
                        items: 3
                    },
                    1400: {
                        items: 4
                    },
                    2000: {
                        items: 5
                    }
                }
            })
        })
        // Carousel our_team
        jQuery(document).ready(function($) {
            $('.container_team').owlCarousel({
                loop: true,
                margin: 10,
                nav: false,
                //autoplay:true,
                //autoplayHoverPause:true,
                //autoplayTimeout:3000,
                responsive: {
                    0: {
                        items: 1
                    },
                    575: {
                        items: 2
                    },
                    768: {
                        items: 3
                    },
                    769: {
                        items: 3
                    },
                    900: {
                        items: 4
                    },
                    1200: {
                        items: 5
                    },
                }
            })
        })

        // Carousel recensioni_medico
        jQuery(document).ready(function($) {
            $('.container_recensioni_medico_profilo').owlCarousel({
                loop: true,
                margin: 10,
                nav: false,
                //autoplay:true,
                //autoplayHoverPause:true,
                //autoplayTimeout:3000,
                responsive: {
                    0: {
                        items: 1
                    },
                    575: {
                        items: 2
                    },
                    768: {
                        items: 3
                    },
                    769: {
                        items: 3
                    },
                    900: {
                        items: 4
                    },
                    1200: {
                        items: 5
                    },
                }
            })
        })


        

    </script>
</body>

</html>
