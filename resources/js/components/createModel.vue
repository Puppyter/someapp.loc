<template>
    <div class="container">
        <div class="row">
            <label class="text-white h4">Model</label>
            <div class="col">
                <input class="form-control border-dark text-white-50"
                       style="color: white;background-color: rgba(34,30,50,0.5);"
                       type="text" name="keywords" v-model="name" placeholder="Model...">
            </div>
        </div>
        <div  class="row" style="margin-top: 1em">
            <div class="col" style="width: 400px">
                <h4 class="border-dark text-white">Brand</h4>
                <div class="input-group mb-3">
                    <select class="form-select border-dark text-white-50" style="background-color:rgba(34,30,50,0.5); font-size: 18px" v-model="manufactureId">
                        <option v-for="manufacture in manufactures" :value="manufacture.id">{{manufacture.name}}</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <button class="btn text-white" style="background-color: #FD5631; margin-top: 1em" @click="createModel">Submit</button>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "create-model",
    props: [],
    data: () =>({
        manufactures: '',
        name: '',
        manufactureId: '',
    }),
    mounted() {
        this.getManufactures();
        this.getBodyTypes();
    },
    methods:{
        createModel(){
            axios.post('/admin/car/create/model',{
                name: this.name,
                manufacture_id: this.manufactureId,
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
