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
                <p>{{car.manufacture_id + ' ' + car.model_id}}</p>
                <div class="card mb-3 text-white" style="background-color:rgba(34,30,50,0.5);">
                </div>
                <p>{{car.price}}</p>
                <div class="card mb-3 text-white" style="background-color:rgba(34,30,50,0.5);">
                </div>
                <p>{{car.body_type_id}}</p>
                <div class="card mb-3 text-white" style="background-color:rgba(34,30,50,0.5);">
                </div>
                <p>{{car.motor_id}}</p>
                <div class="card mb-3 text-white" style="background-color:rgba(34,30,50,0.5);">
                </div>
                <p>{{car.fuel_id}}</p>
                <div class="card mb-3 text-white" style="background-color:rgba(34,30,50,0.5);">
                </div>
                <p>{{car.mileage}}</p>
                <div class="card mb-3 text-white" style="background-color:rgba(34,30,50,0.5);">
                </div>
                <p v-if="car.accident === 0">Non accident</p>
                <p v-else>Accident</p>
                <div class="card mb-3 text-white" style="background-color:rgba(34,30,50,0.5);">
                </div>
                <p>{{car.year}}</p>
                <div class="card mb-3 text-white" style="background-color:rgba(34,30,50,0.5);">
                </div>
                <p v-if="car.technical_condition === 1">Not crushed</p>
                <p v-else>Crushed</p>
                <div class="card mb-3 text-white" style="background-color:rgba(34,30,50,0.5);">
                </div>
                <p>{{car.count_owners}}</p>
                <div class="card mb-3 text-white" style="background-color:rgba(34,30,50,0.5);">
                </div>
                <p v-if="car.insurance === 0">Without Insurance</p>
                <p v-else>With Insurance</p>
                <div class="card mb-3 text-white" style="background-color:rgba(34,30,50,0.5);">
                </div>
                <p v-if="car.repainted === 1">Repainted</p>
                <p v-else>Not Repainted</p>
                <div class="card mb-3 text-white" style="background-color:rgba(34,30,50,0.5);">
                </div>
                <p>{{car.color}}</p>
                <div class="card mb-3 text-white" style="background-color:rgba(34,30,50,0.5);">
                </div>
                <a :href="'/offers/show?id='+ car.id" class="btn btn-danger">View Offer</a>
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
