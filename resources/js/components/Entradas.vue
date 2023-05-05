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
<div class="row centrado mt-3">

    <div class="col-sm-4"  v-for="(ticket, index) in tickets" :key="ticket.id">
        <div class="card" style="border-radius: 0%;">
    <h5 class="card-title titulos">{{ticket.name}}</h5>
    <div style="position: relative;">
        <img v-if="ticket.image" v-bind:src="'/img/' + ticket.image" class="card-img-top" alt="...">
        <div style="position: absolute; top: 10px; left: 10px;">
            <div class="descripcion-precio box-form" style="opacity: 0;">
                <p class="precio text-center">{{ticket.price}}€</p>
                <p class="descripcion text-center">{{ticket.description}}</p>
            </div>
        </div>
    </div>
    <button class="btn btn-basico" @click="insertarEntrada(ticket.id, ticket.name, ticket.price)">COMPRAR</button>   
</div>




    </div>
</div>
   <!-- fin packs y tarifas -->
</template>
<style scooped>
.card{
    width:350px;
    border-radius: 0%;
}
.card-img-top{
    border-radius: 0%;
    widows: 10px;
}
.dropdown-menu{
    border-radius: 0%;
    padding: 10px;

}
.box-form{
    margin-bottom: 0%!important;
    background-color: #6fcbfe!important;

}

.descripcion-precio:hover {
    opacity: 1!important;
    background-color: #6fcbfe;
    transform: rotate(360deg);
    transition-duration: 1s;
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
