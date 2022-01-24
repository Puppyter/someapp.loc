<template>
    <div class="container">
        <div class="row row-cols-2">
            <div class="col" style="width: 400px">
                <h4 class="border-dark text-white">Brand</h4>
                <div class="input-group mb-3">
                    <select class="form-select border-dark text-white-50"
                            @change="getModels"
                            style="background-color:rgba(34,30,50,0.5); font-size: 18px"
                            v-model="manufacture_id">
                        <option selected :value="''">choose brand</option>
                        <option v-for="manufacture in manufactures" :value="manufacture.id">
                            {{ manufacture.name }}
                        </option>
                    </select>
                </div>
                <h4 class="border-dark text-white">Model</h4>
                <div class="input-group mb-3">
                    <select class="form-control border-dark text-white-50"
                            style="background-color:rgba(34,30,50,0.5);
                            font-size: 18px"
                            v-if="models===''"
                            disabled
                            v-model="model_id">
                        <option v-for="model in models" :value="model.id">
                            {{ model.name }}
                        </option>
                    </select>
                    <select class="form-select border-dark text-white-50"
                            style="background-color:rgba(34,30,50,0.5);
                            font-size: 18px"
                            v-else
                            v-model="model_id">
                        <option selected :value="''">choose model</option>
                        <option v-for="model in models" :value="model.id">
                            {{ model.name }}
                        </option>
                    </select>
                </div>
                <h4 class="border-dark text-white">Body Type</h4>
                <div class="input-group mb-3">
                    <select class="form-select border-dark text-white-50"
                            style="background-color:rgba(34,30,50,0.5);
                            font-size: 18px"
                            v-model="body_type_id">
                        <option selected :value="''">choose body type</option>
                        <option v-for="bt in bodyTypes" :value="bt.id">
                            {{ bt.name }}
                        </option>
                    </select>
                </div>
                <h4 class="border-dark text-white">Motor</h4>
                <div class="input-group mb-3">
                    <select class="form-select border-dark text-white-50"
                            style="background-color:rgba(34,30,50,0.5);
                            font-size: 18px"
                            v-model="motor_id">
                        <option selected :value="''">choose motor</option>
                        <option v-for="motor in motors" :value="motor.id">
                            {{ motor.name }}
                        </option>
                    </select>
                </div>
                <h4 class="border-dark text-white">Fuel</h4>
                <div class="input-group mb-3">
                    <select class="form-select border-dark text-white-50"
                            style="background-color:rgba(34,30,50,0.5);
                            font-size: 18px"
                            v-model="fuel_id">
                        <option selected :value="''">choose fuel</option>
                        <option v-for="fuel in fuels" :value="fuel.id">
                            {{ fuel.name }}
                        </option>
                    </select>
                </div>
                <h4 class="border-dark text-white">Price</h4>
                <div class="input-group mb-3">
                    <div class="col" style="margin-right: 1em">
                        <span class="text-white-50">Min Price
                        <input type="number"
                               style="background-color:rgba(34,30,50,0.5);"
                               placeholder="Min Price"
                               v-model="minPrice"
                               class="border-dark form-control text-white-50">
                            </span>
                    </div>
                    <div class="col">
                        <span class="text-white-50">Max Price
                        <input type="number"
                               style="background-color:rgba(34,30,50,0.5);"
                               placeholder="Max Price"
                               v-model="maxPrice"
                               class="border-dark form-control text-white-50">
                            </span>
                    </div>
                </div>
                <button style="background-color: #FD5631;" @click="searchOffers" class="btn btn-danger text-white">
                    Search
                </button>
            </div>
            <form>
                <div v-if="cars===''">
                    <h1>No Orders Yet</h1>
                </div>
                <div v-else>
                    <div v-model="cars">
                        <div class="col" v-for="car in cars" :key="car.id">
                            <div class="card mb-3 text-white" style="width: 133%; background-color: #231f32">
                                <div class="row g-0">
                                    <div class="col-md-4">
                                        <img class="img-fluid rounded-start"
                                             style="width: 223px; height: 225px"
                                             :src="car.image"
                                             alt="...">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body bg-opacity-50">
                                            <a :href="'/offers/show'+'?'+'id='+car.id" style="text-decoration: none">
                                                <h3 class="card-title text-white">
                                                    {{ car.manufacture.name + ' ' + car.model.name }}
                                                </h3>
                                            </a>
                                            <p class="card-text">{{ '$' + car.price }}</p>
                                            <p class="card-text"><small class="text-muted">{{ car.city }}</small></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
export default {
    name: "Cars",
    data: () => ({
        minPrice: 0,
        maxPrice: 9999999,
        manufactureName:'',
        manufactures: '',
        cars: {},
        manufacture_id: '',
        model_id: '',
        models: '',
        fuels: '',
        fuel_id:'',
        bodyTypes:'',
        body_type_id: '',
        motors: '',
        motor_id: '',
    }),
    mounted() {
        this.getAllManufactures();
        this.getAllOffers();
        this.getAllBodyTypes();
        this.getAllMotors();
        this.getAllFuels();
    },
    methods: {
        getAllFuels()
        {
            axios.get('/car/all/fuel',{
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                }
            })
                .then(({data}) => {
                    this.fuels = data.fuels;
                })
                .catch((error) => {
                    console.log(error.response);
                })
        },
        getAllMotors()
        {
            axios.get('/car/all/motor',{
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                }
            })
                .then(({data}) => {
                    this.motors = data.motors;
                })
                .catch((error) => {
                    console.log(error.response);
                })
        },
        getAllBodyTypes()
        {
            axios.get('/car/all/bt',{
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                }
            })
                .then(({data}) => {
                    this.bodyTypes = data.bodyTypes;
                })
                .catch((error) => {
                    console.log(error.response);
                })
        },
        getAllManufactures()
        {
          axios.get('/car/all/manufacture',{
              headers: {
                  'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
              }
          })
              .then(({data}) => {
                  this.manufactures = data.manufactures;
              })
              .catch((error) => {
                  console.log(error.response);
              })
        },
        getAllModels(){
          axios.get('/car/all/model',{
              headers: {
                  'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
              }
          })
              .then(({data}) => {
                  this.models = data.models;
              })
              .catch((error) => {
                  console.log(error.response);
              })
        },
        getAllOffers() {
            axios.get('/offers/get/all', {
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                }
            })
                .then(({data}) => {
                    this.cars = data.cars;
                })
                .catch((error) => {
                    console.log(error.response);
                })
        },
        getModels() {
            axios.post('/car/search/model', {id: this.manufacture_id}, {
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                }
            })
                .then(({data}) => {
                    this.models = data.models;
                    this.model = '';
                })
                .catch((error) => {
                    console.log(error.response);
                })
        },
        conditionCreator(){
            let dat = [];
            if (this.manufacture_id!=='') {
                dat.push(['manufacture_id', this.manufacture_id])
            }
            if (this.motor_id!=='') {
                dat.push(['motor_id', this.motor_id])
            }
            if (this.fuel_id!=='') {
                dat.push(['fuel_id', this.fuel_id])
            }
            if (this.model_id!=='') {
                dat.push(['model_id', this.model_id])
            }
            if (this.body_type_id!=='') {
                dat.push(['body_type_id', this.body_type_id])
            }
            return dat;
        },
        searchOffers() {
            let dat = this.conditionCreator();
            axios.post('car/search/offer', {conditions: dat, minPrice: this.minPrice, maxPrice: this.maxPrice}, {
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                }
            })
                .then(({data}) => {
                    this.cars = data.offers;
                    console.log(data)
                })
                .catch((error) => {
                    console.log(error.response);
                })
        }
    }
}
</script>

<style scoped>

</style>
