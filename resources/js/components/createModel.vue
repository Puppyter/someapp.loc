<template>
    <div>
        <div>
            <label>Enter Model</label>
            <input type="text" v-model="name">
        </div>
        <div>
            <label>Choose Manufacture</label>
            <select  v-model="manufactureId">
                <option v-for="manufacture in manufactures" :value="manufacture.id">{{manufacture.name}}</option>
            </select>
        </div>
        <div>
            <label>Choose Body Type</label>
            <select  v-model="bodyTypeId" @change="getMotors">
                <option v-for="bodyType in bodyTypes" :value="bodyType.id">{{bodyType.name}}</option>
            </select>
        </div>
        <div>
            <label>Choose Motor</label>
            <select v-model="motorId">
                <option v-for="motor in motors" :value="motor.id">{{motor.name}}</option>
            </select>
        </div>
        <div>
            <button @click="createModel">Submit</button>
        </div>
    </div>
</template>

<script>
export default {
    name: "create-model",
    props: [],
    data: () =>({
        motors: '',
        manufactures: '',
        bodyTypes: '',
        name: '',
        motorId: '',
        manufactureId: '',
        bodyTypeId: '',
    }),
    mounted() {
        this.getManufactures();
        this.getBodyTypes();
    },
    methods:{
        createModel(){
            axios.post('/car/create/model',{
                name: this.name,
                motor_id: this.motorId,
                manufacture_id: this.manufactureId,
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
                .catch(error =>{
                    console.log(error.response)
                })
        },
        getManufactures() {
            axios.get('/car/all/manufacture', {
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                }
            })
                .then(({data})=>{
                    console.log(data)
                    this.manufactures = data.manufactures;
                })
                .catch(error =>{
                    console.log(error.response)
                })
        },
        getMotors() {
            axios.post('/car/search/motor',{by:'bodyType', id:this.bodyTypeId}, {
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                }
            })
                .then(({data})=>{
                    console.log(data)
                    this.motors = data.motors;
                })
                .catch(error =>{
                    console.log(error.response)
                })
        },
        getBodyTypes()
        {
            axios.get('/car/all/bt', {
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                }
            })
                .then(({data})=>{
                    console.log(data)
                    this.bodyTypes = data.bodyTypes;
                })
                .catch(error =>{
                    console.log(error.response)
                })
        },
        changeManufacture(id)
        {
            this.manufactureId = id;
        },
        changeMotor(id)
        {
          this.motorId=id;
        },
        changeBodyType(id)
        {
         this.bodyTypeId = id;
        }
    }
}
</script>

<style scoped>

</style>
