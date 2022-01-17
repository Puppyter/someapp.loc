<template>
  <div>
      <div>
          <span>
              <h5>Manufacture:</h5>
              <p>{{offer.manufacture.name}}</p>
          </span>
          <span>
              <h5>Model:</h5>
              <p>{{offer.model.name}}</p>
          </span>
          <span>
              <h5>Motor:</h5>
              <p>{{offer.motor.name}}</p>
          </span>
          <span>
              <h5>Body Type:</h5>
              <p>{{offer.body_type.name}}</p>
          </span>
          <span>
              <h5>Price:</h5>
              <p>{{offer.price}}</p>
          </span>
          <span>
              <h5>Accident:</h5>
              <p v-if="offer.accident===0">Not accidents</p>
              <p v-else>Accidents</p>
          </span>
          <span>
              <h5>Insurance:</h5>
              <p v-if="offer.insurance === 0">Without insurance</p>
              <p v-else>Has insurance</p>
          </span>
          <span>
              <h5>Color:</h5>
              <p >{{offer.color}}</p>
          </span>
          <span>
              <h5>Mileage:</h5>
              <p>{{offer.mileage}}</p>
          </span>
          <span>
              <h5>Repainted:</h5>
              <p v-if="offer.repainted === 0">No Repaint</p>
              <p v-else>Repainted</p>
          </span>
      </div>
  </div>
</template>

<script>
export default {
    name: "Offer",
    props: ['offer'],
    data: () => ({

    })
}
</script>

<style scoped>

</style>
