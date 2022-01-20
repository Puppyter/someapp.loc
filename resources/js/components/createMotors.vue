<template>
    <div class="container">
        <div class="row">
            <label class="text-white h4">Motor</label>
            <div class="col">
                <input class="form-control border-dark text-white-50"
                       style="color: white;background-color: rgba(34,30,50,0.5);"
                       type="text" name="keywords" v-model="name" placeholder="Motor...">
            </div>
        </div>
        <div  class="row" style="margin-top: 1em">
            <div class="col" style="width: 400px">
                <h4 class="border-dark text-white">Body Type</h4>
                <div class="input-group mb-3">
                    <select class="form-select border-dark text-white-50" style="background-color:rgba(34,30,50,0.5); font-size: 18px" v-model="bodyTypeId">
                        <option v-for="bodyType in bodytypes" :value="bodyType.id">{{bodyType.name}}</option>
                    </select>
                </div>
        </div>
        </div>
        <div class="row" style="margin-top: 1em">
            <div class="col" style="width: 400px">
                <h4 class="border-dark text-white">Fuel Type</h4>
                <div class="input-group mb-3">

                    <select class="form-select border-dark text-white-50" style="background-color:rgba(34,30,50,0.5); font-size: 18px" v-model="fuelTypeId">
                        <option v-for="fuel in fuels" :value="fuel.id">{{fuel.name}}</option>
                    </select>
                </div>
        </div>
        </div>
        <div class="row">
            <div class="col">
                <button class="btn text-white" style="background-color: #FD5631; margin-top: 1em" @click="createMotor">Submit</button>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "create-motors",
    props: ['bodytypes','fuels'],
    data:() =>({
        name: '',
        bodyTypeId: '',
        fuelTypeId: '',
    }),
    methods:{
        createMotor(){
            axios.post('/car/create/motor',{
                name: this.name,
                body_type_id: this.bodyTypeId,
                fuel_id: this.fuelTypeId,
            }, {
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                }
            })
                .then(({data})=>{
                    console.log(data)
                    if (data.status === true) {
                        alert('Created!');
                    }
                })
                .catch(error =>{
                    console.log(error.response)
                })
        },
        changeFuel(id)
        {
            this.fuelTypeId = id;
        },
        changeBodyType(id)
        {
            this.fuelTypeId = id;
        }
    }
}
</script>

<style scoped>

</style>
