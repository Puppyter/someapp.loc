<template>
<ais-instant-search
    :search-client="searchClient"
    index-name="offers">
    <div class="row row-cols-2  ">
        <div class="col" style="width: 400px">
            <ais-search-box placeholder="Input keywords">

            </ais-search-box>
            <h4 class="text-white-50">Brand</h4>
            <ais-menu-select attribute="manufacture_id" />
            <h4 class="text-white-50">Model</h4>
            <ais-menu-select attribute="model_id" />
            <h4 class="text-white-50">Fuel</h4>
            <ais-menu-select attribute="fuel_id" />
            <h4 class="text-white-50">Body Type</h4>
            <ais-menu-select attribute="body_type_id" />
            <h4 class="text-white-50">Motor</h4>
            <ais-menu-select attribute="motor_id" />
            <h4 class="text-white-50">Price</h4>
            <ais-range-input attribute="price"
                              />
        </div>
    <div class="col">
        <ais-infinite-hits>
            <template v-slot="{
                items,
                refinePrevious,
                refineNext,
                isLastPage,
                sendEvent,
            }">
                    <div class="col" v-for="item in items" :key="item.objectID">
                        <div class="card mb-3 text-white" style="width: 133%; background-color: #231f32">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img class="img-fluid rounded-start"
                                         style="width: 223px; height: 225px"
                                         :src="item.images"
                                         alt="...">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body bg-opacity-50">
                                        <a :href="'/offers/show'+'?'+'id='+item.id" style="text-decoration: none">
                                            <h3 class="card-title text-white">
                                                {{ item.manufacture_id + ' ' + item.model_id }}
                                            </h3>
                                        </a>
                                        <p class="card-text">{{ '$' + item.price }}</p>
                                        <p class="card-text"><small class="text-muted">{{ item.city }}</small></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <li v-if="!isLastPage">
                        <button @click="refineNext">
                            Show more results
                        </button>
                    </li>
            </template>
        </ais-infinite-hits>
    </div>
    </div>
</ais-instant-search>
</template>

<script>
import algoliasearch from 'algoliasearch/lite';
export default {
    name: "algoOffers",
    data: () => ({
        minPrice: 0,
        maxPrice: 9999999,
        manufactureName: '',
        manufactures: '',
        cars: {},
        manufacture_id: '',
        model_id: '',
        models: '',
        fuels: '',
        fuel_id: '',
        bodyTypes: '',
        body_type_id: '',
        motors: '',
        motor_id: '',
        searchClient: algoliasearch(
            'K4ZXU1LBWR',
            '79feba9df561d10ac7ab7ee5bb5a694e'),
    })
}
</script>

<style scoped>

</style>
