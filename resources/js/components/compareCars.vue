<template>
    <div class="row row-cols-auto text-white" >
        <div class="col" style="background-color: #231f32">
            <p>Brand and Model:</p>
            <div class="card mb-3 text-white" style="background-color:rgba(34,30,50,0.5);">
            </div>
            <p>Price:</p>
            <div class="card mb-3 text-white" style=" background-color:rgba(34,30,50,0.5);">
            </div>
            <p>Body Type:</p>
            <div class="card mb-3 text-white" style="background-color:rgba(34,30,50,0.5);">
            </div>
            <p>Motor:</p>
            <div class="card mb-3 text-white" style="background-color:rgba(34,30,50,0.5);">
            </div>
            <p>Fuel:</p>
            <div class="card mb-3 text-white" style="background-color:rgba(34,30,50,0.5);">
            </div>
            <p>Mileage:</p>
            <div class="card mb-3 text-white" style="background-color:rgba(34,30,50,0.5);">
            </div>
            <p>Accident:</p>
            <div class="card mb-3 text-white" style="background-color:rgba(34,30,50,0.5);">
            </div>
            <p>Year:</p>
            <div class="card mb-3 text-white" style="background-color:rgba(34,30,50,0.5);">
            </div>
            <p>Technical Condition:</p>
            <div class="card mb-3 text-white" style="background-color:rgba(34,30,50,0.5);">
            </div>
            <p>Count Owners:</p>
            <div class="card mb-3 text-white" style="background-color:rgba(34,30,50,0.5);">
            </div>
            <p>Insurance:</p>
            <div class="card mb-3 text-white" style="background-color:rgba(34,30,50,0.5);">
            </div>
            <p>Repainted:</p>
            <div class="card mb-3 text-white" style="background-color:rgba(34,30,50,0.5);">
            </div>
            <p>Color:</p>
            <div class="card mb-3 text-white" style="background-color:rgba(34,30,50,0.5);">
            </div>
        </div>
        <div v-for="car in cars">
            <div class="col" style="background-color: #231f32">
                <p style="margin-left: 1em; margin-right: 1em; margin-bottom: 1em">{{car.manufacture_id + ' ' + car.model_id}}</p>
                <div class="card mb-3 text-white" style="background-color:rgba(34,30,50,0.5);">
                </div>
                <p style="margin-left: 1em; margin-right: 1em;">{{car.price}}</p>
                <div class="card mb-3 text-white" style="background-color:rgba(34,30,50,0.5);">
                </div>
                <p style="margin-left: 1em; margin-right: 1em;">{{car.body_type_id}}</p>
                <div class="card mb-3 text-white" style="background-color:rgba(34,30,50,0.5);">
                </div>
                <p style="margin-left: 1em; margin-right: 1em;">{{car.motor_id}}</p>
                <div class="card mb-3 text-white" style="background-color:rgba(34,30,50,0.5);">
                </div>
                <p style="margin-left: 1em; margin-right: 1em;">{{car.fuel_id}}</p>
                <div class="card mb-3 text-white" style="background-color:rgba(34,30,50,0.5);">
                </div>
                <p style="margin-left: 1em; margin-right: 1em;">{{car.mileage}}</p>
                <div class="card mb-3 text-white" style="background-color:rgba(34,30,50,0.5);">
                </div>
                <p style="margin-left: 1em; margin-right: 1em;" v-if="car.accident === 0">Non accident</p>
                <p style="margin-left: 1em; margin-right: 1em;" v-else>Accident</p>
                <div class="card mb-3 text-white" style="background-color:rgba(34,30,50,0.5);">
                </div>
                <p style="margin-left: 1em; margin-right: 1em;">{{car.year}}</p>
                <div class="card mb-3 text-white" style="background-color:rgba(34,30,50,0.5);">
                </div>
                <p style="margin-left: 1em; margin-right: 1em;" v-if="car.technical_condition === 1">Not crushed</p>
                <p style="margin-left: 1em; margin-right: 1em;" v-else>Crushed</p>
                <div class="card mb-3 text-white" style="background-color:rgba(34,30,50,0.5);">
                </div>
                <p style="margin-left: 1em; margin-right: 1em;">{{car.count_owners}}</p>
                <div class="card mb-3 text-white" style="background-color:rgba(34,30,50,0.5);">
                </div>
                <p style="margin-left: 1em; margin-right: 1em;" v-if="car.insurance === 0">Without Insurance</p>
                <p style="margin-left: 1em; margin-right: 1em;" v-else>With Insurance</p>
                <div class="card mb-3 text-white" style="background-color:rgba(34,30,50,0.5);">
                </div>
                <p style="margin-left: 1em; margin-right: 1em;" v-if="car.repainted === 1">Repainted</p>
                <p style="margin-left: 1em; margin-right: 1em;" v-else>Not Repainted</p>
                <div class="card mb-3 text-white" style="background-color:rgba(34,30,50,0.5);">
                </div>
                <p style="margin-left: 1em; margin-right: 1em;">{{car.color}}</p>
                <div class="card mb-3 text-white" style="background-color:rgba(34,30,50,0.5);">
                </div>
                <div style="margin-left: 1em; margin-right: 1em">
                    <a style="margin-bottom: 1em" :href="'/offers/show?id='+ car.id" class="btn btn-danger">View Offer</a>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "compareCars",
    data:()=>({
       cars: []
    }),
    mounted() {
        if (localStorage.getItem('cars')) {
            try {
                this.cars = JSON.parse(localStorage.getItem('cars'));
            } catch(e) {
                localStorage.removeItem('cars');
            }
        }
    }
}
</script>

<style scoped>

</style>
