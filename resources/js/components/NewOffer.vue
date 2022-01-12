<template>
    <form ref="newOffer" enctype="multipart/form-data">
        <div class="input-group mb-3">
            <span class="input-group-text">Images</span>
            <input type="file" ref="images" class="form-control" multiple @change="fileUpload">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text">Company</span>
            <input type="text" class="form-control" v-model="manufacture">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text">Model</span>
            <input type="text" class="form-control" v-model="model">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text">Motor</span>
            <input type="text" class="form-control" v-model="motor">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text">Mileage</span>
            <input type="number" class="form-control" v-model="mileage">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text">Color</span>
            <input type="text" class="form-control" v-model="color">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text">Count Owners</span>
            <input type="number" class="form-control" v-model="countOwners">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text">Year</span>
            <input type="text" class="form-control" v-model="year">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text">Body Type</span>
            <input type="text" class="form-control" v-model="bodyType">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text">Insurance</span>
            <select class="form-control" v-model="insurance">
                <option selected :value="0">false</option>
                <option :value="1">true</option>
            </select>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text">City</span>
            <input type="text" class="form-control" v-model="city">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text">Region</span>
            <input type="text" class="form-control" v-model="region">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text">Accident</span>
            <select class="form-control" v-model="accident">
                <option selected :value="0">false</option>
                <option :value="1">true</option>
            </select>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text">Technical condition</span>
            <select class="form-control" v-model="technicalCondition">
                <option selected value="not crushed">not crushed</option>
                <option value="crushed">crushed</option>
            </select>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text">Repainted</span>
            <select class="form-control" v-model="repainted">
                <option selected :value="0">false</option>
                <option :value="1">true</option>
            </select>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text">Description</span>
            <textarea class="form-control" v-model="description"></textarea>
        </div>
        <div class="col">
            <input type="button" class="btn btn-primary" value="Create" @click="uploadData">
        </div>
    </form>
</template>

<script>
export default {
    name: "NewOffer",
    props:['userId'],
    data: () => ({
        images: '',
        manufactures: {},
        models: {},
        manufacture: '',
        model: '',
        motor: '',
        countOwners: Number(0),
        color: '',
        mileage: '',
        year: '',
        description: '',
        accident: 0,
        insurance: 0,
        bodyType: '',
        city: '',
        region: '',
        technicalCondition: '',
        repainted: 0,
    }),
    methods: {
        fileUpload(){
          this.images = this.$refs.images.files;
        },
      carInfo(){
          const data = new FormData(this.$refs.newOffer)
          data.append('manufacture', this.manufacture)
          data.append('model', this.model)
          axios.post('/car/get/info', data, {
              headers: {
                  'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
              }
          })
              .then(({data}) => {
                  console.log(data)
                  this.manufactures = data.manufactures
              })
              .catch(error =>{
                  console.log(error.response)
              })
      },
      searchManufacture(){
          const data = new FormData(this.$refs.newOffer)
          data.append('manufacture', this.manufacture)
          axios.post('/car/search/manufacture', data, {
              headers: {
                  'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
              }
          })
              .then(({data}) => {
                  console.log(data)
                  this.manufactures = data.manufactures
              })
              .catch(error =>{
                  console.log(error.response)
              })
      },
      searchModel(){
          const data = new FormData(this.$refs.newOffer)
          data.append('manufacture', this.manufacture)
          data.append('model', this.model)
          axios.post('/car/search/model', data, {
              headers: {
                  'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
              }
          })
              .then(({data}) => {
                  console.log(data)
                  this.models = data.models
              })
              .catch(error =>{
                  console.log(error.response)
              })
      },
        uploadData(){
            const data = new FormData(this.$refs.newOffer)
            for (let i=0; i<this.images.length; i++){
                let image = this.images[i];
                data.append('images['+i+']', image)
            }
            data.append('manufacture', this.manufacture);
            data.append('model', this.model);
            data.append('motor', this.motor);
            data.append('count_owners', this.countOwners);
            data.append('color', this.color);
            data.append('mileage', this.mileage);
            data.append('year', this.year);
            data.append('description', this.description);
            data.append('accident', this.accident);
            data.append('insurance', this.insurance);
            data.append('body_type', this.bodyType);
            data.append('city', this.city);
            data.append('region', this.region);
            data.append('technical_condition', this.technicalCondition);
            data.append('repainted', this.repainted);
            axios.post('/offers/store', data, {
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'Content-Type':'multipart/form-data',
                }
            })
                .then(({data}) => {
                    console.log(data)
                    if (data.status === true) {
                        window.location.href = 'http://someapp.loc/offers/';
                    }
                })
                .catch(error =>{
                    console.log(error.response)
                })
        },
    },
}
</script>

<style scoped>

</style>
