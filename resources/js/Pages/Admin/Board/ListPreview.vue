<template>
    <AppLayout>
        <div id="content-page" class="content-page">
            <div class="container-fluid">
                <div class="container">
                    <board-round :boards="this.v_boards" />
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<script>
import AppLayout from "../../../Layouts/AppLayout.vue";
import { Link } from "@inertiajs/vue3";
import BoardRound from '../../Components/BoardRound.vue';

export default {
    components: {
        AppLayout,
        Link,
        BoardRound,
    },

    props: {
        boards: Object,
    },
    data() {
        return {
            v_boards: this.boards,
        };
    },
    mounted() {
        console.log(this.boards);
    },
    methods: {
   
    },
};
</script>

<style>

</style>
