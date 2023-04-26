<template>
    <div class="container">
        <div class="row jutify-content-center">
            <div class="col-md-8 container">
                <div v-if="error !== null" class="alert alert-danger alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <strong>{{error}}</strong>
                </div>


                <h1 class="titulos centrado">REGISTRO</h1>
                      <div class="container">
                        <form class="texto centrado">
                            <div class="form-group row mt-1">
                                <div class="col-md-8">
                                <label for="email" class="mx-auto col-sm-4 col-form-label text-md-right">Correo electrónico:</label>

                                    <input id="email" type="email" class="form-control" v-model="email" required
                                           autofocus autocomplete="off" placeholder="Introduce tu email">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-8">
                                <label for="name" class="col-sm-4 col-form-label text-md-right">Nombre</label>

                                    <input id="name" type="text" class="form-control" v-model="name" required
                                           autocomplete="off"  placeholder="Introduce tu nombre">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-8">
                                <label for="surname" class="col-sm-4 col-form-label text-md-right">Apellido</label>

                                    <input id="surname" type="text" class="form-control" v-model="surname" required
                                           autocomplete="off"  placeholder="Introduce tus apellidos">
                                </div>
                            </div>



                            <div class="form-group row mt-1">
                                <div class="col-md-8">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Contraseña</label>

                                    <input id="password" type="password" class="form-control" v-model="password" minlength="4" pattern="[A-Za-z][A-Za-z0-9]*[0-9][A-Za-z0-9]*" title="Mínimo de 5 carácteres y 1 número." required
                                           autocomplete="off" placeholder="Introduce contraseña">
                                </div>
                            </div>


                            <div class="form-group row">
                                <div class="col-md-8">
                                <label for="phone" class="col-sm-4 col-form-label text-md-right">Teléfono</label>

                                    <input id="phone" type="number" class="form-control" v-model="phone" required
                                           autocomplete="off"  placeholder="Introduce tu número">
                                </div>
                            </div>

                            <div class="form-group row mt-1 mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-basico" @click="register">
                                        REGISTRAR-SE
                                    </button>
                                    <p class="texto">
                                        Ya tengo una cuenta.
                                        <router-link to="/login" class="texto redes" style="color:blueviolet">Iniciar sesion</router-link>
                                    </p>
                                </div>
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
