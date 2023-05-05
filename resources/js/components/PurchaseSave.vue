<template>

    <div class="container box-form">
        <div class="row container titulos">
            <h2 class="col-12 col-md-4">ENTRADAS</h2>
            <h2 class="col-12 col-md-4">CANTIDAD</h2>
            <h2 class="col-12 col-md-4">PRECIO</h2>
        </div>


        <!--editar -->
        <div class="row" v-for="(ticket, index) in cart" :key="index">

            <div class="col-12 col-md-4 titulos">
                {{ ticket.name }}
            </div>

            <div class="col-12 col-md-4 texto">
                <form action="" method="post">

                    <input type="hidden" name="pos" value="">
                    <button class="boton-personalizado2" type="" name="Add"> + </button>

                    <button class="boton-personalizado2" type="" name="Del"> - </button>

                </form>
            </div>
            <div class="col-12 col-md-4 texto">
                <p>{{ ticket.price }}€</p>
            </div>


        </div>
    </div>
    <div class="row">
        <div class="col-6 col-md-4">
            <form action="" method="post">
                <button class="btn-basico btn" type="submit" name="finalizarCompra">FINALIZAR</button>
            </form>
        </div>


        <div class="col-6 col-md-4">
            <p>*IVA incluido en el pedido*</p>
        </div>

        <div class="col-6 col-md-4 precioFinalProducto">

        </div>
    </div>

</template>

<script>
export default {
    data() {
        return {
            cart: []
        };
    },
    methods: {
        mostrarEntrada() {
            this.$axios.get('/api/mosTickets').then(response => {
                this.cart = response.data;
                console.log(response.data);
            }).catch(error => {
                console.log('Error al cargar el carrito', error);
            });
        }
    },
    created() {
        this.mostrarEntrada();
    }
};
</script>


<style scoped>

</style>
