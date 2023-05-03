<template>
    <!-- filtros -->
    <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
    <!-- fin filtros -->
   <!-- packs y tarifas -->
   <div class="row row-cols-1 row-cols-md-2 g-4">
  <div class="col">
    <div class="card bg-info mt-3" v-for="(ticket, index) in tickets" :key="ticket.id">
      <img v-if="ticket.image" v-bind:src="'/img/' + ticket.image" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title titulos">{{ticket.name}}<p>{{ticket.price}}€</p></h5>
        <p class="card-text texto">{{ticket.description}}</p>
          <button @click="insertarEntrada(ticket.id, ticket.name, ticket.price)">COMPRAR</button>
      </div>
    </div>
  </div>
</div>
   <!-- fin packs y tarifas -->
</template>

<script>
export default {
    data() {
        return {

            tickets: [],
            strSuccess: '',
            strError: ''

        }
    },
    created() {

        this.$axios.get('/sanctum/csrf-cookie').then(response => {
            this.$axios.get('api/tickets')
                .then(response => {
                    this.tickets = response.data;

                })
                .catch(function (error){
                    console.log(error);
                });

        });

    },
    methods: {
        insertarEntrada(id, name, price) {
            this.$axios.post('/api/insTickets', {
                id: id,
                name: name,
                price: price
            }).then(response => {
                console.log('Entrada añadida al carrito');
            }).catch(error => {
                console.log('Error al añadir entrada al carrito', error);
            });
        }
    },
}
</script>
