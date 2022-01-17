<template>
    <div>
    <div>
        <div class="btn-group" v-for="tab in tabs" @click="currentTab = tab">
            <a class="btn btn-primary" :href="tab.href">{{tab.name}}</a>
        </div>

    </div>
    </div>
</template>

<script>

export default {
    name: "NewCar",
    data: () => ({
        tabs:[
        {
            name:'model',
            href: '/car/show/create/model'
        },
        {
            name:'motors',
            href: '/car/show/create/motor'
        },
        {
            name:'body-type',
            href: '/car/show/create/bt'
        },
        {
            name:'manufacture',
            href: '/car/show/create/manufacture'
        },
        {
            name:'fuel',
            href: '/car/show/create/fuel'
        }
    ],
    currentTab:'',
            }),
    mounted() {
        this.currentTab =this.tabs[3]
    },
    methods:{
        componentCurrentTab(){
            return 'create-'+this.currentTab;
        }
    },
}
</script>

<style scoped>

</style>
