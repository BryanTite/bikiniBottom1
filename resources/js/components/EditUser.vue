<template>


    <div class="card">
        <div class="card-body">
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
                    <label>Rol</label><span class="text-danger"> *</span>
                    <select class="form-control mb-2" v-model="categories">
                        <option value="1">Admin</option>
                        <option value="2">Moderador</option>
                        <option value="3">User</option>
                    </select>
                </div>

                <div class="form-group mb-2">
                    <label>Contraseña</label><span class="text-danger"> *</span>
                    <input type="password" class="form-control" v-model="password" placeholder="Enter post name">
                </div>

                <div class="form-group mb-2">
                    <label>Teléfono</label><span class="text-danger"> *</span>
                    <input type="number" class="form-control" v-model="phone" placeholder="Nombre">
                </div>

                <button type="submit" class="btn btn-primary mt-4 mb-4"> Update Post</button>


    </form>


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
            categories: '',
            password:'',
            phone: '',
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
                    this.categories = response.data['role_id'];
                    this.password = response.data['password'];
                    this.phone = response.data['phone'];
                })
                .catch(function(error) {
                    console.log(error);
                });
        })
    },
    methods: {
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
            if((window.Laravel.user.roles[0].name === 'Admin') || (window.Laravel.user.roles[0].name === 'Moderator')){
                next();
            }else{
                next('/');
            }
        }
    }
}


</script>
