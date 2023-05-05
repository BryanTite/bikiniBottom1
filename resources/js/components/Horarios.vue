<template>
  <div class="container text-center">
    <h1 class="titulos text-center">HORARIOS</h1>
  <p class="morado text-center"><b>DISPONIBILIDAD</b>:</p>
  <p class="text-center">Estamos abiertos de Lunes a Domingo de 10.00 AM - 19.00 PM.</p><p class="text-center">*Los horarios de las instalaciones se pueden ver modificados durante el año.</p>
    <Calendar class="mx-auto"  v-model="date" inline dateFormat="dd/mm/yy" />

  </div>

</template>

<script>
export default{
    name: "Horarios"
}
</script>

<style scoped>

</style>