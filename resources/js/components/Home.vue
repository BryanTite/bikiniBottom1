<template>
    <div class="container-xl-fluid">
            <!-- carrusel con imagenes -->
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
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
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <!-- fin carrusel con imagenes -->
        <!-- consultar, informaion, calendario -->
            <div class="row centrado mt-3">
  <div class="col-sm-4">
    <div class="card" style="border-radius: 0%;">
      <div class="card">
        <h2 class="card-title titulos ">HORARIOS</h2>
        <img class="iconos-info" src="../../assets/icons/horario.svg" alt="Ver horario disponible"><br>
        
      </div>
      <a href="#" class="btn btn-basico">consultar</a>
    </div>
  </div>
  <div class="col-sm-4">
    <div class="card" style="border-radius: 0%;">
      <div class="card">
        <h2 class="card-title titulos ">EXPERIENCIA</h2>
        <img class="iconos-info" src="../../assets/icons/consultar.svg" alt="ver los testimonios"><br>
       
      </div>
      <a href="#" class="btn btn-basico">consultar</a>
    </div>
  </div>
  <div class="col-sm-4">
    <div class="card" style="border-radius: 0%;">
      <div class="card">
        <h2 class="card-title titulos ">ENTRADAS</h2>
        <img class="iconos-info" src="../../assets/icons/entradas.svg" alt="ver disponibilidad entradas"><br>
        
      </div>
      <a href="#" class="btn btn-basico">consultar</a> 
    </div>
  </div>
</div>
        <!-- fin consultar, informaion, calendario -->
        <!-- noticias -->
        <h2 id="noticias" class="titulos">NOTICIAS DE COLABORADORES</h2>
        <div class="row centrado mt-3">
  <div class="col-sm-3">
    <div class="card" style="border-radius: 0%;">
      <div class="card">
        <h5 class="card-txt titulos ">LOS PINGUINOS SUFREN Y NO LO SABES</h5>
        <img class="" src="../../assets/img/acuario2.jpg" alt="Ver horario disponible"><br>
        
      </div>
      <a href="#" class="btn btn-basico">SABER MÁS</a>
    </div>
  </div>
  <div class="col-sm-3">
    <div class="card" style="border-radius: 0%;">
      <div class="card">
        <h5 class="card-title titulos ">EL COMBUSTIBLE DE LOS BUQUES</h5>
        <img class="card-image" src="../../assets/img/descarga.jpg" alt="ver los testimonios"><br>
       
      </div>
      <a href="#" class="btn btn-basico">SABER MÁS</a>
    </div>
  </div>
  <div class="col-sm-3">
    <div class="card" style="border-radius: 0%;">
      <div class="card">
        <h5 class="card-title titulos ">PANAMA EN ESTADO CRITICO</h5>
        <img class="" src="../../assets/img/Panama-flag-on-ship.png" alt="ver disponibilidad entradas"><br>
        
      </div>
      <a href="#" class="btn btn-basico">SABER MÁS</a> 
    </div>
  </div>
  <div class="col-sm-3">
    <div class="card" style="border-radius: 0%; background-image: url('../../assets/img/GZC3ZI5ZQ5HHRIJRRF6ZVSEC7M.avif');">
      <div class="card">
        <h5 class="card-title titulos ">SE DESCUBRE UNA NUEVA ESPECIE</h5>
        <img class="" src="../../assets/img/.avif" alt="ver disponibilidad entradas"><br>
        
      </div>
      <a href="#" class="btn btn-basico">SABER MÁS</a> 
    </div>
  </div>
</div>
      
        <!-- fin noticias -->
    </div>
    </template>

  <script>
  export default{
      name: "Home"
  }
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
