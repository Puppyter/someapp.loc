<template>
    <form ref="registerForm" id="registerForm">
        <input type="hidden" name="_token" :value="csrf">
        <h4 class="text-white">Register</h4>
        <div class="row row-cols-2">
            <div class="col-auto">
        <div class="card mb-3 text-white" style="width: 43.5em; background-color:rgba(34,30,50,0.5); margin-top: 1em">
            <h3>Account information</h3>
            <h5 style="margin-top: 1em">User Name</h5>
            <div class="input-group mb-3">
                <input type="text" style="background-color:rgba(34,30,50,0.5);  font-size: 18px" class="form-control w-50 border-dark text-white-50" v-model="name">
            </div>
            <h5>Email</h5>
        <div class="input-group mb-3">
            <input type="text" style="background-color:rgba(34,30,50,0.5);  font-size: 18px" class="form-control border-dark text-white-50" v-model="email">
        </div>
            <h5>Password</h5>
        <div class="input-group mb-3">
            <input type="password" style="background-color:rgba(34,30,50,0.5);  font-size: 18px" class="form-control border-dark text-white-50" v-model="password">
        </div>
        </div>
            </div>
            <div class="col-2">
        <div class="card mb-3 text-white" style="width: 43.4em; background-color:rgba(34,30,50,0.5); margin-top: 1em">
            <h4>Personal information</h4>
            <h5 style="margin-top: 1em">First Name</h5>
        <div class="input-group mb-3">
            <input type="text" style="background-color:rgba(34,30,50,0.5);  font-size: 18px" class="form-control border-dark text-white-50" v-model="firstName">
        </div>
            <h5 >Last Name</h5>
        <div class="input-group mb-3">
            <input type="text" style="background-color:rgba(34,30,50,0.5);  font-size: 18px" class="form-control border-dark text-white-50" v-model="lastName">
        </div>
            <h5 >Phone Number</h5>
            <div class="input-group mb-3">
                <input type="tel" style="background-color:rgba(34,30,50,0.5);  font-size: 18px" class="form-control border-dark text-white-50" v-model="phone">
            </div>
        </div>
            </div>
        <div class="col">
            <input type="button" style="background-color: #FD5631;  margin-bottom: 1em" class="btn text-white" value="Register" @click="uploadData">
        </div>
        </div>
        <p class="text-white-50">Already have account: <a href="/users">Login</a></p>
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
            axios.post('/users/create/store', data, {
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
