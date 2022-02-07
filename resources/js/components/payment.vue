<template>
    <div>
        <div  v-if="acceptShow ===false">
            <h3 class="text-white-50">Input your card information</h3>
            <div class="form-control w-50 border-dark"
                 style="font-size: 18px"
            >
                <h5>Cardholder name</h5>
                <input class="form-control border-dark"
                       type="text"
                       v-model="nameOnCard"
                >
                <label class="h5">Card</label>
                <div id="card-element"></div>
                <button id="card-button"
                        v-if="showSubmit === true"
                        class="btn btn-primary"
                        style="margin-top:1em"
                        @click="submitPaymentMethod()"
                >
                    Process Payment
                </button>
                <button v-else disabled class="btn btn-primary" style="margin-top:1em">
                    Process Payment
                </button>
            </div>
        </div>
        <accept-payment v-else :payment-method="this.paymentMethod"></accept-payment>
    </div>
</template>

<script>
import AcceptPayment from "./acceptPayment";
export default {
    name: "payment",
    components: {AcceptPayment},
    data: ()=>({
        stripe: '',
        elements: '',
        card: '',
        intentToken: undefined,
        paymentMethod: undefined,
        nameOnCard: '',
        showSubmit: true,
        acceptShow: false,
    }),
    mounted() {
        this.includeStripe('js.stripe.com/v3/', () => {
            this.configureStripe();
        });
    },
    methods: {
        includeStripe( URL, callback ){
            let documentTag = document, tag = 'script',
                object = documentTag.createElement(tag),
                scriptTag = documentTag.getElementsByTagName(tag)[0];
            object.src = '//' + URL;
            if (callback) { object.addEventListener('load', function (e) { callback(null, e); }, false); }
            scriptTag.parentNode.insertBefore(object, scriptTag);
        },
        configureStripe(){
            this.stripe = Stripe( process.env.MIX_STRIPE_KEY);

            this.elements = this.stripe.elements();
            this.card = this.elements.create('card');

            this.card.mount('#card-element');
        },
        loadIntent() {
            return axios.get('/setup-intent')
                .then(({data}) => {
                    console.log("loadIntent", data);
                    this.intentToken = data;

                })
            .catch((error)=>{
                console.log(error.response)
                throw error;
            });
        },

        createPaymentMethod() {
            return this.stripe.createPaymentMethod({
                type: 'card',
                card: this.card,
                billing_details: {
                    name: this.nameOnCard,
                },
            })
            .then(result => {
                console.log("createPaymentMethod", result);
                if (result.error) {
                    throw result.error;
                } else {
                    this.paymentMethod = result.paymentMethod;
                }
            });
        },

        submitPaymentMethod() {
            Promise.all([this.loadIntent(), this.createPaymentMethod()])
                .then( () => {
                    console.log("Ready to pay!!!!!!!!!!!!");
                    this.showSubmit = false;
                    this.acceptShow = true;
                })
                .catch(e => {
                    console.error('submitPaymentMethod', e);
                })
        }
    }
}
</script>

<style scoped>

</style>
