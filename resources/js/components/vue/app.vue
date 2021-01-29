<template>
    <div class="todoListContainer">
        <div class="heading">
            <h2 id="title">Movie Lists</h2>
            <add-item-form 
                v-on:reloadList="getList()"
            />
        </div>
        <list-view 
            :movies="movies" 
            v-on:reloadList="getList()"
        />
    </div>
</template>

<script>
import addItemForm from "./addItemForm"
import listView from "./listView"

export default {
    components:{
        addItemForm,
        listView
    },
    data: function () {
        return {
            movies: []
        }
    },
    methods: {
        getList () {
            axios.get('/api/movies')
            .then( response => {
                //this.movies = response.data
                console.log(response);
            })
            .catch( error => {
                console.log( error )
            })
        }
    },
    created() {
        this.getList()
    }
}
</script>

<style scoped>
    .todoListContainer{
        width:350px;
        margin:auto;
    }
    .heading{
        background:#e6e6e6;
        padding:10px;
    }
    .title{
        text-align:center;
    }
</style>