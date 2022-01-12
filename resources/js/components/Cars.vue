<template>
    <form>
        <div v-if="cars===''">
            <h1>No Orders Yet</h1>
        </div>
        <div v-else>
            <div class="row row-cols-3">
            <div class="col" v-for="car in cars">
                <div class="card" style="width: 18rem;">
                    <img :src="car.image" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{car.name}}</h5>
                        <p class="card-text">{{car.description}}</p>
                        <a  class="btn btn-primary">View offer</a>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </form>
</template>

<script>
export default {
    name: "Cars",
    props: ['cars'],
    methods: {
        goToOffer(){

        }
    }
}
</script>

<style scoped>

</style>
