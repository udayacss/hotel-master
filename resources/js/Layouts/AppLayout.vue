<script>
import Sidemenu from "./Admin/Sidemenu.vue";
import TopNav from "./Admin/TopNav.vue";
import Footer from "./Admin/Footer.vue";

export default {
    props: {
        side_menu_enabled: {
            type: Boolean,
            default: () => true,
        },
        top_nav_enabled: {
            type: Boolean,
            default: () => true,
        },
        footer_enabled: {
            type: Boolean,
            default: () => true,
        },
    },
    components: {
        Sidemenu,
        TopNav,
        Footer,
    },
};
</script>

<template>
    <div>
        <div class="wrapper">
            <Sidemenu v-if="side_menu_enabled" />
            <TopNav v-if="top_nav_enabled" />
            <slot />
        </div>

        <Footer v-if="footer_enabled" />
    </div>
</template>
