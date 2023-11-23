<script>
import AppLayout from "../../Layouts/AppLayout.vue";
import moment from "moment";
import BoardRound from "../Components/BoardRound.vue";

export default {
    components: {
        AppLayout,
        moment,
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
        formatdate(date) {
            const formattedDate = moment(date).format("YYYY/MM/DD");
            return formattedDate; //20171019
        },
    },
};
</script>

<template>
    <AppLayout>
        <!-- Page Content  -->
        <div id="content-page" class="content-page">
            <div class="container-fluid">
                <!-- Container -->
                <div class="container">
                    <board-round :boards="v_boards" :my_seller_account="v_my_seller_account" />
                </div>
            </div>
        </div>
    </AppLayout>
</template>
