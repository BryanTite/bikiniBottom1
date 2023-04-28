<template>
    <div class="container-xl-fluid">
            <!-- carrusel con imagenes -->
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-indicators">
            <button type="button" class="active boton-carusel" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" class="boton-carusel" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" class="boton-carusel" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
         </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <router-link to="/"><img src="../../assets/img/oferta1.svg" class="d-block w-100" alt="imagen publicitaria"></router-link>
                </div>
                <div class="carousel-item">
                    <router-link to="/"><img src="../../assets/img/oferta3.svg" class="d-block w-100" alt="imagen publicitaria"></router-link>
                </div>
                <div class="carousel-item">
                    <router-link to="/"><img src="../../assets/img/oferta2.svg" class="d-block w-100" alt="imagen publicitaria"></router-link>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                <span class="carousel-control-prev-icon visually-hidden" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                <span class="carousel-control-next-icon visually-hidden" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <!-- fin carrusel con imagenes -->
        <!-- consultar, informaion, calendario -->
            <div class="row centrado mt-3">

  <div class="col-sm-4">
    <div class="card" style="border-radius: 0%;">
      <div class="card">
        <h2 class="card-title titulos ">EXPERIENCIA</h2>
        <img class="iconos-info" src="../../assets/icons/consultar.svg" alt="ver los testimonios"><br>
       
      </div>
      <button type="button" class="btn btn-basico" data-bs-toggle="modal" data-bs-target="#staticBackdrop">consultar</button>
    </div>
  </div>
  <div class="col-sm-4">
    <div class="card" style="border-radius: 0%;">
        <h2 class="card-title titulos ">HORARIOS</h2>
        <img class="iconos-info " src="../../assets/icons/horario.svg" alt="Ver horario disponible"><br>

        <Calendar class="calendario" v-model="date" showIcon dateFormat="dd/mm/yy" />

    </div>
  </div>
  <div class="col-sm-4">
    <div class="card" style="border-radius: 0%;">
      <div class="card">
        <h2 class="card-title titulos ">ENTRADAS</h2>
        <img class="iconos-info" src="../../assets/icons/entradas.svg" alt="ver disponibilidad entradas"><br>
        
      </div>
      <button type="button" class="btn btn-basico" data-bs-toggle="modal" data-bs-target="#staticBackdrop">consultar</button> 
    </div>
  </div>
</div>

        <!-- fin consultar, informaion, calendario -->
        <!-- noticias -->
        <h1 id="noticias" class=" mt-2 centrado titulos"><img class="jellyfish2"  src="../../assets/icons/jellyfish.svg" alt="medusa bikini bottom"> NOTICIAS DE COLABORADRES <img class="jellyfish" src="../../assets/icons/jellyfish.svg" alt="medusa bikini bottom"></h1>
        <div class="row centrado mt-3">
  <div class="col-sm-3">
    <div class="card" style="border-radius: 0%;">
      <div class="card">
        <h5 class="card-txt titulos ">LOS PINGUINOS SUFREN Y NO LO SABES</h5>
        <img class="" src="../../assets/img/acuario2.jpg" alt="los pinguinos sufren noticias"><br>
        
      </div>
      <a href="#" class="btn btn-basico">SABER MÁS</a>
    </div>
  </div>
  <div class="col-sm-3">
    <div class="card" style="border-radius: 0%;">
      <div class="card">
        <h5 class="card-title titulos ">EL COMBUSTIBLE DE LOS BUQUES</h5>
        <img class="card-image" src="../../assets/img/descarga.jpg" alt="combustible para buques noticias"><br>
       
      </div>
      <a href="#" class="btn btn-basico">SABER MÁS</a>
    </div>
  </div>
  <div class="col-sm-3">
    <div class="card" style="border-radius: 0%;">
      <div class="card">
        <h5 class="card-title titulos ">PANAMA EN ESTADO CRITICO</h5>
        <img class="" src="../../assets/img/Panama-flag-on-ship.png" alt="panama en estado critico noticias"><br>
        
      </div>
      <a href="#" class="btn btn-basico">SABER MÁS</a> 
    </div>
  </div>
  <div class="col-sm-3">
    <div class="card" style="border-radius: 0%; background-image: url('../../assets/img/GZC3ZI5ZQ5HHRIJRRF6ZVSEC7M.avif');">
      <div class="card">
        <h5 class="card-title titulos ">SE DESCUBRE UNA NUEVA ESPECIE</h5>
        <img class="" src="../../assets/img/noticia4.jpg" alt="descubren una especie nueva noticia"><br>
        
      </div>
      <a href="https://www.levante-emv.com/tendencias21/2022/11/11/descubren-coleccion-extranas-criaturas-marinas-78446564.html" class="btn btn-basico">SABER MÁS</a> 
    </div>
  </div>
</div>
      
        <!-- fin noticias -->
    </div>
    <div class="modal fade fondo" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title titulos" id="staticBackdropLabel">DISPONIBILIDAD DE HORARIOS</h1>
      </div>
      <div class="modal-body">

        <Calendar v-model="date" dateFormat="dd/mm/yy" showIcon />

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-basico" data-bs-dismiss="modal">CERRAR</button>
      </div>
    </div>
  </div>
</div>
    </template>
<script setup>
import Calendar from 'primevue/calendar';

import { ref } from "vue";
const date = ref();

</script>


    <style scoped>

.card-img-top{
    border-radius: 0px!important;
}

.contenedor-info-grande{
    display: inline-flex;
    
}
.card{
    border-radius: 0!important;
    border-style:solid;
    border-color:white;
}

.card:hover{
    background-color:#8ed7fe;

 

}
.card:hover > .titulos{

    color:white;

}



    </style>
