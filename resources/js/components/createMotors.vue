<template>
    <div>
        <div>
            <label>Create Motor</label>
            <input type="text" v-model="name">
        </div>
        <div>
            <label>Choose Body Type</label>
            <select v-for="bodyType in bodyTypes" v-model="bodyTypeId">
                <option :value="bodyType.id">{{bodyType.name}}</option>
            </select>
        </div>
        <div>
            <label>Choose Fuel Type</label>
            <select v-for="fuelType in fuelTypes" v-model="fuelTypeId">
                <option :value="fuelType.id">{{fuelType.name}}</option>
            </select>
        </div>
        <div>
            <button @click="createFuel">Submit</button>
        </div>
    </div>
</template>

<script>
export default {
    name: "createMotors",
    props: ['bodyTypes','fuelTypes'],
    data:() =>({
        name: '',
        bodyTypeId: '',
        fuelTypeId: '',
    }),
    methods:{
        createFuel(){
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
        }
    }
}
</script>

<style scoped>

</style>
