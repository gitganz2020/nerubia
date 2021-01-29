<template>
    <div>
        <div v-for="(movie, index) in movies" :key="index">
            <list-item 
                :movie="movie"
                class="item"
                v-on:itemchanged="$emit('reloadList')"
            />
        </div>
    </div>
</template>

<script>
import listItem from "./listItem"
import ListItem from './listItem.vue'

export default {
    props: ['movies'],
    components: {
        listItem
    }
}
</script>

<style scoped>
    .item{
        background: #e6e6e6;
        padding: 5px;
        margin-top: 5px;
    }
</style>
