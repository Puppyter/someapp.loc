<template>
    <form ref="newCarForm">
        <div class="input-group mb-3">
            <span class="input-group-text">Company</span>
            <input type="text" class="form-control" v-model="manufacture">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text">Model</span>
            <input type="text" class="form-control" v-model="model">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text">Motor</span>
            <input type="text" class="form-control" v-model="motor">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text">Year</span>
            <input type="text" class="form-control" v-model="year">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text">Body Type</span>
            <input type="text" class="form-control" v-model="bodyType">
        </div>
        <div class="col">
            <input type="button" class="btn btn-primary" value="Create" @click="uploadData">
        </div>
    </form>
</template>

<script>
export default {
    name: "NewCar",
    data: () => ({
        manufacture: '',
        model: '',
        motor: '',
        year: '',
        bodyType: '',
    }),
    methods:{
        uploadData() {
            const data = new FormData(this.$refs.newCarForm)
            data.append('manufacture', this.manufacture)
            data.append('model', this.model)
            data.append('year', this.year)
            data.append('body_type', this.bodyType)
            data.append('motor', this.motor)
            axios.post('/car/store', data, {
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                }
            })
                .then(({data}) => {
                    console.log(data)
                    if (data.status === true) {
                        window.location.href = 'http://someapp.loc/offers/';
                    }
                })
                .catch(error => {
                    console.log(error.response)
                })
        },
    },
}
</script>

<style scoped>

</style>
