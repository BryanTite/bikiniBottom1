<template>
    <div class="container-xl">
            <!-- carrusel con imagenes -->
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                <img src="../../assets/img/carusel 1.webp" class="d-block w-100" alt="imagen publicitaria">
                </div>
                <div class="carousel-item">
                <img src="../../assets/img/carusel 2.webp" class="d-block w-100" alt="imagen publicitaria">
                </div>
                <div class="carousel-item">
                <img src="" class="d-block w-100" alt="imagen publicitaria">
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
        
        <div class="row">
    
                    <div class="col">
                        <h1>- SERVICIO -</h1>
                        <img src="" alt="Imagen del servicio">
                        <a href="/login" class=""></a>
                    </div>
    
                    <div class="vr mt-4 separador"></div>
    
                    <div class="col invisibleMovil">
                        <h1>EXPERIENCIA -</h1>
                        <img src="" alt="Imagen de la experiencia">
                        <a href="/login" class=""></a>
                    </div>
    
                    <div class="vr mt-4 separador"></div>
    
                    <div class="col invisibleMovil">
                        <h1>- CALIDAD -</h1>
                        <img src="" alt="Imagen de la calidad">
                        <a href="/login" class=""></a>
                    </div>
    
            </div>
    
        <!-- fin consultar, informaion, calendario -->
    </div>
    </template>
    
    <script>
    export default{
        name: "Home"
    }
    </script>
    
    <style scoped>
    
    </style>