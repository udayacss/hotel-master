<template>
    <div>
        <!-- Sidebar  -->
        <div class="iq-sidebar">
            <div class="iq-navbar-logo d-flex justify-content-between">
                <a :href="route('admin.dashboard.index')" class="header-logo">
                    <img
                        :src="'/images/logo.png'"
                        class="img-fluid rounded"
                        alt=""
                    />
                    <span>API</span>
                </a>
                <div class="iq-menu-bt align-self-center">
                    <div class="wrapper-menu">
                        <div class="main-circle">
                            <i class="ri-menu-line"></i>
                        </div>
                        <div class="hover-circle">
                            <i class="ri-close-fill"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div id="sidebar-scrollbar">
                <nav class="iq-sidebar-menu">
                    <ul id="iq-sidebar-toggle" class="iq-menu">
                        <div v-for="(item, index) in routes" :key="index">
                            <li :class="{ active: checkPath(item.path_name) }">
                                <a
                                    :href="item.id"
                                    class="iq-waves-effect"
                                    data-toggle="collapse"
                                    aria-expanded="false"
                                    ><span class="ripple rippleEffect"></span
                                    ><i
                                        class="las iq-arrow-left"
                                        :class="item.icon"
                                    ></i
                                    ><span>{{ item.name }}</span
                                    ><i
                                        class="ri-arrow-right-s-line iq-arrow-right"
                                    ></i
                                ></a>
                                <ul
                                    :id="item.id_n"
                                    class="iq-submenu collapse"
                                    :class="{ show: checkPath(item.path_name) }"
                                    data-parent="#iq-sidebar-toggle"
                                    style=""
                                >
                                    <div
                                        v-for="(
                                            sub_item, sub_index
                                        ) in item.sub"
                                        :key="sub_index"
                                    >
                                        <li
                                            :class="{
                                                active: getIcon(
                                                    route(sub_item.link)
                                                ),
                                            }"
                                        >
                                            <Link :href="route(sub_item.link)"
                                                ><i
                                                    class="las"
                                                    :class="sub_item.icon"
                                                ></i
                                                >{{ sub_item.name }}</Link
                                            >
                                        </li>
                                    </div>
                                </ul>
                            </li>
                        </div>
                    </ul>
                </nav>
                <div class="p-3"></div>
            </div>
        </div>
    </div>
</template>

<script>
import { Link } from "@inertiajs/vue3";
export default {
    components: {
        Link,
    },
    created() {
        //  console.log($page.props);
    },
    data() {
        return {
            routes: [
                {
                    /* User section starting */
                    name: "User",
                    permission: "user.list",
                    path_name: "/user",
                    icon: "la-user-tie",
                    id: "#userinfo",
                    id_n: "userinfo",
                    sub: [
                        {
                            permission: "user.update",
                            name: "PROFILE",
                            icon: "la-smile",
                            link: "admin.user.profile",
                        },
                        // {
                        //     permission: "user.update",
                        //     name: "EDIT",
                        //     icon: "la-pen-alt",
                        //     link: "admin.user.profile",
                        // },
                        // {
                        //     permission: "user.create",
                        //     name: "ADD",
                        //     icon: "la-plus-circle",
                        //     link: "admin.user.profile",
                        // },
                        // {
                        //     permission: "user.list",
                        //     name: "LIST",
                        //     icon: "la-list",
                        //     link: "admin.user.list",
                        // },
                    ],
                    /* User section edning */
                },
                {
                    /* Quotation section starting */
                    name: " Quotation",
                    permission: "admin.quotation.create",
                    path_name: "/quotation",
                    icon: "la-user-tie",
                    id: "#gem-catinfo",
                    id_n: "gem-catinfo",
                    sub: [
                        {
                            permission: "admin.quotation.create",
                            name: "ADD",
                            icon: "la-plus-circle",
                            link: "admin.quotation.create",
                        },
                        {
                            permission: "admin.quotation.index",
                            name: "LIST",
                            icon: "la-list",
                            link: "admin.quotation.index",
                        },
                    ],
                    /*  Gem Category section edning */
                },
            ],
        };
    },
    methods: {
        getIcon(route) {
            if (route == window.location.href) {
                return true;
            } else {
                return false;
            }
        },
        checkPath(path) {
            if (window.location.pathname.includes(path)) {
                return true;
            } else {
                return false;
            }
        },
    },
};
</script>
