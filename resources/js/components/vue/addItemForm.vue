<template>
    <div class="addItem">
        <input type="number" v-model="movie.user_id" />
        <input type="text" v-model="movie.title" />
        <input type="text" v-model="movie.overview" />
        <input type="number" v-model="movie.vote" />
        <input type="text" v-model="movie.release_at" />
        <font-awesome-icon
            icon="plus-square"
            @click="addItem()"
            :class="[movie.vote == 5 ? 'active' : 'inactive', 'plus']"
        />
    </div>
</template>

<script>
export default {
    data: function () {
        return {
            movie: {
                user_id:"",
                title:"",
                overview:"",
                vote:"",
                release_at:"",
            }
        }
    },
    methods:{
        addItem(){
            if( this.movie.user_id == '' || this.movie.title == '' || this.movie.overview == '' || this.movie.vote == '' || this.movie.release_at == ''){
                return;
            }
            axios.post('api/movies/store', {
                movie: this.movie
            })
            .then( response => {
                if( response.status == 201 ){
                    this.movie.user_id = "";
                    this.item.title = "";
                    this.$emit('reloadList');
                }
            })
            .catch( error => {
                console.log( error );
            })
        }
    }
}
</script>

<style scoped>
    .addItem{
        /* display: flex; */
        justify-content: center;
        align-items: center;
    }
    input{
        background:#f7f7f7;
        outline:none;
        padding:5px;
        margin-right:10px;
        width:100%;
        border:1px solid #666666;
        display: block;
        margin-bottom:5px;
        margin-top:5px;
    }
    .plus{
        font-size: 20px;
    }
    .active{
        color:#00CE25;
    }
    .inactive{
        color:#999999;
    }
</style>
