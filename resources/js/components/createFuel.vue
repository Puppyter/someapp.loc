<template>
    <div>
        <label>Create Fuel</label>
        <input type="text" v-model="name">
        <button @click="createFuel">Submit</button>
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
