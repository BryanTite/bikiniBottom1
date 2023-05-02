<template>
    <head>

        <title>CARRITO - Reyna's Seafood</title>

    </head>

    <body>

    <h1></h1>
    <div class="carritoPrincipal">
        <div class="row categoriasProductos">
            <h2 class="col-12 col-md-4">ENTRADAS</h2>
            <h2 class="col-12 col-md-4">CANTIDAD</h2>
            <h2 class="col-12 col-md-4">PRECIO</h2>
        </div>


        <!--editar -->
        <div class="row tableCarrito" v-for="(entrada, index) in entradas" :key="entrada.id">

            <div class="col-12 col-md-4 nomProducto">
                {{ entrada.name }}
            </div>

            <div class="col-12 col-md-4 cantidadBotones">
                <form action="" method="post">

                    <input type="hidden" name="pos" value="">
                    <button class="boton-personalizado2" type="" name="Add"> + </button>

                    <button class="boton-personalizado2" type="" name="Del"> - </button>

                </form>
            </div>
            <div class="col-12 col-md-4 precioProducto">
                <p>€</p>
            </div>


        </div>
    </div>
    <div class="row finalizar">
        <div class="col-6 col-md-4 finalizarCompra">
            <form action="" method="post">
                <button class="boton-personalizado3" type="submit" name="finalizarCompra"><a href="">FINALIZAR COMPRA </a></button>
            </form>
        </div>


        <div class="col-6 col-md-4 nada">
            <p>*IVA incluido en el pedido*</p>
        </div>

        <div class="col-6 col-md-4 precioFinalProducto">

        </div>
    </div>

    </body>
</template>

<script>
export default {
    data() {
        return {
        entradas: []
        }
    },
    created() {
        this.getEntradas();
    },
    methods: {
        getEntradas() {
            this.$axios.get('/api/mosTickets')
                .then(response => {
                    this.entradas = response.data;

                })
                .catch(error => {
                    console.log(error);
                });
        },
    }

}

</script>


<style scoped>

</style>
