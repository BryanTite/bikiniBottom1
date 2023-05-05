<template>

<div class="carrito">
  <div class="titulo">Producto</div>
  <div class="cantidad">Cantidad</div>
  <div class="precio">Precio</div>
</div>
<div class="resumen">
  <h2>Resumen</h2>
  <div class="subtotal">
    <span>Subtotal:</span>
    <span>$0.00</span>
  </div>
  <div class="total">
    <span>Total:</span>
    <span>$0.00</span>
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
.carrito {
  display: grid;
  grid-template-columns: 2fr 1fr 1fr;
  border-bottom: 1px solid #ccc;
  padding: 10px 0;
}

.titulo {
  font-weight: bold;
}

.resumen {
  border: 1px solid #ccc;
  padding: 10px;
}

.subtotal,
.total {
  display: flex;
  justify-content: space-between;
  margin-bottom: 5px;
}

.subtotal span:first-child,
.total span:first-child {
  font-weight: bold;
}

</style>
