<template>
  <div class="card">
    <div class="card-body cabecera-bg">
      <div class="d-flex justify-content-between pb-2 mb-2">
        <h2 class="card-title titulos">BINIKI BOTTOM · CESTA</h2>
      </div>
      <table class="table table-hover table-sm box-form">
        <thead class="texto">
          <tr>
            <th width="50" class="text-center">Cantidad</th>
            <th class="text-center" width="120">Nombre</th>
            <th class="text-center" width="120">Precio</th>
            <th class="text-center" width="10"></th>
          </tr>
        </thead>
        <tbody class="texto">
          <tr v-for="(ticket, index) in cart" :key="index">
            <td class="text-center">
              <select required v-model="ticket.quantity" @change="actualizarCantidad(cart)">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
              </select>

            </td>
            <td>{{ticket.name}}</td>
            <td class="text-center ">{{ticket.price}} €</td>
            <td class="text-center"><button class="btn btn-admin" @click="eliminarEntradaDelCarrito(index)">
      <img src="../../assets/icons/eliminar.svg" alt="eliminar elemento" class="iconos-footer">
    </button></td>
          </tr>
          <tr>
            <td colspan="2" class="total text-center">TOTAL</td>
            <td class="total text-center">{{total}} €</td>
            <td></td>
          </tr>
        </tbody>
      </table>
          <button class="btn-basico btn" type="submit" name="finalizarCompra" @click="finalizarCompra()">FINALIZAR</button>



      </div>
  </div>




</template>
<script>
export default {
  data() {
    return {
      cart: [],
      total: 0  
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
    },
    actualizarCantidad(tickets) {
      this.total=0;
      tickets.forEach(ticket => {
        this.total += ((ticket.quantity === undefined)? 0: ticket.quantity)*ticket.price;
      });
    }, 
    eliminarEntradaDelCarrito(index) {
      this.cart.splice(index, 1);
    },    
    finalizarCompra() {
  const userId = 1;
  const data = {
    user_id: userId,
    total_price: this.total,
    tickets: this.cart
  };
  this.$axios.post('/api/purchase', data)
    .then(response => {
      console.log('Compra realizada con éxito', response.data);
      this.cart = []; // clear the cart after successful purchase
    })
    .catch(error => {
      console.log('Error al finalizar la compra', error);
    });
},
  },
  created() {
    // if(window.Laravel.isLoggedin){
    //   this.user = windows.laravel.user;
    // }
    this.mostrarEntrada();
  }
};
</script>


<style scoped>
table {
  border-collapse: collapse;
  width: 100%;
  margin-top: 20px;
}
.total{
    font-size: 25px;
    font-family: 'Cafe';
}

table th, table td {
  padding: 8px;
  text-align: left;
}
table th {
  background-color: #ddd;
  color:#946fb5;
}

table tbody tr {
  background-color: white;
}

table tfoot td {
  text-align: right;
  font-weight: bold;
}

h1 {
  text-align: center;
  margin-top: 20px;
}


</style>
