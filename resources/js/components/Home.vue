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
                        <h1 class="titulos">HORARIoS</h1>
                        <p>Consuta la disponibilidad de las instalaciones</p>
                        <a href="" class=""> <img class="iconos-info" src="../../assets/icons/horario.svg" alt="imagen publicitaria"></a>
                    </div>

                    <div class="col centrado contenedor-info texto">
                        <h1 class="titulos">EXPERIENCIA</h1>
                        <p>Echale un ojo a las experiencias de otros antes de venir</p>
                        <a href="" class=""> <img class="iconos-info" src="../../assets/icons/consultar.svg" alt="imagen publicitaria"></a>
                    </div>

                    <div class="col centrado contenedor-info texto">
                        <h1 class="titulos">PRECIoS</h1>
                        <p>Consulta aqui el precio de nuestras entradas</p>
                        <a href="" class=""> <img class="iconos-info" src="../../assets/icons/entradas.svg" alt="imagen publicitaria"></a>
                    </div>

            </div>

        <!-- fin consultar, informaion, calendario -->
        <!-- banner publi -->
        <router-link to="/"><img src="../../assets/img/banner.webp" class="w-100"></router-link>

        <!-- fin banner publi -->
    </div>
    </template>

  <script>
  export default{
      name: "Home"
  }
  </script>

    <style scoped>

    </style>
