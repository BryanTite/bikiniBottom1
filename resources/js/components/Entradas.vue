<template>
    <!-- filtros -->
    <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
    <!-- fin filtros -->
   <!-- packs y tarifas -->
   <!-- <div class="row centrado mt-3">
<div class="col-sm-4">
        <div class="card mt-3" v-for="(ticket, index) in tickets" :key="ticket.id">
        <img v-if="ticket.image" v-bind:src="'/img/' + ticket.image" class="card-img-top" alt="...">
        <div class="card-body box-form">
            
            <h5 class="card-title titulos">{{ticket.name}}
                <p class="texto">{{ticket.price}}€</p>
            </h5>
            
            <button class="btn btn-basico" @click="insertarEntrada(ticket.id, ticket.name, ticket.price)">COMPRAR</button>
            <div class="dropdown">
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li><p class="card-text texto">{{ticket.description}}</p></li>
                </ul>
            </div>
        </div>
        </div>
    </div>
</div> -->
    <!-- </div> -->
<!-- </div> -->
<div class="row centrado mt-3">
        <div class="card" v-for="(ticket, index) in tickets" :key="ticket.id">
        <div class="card-front">
            
            <h2 class="titulos text-center">{{ticket.name}}<p class="precio text-center">{{ticket.price}} €</p></h2>
            <img v-if="ticket.image" v-bind:src="'/img/' + ticket.image" class="card-img-top" alt="Imagen">
            
        </div>
        <div class="card-back">
            <p>{{ticket.description}}</p>
            <button class="btn btn-basico" @click="insertarEntrada(ticket.id, ticket.name, ticket.price)">COMPRAR</button>
        </div>
        </div>
</div>

   <!-- fin packs y tarifas -->
</template>
<style scooped>
.card {
  width: 250px;
  height: 250px;
  perspective: 1000px;
  position: relative;
  margin:10px;
  border-radius: 0%;
}

.card-front, .card-back {
  position: absolute;
  width: 100%;
  height: 100%;
  backface-visibility: hidden;
  transition: transform 0.6s;
}

.card-front {
  transform: rotateY(0deg);
}

.card-back {
  transform: rotateY(180deg);
}

.card:hover .card-front {
  transform: rotateY(-180deg);
}

.card:hover .card-back {
  transform: rotateY(0deg);
}


.precio {
  margin: 0;
  font-size: 24px;
}

.desplegable {
  margin-top: 20px;
  color: #007bff;
  cursor: pointer;
}

.informacion-adicional {
  display: none;
  margin-top: 20px;
}

.producto:hover .informacion-adicional {
  display: block;
}


.card-img-top{
    border-radius: 0%;
}

.box-form{
    margin-bottom: 0%!important;
    background-color: #6fcbfe!important;

}

</style>
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
