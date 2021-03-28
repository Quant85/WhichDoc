<div class="our_team">
    <div class="container_team d-flex flex-wrap justify-content-around owl-carousel owl-themes">
        <div class="card_foto flex-column justify-content-around ">
            <div class="foto_cerchi">
                <div class="elisse_1"></div>
                <div class="elisse_2"></div>
                <img class="foto_cerchio" src="{{ asset('/img/logo.jpeg')}}" alt="">
                <div class="elisse_3"></div>
                <div class="elisse_4"></div>
            </div>
            <div class="desc">Lorem ipsum dolor</div>
        </div>

        <div class="card_foto flex-column justify-content-around">
            <div class="foto_cerchi">
                <div class="elisse_1"></div>
                <div class="elisse_2"></div>
                <img class="foto_cerchio" src="{{ asset('/img/logo.jpeg')}}" alt="">
                <div class="elisse_3"></div>
                <div class="elisse_4"></div>
            </div>
            <div class="desc">Lorem ipsum dolor</div>
        </div>

        <div class="card_foto flex-column justify-content-around">
            <div class="foto_cerchi">
                <div class="elisse_1"></div>
                <div class="elisse_2"></div>
                <img class="foto_cerchio" src="{{ asset('/img/logo.jpeg')}}" alt="">
                <div class="elisse_3"></div>
                <div class="elisse_4"></div>
            </div>
            <div class="desc">Lorem ipsum dolor</div>
        </div>

        <div class="card_foto flex-column justify-content-around">
            <div class="foto_cerchi">
                <div class="elisse_1"></div>
                <div class="elisse_2"></div>
                <img class="foto_cerchio" src="{{ asset('/img/logo.jpeg')}}" alt="">
                <div class="elisse_3"></div>
                <div class="elisse_4"></div>
            </div>
            <div class="desc">Lorem ipsum dolor</div>
        </div>

        <div class="card_foto flex-column justify-content-around">
            <div class="foto_cerchi">
                <div class="elisse_1"></div>
                <div class="elisse_2"></div>
                <img class="foto_cerchio" src="{{ asset('/img/logo.jpeg')}}" alt="">
                <div class="elisse_3"></div>
                <div class="elisse_4"></div>
            </div>
            <div class="desc">Lorem ipsum dolor</div>
        </div>
    </div>
</div>



<script>
  jQuery(document).ready(function($){
    $('.container_team').owlCarousel({
      loop:true,
      margin:10,
      nav:false,
  //    autoplay:true,
  //    autoplayHoverPause:true,
  //    autoplayTimeout:3000,
      responsive:{
        0:{items:1},
        575:{items:2},
        768:{items:3},
        769:{items:3},
        900:{items:4},
        1200:{items:5},
      }
    })
  })
</script>