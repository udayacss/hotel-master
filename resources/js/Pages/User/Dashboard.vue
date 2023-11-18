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
                    <board-round :boards="v_boards" />
                </div>
            </div>
        </div>
    </AppLayout>
</template>
