<template>
    <div class="container">
        <div class="row border">
            <div class="col">
                <div class="input-group mb-3">
                    <span class="input-group-text">Manufacture</span>
                    <select class="form-control" @change="getModels" v-model="manufacture">
                        <option v-for="manuf in manufactures" :value="manuf.id">{{manuf.name}}</option>
                    </select>
                </div>
            </div>
            <div class="col">
                <div class="input-group mb-3">
                    <span class="input-group-text">Model</span>
                    <select class="form-control" v-if="models === ''" disabled v-model="model">
                        <option v-for="mdl in models" :value="mdl.id">{{mdl.name}}</option>
                    </select>
                    <select class="form-control" v-else v-model="model">
                        <option v-for="mdl in models" :value="mdl.id">{{mdl.name}}</option>
                    </select>
                </div>
            </div>
            <div class="col">
                <button @click="searchOffers" class="btn btn-primary">Search</button>
            </div>
        </div>
        <form>
            <div v-if="cars===''">
                <h1>No Orders Yet</h1>
            </div>
            <div v-else>
                <div class="row row-cols-3">
                    <div class="col" v-for="car in cars">
                        <div class="card product-card" style="width: 18rem;">
                            <img :src=car.image class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{ car.name }}</h5>
                                <p class="card-text">{{ car.description }}</p>
                                <a :href="'/offers/show'+'?'+'id='+car.id" class="btn btn-primary">View offer</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
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
