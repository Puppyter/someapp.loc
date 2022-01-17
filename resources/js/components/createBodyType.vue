<template>
    <div>
        <label>Create Fuel</label>
        <input type="text" v-model="name">
        <button @click="createBodyType">Submit</button>
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
