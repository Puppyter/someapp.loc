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
        name: ''
    }),
    methods:{
        createBodyType(){
            axios.post('/car/create/bt',{name: this.name}, {
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
