<template>
    <div>
        <input type="text" placeholder="input invoice number" v-model="invoiceNumber">
        <button class="btn btn-danger text-white" style="background-color: #FD5631" @click="takeInvoice">Take Invoice</button>
        <table class="table" v-if="invoice!==''">
            <tr>
                <td class="text-white">id: {{invoice.id}}</td>
            </tr>
            <tr>
                <td class="text-white">Amount Due: {{invoice.amount_due}}</td>
            </tr>
            <tr>
                <td class="text-white">Amount Paid: {{invoice.amount_paid}}</td>
            </tr>
            <tr>
                <td class="text-white">Count: {{invoice.attempt_count}}</td>
            </tr>
            <tr>
                <td class="text-white">Customer: {{invoice.customer_name}}</td>
            </tr>
            <tr>
                <td class="text-white">Email: {{invoice.customer_email}}</td>
            </tr>
            <tr>
                <td class="text-white">Phone: {{invoice.customer_phone}}</td>
            </tr>
        </table>

    </div>
</template>

<script>
export default {
    name: "invoices",
    data: () =>({
        invoiceNumber: '',
        invoice: '',
    }),
    methods: {
      takeInvoice(){
          axios.post('/admin/user/invoices',{invoiceNumber: this.invoiceNumber})
          .then(({data})=>{
              this.invoice = data.invoice;
              console.log(data)
          })
          .catch(error => {
              console.log(error.response)
          })
      }
    },
}
</script>

<style scoped>

</style>
