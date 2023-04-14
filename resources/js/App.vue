<template>
    <!-- header -->
    <div class="container-fluid background" >
        <nav class="navbar navbar-expand-sm mb-4">
            <router-link to="/" class="logo"><img src="../assets/icons/logoBB.svg" class="logo" alt="logo bikini bottom aquarium"></router-link>
            <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId"
                    aria-expanded="false" aria-label="Toggle navigation"></button>
            <div class="navbar-nav" v-if="isLoggedin">
                <router-link to="/dashboard" class="nav-item nav-link txt-menu">Dashboard</router-link>
                <router-link to="/posts" class="nav-item nav-link txt-menu">xxxx</router-link>
                <router-link to="/purchase" class="nav-item nav-link txt-menu">xxxx</router-link>
                <a class="nav-item nav-link txt-menu" style="cursor: pointer;" @click="logout">salir</a>
            </div>
            <div class="navbar-nav" v-else>
                <router-link to="/" class="nav-item nav-link txt-menu">Home</router-link>
                <router-link to="/tickets" class="nav-item nav-link txt-menu">Servicios y tarifas</router-link>
                <div class="iconografia-menu">
                    <router-link to="/login" class="nav-item nav-link txt-menu"><img src="../assets/icons/fb.svg" class="iconos" alt="logo bikini bottom aquarium"></router-link>
                </div>
                
            </div>
        </nav>
<!-- contenido componentes -->
        <router-view></router-view>
<!-- footer -->
        <footer class="text-lg-start">

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
                            
                            <a class="redes" href="https://www.instagram.com/"><p><img class="iconos-footer" src="../assets/icons/ig.svg" alt="Icono de Instagram"> @aquariumBikiBottom</p></a>                                
                            <a class="redes" href="https://www.facebook.com/"><p><img class="iconos-footer" src="../assets/icons/fb.svg" alt="Icono de Facebook"> Aquarium Bikini Bottom</p></a>                            </div>

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
                                <router-link to="/politics">Política de privacidad de datos</router-link>
                            </p>
                            <p>
                                <router-link to="/cookies">Política de cookies</router-link>
                            </p>
                            <p>
                                <router-link to="/warning">Aviso legal</router-link>
                            </p>
                            <p>
                                <router-link to="/reviews">Reseñas</router-link>
                            </p>
                        </div>

                    </div>
                    <!-- Grid row -->
                </div>
            </section>
            <!-- Section: Links  -->
        </footer>

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
.redes{
    text-decoration: none;
    color:black;
}
    </style>

