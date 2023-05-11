<template>


    <div class="card">
        <div class="card-body cabecera-bg">
            <div class="d-flex justify-content-between pb-2 mb-2">
                <h2 class="card-title titulos">BASE DE DATOS  ·  USUARIOS  ·  ROLES</h2>
                <div>
                    <button class="btn btn-basico" type="button" @click="this.$router.push('/users/add')">añadir nuevo usuario</button>
                </div>
            </div>


            <table class="table table-hover table-sm background box-form">
                <thead class="texto bg">
                <tr>
                    <th width="50" class="text-center">Identificador</th>
                    <th>Email</th>
                    <th>Nombre</th>
                    <th class="text-center" width="120">Apellidos</th>
                    <th class="text-center" width="10">Password</th>
                    <th class="text-center" width="10">Phone</th>
                    <th class="text-center" width="10">Acciones</th>
                </tr>
                </thead>
                <tbody class="texto">
                <tr v-for="(user, index) in users" :key="user.id">
                    <td class="text-center">{{index + 1}}</td>
                    <td>{{user.email}}</td>
                    <td>{{user.name}}</td>
                    <td>{{user.surname}}</td>
                    <td class="text-center">*********</td>
                    <td class="text-center">{{user.phone}}</td>
                    <td class="text-center">
                        <router-link :to="{name:'edituser', params: { id: user.id }}" class="btn btn-admin"><img src="../../assets/icons/editar.svg" alt="eliminar elemento" class="iconos-footer"></router-link>
                        <button class="btn btn-admin" @click="deleteUser(user.id)"><img src="../../assets/icons/eliminar.svg" alt="eliminar elemento" class="iconos-header"></button>
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
table{
    background-color: whitesmoke;
    vertical-align: middle;
}
.card{
    border-width: 0px!important;
}.bg{
     background-color:#be9bde;
 }

</style>

<script>
export default {
    name: "Users",
    data() {
        return {

            users: [],
            strSuccess: '',
            strError: ''

        }
    },
    created() {

        this.$axios.get('/sanctum/csrf-cookie').then(response => {
            this.$axios.get('api/users')
                .then(response => {
                    this.users = response.data;

                })
                .catch(function (error){
                    console.log(error);
                });

        });

    },
    methods: {

        deleteUser(id) {
            axios.delete(`api/users/delete/${id}`)
                .then(response => {
                    console.log(response.data);
                    const index = this.users.findIndex(user => user.id === id);
                    this.users.splice(index, 1);
                })
                .catch(error => {
                    console.log(error.response.data);
                });
        }

    },
    beforeRouteEnter(to, from, next){
        if(!window.Laravel.isLoggedin){
            window.location.href = "/";
        }else{
            if((window.Laravel.user.roles[0].name === 'Admin') || (window.Laravel.user.roles[0].name === 'Moderator')){
                next();
            }else{
                next('/');
            }
        }
    }
}
</script>
