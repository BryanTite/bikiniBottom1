<template>
    <!-- filtros -->
    <form class="d-flex texto" role="search" method="GET" @submit.prevent>
        <input class="form-control me-2" type="search" v-model="busqueda" placeholder="Buscar ahora . . ." aria-label="Search">
        <button class="btn btn-basico" type="submit">🔎</button>
    </form>

    <!-- fin filtros -->
   <!-- packs y tarifas -->
   <div class="container">
    <div class="row centrado">
        <div class="col-md-4 col-sm-6" v-for="(ticket, index) in enlistarEntradas" :key="ticket.id">
        <div class="card" style="border-radius: 0%;" v-bind:style="{ backgroundImage: `url(/img/${ticket.image})` }">
            <h2 class="titulos">{{ticket.name}}</h2>
            <p class="precio difuminado">{{ticket.price}}<span class="signo">€</span></p>
            <button v-if="isLoggedin" class="btn btn-basico" @click="insertarEntrada(ticket.id, ticket.name, ticket.price)">COMPRAR</button>
            <button v-else class="btn btn-basico" @click="$router.push('/login')">COMPRAR</button>
        </div>
        </div>
    </div>
</div>



   <!-- fin packs y tarifas -->
</template>
<style scoped>

.card-image{
border-width: 2px;
border-style: solid;
border-color: white;}
.d-flex {
  display: flex;
  justify-content: center;
}

input{
    border-color:#946fb5;
    border-radius: 0!important;
    border-width: 2px;
    width: 400px
}
input:hover{
    border-color:white;

}

h1 {
color: #946fb5;
text-shadow: white 1px 1px;

}
.precio{
margin-top: -20px
}
.card{
    border-radius: 0%;
    background-size: cover;
    background-position: center;
    border-style:solid;
    border-color:white;
    transition: all 0.3s ease;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
    margin: 5%;

}

.difuminado {
  background-image: radial-gradient(circle at center, rgba(0,0,0,0.8) 0%, rgba(0,0,0,0) 40%);
}



.titulos {
  color: white;
  -webkit-text-stroke: 1px #946fb5;
  background-image: linear-gradient(to bottom, rgba(0,0,0,3), rgba(0, 0, 0, 0));
}


.card:hover{
    transform: scale(1.05);
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.4);

}


</style>
<script>

export default {
    data() {
        return {

            tickets: [],
            strSuccess: '',
            strError: '',
            busqueda:'',
            isLoggedin: false,
            user: null,

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
        this.$axios.get('api/user')
        if(window.Laravel.isLoggedin){
            this.isLoggedin =true;
            this.user = window.Laravel.user;
        }

    }, computed:{
        enlistarEntradas() {
      if (this.busqueda.trim() == '') {
        return this.tickets;
      } else {
        return this.tickets.filter((ticket) =>
          ticket.name.toLowerCase().includes(this.busqueda.toLowerCase())
        );
      }
    },
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
        },
        restriccion(role){
            if(this.user && this.user.roles){
                return this.user.roles.some(userRol => userRol.name === role);
            }
            return false;
        }

    },
}
</script>
