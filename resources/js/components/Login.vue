<template>
    <form id="authForm">
        <h3 class="text-white">Login</h3>
        <div class="card mb-3 text-white" style="width: 59em; background-color:rgba(34,30,50,0.5); margin-top: 1em">
            <h5 style="margin-top: 1em">User Name</h5>
            <div class="input-group mb-3">
                <input type="text" style="background-color:rgba(34,30,50,0.5);  font-size: 18px" class="form-control border-dark text-white-50" v-model="userName">
            </div>
            <h5>Password</h5>
            <div class="input-group mb-3">
                <input type="password" style="background-color:rgba(34,30,50,0.5);  font-size: 18px" class="form-control border-dark text-white-50" v-model="password">
            </div>
        <div class="col">
            <input type="button" class="btn text-white" style="background-color: #FD5631;  margin-bottom: 1em" value="Login" @click="uploadData">
        </div>
        </div>
        <p class="text-white-50">Or if you not registered <span><a href="/users/create">Register Now</a></span></p>
    </form>
</template>

<script>
export default {
    name: "Login",
    props: ['auth'],
    data: () => ({
        userName: '',
        password: '',
    }),
    methods: {
        uploadData(){
            const data = new FormData(document.getElementById('authForm'))
            data.append('password', this.password)
            data.append('name', this.userName)
            axios.post('/login', data, {
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                }
            })
                .then(({data}) => {
                    console.log(data)
                    if (data.status === true) {
                        window.location.href = '/offers ';
                    }
                })
                .catch(error =>{
                    console.log(error.response)
                })
        },
    },
}
</script>

<style scoped>

</style>
