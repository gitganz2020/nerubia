<template>
    <div class="container">
        <div class="row mt-4">
            <div class="col6 offset-3">
                <form action="#" @submit.prevent="handleLogin">
                    <h3>Login for Movie Lists</h3>
                    <div class="form-row">
                        <input type="email" name="email" class="form-control" v-model="formData.email" placeholder="Enter email" />
                    </div>
                    <div class="form-row">
                        <input type="password" name="password" class="form-control" v-model="formData.password" placeholder="Enter password" />
                    </div>
                    <div class="form-row">
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                movies: [],
                formData: {
                    email: '',
                    password: ''
                }
            }
        },
        methods: {
            handleLogin() {
                //send axios request
                axios.get('/sanctum/csrf-cookie').then( response => {
                    axios.post('/api/movies/login', this.formData).then( response => {
                        this.getMovies();
                    });
                });
            }
        },
        getMovies() {
            axios.get('/api/movies').then( response => {
                console.log(response);
            });
        }
    }
</script>

<style scoped>
    .form-row{
        margin-bottom: 8px;
    }
</style>
