<template>
    <div>
        <div>
            <label>Enter Model</label>
            <input type="text" v-model="name">
        </div>
        <div>
            <label>Choose Manufacture</label>
            <select v-for="manufacture in manufactures" v-model="manufactureId">
                <option :value="manufacture.id">{{manufacture.name}}</option>
            </select>
        </div>
        <div>
            <label>Choose Body Type</label>
            <select v-for="bodyType in bodyTypes" v-model="bodyTypeId">
                <option :value="bodyType.id">{{bodyType.name}}</option>
            </select>
        </div>
        <div>
            <label>Choose Motor</label>
            <select v-for="motor in motors" v-model="motorIdId">
                <option :value="motor.id">{{motor.name}}</option>
            </select>
        </div>
        <div>
            <button @click="createFuel">Submit</button>
        </div>
    </div>
</template>

<script>
export default {
    name: "createModel",
    props: ['motors','manufactures','bodyTypes'],
    data: () =>({
        name: '',
        motorId: '',
        manufactureId: '',
        bodyTypeId: '',
    }),
    methods:{
        createFuel(){
            axios.post('/car/create/model',{
                name: this.name,
                motor_id: this.motorId,
                manufacture_id: this.manufacture_id,
                body_type_id: this.bodyTypeId,
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
