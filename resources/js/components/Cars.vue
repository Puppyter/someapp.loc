<template>
    <ais-instan-search
        :search-client="searchClient"
        index-name="offers">
        <algo-offers></algo-offers>
    </ais-instan-search>
</template>

<script>
import algoliasearch from 'algoliasearch/lite';
export default {
    name: "Cars",
    data: () => ({
        minPrice: 0,
        maxPrice: 9999999,
        manufactureName:'',
        manufactures: '',
        cars: {},
        manufacture_id: '',
        model_id: '',
        models: '',
        fuels: '',
        fuel_id:'',
        bodyTypes:'',
        body_type_id: '',
        motors: '',
        motor_id: '',
        searchClient: algoliasearch(
            'K4ZXU1LBWR',
            '79feba9df561d10ac7ab7ee5bb5a694e'
        ),
    }),
    mounted() {
        this.getAllManufactures();
        this.getAllOffers();
        this.getAllBodyTypes();
        this.getAllMotors();
        this.getAllFuels();
    },
    methods: {
        getAllFuels()
        {
            axios.get('/car/all/fuel',{
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                }
            })
                .then(({data}) => {
                    this.fuels = data.fuels;
                })
                .catch((error) => {
                    console.log(error.response);
                })
        },
        getAllMotors()
        {
            axios.get('/car/all/motor',{
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                }
            })
                .then(({data}) => {
                    this.motors = data.motors;
                })
                .catch((error) => {
                    console.log(error.response);
                })
        },
        getAllBodyTypes()
        {
            axios.get('/car/all/bt',{
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                }
            })
                .then(({data}) => {
                    this.bodyTypes = data.bodyTypes;
                })
                .catch((error) => {
                    console.log(error.response);
                })
        },
        getAllManufactures()
        {
          axios.get('/car/all/manufacture',{
              headers: {
                  'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
              }
          })
              .then(({data}) => {
                  this.manufactures = data.manufactures;
              })
              .catch((error) => {
                  console.log(error.response);
              })
        },
        getAllModels(){
          axios.get('/car/all/model',{
              headers: {
                  'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
              }
          })
              .then(({data}) => {
                  this.models = data.models;
              })
              .catch((error) => {
                  console.log(error.response);
              })
        },
        getAllOffers() {
            axios.get('/offers/get/all', {
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                }
            })
                .then(({data}) => {
                    this.cars = data.cars;
                })
                .catch((error) => {
                    console.log(error.response);
                })
        },
        getModels() {
            axios.post('/car/search/model', {id: this.manufacture_id}, {
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                }
            })
                .then(({data}) => {
                    this.models = data.models;
                    this.model = '';
                })
                .catch((error) => {
                    console.log(error.response);
                })
        },
        conditionCreator(){
            let dat = [];
            if (this.manufacture_id!=='') {
                dat.push(['manufacture_id', this.manufacture_id])
            }
            if (this.motor_id!=='') {
                dat.push(['motor_id', this.motor_id])
            }
            if (this.fuel_id!=='') {
                dat.push(['fuel_id', this.fuel_id])
            }
            if (this.model_id!=='') {
                dat.push(['model_id', this.model_id])
            }
            if (this.body_type_id!=='') {
                dat.push(['body_type_id', this.body_type_id])
            }
            return dat;
        },
        searchOffers() {
            let dat = this.conditionCreator();
            axios.post('car/search/offer', {conditions: dat, minPrice: this.minPrice, maxPrice: this.maxPrice}, {
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                }
            })
                .then(({data}) => {
                    this.cars = data.offers;
                    console.log(data)
                })
                .catch((error) => {
                    console.log(error.response);
                })
        }
    }
}
</script>

<style scoped>

</style>
