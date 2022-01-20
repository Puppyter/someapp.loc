<template>
    <div class="container">
        <div class="row row-cols-2">
            <div class="col" style="width: 400px">
                <h4 class="border-dark text-white">Manufacture</h4>
                <div class="input-group mb-3">
                    <select class="form-select border-dark text-white-50" @change="getModels"  style="background-color:rgba(34,30,50,0.5); font-size: 18px" v-model="manufacture">
                        <option v-for="manuf in manufactures" :value="manuf.id">{{manuf.name}}</option>
                    </select>
                </div>
                <h4 class="border-dark text-white">Model</h4>
                <div class="input-group mb-3">
                    <select class="form-control border-dark disabled" v-if="models === ''" style="background-color:rgba(34,30,50,0.5); " disabled v-model="model">
                        <option v-for="mdl in models" :value="mdl.id">{{mdl.name}}</option>
                    </select>
                    <select class="form-select border-dark text-white-50" style="background-color:rgba(34,30,50,0.5);  font-size: 18px" v-else v-model="model">
                        <option v-for="mdl in models" :value="mdl.id">{{mdl.name}}</option>
                    </select>
                </div>
                <button style="background-color: #FD5631;" @click="searchOffers" class="btn text-white">Search</button>
            </div>
        <form>
            <div v-if="cars===''">
                <h1>No Orders Yet</h1>
            </div>
            <div v-else>
                    <div class="col" v-for="car in cars" :key="car.id">
                    <div class="card mb-3 text-white" style="width: 59em; background-color: #231f32">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img class="img-fluid rounded-start" :src="car.image"  alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body bg-opacity-50">
                                    <a :href="'/offers/show'+'?'+'id='+car.id" style="text-decoration: none">
                                    <h3 class="card-title text-white">
                                            {{ car.manufacture.name +' '+ car.model.name }}
                                    </h3>
                                    </a>
                                    <p class="card-text">{{'$'+car.price}}</p>
                                        <p class="card-text"><small class="text-muted">{{ car.city }}</small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
<!--                    <div class="col" v-for="car in cars">-->
<!--                        <div class="card " style="width: 18rem;">-->
<!--                            <img :src=car.image class="card-img-top" alt="...">-->
<!--                            <div class="card-body">-->
<!--                                <h5 class="card-title">{{ car.name }}</h5>-->
<!--                                <p class="card-text">{{ car.description }}</p>-->
<!--                                <a :href="'/offers/show'+'?'+'id='+car.id" class="btn btn-primary">View offer</a>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
                </div>
        </form>
        </div>
    </div>
</template>

<script>
import {isEmpty} from "lodash/lang";

export default {
    name: "Cars",
    props: ['cars', 'manufactures'],
    data: () =>({
        manufacture: '',
        model: '',
        models: ''
    }),
    methods: {
        getModels(){
            axios.post('/car/search/model',{by:'manufacture', id: this.manufacture},{
                headers:{
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                }
            })
            .then(({data})=>{
                this.models = data.models;
            })
            .catch((error)=>{
                console.log(error.response)
            })
        },
        searchOffers(){
            let dat='';
            if (isEmpty(this.model))
            {
               dat={by:'manufacture', id:this.manufacture}
            }
            else {
                dat={by:'model', id:this.model}
            }
            axios.post('car/search/offer',dat,{
                headers:{
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                }
            })
            .then(({data})=>{
                this.cars = data.offers;
            })
            .catch((error)=>{
                console.log(error.response)
            })
        }
    }
}
</script>

<style scoped>

</style>
