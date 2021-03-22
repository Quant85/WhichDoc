<template>
  <div class="carousel-wrapper">
    <VueSlickCarousel v-bind="settings">
      <!-- <div v-for="i in 5" :key="i" class="img-wrapper">
        <img :src="`./${i}-200x100.jpg`" />
      </div> -->
    <div class="img-wrapper">
        <img src="https://s3-eu-west-2.amazonaws.com/muralswallpaper/product_lifestyle_images/RO0012PI30W/1-elegant-pink-rose-wallpaper-mural-simple-bedroom.jpg">
    </div>
    <div class="img-wrapper">
        <img src="https://www.muralswallpaper.com/app/uploads/elegant-pink-rose-flower-room-820x532.jpg">
    </div>
    <div class="img-wrapper">
        <img src="https://www.muralswallpaper.com/app/uploads/Green-Tropical-Plant-Wallpaper-Mural-Room-820x532.jpg">
    </div>
    <div class="img-wrapper">
        <img src="https://www.muralswallpaper.com/app/uploads/Jasmine-Bloomin-Marvellous-Wall-Mural-Room-KJ-820x532.jpg">
    </div>
    <div class="img-wrapper">
        <img src="https://www.muralswallpaper.com/app/uploads/Fiesta-Blue-Chair-820x532.jpg">
    </div>
    </VueSlickCarousel>
    
  </div>
</template>

<script>
import VueSlickCarousel from 'vue-slick-carousel'
  // optional style for arrows & dots
  import 'vue-slick-carousel/dist/vue-slick-carousel-theme.css'

export default {
    components: { VueSlickCarousel },
  data() {
    return {
     settings : {
        "focusOnSelect": true,
        "infinite": true,
        "slidesToShow": 3,
        "slidesToScroll": 1,
        "speed": 500
        }

    }
  }
}
</script>

<style scoped >
    .carousel-wrapper {
        padding: 40px;
    }
    .img-wrapper img {
        margin: auto;
        width: 200px;
        height: 100px;
        background-image: linear-gradient(gray 100%, transparent 0);
    }
</style>


