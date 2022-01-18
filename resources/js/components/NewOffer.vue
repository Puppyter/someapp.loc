<template>
    <div class="container">
    <form ref="newOffer" enctype="multipart/form-data">
        <div class="row">
            <div class="border">
        <div class="input-group mb-3">
            <span class="input-group-text">Images</span>
            <input type="file" ref="images" multiple @change="fileUpload">
        </div>
            </div>
            <div class="border" style="margin-top: 1em">
        <div class="col input-group mb-3">
            <span class="input-group-text">Company</span>
            <select class="form-control" @change="getModels" v-model="manufactureId">
                <option v-for="manufacture in manufactures" :value="manufacture.id">{{manufacture.name}}</option>
            </select>
        </div>
        <div class="col input-group mb-3">
            <span class="input-group-text">Price</span>
            <input type="number" class="form-control" v-model="price">
        </div>
        <div class="col input-group mb-3">
            <span class="input-group-text">Model</span>
            <select class="form-control" @change="getBodyTypes" v-model="modelId">
                <option v-for="model in models" :value="model.id">{{model.name}}</option>
            </select>
        </div>
        <div class="col input-group mb-3">
            <span class="input-group-text">Body Type</span>
            <select class="form-control" @change="getMotors" v-model="bodyTypeId">
                <option v-for="bodyType in bodyTypes" :value="bodyType.id">{{bodyType.name}}</option>
            </select>
        </div>
        <div class="col input-group mb-3">
            <span class="input-group-text">Motor</span>
            <select class="form-control" v-model="motorId">
                <option v-for="motor in motors" :value="motor.id">{{motor.name}}</option>
            </select>
        </div>
        <div class="col input-group mb-3">
            <span class="input-group-text">Mileage</span>
            <input type="number" class="form-control" v-model="mileage">
        </div>
            </div>
            <div class="border" style="margin-top: 1em">
        <div class="col input-group mb-3">
            <span class="input-group-text">Color</span>
            <input type="text" class="form-control" v-model="color">
        </div>
        <div class="col input-group mb-3">
            <span class="input-group-text">Count Owners</span>
            <input type="number" class="form-control" v-model="countOwners">
        </div>
        <div class="col input-group mb-3">
            <span class="input-group-text">Year</span>
            <input type="text" class="form-control" v-model="year">
        </div>
        <div class="col input-group mb-3">
            <span class="input-group-text">Insurance</span>
            <select class="form-control" v-model="insurance">
                <option selected :value="0">false</option>
                <option :value="1">true</option>
            </select>
        </div>
        <div class="col input-group mb-3">
            <span class="input-group-text">City</span>
            <input type="text" class="form-control" v-model="city">
        </div>
            </div>
            <div class="border" style="margin-top: 1em">
        <div class="col input-group mb-3">
            <span class="input-group-text">Region</span>
            <input type="text" class="form-control" v-model="region">
        </div>
        <div class="col input-group mb-3">
            <span class="input-group-text">Accident</span>
            <select class="form-control" v-model="accident">
                <option selected :value="0">false</option>
                <option :value="1">true</option>
            </select>
        </div>
        <div class="col input-group mb-3">
            <span class="input-group-text">Technical condition</span>
            <select class="form-control" v-model="technicalCondition">
                <option selected :value="1">not crushed</option>
                <option :value="0">crushed</option>
            </select>
        </div>
        <div class="col input-group mb-3">
            <span class="input-group-text">Repainted</span>
            <select class="form-control" v-model="repainted">
                <option selected :value="0">false</option>
                <option :value="1">true</option>
            </select>
        </div>
        <div class="col input-group mb-3">
            <span class="input-group-text">Description</span>
            <textarea class="form-control" v-model="description"></textarea>
        </div>
            </div>
        <div class="col" style="margin-top: 1em; margin-bottom: 1em">
            <input type="button" class="btn btn-primary" value="Create" @click="uploadData">
        </div>
        </div>
    </form>
    </div>
</template>

<script>
export default {
    name: "NewOffer",
    props:['userId', 'manufactures'],
    data: () => ({
        images: '',
        motors: '',
        bodyTypes: '',
        models: {},
        manufactureId: '',
        modelId: '',
        motorId: '',
        countOwners: 0,
        color: '',
        mileage: '',
        year: '',
        description: '',
        accident: 0,
        insurance: 0,
        bodyTypeId: '',
        city: '',
        region: '',
        technicalCondition: '',
        repainted: 0,
        price: 0,
    }),
    methods: {
        fileUpload(){
          this.images = this.$refs.images.files;
        },
      searchManufacture(){

      },
        getModels(){
            axios.post('/car/search/model', {by: 'manufacture', id: this.manufactureId}, {
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
        }, getBodyTypes(){
            axios.post('/car/search/bt', {by: 'model', id: this.modelId}, {
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                }
            })
                .then(({data}) => {
                    console.log(data)
                    this.bodyTypes = data.bodyTypes
                })
                .catch(error =>{
                    console.log(error.response)
                })
        },
        getMotors(){
            axios.post('/car/search/motor', {by: 'bodyType', id: this.bodyTypeId}, {
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                }
            })
                .then(({data}) => {
                    console.log(data)
                    this.motors = data.motors
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
            data.append('price', this.price);
            data.append('user_id', this.userId);
            data.append('manufacture_id', this.manufactureId);
            data.append('model_id', this.modelId);
            data.append('motor_id', this.motorId);
            data.append('count_owners', this.countOwners);
            data.append('color', this.color);
            data.append('mileage', this.mileage);
            data.append('year', this.year);
            data.append('description', this.description);
            data.append('accident', this.accident);
            data.append('insurance', this.insurance);
            data.append('body_type_id', this.bodyTypeId);
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
