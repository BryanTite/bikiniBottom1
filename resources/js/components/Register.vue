<template>
     <div class="container cabecera-bg">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div v-if="error !== null" class="alert alert-danger alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

                    <strong>{{error}}</strong>
                </div>
                <div class="box-form mt-5">
                <h1 class="titulos centrado">REGISTRATE</h1>
                     
                        <form class="centrado">
                            <label for="name" class="col-sm-4 col-form-label texto text-md-right">Nombre:</label>

                            <div class="form-group  ">
                                    <input id="name" type="text" class="form-control texto mx-auto" v-model="name"
                                        required autocomplete="off" placeholder="Inserta nombre">
                            </div>

                            <label for="surname" class="col-sm-4 col-form-label texto text-md-right">Apellidos:</label>

                            <div class="form-group  ">
                                    <input id="surname" type="text" class="form-control texto mx-auto" v-model="surname"
                                        required autocomplete="off" placeholder="Inserta apellidos">
                            </div>
                            <label for="phone" class="col-sm-4 col-form-label texto text-md-right">Telefono:</label>

                            <div class="form-group  ">
                                    <input id="phone" type="number" class="form-control texto mx-auto" v-model="phone"
                                        required autocomplete="off" placeholder="Inserta contraseña">
                            </div>
                            <label for="email" class="col-sm-4 col-form-label text-md-right texto">Correo electronico:</label>

                            <div class="form-group">
                                <input id="email" type="email" class="form-control texto mx-auto" v-model="email" required
                                           autofocus autocomplete="off" placeholder="Inserta correo">

                            </div>

                            <label for="password" class="col-sm-4 col-form-label texto text-md-right">Contraseña:</label>

                            <div class="form-group  ">
                                    <input id="password" type="password" class="form-control texto mx-auto" v-model="password"
                                           required autocomplete="off" placeholder="Inserta contraseña">
                            </div>


                            <div class="form-group centrado">
                                    <button type="submit" class=" mt-3 btn btn-basico" @click="register">
                                        REGISTRAR
                                    </button>

                                    <p class="texto centrado mt-2">
                                        Ya tienes una cuenta?
                                        <router-link to="/login" class="texto redes" style="color:blueviolet">Iniciar sesion</router-link>
                                    </p>
                            </div>






                        </form>
                </div>

            </div>
        </div>
    </div>
</template>
<style scoped>
input{
    border-color:#946fb5;
    border-radius: 0!important;;
    border-width: 2px;
    width: 400px;
    margin:2px;
}
input:hover{
    border-color:white;

}
</style>

<script>
 export default {
     name: "Register",
     data() {
        return {
            email:"",
            name:"",
            surname:"",
            password:"",
            phone:"",
            error: null
        }
    },
    methods: {
    //registro
       register(e){
           e.preventDefault()
           if(this.password.length > 0) {
               this.$axios.get('/sanctum/csrf-cookie').then(response => {
                   this.$axios.post('api/register', {
                       email: this.email,
                       name: this.name,
                       surname: this.surname,
                       password: this.password,
                       phone: this.phone

                   })
                       .then(response => {
                           if (response.data.success) {
                               window.location.href = "/login"
                           } else {
                               this.error = response.data.message
                           }
                       })
                       .catch(function (error) {
                           console.error(error);
                       });
               })
           }
        }
    }

}
</script>
