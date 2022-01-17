<template>
    <form ref="newOffer" enctype="multipart/form-data">
        <div class="input-group mb-3">
            <span class="input-group-text">Images</span>
            <input type="file" ref="images" class="form-control" multiple>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text">Price</span>
            <input type="number" class="form-control" v-model="price">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text">Mileage</span>
            <input type="number" class="form-control" v-model="mileage">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text">Color</span>
            <input type="text" class="form-control" v-model="color">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text">Count Owners</span>
            <input type="number" class="form-control" v-model="countOwners">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text">Year</span>
            <input type="text" class="form-control" v-model="year">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text">Insurance</span>
            <select class="form-control" v-model="insurance">
                <option selected :value="0">false</option>
                <option :value="1">true</option>
            </select>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text">City</span>
            <input type="text" class="form-control" v-model="city">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text">Region</span>
            <input type="text" class="form-control" v-model="region">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text">Accident</span>
            <select class="form-control" v-model="accident">
                <option selected :value="0">false</option>
                <option :value="1">true</option>
            </select>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text">Technical condition</span>
            <select class="form-control" v-model="technicalCondition">
                <option selected :value="1">not crushed</option>
                <option :value="0">crushed</option>
            </select>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text">Repainted</span>
            <select class="form-control" v-model="repainted">
                <option selected :value="0">false</option>
                <option :value="1">true</option>
            </select>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text">Description</span>
            <textarea class="form-control" v-model="description"></textarea>
        </div>
        <div class="col">
            <input type="button" class="btn btn-primary" value="Create">
        </div>
        <a :href="'/offer/'+offer.id+'/destroy'" class="btn btn-primary">Delete Offer</a>
    </form>
</template>

<script>
export default {
    name: "edit-offer",
    props: ['offer'],
    data: () =>({
        mileage: '',
        price: '',
        accident: '',
        color: '',
        countOwners: '',
        year: '',
        insurance: '',
        city: '',
        region: '',
        technicalCondition: '',
        repainted: '',
        description: '',
    }),
    mounted() {
       this.setOfferAttributes();
    },
    methods: {
        setOfferAttributes()
        {
            this.mileage = this.offer.mileage;
            this.price = this.offer.price;
            this.accident = this.offer.accident;
            this.color = this.offer.color;
            this.countOwners = this.offer.count_owners;
            this.year = this.offer.year;
            this.insurance = this.offer.insurance;
            this.city = this.offer.city;
            this.region = this.offer.region;
            this.technicalCondition = this.offer.technical_condition;
            this.repainted = this.offer.repainted;
            this.description = this.offer.description;
        },
        uploadData(){
            const data = new FormData(this.$refs.newOffer)
            for (let i=0; i<this.images.length; i++){
                let image = this.images[i];
                data.append('images['+i+']', image)
            }
            data.append('price', this.price);
            data.append('count_owners', this.countOwners);
            data.append('color', this.color);
            data.append('mileage', this.mileage);
            data.append('year', this.year);
            data.append('description', this.description);
            data.append('accident', this.accident);
            data.append('insurance', this.insurance);
            data.append('city', this.city);
            data.append('region', this.region);
            data.append('technical_condition', this.technicalCondition);
            data.append('repainted', this.repainted);
            axios.post('/offers/'+this.offer.id+'/update', data, {
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'Content-Type':'multipart/form-data',
                }
            })
                .then(({data}) => {
                    console.log(data)
                    if (data.status === true) {
                        window.location.href = 'http://someapp.loc/offers/';
                    }
                })
                .catch(error =>{
                    console.log(error.response)
                })
        },
    }
}
</script>

<style scoped>

</style>
