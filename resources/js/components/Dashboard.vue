<template>
    <div class="container cabecera-bg">
         <div class="row justify-content-center">
             <div class="col-md-8">
                 <div class="box-form mt-5">
                 <h1 class="titulos centrado">MI PERFIL</h1>
                      
                         <form class="container col-sm-4">
                            
                            
                            <label for="name" class="texto morado">Nombre:</label>
                            <p class="texto">{{user.name}}</p>

                            <label for="surname" class="texto morado">Apellido:</label>
                            <p class="texto">{{user.surname}}</p>

                            <label for="email" class="texto morado">Correo electronico:</label>
                            <p class="texto"> {{user.email}}</p>

                            <label for="name" class="texto morado">Telefono:</label>
                            <p class="texto">{{user.phone}}</p>
 
                         </form>
                 </div>
 
             </div>
         </div>
     </div>
 </template>
 
 <script>
 export default {
    name: "Dashboard",
    data() {
        return {
            isLoggedin: false,
            user: null,
        }
    },
    created() {
        this.$axios.get('api/user')
        if(window.Laravel.isLoggedin){
            this.isLoggedin =true;
            this.user = window.Laravel.user;
        }
    },
    methods: {
    //cerrar sesion
        logout(e) {
            e.preventDefault()
            this.$axios.get('/sanctum/csrf-cookie').then(response => {
                this.$axios.post('api/logout')
                    .then(response => {
                        if (response.data.success) {
                            window.location.href = "/"
                        } else {
                            console.log(response);
                        }
                    })
                    .catch(function (error) {
                        console.error(error);
                    });
            })


        }
    },
 }
 </script>
 
 <style scoped>

 
 </style>
