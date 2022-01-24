<template>
    <div class="container">
        <div class="row">
            <label class="text-white h1">Body Type</label>
            <div class="col">
                <input class="form-control border-dark text-white-50"
                       style="color: white;background-color: rgba(34,30,50,0.5);"
                       type="text" name="keywords" v-model="name" placeholder="Body Type...">
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
                <button class="btn text-white" style="background-color: #FD5631; margin-top: 1em" @click="createBodyType">Submit</button>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "create-body-type",
    data:() =>({
        name: '',
        manufactures: '',
        manufactureId: '',
    }),
    mounted() {
        this.getManufactures();
    },
    methods:{
        getManufactures(){
            axios.get('/car/all/manufacture')
            .then(({data})=>{
                this.manufactures = data.manufactures;
            })
            .catch((error)=>{
                console.log(error.response);
            })
        },
        createBodyType(){
            axios.post('/car/create/bt',{name: this.name, manufacture_id: this.manufactureId}, {
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                }
            })
                .then(({data})=>{
                    console.log(data);
                    if (data.status === true) {
                        alert('Created!');
                    }
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
