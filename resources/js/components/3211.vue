<template>


    <div class="card">
        <div class="card-body cabecera-bg">
            <div class="d-flex justify-content-between pb-2 mb-2">
                <h2 class="card-title titulos">BASE DE DATOS  ·  ENTRADAS  ·  ACTIVIDADES</h2>
                <div>
                    <button class="btn btn-basico" type="button" @click="this.$router.push('/tickets/add')">añadir nueva entrada</button>
                </div>
            </div>


            <table class="table table-hover table-sm background box-form">
                <thead class="texto bg">
                <tr>
                    <th width="50" class="text-center">Identificador</th>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th class="text-center" width="120">Imagen</th>
                    <th class="text-center" width="120">Precio</th>
                    <th class="text-center" width="10">Acciones</th>
                </tr>
                </thead>
                <tbody class="texto">
                <tr v-for="(ticket, index) in tickets" :key="ticket.id">
                    <td class="text-center">{{index + 1}}</td>
                    <td>{{ticket.name}}</td>
                    <td>{{ticket.description}}</td>
                    <td class="text-center">
                        <div v-if="ticket.image">
                            <!-- se recoge la imagen de la ruta con el nombre guardado -->
                            <img alt="post-img" class="image" width="100" v-bind:src="'/img/' + ticket.image">
                        </div>
                    </td>
                    <td class="text-center">{{ticket.price}} €</td>
                    <td class="text-center">
                        <router-link :to="{name:'editticket', params: { id: ticket.id }}" class="btn btn-admin"><img src="../../assets/icons/editar.svg" alt="eliminar elemento" class="iconos-footer"></router-link>
                        <button class="btn btn-admin" @click="deleteTicket(ticket.id)"><img src="../../assets/icons/eliminar.svg" alt="eliminar elemento" class="iconos-header"></button>
                    </td>
                </tr>
                </tbody>
            </table>




        </div>
    </div>




 </template>

<style scoped>
tr:hover{
    background-color: #be9bde;
}
tr:hover > td{
    color: white;
}
.image{
    box-shadow: black 2px 2px 10px;
}
.titulos{
    color: #946fb5 !important;
}
.card{
    border-width: 0px!important;
}.bg{
    background-color:#be9bde;
}
td > a{
    margin-right: 20px;
}
</style>

 <script>
 export default {
     name: "Tickets",
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

        deleteTicket(id) {
            axios.delete(`api/tickets/delete/${id}`)
                .then(response => {
                    console.log(response.data);
                    const index = this.tickets.findIndex(ticket => ticket.id === id);
                    this.tickets.splice(index, 1);
                })
                .catch(error => {
                    console.log(error.response.data);
                });
        }

    }
 }
 </script>
