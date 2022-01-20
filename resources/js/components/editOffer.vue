<template>
    <div class="container">
        <form ref="newOffer" enctype="multipart/form-data">
            <div class="row">
                <div class="col">
            <div class="row">
            </div>
            <div class="card mb-3 text-white" style="width: 59em; background-color:rgba(34,30,50,0.5); margin-top: 1em">
                <h4>General Information</h4>
                <div class="row">
                    <div class="col">
                        <h5 class="">Brand</h5>
                        <div class="col input-group mb-3">
                            <select class="form-select text-white-50 border-dark" style="background-color:rgba(34,30,50,0.5);  font-size: 18px" @change="getModels" v-model="manufacture">
                                <option selected>{{manufacture.name}}</option>
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
                    <input class="filepond" type="file" ref="images" multiple @change="fileUpload">
                </div>
            </div>
                </div>
                <div class="col">
            <div class="col" style="margin-top: 1em; margin-bottom: 1em">
                <input type="button" class="btn text-white" style="background-color: #FD5631; margin-bottom: 2em    " value="Edit" @click="uploadData">
                <div class="col">
                    <a :href="'/offer/'+this.offer.id+'/destroy'" class="btn btn-danger">Delete</a>
                </div>
            </div>
                </div>
            </div>
        </form>
    </div>
</template>

<script>
export default {
    name: "edit-offer",
    props: ['offer'],
    data: () =>({
        manufactures: '',
        manufacture: '',
        models: '',
        model: '',
        bodyType: '',
        bodyTypes: '',
        motor:'',
        motors:'',
        mileage: '',
        price: '',
        accident: '',
        color: '',
        countOwners: '',
        year: '',
        insurance: '',
        city: '',
        region: '',
        technicalCondition: '',
        repainted: '',
        description: '',
    }),
    mounted() {
       this.setOfferAttributes();
    },
    methods: {
        setOfferAttributes()
        {
            this.motor = this.offer.motor;
            this.bodyType= this.offer.body_type;
            this.model = this.offer.model;
            this.manufacture = this.offer.manufacture;
            this.mileage = this.offer.mileage;
            this.price = this.offer.price;
            this.accident = this.offer.accident;
            this.color = this.offer.color;
            this.countOwners = this.offer.count_owners;
            this.year = this.offer.year;
            this.insurance = this.offer.insurance;
            this.city = this.offer.city;
            this.region = this.offer.region;
            this.technicalCondition = this.offer.technical_condition;
            this.repainted = this.offer.repainted;
            this.description = this.offer.description;
        },
        uploadData(){
            
            const data = new FormData(this.$refs.newOffer)
            for (let i=0; i<this.images.length; i++){
                let image = this.images[i];
                data.append('images['+i+']', image)
            }
            data.append('price', this.price);
            data.append('count_owners', this.countOwners);
            data.append('color', this.color);
            data.append('mileage', this.mileage);
            data.append('year', this.year);
            data.append('description', this.description);
            data.append('accident', this.accident);
            data.append('insurance', this.insurance);
            data.append('city', this.city);
            data.append('region', this.region);
            data.append('technical_condition', this.technicalCondition);
            data.append('repainted', this.repainted);
            axios.post('/offers/'+this.offer.id+'/update', data, {
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
    }
}
</script>

<style scoped>

</style>
