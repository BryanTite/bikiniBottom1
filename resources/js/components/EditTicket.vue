<template>


<div class="container cabecera-bg">
    <div class="card box-form">
        <div class="card-body " style="border-width: 0%!important;">
            <div class="d-flex justify-content-between pb-2 mb-2">
                <h5 class="card-title titulos">ACTUALIZAR ENTRADAS</h5>
                <div>
                    <router-link :to="{name: 'tickets'}" class="btn btn-success">ATRAS</router-link>
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




            <form @submit.prevent="updatePost" enctype="multipart/form-data">
                <div class="form-group mb-2">
                    <label>Nombre</label><span class="text-danger"> *</span>
                    <input type="text" class="form-control" v-model="name" placeholder="Nombre">
                </div>


                <div class="form-group mb-2">
                    <label>Description</label><span class="text-danger"> *</span>
                    <textarea class="form-control" rows="3" v-model="description" placeholder="Enter post description"></textarea>
                </div>

                <div class="form-group mb-2">
                    <label>Categorias</label><span class="text-danger"> *</span>
                    <select class="form-control mb-2" v-model="categories">
                        <option value="1">Tickets</option>
                        <option value="2">Packs</option>
                        <option value="3">Actividades</option>
                    </select>
                </div>

                <div class="form-group mb-2">
                    <label>Precio</label><span class="text-danger"> *</span>
                    <input type="number" class="form-control" v-model="price" placeholder="Enter post name">
                </div>


                <div class="form-gorup mb-2">
                    <label>Image</label><span class="text-danger"> *</span>
                    <input type="file" class="form-control mb-2" v-on:change="onChange">


                    <div v-if="img">
                        <img v-bind:src="imgPreview" width="100" height="100"/>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary mt-4 mb-4"> Update Post</button>


    </form>


    </div>
    </div>
</div>
</template>


<script>
export default{
    data() {
        return {
            id:'',
            name: '',
            description: '',
            categories: '',
            price:'',
            img: '',
            strSuccess: '',
            strError: '',
            imgPreview: null
        }
    },


    created() {
        this.$axios.get('/sanctum/csrf-cookie').then(response => {
            this.$axios.get(`/api/tickets/edit/${this.$route.params.id}`)
                .then(response => {
                    this.name = response.data['name'];
                    this.description = response.data['description'];
                    this.categories = response.data['id_categorie'];
                    this.price = response.data['price'];
                    this.img = "/img/"+response.data['image'];
                    this.imgPreview = this.img;
                })
                .catch(function(error) {
                    console.log(error);
                });
        })
    },
    methods: {
    //evento para cambiar la imagen de la entrada
        onChange(e) {
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
        updatePost(e) {
            this.$axios.get('/sanctum/csrf-cookie').then(response => {
                let existingObj = this;
                const config = {
                    headers: {
                        'content-type': 'multipart/form-data'
                    }
                }


                const formData = new FormData();
                formData.append('name', this.name);
                formData.append('description', this.description);
                formData.append('id_categorie', this.categories);
                formData.append('price', this.price);
                formData.append('file', this.img);


                this.$axios.post(`/api/tickets/update/${this.$route.params.id}`, formData, config)
                    .then(response => {
                        existingObj.strError = "";
                        existingObj.strSuccess = response.data.success;
                    })
                    .catch(function(error) {
                        existingObj.strSuccess ="";
                        existingObj.strError = error.response.data.message;
                    });
            });
        }


    },
    beforeRouteEnter(to, from, next){
        if(!window.Laravel.isLoggedin){
            window.location.href = "/";
        }else{
            if((window.Laravel.user.roles[0].name === 'AccesoAdmin') || (window.Laravel.user.roles[0].name === 'AccesoModerador') || (window.Laravel.user.roles[0].name === 'Actualizar')){
                next();
            }else{
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
