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
        <li class="nav-item">
          <router-link  to="/" class="nav-link">INICIO</router-link>
        </li>
        <li class="nav-item">
          <router-link class="nav-link" to="/park">INSTALACIONES</router-link>
        </li>

        <li class="nav-item">
          <router-link  to="/entradas" class="nav-link">ENTRADAS</router-link>
        </li>
        <li class="nav-item" v-if="isLoggedin">
            <router-link  to="/tickets" class="nav-link">PANEL ENTRADAS</router-link>
        </li>
      <li class="nav-item" v-if="isLoggedin">
          <router-link  to="/users" class="nav-link">PANEL USERS</router-link>
      </li>

      </ul>
        <div class="d-flex">
            <router-link v-if="isLoggedin" to="/login" class="nav-item txt-menu" @click="logout"><img src="../assets/icons/salir.svg" class="iconos-header" alt="iniciar sesion"></router-link>


            <router-link to="/login" class="nav-item txt-menu ms-2"><img src="../assets/icons/user.svg" class="iconos-header" alt="iniciar sesion"></router-link>
            <router-link to="/purchase" class="nav-item txt-menu ms-2"><img src="../assets/icons/buy.svg" class="iconos-header" alt="ir al carro de la compra"></router-link>

        </div>
    </div>
  </div>
</nav>
<!-- contenido componentes -->
        <router-view></router-view>
<!-- footer -->

<footer class=" text-center text-lg-start">
  <section>
    <div class="container text-center text-lg-start mt-5 ">
      <!-- Grid row -->
      <div class="row mt-3">
        <!-- Grid column -->
        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mt-5">
          <!-- Content -->
                       <a class="navbar-brand" href="#"><img src="../assets/icons/logoBB-BN.svg" class="logoBN" alt="logo bikini bottom aquarium"></a>
</div>
        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
          <!-- Links -->
            <h6 class="txt-menu mt-4 mb-4">
                    RESERVAS Y CONTACTO
                </h6>
                <p>
                    <img class="iconos-footer" src="../assets/icons/mail.svg" alt="Icono del Mail">
                    bikini@aqua.es
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
        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
          <!-- Links -->
             <h6 class="txt-menu mt-4 mb-4">
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

        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
          <!-- Links -->
            <h6 class="txt-menu mt-4 mb-4">REDES Y LOCALIZACIÓN</h6>
             <p class="texto text-center">
                    Carrer Ntra. Sra. de Lourde, 34, 08750 Molins de Rei, Barcelona
                </p>
                <a class="redes" href="https://www.instagram.com/"><img class="iconos-footer" src="../assets/icons/ig.svg" alt="Icono de Instagram"> @aquariumBikiniBottom</a><br><br>
                <a class="redes" href="https://www.facebook.com/"><img class="iconos-footer" src="../assets/icons/fb.svg" alt="Icono de Facebook"> Aquarium Bikini Bottom</a>

        </div>
        <!-- Grid column -->
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
     <style scoped>
     .nav-link{
        color:#946fb5!important;
     }
.nav-link::after{
    display:block;
    content:"";
    width: 0;
    height: 3px;
    background-color: #946fb5;
    transition: 0.3s;
    margin:auto;
}
h6{
    color:white!important;
    font-family:'CAfe';
}
h6:hover{
    color:white!important;
    font-family:'CAfe';
}
.nav-link:hover::after{
    color:white!important;
    width: 100%;
}
.nav-link:active{
    color:#be9bde;
}
p {
color: white!important;
text-align: center;
}
a {
color: white!important;
}
a:hover {
color: #be9bde!important;
}
    </style>

