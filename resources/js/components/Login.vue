<template>
    <div class="container ">
        <div class="row jutify-content-center">
            <div class="col-lg-12">
                <div v-if="error !== null" class="alert alert-danger alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>


                    <strong>{{error}}</strong>
                </div>
                <!-- <!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Formulario centrado</title>

</head>
<body>

  <form class="container mt-3 mb-2 texto" action="#">
    <h2 class="subtitulos">INICIAR SESION</h2>
    <label for="name">Nombre:</label>
    <input type="text" id="name" name="name" placeholder="Escribe tu nombre" required>

    <label for="email">Correo electrónico:</label>
    <input type="email" id="email" name="email" placeholder="Escribe tu correo electrónico" required>

    <button type="submit" class="btn-basico">Enviar</button>
  </form>

</body>
</html> -->

                    <h1 class="titulos centrado">INICIAR SESION</h1>
                      <div class="contenedor">
                        <form class="">
                            <div class="form-group row">
                                <label for="email" class="col-sm-4 col-form-label text-md-right texto">Correo Electronico:</label>
                                <input id="email" type="email" class="form-control texto" v-model="email" required
                                           autofocus autocomplete="off" placeholder="Inserta correo electronico">
                                
                            </div>


                            <div class="form-group row mt-1">
                                <label for="password" class="col-md-4 col-form-label texto text-md-right">Contraseña:</label>
                                    <input id="password" type="password" class="form-control texto" v-model="password"
                                           required autocomplete="off" placeholder="Inserta contraseña">
                            </div>


                            <div class="form-group row mt-1 mb-0 ">
                                
                                    <button type="submit" class="btn-basico" @click="doLogin">
                                        INICIAR SESION
                                    </button>
                                    <p class="texto">
                                        No tienes una cuenta aún?
                                        <router-link to="/register" class="texto redes" style="color:blueviolet">Registrate</router-link>
                                    </p>
                            </div>


                            
                                    

                            
                        </form>
                    </div>
            </div>
        </div>
    </div>
 </template>


 <script>
 export default {
    data() {
        return {
            email: "",
            password: "",
            error: null
        }
    },
    methods: {
        doLogin(e) {
            e.preventDefault()
            if(this.password.length > 0) {
                this.$axios.get('/sanctum/csrf-cookie').then(response => {
                    this.$axios.post('api/login', {
                        email: this.email,
                        password: this.password
                    })
                        .then(response => {
                            if (response.data.success) {
                                console.error('OK');
                                this.$router.go('/login')
                            } else {
                                console.error('No loggin');
                                this.error = response.data.message
                            }
                        })
                        .catch(function (error) {
                            console.error(error);
                        });
                })
            }
        }
    },
    beforeRouteEnter(to, from, next){
        if(window.Laravel.isLoggedin){
            return next('dashboard');
        }
        next();
    }
 }
 </script>
  <!-- <style scoped>
  body {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
  }

  form {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    width: 500px;
    background-color: white;
    padding: 20px;
  }

  input[type="text"], input[type="email"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border-radius: 5px;
    border: none;
    background-color: #6fcbfe;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
    color:black;
  }
  ::placeholder{
    color:black;
  }

  textarea {
    height: 100px;
  }

</style> -->