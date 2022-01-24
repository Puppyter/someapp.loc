<template>
    <div class="container">
    <form ref="newOffer" enctype="multipart/form-data">
        <div class="row">
            </div>
            <div class="card mb-3 text-white" style="width: 59em; background-color:rgba(34,30,50,0.5); margin-top: 1em">
                <h4>General Information</h4>
                <div class="row">
                    <div class="col">
                        <h5 class="">Brand</h5>
                        <div class="col input-group mb-3">
                            <select class="form-select text-white-50 border-dark" style="background-color:rgba(34,30,50,0.5);  font-size: 18px" @change="getAll" v-model="manufactureId">
                                <option v-for="manufacture in manufactures" :value="manufacture.id">{{manufacture.name}}</option>
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <h5>Model</h5>
                        <div class="col input-group mb-3">
                            <select class="form-select text-white-50 border-dark" style="background-color:rgba(34,30,50,0.5);  font-size: 18px" @change="getBodyTypes" v-model="modelId">
                                <option v-for="model in models" :value="model.id">{{model.name}}</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <h5>Body Type</h5>
                        <div class="col input-group mb-3">
                            <select class="form-select border-dark text-white-50" style="background-color:rgba(34,30,50,0.5);  font-size: 18px" @change="getMotors" v-model="bodyTypeId">
                                <option v-for="bodyType in bodyTypes" :value="bodyType.id">{{bodyType.name}}</option>
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <h5>Motor</h5>
                        <div class="col input-group mb-3">
                            <select class="form-select border-dark text-white-50" style="background-color:rgba(34,30,50,0.5);  font-size: 18px" v-model="motorId">
                                <option v-for="motor in motors" :value="motor.id">{{motor.name}}</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <h5>Mileage</h5>
                        <div class="col input-group mb-3">
                            <input type="number" style="background-color:rgba(34,30,50,0.5); font-size: 18px" class="form-control border-dark text-white-50" v-model="mileage">
                        </div>
                    </div>
                    <div class="col">
                        <h5>Year</h5>
                        <div class="col input-group mb-3">
                            <input type="number" class="form-control border-dark text-white-50" style="background-color:rgba(34,30,50,0.5);  font-size: 18px" v-model="year">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <h5>Fuel</h5>
                        <div class="col input-group mb-3">
                            <select class="form-select text-white-50 border-dark" style="background-color:rgba(34,30,50,0.5);  font-size: 18px" @change="getModels" v-model="fuelId">
                                <option v-for="fuel in fuels" :value="fuel.id">{{fuel.name}}</option>
                            </select>
                        </div>
                    </div>
                </div>
                </div>
            <div class="card mb-3 text-white" style="width: 59em; background-color: #231f32">
            </div>
            <div class="card mb-3 text-white" style="width: 59em; background-color:rgba(34,30,50,0.5);">
                <h5 class="">Price</h5>
        <div class="col input-group mb-3">
            <input type="number" style="background-color:rgba(34,30,50,0.5);  font-size: 18px" class="form-control border-dark text-white-50" v-model="price">
        </div>
        </div>
            <div class="card mb-3 text-white" style="width: 59em; background-color: #231f32">
            </div>
            <div class="card mb-3 text-white" style="width: 59em; background-color:rgba(34,30,50,0.5); margin-top: 1em">
                <h4>Additional info</h4>
                <div class="row">
                    <div class="col">
                        <h5>Color</h5>
                        <div class="input-group mb-3">
                            <input type="text" style="background-color:rgba(34,30,50,0.5);  font-size: 18px" class="form-control border-dark text-white-50" v-model="color">
                        </div>
                    </div>
                    <div class="col">
                        <h5>Repainted</h5>
                        <div class="col input-group mb-3">
                            <select class="form-select border-dark text-white-50" style="background-color:rgba(34,30,50,0.5);  font-size: 18px" v-model="repainted">
                                <option selected :value="0">false</option>
                                <option :value="1">true</option>
                            </select>
                        </div>
                </div>
                <div class="row">
                    <div class="col">
                        <h5>Insurance</h5>
                        <div class="input-group mb-3">
                            <select class="form-select border-dark text-white-50" style="background-color:rgba(34,30,50,0.5);  font-size: 18px" v-model="insurance">
                                <option selected :value="0">false</option>
                                <option :value="1">true</option>
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <h5>Accident</h5>
                        <div class="col input-group mb-3">
                            <select class="form-select border-dark text-white-50" style="background-color:rgba(34,30,50,0.5);  font-size: 18px" v-model="accident">
                                <option selected :value="0">false</option>
                                <option :value="1">true</option>
                            </select>
                        </div>
                    </div>
                </div>
                    <div class="row">
                        <div class="col">
                            <h5>Technical condition</h5>
                            <div class="col input-group mb-3">
                                <select class="form-select border-dark text-white-50" style="background-color:rgba(34,30,50,0.5);  font-size: 18px" v-model="technicalCondition">
                                    <option selected :value="1">not crushed</option>
                                    <option :value="0">crushed</option>
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <h5>Count Owners</h5>
                            <div class="input-group mb-3">
                                <input type="number" style="background-color:rgba(34,30,50,0.5);  font-size: 18px" class="form-control border-dark text-white-50" v-model="countOwners">
                            </div>
                        </div>
                        </div>
                    </div>
            </div>
            <div class="card mb-3 text-white" style="width: 59em; background-color:rgba(34,30,50,0.5);">
            </div>
            <div class="card mb-3 text-white" style="width: 59em; background-color:rgba(34,30,50,0.5); margin-top: 1em">
                <h4>Location</h4>
                <div class="row">
                    <div class="col">
                        <h5>City</h5>
                        <div class="col input-group mb-3">
                            <input type="text" style="background-color:rgba(34,30,50,0.5);  font-size: 18px" class="form-control border-dark text-white-50" v-model="city">
                        </div>
                    </div>
                    <div class="col">
                        <h5>Region</h5>
                        <div class="col input-group mb-3">
                            <input type="text" style="background-color:rgba(34,30,50,0.5);  font-size: 18px" class="form-control border-dark text-white-50" v-model="region">
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mb-3 text-white" style="width: 59em; background-color: #231f32">
            </div>
            <div class="card mb-3 text-white" style="width: 59em; background-color:rgba(34,30,50,0.5); margin-top: 1em">
                <div class="col" style="margin-bottom: 1em">
            <h5>Description</h5>
            <textarea class="form-control border-dark text-white" style="background-color:rgba(34,30,50,0.5)" v-model="description"></textarea>
                </div>
        </div>
        <div class="card mb-3 text-white" style="width: 59em; background-color: #231f32">
        </div>
        <div class="card mb-3 text-white" style="width: 59em; background-color:rgba(34,30,50,0.5);">
            <span class="filepond h4">Images</span>
            <div class="input-group mb-3">
                <input class="filepond" type="file" ref="images" accept="image/*" multiple @input="fileUpload">
                <div class="row row-cols-3">
                <div class="col" v-for="(image,key) in images" >
                    {{image.name}}
                    <img :ref="'image' +parseInt(key)"  style="width: 200px; height: 200px; "/>
                </div>
                </div>
            </div>
        </div>
        <div class="col" style="margin-top: 1em;">
            <input type="button" class="btn text-white" style="background-color: #FD5631;  margin-bottom: 1em" value="Create" @click="uploadData">
        </div>
    </form>
    </div>
</template>

<script>
export default {
    name: "NewOffer",
    props:['userId', 'manufactures'],
    data: () => ({
        fuelId: '',
        fuels: '',
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
        //     for( let i = 0; i < uploadedFiles.length; i++ ){
        //         this.images.push( uploadedFiles[i] );
        //     }
            this.getImagePreviews();
        },
        getImagePreviews(){
            for( let i = 0; i < this.images.length; i++ ){

                if ( /\.(jpe?g|png|gif)$/i.test( this.images[i].name ) ) {

                    let reader = new FileReader();
                    reader.addEventListener("load", function(){
                        this.$refs['image'+parseInt( i )][0].src = reader.result;
                    }.bind(this), false);
                    reader.readAsDataURL( this.images[i] );
                }
            }
        },
      getAll(){
            this.getBodyTypes();
            this.getMotors();
            this.getModels();
            this.getFuels();
      },
        getFuels(){
            axios.post('/car/search/fuel', {id: this.manufactureId}, {
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                }
            })
                .then(({data}) => {
                    console.log(data)
                    this.fuels = data.fuels
                })
                .catch(error =>{
                    console.log(error.response)
                })
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
            axios.post('/car/search/bt', {id: this.manufactureId}, {
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
            axios.post('/car/search/motor', {id: this.manufactureId}, {
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
