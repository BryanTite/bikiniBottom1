<template>
    <div class="container">
        <div class="row jutify-content-center">
            <div class="col-md-8">
                <div v-if="error !== null" class="alert alert-danger alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <strong>{{error}}</strong>
                </div>


                <div class="card card-default">
                    <div class="card-header"><h5>Register New User</h5></div>
                    <div class="card-body">
                        <form>

                            <div class="form-group row mt-1">
                                <label for="email" class="col-sm-4 col-form-label text-md-right">E-Mail Address</label>
                                <div class="col-md-8">
                                    <input id="email" type="email" class="form-control" v-model="email" required
                                           autofocus autocomplete="off" placeholder="Enter your email">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-sm-4 col-form-label text-md-right">Nombre</label>
                                <div class="col-md-8">
                                    <input id="name" type="text" class="form-control" v-model="name" required
                                           autofocus autocomplete="off"  placeholder="Enter your name">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-sm-4 col-form-label text-md-right">Apellido</label>
                                <div class="col-md-8">
                                    <input id="surname" type="text" class="form-control" v-model="surname" required
                                           autofocus autocomplete="off"  placeholder="Enter your name">
                                </div>
                            </div>

                           




                            <div class="form-group row mt-1">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                                <div class="col-md-8">
                                    <input id="password" type="password" class="form-control" v-model="password"
                                           required autocomplete="off" placeholder="Enter your password">
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="name" class="col-sm-4 col-form-label text-md-right">tlf</label>
                                <div class="col-md-8">
                                    <input id="phone" type="number" class="form-control" v-model="phone" required
                                           autofocus autocomplete="off"  placeholder="Enter your name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-sm-4 col-form-label text-md-right">Avatar</label>
                                <div class="col-md-8">
                                    <input id="image" type="text" class="form-control" v-model="image"
                                           autofocus autocomplete="off"  placeholder="Enter your name">
                                </div>
                            </div>

                            <div class="form-group row mt-1 mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-success">
                                        Register
                                    </button>
                                </div>
                            </div>


                            <div class="row mt-1">
                                <div class="col-md-8 offset-md-4">
                                    <small class="text-muted">
                                        Have an account? Please
                                        <router-link to="/login" >login</router-link>
                                    </small>
                                </div>
                            </div>




                        </form>
                    </div>
                </div>


            </div>
        </div>
    </div>
</template>


<script>
 export default {
    data() {
        return {
            email:"",
            name:"",
            surname:"",
            password:"",
            phone:"",
            image:"",
            error: null
        }
    },
    methods: {
       register(e){
           e.preventDefault()
           if(this.password.length > 0) {
               this.$axios.get('/sanctum/csrf-cookie').then(response => {
                   this.$axios.post('api/register', {
                       email: this.email,
                       name: this.name,
                       surname: this.surname,
                       password: this.password,
                       phone: this.phone,
                       image: this.image

                   })
                       .then(response => {
                           if (response.data.success) {
                               window.location.href = "/login"
                           } else {
                               this.error = response.data.message
                           }
                       })
                       .catch(function (error) {
                           console.error(error);
                       });
               })
           }
        }
    }

}
</script>
