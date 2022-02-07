<template>
    <div style="background-color:rgba(34,30,50,0.5)">
        <div v-if="alertShow === true" class="alert alert-danger" role="alert">
            You already subscriber!!!!
        </div>
        <h3 class="text-white-50">
            Subscription for the month 10$
        </h3>
        <h3 class="text-white-50">
            Cardholder name: {{paymentMethod.billing_details.name}}
        </h3>
        <h3 class="text-white-50">
            Card number: **** **** **** {{paymentMethod.card.last4}}
        </h3>
        <h3 class="text-white-50">
            Card expired: {{paymentMethod.card.exp_month}} / {{paymentMethod.card.exp_year}}
        </h3>
        <button
            class="btn btn-success"
            v-if="acceptShow === true"
            @click="AcceptPayment"
        >
            Accept
        </button>
        <button
            class="btn btn-success"
            v-else
            disabled
        >
            Accept
        </button>
        <a v-if="acceptShow===true"
            href="/offer/up/show"
           class="btn btn-danger"
        >
            Decline
        </a>
    </div>
</template>

<script>
export default {
    name: "acceptPayment",
    props: ['paymentMethod','price'],
    data:() =>({
       acceptShow:true,
        alertShow: false,
    }),
    methods: {
        AcceptPayment(){
            this.acceptShow=false
            axios.post('/accept/payment/one_time',{paymentMethod: this.paymentMethod})
            .then(({data})=>{
                console.log(data)
                if (data.status === true)
                {
                    // window.location.href = '/offers';
                }
                this.alertShow = true;
            })
            .catch(error =>{
                console.log(error.response);
            })
        },
    },
}
</script>

<style scoped>

</style>
