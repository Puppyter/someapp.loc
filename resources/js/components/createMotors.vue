<template>
    <div>
        <div>
            <label>Create Motor</label>
            <input type="text" v-model="name">
        </div>
        <div>
            <label>Choose Body Type</label>
            <select v-model="bodyTypeId">
                <option  v-for="bodyType in bodytypes" :value="bodyType.id" @click="changeBodyType(bodyType.id)">{{bodyType.name}}</option>
            </select>
        </div>
        <div>
            <label>Choose Fuel Type</label>
            <select v-model="fuelTypeId">
                <option v-for="fuel in fuels" :value="fuel.id" @click="changeFuel(fuel.id)">{{fuel.name}}</option>
            </select>
        </div>
        <div>
            <button @click="createMotor">Submit</button>
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
