<template>

<div class="container cabecera-bg">
    <div class="card box-form">
        <div class="card-body " style="border-width: 0%!important;">
            <div class="d-flex justify-content-between pb-2 mb-2">
                <h2 class="card-title titulos">AÑADIR ENTRADA</h2>
                <div>
                    <router-link :to="{name: 'tickets'}" class="btn btn-basico">atras</router-link>
                </div>
            </div>


            <div v-if="strSuccess" class="alert alert-success alert-dismissible fade show" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <strong>{{strSuccess}}</strong>
            </div>


            <div v-if="strError" class="alert alert-danger alert-dismissible fade show" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <strong>{{strError}}</strong>
            </div>




            <form enctype="multipart/form-data" @submit.prevent="addTicket">
                <div class="form-group mb-2">
                    <label class="texto">Titulo</label><span class="text-danger"> *</span>
                    <input type="text" class="form-control" v-model="name" placeholder="Enter post name">
                </div>


                <div class="form-group mb-2">
                    <label class="texto">Descripcion</label><span class="text-danger"> *</span>
                    <textarea class="form-control" rows="3" v-model="description" placeholder="Enter post description"></textarea>
                </div>


                <div class="form-group mb-2">
                    <label class="texto">Categoria</label><span class="text-danger"> *</span>
                    <select class="form-control mb-2" v-model="categories">
                        <option value="1">Tickets</option>
                        <option value="2">Packs</option>
                        <option value="3">Actividades</option>
                    </select>
                </div>


                <div class="form-group mb-2">
                    <label class="texto">Precio</label><span class="text-danger"> *</span>
                    <input type="number" class="form-control" v-model="price" placeholder="Enter post name">
                </div>


                <div class="form-gorup mb-2">
                    <label class="texto">Imagen</label><span class="text-danger"> *</span>
                    <input type="file" class="form-control mb-2" v-on:change="onChangeImg">


                    <div v-if="img">
                        <img v-bind:src="imgPreview" width="100" height="100"/>
                    </div>
                </div>


                <button type="submit" class="btn btn-basico mt-4 mb-4"> nuevo   </button>


            </form>

        </div>
    </div>
</div>

 </template>


 <script>

 export default {
    data() {
        return {
            name: '',
            description: '',
            categories: '',
            price: '',
            img: '',
            strSuccess: '',
            strError: '',
            imgPreview: null

        }
    },
    methods: {
//para cambiar la imagen
        onChangeImg(e) {
            this.img = e.target.files[0];
            let reader = new FileReader();
            reader.addEventListener("load", function () {
                this.imgPreview = reader.result;
            }.bind(this), false);


            if (this.img) {
                if ( /\.(jpe?g|png|gif)$/i.test( this.img.name ) ) {
                    reader.readAsDataURL( this.img );
                }
            }
        },
        /* INICIO */
        addTicket(e){
            this.$axios.get('/sanctum/csrf-cookie').then(response => {
                let existObj = this;
                const config = {
                    headers:{
                        'content-type': 'multipart/form-data'
                    }
                }

                const formData = new FormData();
                formData.append('name', this.name);
                formData.append('description', this.description);
                formData.append('id_categorie', this.categories);
                formData.append('price', this.price);
                formData.append('file', this.img);

                this.$axios.post('/api/tickets/add', formData, config)
                    .then(response => {
                            existObj.strError = "";
                            existObj.strSuccess = response.data.success;
                        }
                    )
                    .catch(function (error){
                            existObj.strError = error.response.data.message;
                            existObj.strSuccess = response.data.success;
                        }
                    );

            });
        }


    },
     beforeRouteEnter(to, from, next){
         if(!window.Laravel.isLoggedin){
             window.location.href = "/";
         }else{
             if (window.Laravel.user.roles.some(role => role.name === 'AccesoAdmin') && window.Laravel.user.roles.some(role => role.name === 'Añadir')) {
                 next();
             } else if (window.Laravel.user.roles.some(role => role.name === 'AccesoModerador') && window.Laravel.user.roles.some(role => role.name === 'Añadir')) {
                 next();
             } else {
                 next('/');
             }
         }
     }

 }


 </script>
 <style scoped>
 input{
    border-color:#946fb5;
    border-radius: 0!important;
    border-width: 2px;
    width: 400px;
}
input:hover{
    border-color:white;

}
select{
    border-color:#946fb5;
    border-radius: 0!important;;
    border-width: 2px;
    width: 400px;
 }
 textarea{
    border-color:#946fb5;
    border-radius: 0!important;
    border-width: 2px;
    width: 400px;
 }
 textarea:hover{
    border-color:white;

}
.card-body{
    background-color: none;
}
</style>
