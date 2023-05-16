<template>

<div class="container cabecera-bg">
    <div class="card box-form">
        <div class="card-body " style="border-width: 0%!important;">
            <div class="d-flex justify-content-between pb-2 mb-2">
                <h5 class="card-title">Update Post Data</h5>
                <div>
                    <router-link :to="{name: 'users'}" class="btn btn-success">Go Back</router-link>
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
                    <label>Email</label><span class="text-danger"> *</span>
                    <input type="email" class="form-control" v-model="email" placeholder="Email">
                </div>

                <div class="form-group mb-2">
                    <label>Name</label><span class="text-danger"> *</span>
                    <input type="text" class="form-control" v-model="name" placeholder="Nombre">
                </div>

                <div class="form-group mb-2">
                    <label>Apellidos</label><span class="text-danger"> *</span>
                    <input type="text" class="form-control" v-model="surname" placeholder="Nombre">
                </div>

                <div class="form-group mb-2">
                    <label>Contraseña</label><span class="text-danger"> *</span>
                    <input type="password" class="form-control" v-model="password" placeholder="Enter post name">
                </div>

                <div class="form-group mb-2">
                    <label>Teléfono</label><span class="text-danger"> *</span>
                    <input type="number" class="form-control" v-model="phone" placeholder="Nombre">
                </div>

                <label>Rol</label><span class="text-danger"> *</span>
                <div>
                    <input class="espacioDiv" type="checkbox" name="role" value="1" v-model="categories">AccesoAdmin
                </div>

                <div>
                    <input class="espacioDiv" type="checkbox" name="role" value="2" v-model="categories">AccesoModerador
                </div>

                <div>
                    <input class="espacioDiv" type="checkbox" name="role" value="4" v-model="categories">Añadir
                </div>

                <div>
                    <input class="espacioDiv" type="checkbox" name="role" value="5" v-model="categories">Actualizar
                </div>

                <div>
                    <input class="espacioDiv" type="checkbox" name="role" value="6" v-model="categories">Eliminar
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
            email: '',
            name: '',
            surname: '',
            password:'',
            phone: '',
            categories: [],
            strSuccess: '',
            strError: ''
        }
    },
    created() {
        this.$axios.get('/sanctum/csrf-cookie').then(response => {
            this.$axios.get(`/api/users/edit/${this.$route.params.id}`)
                .then(response => {
                    this.email = response.data['email'];
                    this.name = response.data['name'];
                    this.surname = response.data['surname'];
                    this.password = response.data['password'];
                    this.phone = response.data['phone'];


                })
                .catch(function(error) {
                    console.log(error);
                });
        })
    },
    methods: {
        updatePost(e) {
            this.$axios.get('/sanctum/csrf-cookie').then(response => {
                let existingObj = this;
                const config = {
                    headers: {
                        'content-type': 'multipart/form-data'
                    }
                }


                const formData = new FormData();
                formData.append('email', this.email);
                formData.append('name', this.name);
                formData.append('surname', this.surname);
                formData.append('password', this.password);
                formData.append('phone', this.phone);
                this.categories.forEach(role => {
                    formData.append('roles[]', role)
                });


                this.$axios.post(`/api/users/update/${this.$route.params.id}`, formData, config)
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
            if((window.Laravel.user.roles[0].name === 'AccesoAdmin') || (window.Laravel.user.roles[0].name === 'Actualizar')){
                next();
            }else{
                next('/');
            }
        }
    }
}


</script>
<style scoped>
.espacioDiv{
    width: 20px;
}
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
