<template>
   <div class="container cabecera-bg">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="box-form mt-5">
                <h1 class="titulos centrado">MI PERFIL</h1>
                     
                        <form class="centrado">
                            <label for="email" class="col-sm-4 col-form-label text-md-right texto">Correo electronico:</label>

                            <div class="form-group">
                                <!-- {{user.email}} -->
                            </div>
                            
                            <label for="email" class="col-sm-4 col-form-label text-md-right texto">Nombre:</label>

                            <div class="form-group">
                                <!-- {{user.email}} -->
                            </div>


                            <div class="form-group centrado mb-3">
                                    <button type="submit" class=" mt-3 btn btn-basico" @click="updateUserData">
                                        GUARDAR
                                    </button>
                            </div>






                        </form>
                </div>

            </div>
        </div>
    </div>
</template>

<script>
export default{
    name: "profile"
}
</script>

<style scoped>

</style>