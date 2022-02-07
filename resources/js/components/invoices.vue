<template>
    <div>
        <input type="text" placeholder="input user Email">
        <table v-if="invoices!=={}">
            <tr v-for="invoice in invoices">
                <td>{{invoice.date}}</td>
                <td>{{}}</td>
            </tr>
        </table>
    </div>
</template>

<script>
export default {
    name: "invoices",
    data: () =>({
        userEmail: '',
        invoices: {},
    }),
    methods: {
      takeInvoices(){
          axios.post('/admin/user/invoices',{userEmail: this.userEmail})
          .then(({data})=>{
              this.invoices = data.invoices;
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
