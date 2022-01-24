<template>
  <div class="container">
          <slider animation="fade" width="550px" v-model="nextCount">
              <div v-for="image in offer.images">
              <slider-item >
                  <img :src="image.image" style="width: 100%; height: 100%">
              </slider-item>
              </div>
          </slider>
          <div class="card mb-3 bg-opacity-50 text-white" style="width: 59em; background-color: #231f32">
              <div class="card-body bg-opacity-50">
                  <span class="h4">Price:</span>
                  <p class="text-white h5">{{'$'+offer.price}}</p>
              </div>
          </div>
          <div class="card mb-3 text-white" style="width: 59em; background-color: #231f32">
              <h3 class="text-white">General Information</h3>
              <div class="card-body bg-opacity-50">
                  <div class="row">
                  <div class="col" style="margin-top: 1em">
                    <h4 class="text-white">Manufacture:  <span class="text-white-50 h5">{{offer.manufacture.name}}</span></h4>
                  </div>
                  <div class="col" style="margin-top: 1em">
                    <h4>Model:  <span class="h5 text-white-50">{{offer.model.name}}</span></h4>
                  </div>
                  </div>
                  <div class="row">
                  <div class="col" style="margin-top: 1em">
                      <h4>Motor:  <span class="h5 text-white-50">{{offer.motor.name}}</span></h4>
                  </div>
                  <div class="col" style="margin-top: 1em">
                      <h4>Body Type:  <span class="h5 text-white-50">{{offer.body_type.name}}</span></h4>
                  </div>
                  </div>
                  <div class="row">
                  <div class="col" style="margin-top: 1em">
                      <h4>Mileage:  <span class="text-white-50 h5">{{offer.mileage}}</span></h4>
                  </div>
                  </div>
              </div>
          </div>
          <div class="card mb-3 text-white" style="width: 59em; background-color: #231f32">
              <h3 class="text-white">Features</h3>
              <div class="card-body bg-opacity-50">
                  <div class="row">
                      <div class="col" style="margin-top: 1em">
                          <h4 class="text-white">Accident:
                          <span class="h5 text-white-50" v-if="offer.accident===0">Not accidents</span>
                          <span class="h5 text-white-50" v-else>Accidents</span>
                          </h4>
                      </div>
                      <div class="col" style="margin-top: 1em">
                          <h4>Insurance:
                          <span class="h5 text-white-50" v-if="offer.insurance === 0">Without insurance</span>
                          <span class="h5 text-white-50" v-else>Has insurance</span>
                          </h4>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col" style="margin-top: 1em">
                          <h4>Color:
                          <span class="h5 text-white-50">{{offer.color}}</span>
                          </h4>
                      </div>
                      <div class="col" style="margin-top: 1em">
                          <h4>Repainted:
                          <span class="h5 text-white-50" v-if="offer.repainted === 0">No Repaint</span>
                          <span class="h5 text-white-50" v-else>Repainted</span>
                          </h4>
                      </div>
                  </div>
              </div>
          </div>
          <div class="card mb-3 text-white" style="width: 59em; background-color: #231f32">
              <div class="card-body bg-opacity-50">
                  <span class="h4">Description:</span>
                  <p class="text-white h5">{{offer.description}}</p>
              </div>
          </div>
      </div>
</template>

<script>
import { Slider, SliderItem } from 'vue-easy-slider'
export default {
    name: "Offer",
    components: {
        Slider,
        SliderItem,
    },
    props: ['offer'],
    data: () => ({
        count: 0,
    }),
    methods: {
        prevCount(){
            if (this.count<this.offer.images.length) {
                this.count = this.offer.images.length;
            }
            else{
                this.count --;
            }
        },
        nextCount() {
          if (this.count>this.offer.images.length) {
              this.count = 0;
          }
          else{
              this.count ++;
          }
        },
       currentImage()
       {
           return this.offer.images[this.count].image;
       }
    }
}
</script>

<style scoped>

</style>
