<template>
    <div class="container" style="    background-image:url(../assets/img/menu.svg);">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div v-if="error !== null" class="alert alert-danger alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

                    <strong>{{error}}</strong>
                </div>
                <div class="box-form mt-5">
                <h1 class="titulos centrado">INICIAR SESION</h1>
                     
                        <form class="centrado">
                            <label for="email" class="col-sm-4 col-form-label text-md-right texto">Correo:</label>

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
                                    <button type="submit" class=" mt-3 btn btn-basico" @click="doLogin">
                                        INICIAR SESION
                                    </button>
                                    <p class="texto centrado mt-2">
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
                                window.location.href = "/login"
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
<style scoped>
input{
    border-color:#946fb5;
    border-radius: 0!important;;
    border-width: 2px;
    width: 400px;
}
input:hover{
    border-color:white;

}

</style>

