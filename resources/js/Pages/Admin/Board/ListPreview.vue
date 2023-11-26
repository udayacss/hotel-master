<template>
    <AppLayout>
        <div id="content-page" class="content-page">
            <div class="container-fluid">
                <div class="container">
                    <board-round :boards="this.v_boards" :my_seller_account="v_my_seller_account" />
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
        my_seller_account: Object,
    },
    data() {
        return {
            v_boards: this.boards,
            v_my_seller_account: this.my_seller_account,
        };
    },
    mounted() {
    },
    methods: {
   
    },
};
</script>

<style>

</style>
