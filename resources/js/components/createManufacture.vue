<template>
    <div>
        <label>Create Manufacture</label>
        <input type="text" v-model="manufactureName">
        <button @click="createManufacture">Submit</button>
    </div>
</template>

<script>
export default {
    name: "create-manufacture",
    data:() =>({
        manufactureName: '',
    }),
    methods:{
        createManufacture(){
            axios.post('/car/create/manufacture',{name: this.manufactureName}, {
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
