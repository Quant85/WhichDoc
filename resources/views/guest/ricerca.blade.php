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
    <div class="container_card d-flex justify-content-between">
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
        {{-- Eliminare --}}

    </div>
</div>