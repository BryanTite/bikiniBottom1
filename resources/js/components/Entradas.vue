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
          <button @click="insertarEntrada(ticket.id)">COMPRAR</button>
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
        insertarEntrada(id) {

            console.log(id);
            this.$axios.get('/sanctum/csrf-cookie').then(response => {
                let existObj = this;


                const formData = new FormData();
                formData.append('id', id);
                formData.append('name', this.name);
                formData.append('description', this.description);

                this.$axios.post('/api/insTickets', formData)
                    .then(response => {
                            existObj.strError = "";
                            existObj.strSuccess = response.data.success;
                            ///console.log(response.data.find(el => el.id == id));
                            console.log(response.data);
                        }
                    )
                    .catch(function (error){
                            existObj.strError = error.response.data.message;
                            existObj.strSuccess = response.data.success;
                        }
                    );

            });
        }
    }
}
</script>
