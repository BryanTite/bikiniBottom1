<template>
    <!-- header -->
    <div class="container-fluid fondo" >
        <div class="container background">
        <nav class="navbar navbar-expand-lg cabecera-bg">
  <div class="container-fluid">
    <router-link to="/" class="logo"><img src="../assets/icons/logoBB.svg" class="logo" alt="logo bikini bottom aquarium"></router-link>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 txt-menu">
        <li class="nav-item dropdown">
          <router-link class="nav-link" to="/park" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            INSTALACIONES
          </router-link>
        </li>
        <li class="nav-item">
          <router-link  to="/" class="nav-link">ENTRADAS</router-link>
        </li>
        <li class="nav-item" v-if="isLoggedin">
            <router-link  to="/tickets" class="nav-link">PANEL CONFIGURACION</router-link>
        </li>
        <li>
            <!-- <a class="nav-item nav-link" style="cursor: pointer;" @click="logout">logout</a> -->

        </li>
     
      </ul>
        <div class="d-flex">
            <router-link v-if="isLoggedin" to="/login" class="nav-item nav-link txt-menu" @click="logout"><img src="../assets/icons/salir.svg" class="iconos-header" alt="iniciar sesion"></router-link>

            <router-link to="/login" class="nav-item nav-link txt-menu ms-2"><img src="../assets/icons/user.svg" class="iconos-header" alt="iniciar sesion"></router-link>
        
        </div>
    </div>
  </div>
</nav>
<!-- contenido componentes -->
        <router-view></router-view>
<!-- footer -->
        <footer class=" text-lg-start mt-2">

            <!-- Section: Links  -->
            <section>
                <div >
                    <!-- Grid row -->
                    <div class="row">
                        <!-- Grid column -->
                        <div class= "col col-sm-2 pt-3">
                            <a class="navbar-brand" href="#"><img src="../assets/icons/logoBB-BN.svg" class="logoBN" alt="logo bikini bottom aquarium"></a>
                         </div>

                        <div class="col col-lg-3 pt-4">
                            <!-- Content -->

                            <h6 class="txt-menu mb-4">REDES Y LOCALIZACIÓN</h6>
                            <p>
                                Carrer Ntra. Sra. de Lourde, 34, 08750 Molins de Rei, Barcelona
                            </p>

                            <a class="redes" href="https://www.instagram.com/"><img class="iconos-footer" src="../assets/icons/ig.svg" alt="Icono de Instagram"> @aquariumBikiBottom</a><p></p>
                            <a class="redes" href="https://www.facebook.com/"><img class="iconos-footer" src="../assets/icons/fb.svg" alt="Icono de Facebook"> Aquarium Bikini Bottom</a>                            </div>

                        <!-- Grid column -->

                        <!-- Grid column -->
                        <div class="col mb-4 col-sm-3 pt-4 iconosReserva">
                            <!-- Links -->
                            <h6 class="txt-menu mb-4">
                                RESERVAS Y CONTACTO
                            </h6>
                            <p>
                                <img class="iconos-footer" src="../assets/icons/mail.svg" alt="Icono del Mail">
                                bikinibottom@aquarium.com
                            </p>
                            <p>
                                <img class="iconos-footer" src="../assets/icons/whats.svg" alt="Icono del número de móvil">
                                +34 651 35 78 74
                            </p>
                            <p>
                                <img class="iconos-footer" src="../assets/icons/phone.svg" alt="Icono del númrero de teléfono fijo">
                                93 648 72 58
                            </p>
                        </div>
                        <!-- Grid column -->

                        <!-- Grid column -->
                        <div class="col mb-4 pt-4 politicas">
                            <!-- Links -->
                            <h6 class="txt-menu mb-4">
                                PRIVACIDAD
                            </h6>
                            <p>
                                <router-link class="redes" to="/politics">Política de privacidad de datos</router-link>
                            </p>
                            <p>
                                <router-link class="redes" to="/cookies">Política de cookies</router-link>
                            </p>
                            <p>
                                <router-link class="redes" to="/warning">Aviso legal</router-link>
                            </p>
                            <p>
                                <router-link class="redes" to="/reviews">Reseñas</router-link>
                            </p>
                        </div>

                    </div>
                    <!-- Grid row -->
                </div>
            </section>
            <!-- Section: Links  -->
        </footer>
    </div>
    </div>

 </template>
 <script>
 export default {
    name: "App",
    data() {
        return {
            isLoggedin: false,
        }
    },
    created() {
        if(window.Laravel.isLoggedin){
            this.isLoggedin =true;
        }
    },
    methods: {
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

