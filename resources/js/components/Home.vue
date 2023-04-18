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
                        <a href="" class=""> <img class="iconos-info" src="../../assets/icons/horario.svg" alt="imagen publicitaria"></a>
                        <br><button class="btn-basico">CONSULTAR</button>
                    </div>

                    <div class="col centrado contenedor-info texto">
                        <h1 class="titulos">EXPERIENCIA</h1>
                        <a href="" class=""> <img class="iconos-info" src="../../assets/icons/consultar.svg" alt="imagen publicitaria"></a>
                        <br><button class="btn-basico">CONSULTAR</button>
                    </div>

                    <div class="col centrado contenedor-info texto">
                        <h1 class="titulos">PRECIOS</h1>
                        <a href="" class=""> <img class="iconos-info" src="../../assets/icons/entradas.svg" alt="imagen publicitaria"></a>
                        <br><button class="btn-basico">CONSULTAR</button>
                    </div>

            </div>

        <!-- fin consultar, informaion, calendario -->
        <!-- banner publi -->
        <router-link to="/"><img src="../../assets/img/banner.webp" class="w-100 mt-2 mb-2"></router-link>

        <!-- fin banner publi -->
        <!-- noticias -->
        <div class="row">
            <div class="col-sm-12 mb-3 mb-sm-0">
                <div class="card" style="width: 18rem; float:left;">
                        <div class="card-body">
                            <img src="../../assets/img/banner.webp" class="card-img-top" alt="...">
                            <a class="" href="https://noticiasmarinas.com/2022/12/11/como-se-clasifican-las-mercancias-peligrosas-en-el-transporte-maritimo/"><p class="card-text">¿Cómo se clasifican las mercancías peligrosas en el transporte marítimo?</p>
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
