{{-- <div>
  <div id="app">
    <carousel-component>

          <div id="container">
            <div id="example"></div>
          </div>
  </div>

  <script>
      const buildSlideMarkup = (count) => {
          let slideMarkup = '';
      for (var i = 1; i <= count; i++) {
          slideMarkup += '<slide><span class="label">' + i + '</span></slide>'
      }
      return slideMarkup;
      };

      new Vue({
          el: '#example',
      components: {
          'carousel': VueCarousel.Carousel,
          'slide': VueCarousel.Slide
      },
      template: '<div><carousel :navigationEnabled="true">' + buildSlideMarkup(10) + '</carousel></div>'
      });
  </script>

  <style>
      #container {
    padding: 0 60px;
  }

  .VueCarousel-slide {
    position: relative;
    background: #42b983;
    color: #fff;
    font-family: Arial;
    font-size: 24px;
    text-align: center;
    min-height: 100px;
  }

  .label {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
  }
  </style>
</div> --}}

<div class="card_ricerca_rapida ">
  <div class="container_card d-flex justify-content-between owl-carousel owl-theme ">
    {{-- @foreach ($collection as $item) --}}
    <div class="card_specializzazione card">
        <div class="d-flex justify-content-center flex-column">
            <img src="{{ asset('/img/logo.jpeg')}}" alt="">
            <small>Specializzazione</small>
        </div>
    </div>
    {{-- @endforeach --}}
    
    {{-- Eliminare --}}
        <div class="card_specializzazione card"><div class="d-flex justify-content-center flex-column"><img src="{{ asset('/img/logo.jpeg')}}" alt=""><small>Specializzazione</small></div></div>
        <div class="card_specializzazione card"><div class="d-flex justify-content-center flex-column"><img src="{{ asset('/img/logo.jpeg')}}" alt=""><small>Specializzazione</small></div></div>
        <div class="card_specializzazione card"><div class="d-flex justify-content-center flex-column"><img src="{{ asset('/img/logo.jpeg')}}" alt=""><small>Specializzazione</small></div></div>
        <div class="card_specializzazione card"><div class="d-flex justify-content-center flex-column"><img src="{{ asset('/img/logo.jpeg')}}" alt=""><small>Specializzazione</small></div></div>
        <div class="card_specializzazione card"><div class="d-flex justify-content-center flex-column"><img src="{{ asset('/img/logo.jpeg')}}" alt=""><small>Specializzazione</small></div></div>
        <div class="card_specializzazione card"><div class="d-flex justify-content-center flex-column"><img src="{{ asset('/img/logo.jpeg')}}" alt=""><small>Specializzazione</small></div></div>
        <div class="card_specializzazione card"><div class="d-flex justify-content-center flex-column"><img src="{{ asset('/img/logo.jpeg')}}" alt=""><small>Specializzazione</small></div></div>
        <div class="card_specializzazione card"><div class="d-flex justify-content-center flex-column"><img src="{{ asset('/img/logo.jpeg')}}" alt=""><small>Specializzazione</small></div></div>
        <div class="card_specializzazione card"><div class="d-flex justify-content-center flex-column"><img src="{{ asset('/img/logo.jpeg')}}" alt=""><small>Specializzazione</small></div></div>
    {{-- Eliminare --}}

  </div>
</div>


{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.green.min.css"/>
<script>
  jQuery(document).ready(function($){
    $('.container_card').owlCarousel({
      loop:true,
      margin:10,
      nav:false,
  //    autoplay:true,
  //    autoplayHoverPause:true,
  //    autoplayTimeout:3000,
      responsive:{
        0:{
          items:1
        },
        500:{
          items:2
        },
        768:{items:3},
        // 769:{items:3},
        900:{items:3},
        1100:{items:4},
        1400:{items:6},
        2000:{items:8}
      }
    })
  })
</script>


{{-- DA TESTARE 
autoplay
    Type: Boolean
    Default: false
    desc: Autoplay.

autoplayTimeout
    Type: Number
    Default: 5000
    Desc: Autoplay interval timeout.

autoplayHoverPause
    Type: Boolean
    Default: false
    Desc: Pause on mouse hover.

smartSpeed
    Type: Number
    Default: 250
    Desc: Speed Calculate. More info to come..

fluidSpeed
    Type: Boolean
    Default: Number
    Desc: Speed Calculate. More info to come..

autoplaySpeed
    Type: Number/Boolean
    Default: false
    Desc: autoplay speed.

navSpeed
    Type: Number/Boolean
    Default: false
    Desc: Navigation speed.

dotsSpeed
    Type: Boolean
    Default: Number/Boolean
    Desc: Pagination speed.

dragEndSpeed
    Type: Number/Boolean
    Default: false
    Desc: Drag end speed. 

animateOut
    Type: String/Boolean
    Default: false
    Desc: Class for CSS3 animation out.

animateIn
    Type: String/Boolean
    Default: false
    Desc: Class for CSS3 animation in.
--}}
