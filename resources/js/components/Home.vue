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

        <div class="row mt-3 mb-3 contenedor-info-grande">

                    <div class="col centrado contenedor-info texto">
                        <h1 class="titulos">HORARIOS</h1>
                        <a href="" class=""> <img class="iconos-info" src="../../assets/icons/horario.svg" alt="icono horarios"></a>
                        <br><a href="" class="btn-basico">CONSULTAR</a>
                    </div>

                    <div class="col centrado contenedor-info texto">
                        <h1 class="titulos">EXPERIENCIA</h1>
                        <a href="" class=""> <img class="iconos-info" src="../../assets/icons/consultar.svg" alt="icono valoraciones"></a>
                        <br><a href="" class="btn-basico">CONSULTAR</a>
                    </div>

                    <div class="col centrado contenedor-info texto">
                        <h1 class="titulos">PRECIOS</h1>
                        <a href="" class=""> <img class="iconos-info" src="../../assets/icons/entradas.svg" alt="icono entradas"></a>
                        <br><a href="" class="btn-basico">CONSULTAR</a>
                    </div>

            </div>

        <!-- fin consultar, informaion, calendario -->
        <!-- noticias -->
        <h2 id="noticias" class="titulos">NOTICIAS DE COLABORADORES</h2>
        <div class="row">
            <div class="col-sm-12 mb-3 mb-sm-0">
                <div class="card" style="width: 18rem; float:left;">
                        <div class="card-body">
                            <a class="redes" href="https://noticiasmarinas.com/2022/12/07/beneficios-del-gnl-un-nuevo-combustible-para-buques/">
                                <img src="../../assets/img/GZC3ZI5ZQ5HHRIJRRF6ZVSEC7M.avif" class="card-img-top" alt="...">
                            <p>Los pinguinos son los primeros en sufrir las consecuencias</p>    
                            </a>
                        </div>
                </div>
                 <div class="card" style="width: 18rem; float:left;">
                        <div class="card-body">
                            <a class="redes" href="https://noticiasmarinas.com/2022/12/07/beneficios-del-gnl-un-nuevo-combustible-para-buques/">
                                <img src="../../assets/img/Panama-flag-on-ship.png" class="card-img-top" alt="...">
                            <p>¿Que son las banderas de convivencia?</p>    
                            </a>
                        </div>
                </div>
                <div class="card" style="width: 18rem; float:left;">
                        <div class="card-body">
                            <a class="redes" href="https://noticiasmarinas.com/2022/12/07/beneficios-del-gnl-un-nuevo-combustible-para-buques/">
                                <img src="../../assets/img/descarga.jpg" class="card-img-top" alt="...">
                            <p>Beneficios del GNL un nuevo combustible para buques marinos</p>    
                            </a>
                        </div>
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
    </style>
