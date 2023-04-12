<template>
    <!-- header -->
    <div class="container-fluid background" >
        <nav class="navbar navbar-expand-sm bg-info mb-4 txt-menu">
            <a class="navbar-brand" href="#"><img src="../assets/icons/logoBB.svg" class="logo" alt="logo bikini bottom aquarium"></a>
            <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId"
                    aria-expanded="false" aria-label="Toggle navigation"></button>
            <div class="navbar-nav" v-if="isLoggedin">
                <router-link to="/dashboard" class="nav-item nav-link">Dashboard</router-link>
                <router-link to="/posts" class="nav-item nav-link">xxxx</router-link>
                <router-link to="/purchase" class="nav-item nav-link">xxxx</router-link>
                <a class="nav-item nav-link" style="cursor: pointer;" @click="logout">salir</a>
            </div>
            <div class="navbar-nav" v-else>
                <router-link to="/" class="nav-item nav-link">Home</router-link>
                <router-link to="/tickets" class="nav-item nav-link">Servicios y tarifas</router-link>
                <router-link to="/login" class="nav-item nav-link">Login</router-link>
                <router-link to="/register" class="nav-item nav-link">Register</router-link>
                
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
                    <div class="row tipografiaFooter">
                        <!-- Grid column -->
                        <div class= "col col-sm-2 pt-3 espacioLogo">
                            <a class="navbar-brand" href="#"><img src="../assets/icons/logoBB-BN.svg" class="logoBN" alt="logo bikini bottom aquarium"></a>
                         </div>

                        <div class="col col-lg-3 pt-4 redesSocial">
                            <!-- Content -->

                            <h6 class="txt-menu mb-4">REDES Y LOCALIZACIÓN</h6>
                            <p>
                                Carrer Ntra. Sra. de Lourde, 34, 08750 Molins de Rei, Barcelona
                            </p>
                            <div class="alinearRedes">
                                <div class="hoverRedes">
                                    <a href="https://www.instagram.com/marisqueriasantos/?hl=es"><img src="../assets/icons/insta.svg" alt="Icono de Instagram"></a>
                                </div>
                                <div class="hoverRedes">
                                    <a href="https://www.facebook.com/marisqueria.santos/"><img src="../assets/icons/fb.svg" alt="Icono de Facebook"></a>
                                </div>
                            </div>

                        </div>
                        <!-- Grid column -->

                        <!-- Grid column -->
                        <div class="col mb-4 col-sm-3 pt-4 iconosReserva">
                            <!-- Links -->
                            <h6 class="txt-menu mb-4">
                                RESERVAS Y CONTACTO
                            </h6>
                            <p>
                                <img src="../assets/icons/mail.svg" alt="Icono del Mail">
                                seafoodreynas@gmail.com
                            </p>
                            <p>
                                <img src="../assets/icons/movil.svg" alt="Icono del número de móvil">
                                684759824
                            </p>
                            <p>
                                <img src="../assets/icons/movil.svg" alt="Icono del númrero de teléfono fijo">
                                936487258
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
                                <a href="producto/politicas" class="text-reset">Política de privacidad de datos</a>
                            </p>
                            <p>
                                <a href="producto/cookies" class="text-reset">Cookies</a>
                            </p>
                            <p>
                                <a href="producto/aviso" class="text-reset">Aviso legal</a>
                            </p>
                            <p>
                                <a href="usuario/resena" class="text-reset">Reseña</a>
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
