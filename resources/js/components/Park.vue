<template>
<div class="mapa-container container">
    <canvas  @mousemove="onMouseMove" id="canvas" height="500" width="500" ref="canRef" style="float:left; margin-right:20px;"></canvas> 
    <!-- <img id="mapa"  src="../../assets/img/plano.png" alt="plano de las instalaciones del acuario" class="d-none" ref="mapa"> -->
<h2 class="subtitulos">EL PARQUE</h2>
    <p>
El parque acuático es un lugar fascinante que ofrece una experiencia única para los amantes de la vida marina. Con sus cuatro acuarios tropicales.

El primer acuario se centra en los arrecifes de coral, donde los visitantes pueden ver una gran variedad de especies marinas coloridas y exóticas, incluyendo peces payaso, estrellas de mar y pulpos. El segundo acuario se enfoca en las zonas rocosas de la costa, con exhibiciones de animales como erizos de mar, cangrejos y langostas. El tercer acuario muestra las criaturas de las aguas tropicales profundas, donde se encuentran especies como el tiburón martillo, el pez espada y el calamar gigante. Y el cuarto y último acuario exhibe las especies que habitan en los ríos tropicales, como los peces de colores brillantes, las tortugas y las serpientes de agua.
</p><br>
    <h2 class="subtitulos" >INSTALACIONES DE BINIKI BOTTOM </h2>
    <p>Un lugar privilegiado para conocer la <b class="morado">biodiversidad de los ecosistemas marinos</b>, en especial de las especies del Mediterráneo, y lanzar un mensaje sobre la necesidad e importancia de su conservación.   
    
El recorrido por nuestra colección biológica pretende ser una inmersión, lo más real posible, en el propio Mediterráneo paseando por los <b class="morado"> 66 acuarios mediterráneos y tropicales</b>, donde conviven once mil ejemplares de más de <b class="morado">450 especies</b> diferentes. El más grande y espectacular es el Oceanario, por donde un túnel transparente de más de 80 metros de longitud, acerca a los diferentes tipos de tiburones, rayas, morenas y otras especies.  
</p><img src="../../assets/img/acuario2.jpg" class="imagen-mapa" style="float:right; margin-left:20px; margin-right:25px;" alt=""> 
<p>Al inicio de la visita nos sumergirnos en los ecosistemas de superficie y poco a poco iremos ganando profundidad y mostrando los <b class="morado">diferentes hábitats, animales y plantas</b> que caracterizan cada zona batimétrica, dedicando también tanques a zonas de especial interés como puede ser la reserva marina de las Islas Medas, de especial riqueza biológica y gran biodiversidad.  

Como contrapunto a este recorrido por los fondos del Mediterráneo, mostramos una galería con una serie de tanques dedicados a los mares tropicales más representativos de nuestro planeta, como el Mar Rojo, el caribe o la Gran Barrera de Coral australiana donde el visitante puede comparar la belleza austera del mar que baña nuestras costas, con el <b class="morado">estallido de colores y biodiversidad de la fauna de los fondos coralinos.</b> Pero, ¡cuidado!, las especies tropicales también incluyen especies venenosas.  </p>
    <h2 class="subtitulos">DISFRUTA DEL PLACER DEL MAR</h2>


<p>Si estás buscando una experiencia única para disfrutar de la comida mientras admiras la vida marina, entonces Bikini Bottom junto con <img src="../../assets/img/cocacola.png" class="cocacola" alt="cocacola logo">podría ser el lugar perfecto para ti. Bikini Bottom ofrece una única en la que podrás disfrutar de la comida rodeado de impresionantes vistas del mundo submarino.

Además de la comida, Bikini Bottom también ofrecen una variedad de bebidas, incluyendo refrescos de la marca y cócteles temáticos del océano. Algunos restaurantes incluso tienen bares con vista al acuario, donde podrás disfrutar de tu bebida favorita mientras observas tiburones, mantarrayas y otras criaturas marinas.

En cuanto a la decoración y ambiente, muchos de estos restaurantes ofrecen un ambiente relajado, con paredes de vidrio que te permiten ver la vida marina mientras disfrutas de tu comida. Algunos restaurantes incluso tienen mesas en el interior del acuario, donde podrás cenar rodeado de peces y corales.</p>
</div>

</template>



<script>
export default {
  name: "Park",
  data() {
    return {
      items: [
        { id: 1, src: "img/plano1.webp" },
        { id: 2, src: "img/plano2.webp" },
        { id: 3, src: "img/plano4.webp" },
        { id: 4, src: "img/plano3.webp" },
      ],
      currentImgIndex: 0,
    };
  },
  mounted() {
    this.canvas = this.$refs.canRef;
    this.ctx = this.canvas.getContext("2d");
    this.canvasWidth = this.canvas.width;
    this.canvasHeight = this.canvas.height;
    // Dividir el canvas en 4 partes iguales
    this.ctx.beginPath();
    this.ctx.moveTo(this.canvasWidth / 2, 0);
    this.ctx.lineTo(this.canvasWidth / 2, this.canvasHeight);
    this.ctx.stroke();
    this.ctx.beginPath();
    this.ctx.moveTo(0, this.canvasHeight / 2);
    this.ctx.lineTo(this.canvasWidth, this.canvasHeight / 2);
    this.ctx.stroke();
  },
  methods: {
    onMouseMove(event) {
      const x = event.offsetX;
      const y = event.offsetY;
      if (x < this.canvasWidth / 2 && y < this.canvasHeight / 2) {
        // Parte superior izquierda
        this.currentImgIndex = 1;
      } else if (x >= this.canvasWidth / 2 && y < this.canvasHeight / 2) {
        // Parte superior derecha
        this.currentImgIndex = 2;
      } else if (x < this.canvasWidth / 2 && y >= this.canvasHeight / 2) {
        // Parte inferior izquierda
        this.currentImgIndex = 3;
      } else {
        // Parte inferior derecha
        this.currentImgIndex = 4;
      }
      this.drawImage();
    },
    drawImage() {
      const img = new Image();
      img.src = this.items[this.currentImgIndex - 1].src;
      img.onload = () => {
        this.ctx.clearRect(0, 0, this.canvasWidth, this.canvasHeight);
        this.ctx.drawImage(img, 0, 0, this.canvasWidth, this.canvasHeight);
      };
    },
  },
};
</script>

    <style scoped>
.mapa{
    width:60%;
}
p{
    margin-right:20px;
}
.mapa-container{
    width:900px;
}
.cocacola{
    width:50px;
}
    </style>
