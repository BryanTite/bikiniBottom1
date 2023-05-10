<template>


  <div class="card">
      <div class="card-body cabecera-bg">
          <div class="d-flex justify-content-between pb-2 mb-2">
              <h2 class="card-title titulos">BINIKI BOTTOM · CESTA</h2>
          </div>
          <table class="table table-hover table-sm box-form">
              <thead class="texto bg">
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
                    <select v-model="ticket.quantity">
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                    </select>
                  </td>
                  <td>{{ticket.name}}</td>
                  <td class="text-center ">{{ticket.price}} €</td>
                  <td class="text-center"><img src="../../assets/icons/eliminar.svg" alt="eliminar elemento" class="iconos-footer"></td>
              </tr>
              </tbody>
          </table>
          <button class="btn-basico btn" type="submit" name="finalizarCompra">FINALIZAR</button>



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
table {
  border-collapse: collapse;
  width: 100%;
  margin-top: 20px;
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
