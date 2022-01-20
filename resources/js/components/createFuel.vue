<template>
    <div class="container">
        <div class="row">
            <label class="text-white h1">Fuel</label>
            <div class="col">
                <input class="form-control border-dark text-white-50"
                       style="color: white;background-color: rgba(34,30,50,0.5);"
                       type="text" name="keywords" v-model="name" placeholder="Fuel...">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <button class="btn text-white" style="background-color: #FD5631; margin-top: 1em" @click="createFuel">Submit</button>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "create-fuel",
    data:() =>({
        name: ''
    }),
    methods:{
        createFuel(){
            axios.post('/car/create/fuel',{name: this.name}, {
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
