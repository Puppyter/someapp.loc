<template>
    <form ref="registerForm" id="registerForm">
        <input type="hidden" name="_token" :value="csrf">
        <div class="input-group mb-3">
            <span class="input-group-text">Username</span>
            <input type="text" class="form-control" v-model="name">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text">Email</span>
            <input type="text" class="form-control" v-model="email">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text">Password</span>
            <input type="password" class="form-control" v-model="password">
        </div>
        <div class="input-group mb-3">
            <label class="input-group-text">Phone Number</label>
            <input type="text" name="phone" class="form-control" v-model="phone">
        </div>
        <div class="input-group mb-3">
            <label class="input-group-text">First Name</label>
            <input type="text" name="phone" class="form-control" v-model="firstName">
        </div>
        <div class="input-group mb-3">
            <label class="input-group-text">Last Name</label>
            <input type="text" name="phone" class="form-control" v-model="lastName">
        </div>
        <div class="col">
            <input type="button" class="btn btn-primary" value="Register" @click="uploadData">
        </div>
    </form>
</template>

<script>
export default {
    name: "Register",
    props: ['route','routeLogin'],
    data: () => ({
        name: '',
        password: '',
        email: '',
        phone: '',
        firstName: '',
        lastName: '',
        csrf: ''
    }),
    methods: {
        uploadData(){
            const data = new FormData(this.$refs.registerForm)
            data.append('first_name', this.firstName)
            data.append('last_name', this.lastName)
            data.append('phone', this.phone)
            data.append('name', this.name)
            data.append('password', this.password)
            data.append('email', this.email)
            axios.post('http://someapp.loc/users/create/store', data, {
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                }
            })
                .then(({data}) => {
                    console.log(data)
                    if (data.status === true) {
                        window.location.href = 'http://someapp.loc/users';
                    }
                })
                .catch(error =>{
                    console.log(error.response)
                })
        },
    },
    mounted() {
        this.csrf = window.Laravel.csrfToken;
    }
}
</script>

<style scoped>

</style>
