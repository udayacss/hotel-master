<template>
    <div>
        <!-- Sidebar  -->
        <div class="iq-sidebar">
            <div class="iq-navbar-logo d-flex justify-content-between">
                <a :href="route('admin.dashboard')" class="header-logo">
                    <img
                        :src="'/images/logo.png'"
                        class="img-fluid rounded"
                        alt=""
                    />
                    <span>TravelTube</span>
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
                            <li
                                :class="{ active: checkPath(item.path_name) }"
                                v-if="
                                    $page.props.access_permissions.includes(
                                        item.permission
                                    )
                                "
                            >
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
                                            v-if="
                                                $page.props.access_permissions.includes(
                                                    sub_item.permission
                                                )
                                            "
                                            :class="{
                                                active: getIcon(
                                                    route(sub_item.link)
                                                ),
                                            }"
                                        >
                                            <Link
                                                :href="route(sub_item.link)"
                                                method="get"
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
    created() {},
    data() {
        return {
            routes: [
                {
                    /* Roles & Permissions section starting */
                    name: "Roles & Permissions",
                    permission: "role.list",
                    path_name: "/role",
                    icon: "la-user-tie",
                    id: "#roleinfo",
                    id_n: "roleinfo",
                    sub: [
                        {
                            permission: "role.list",
                            name: "LIST",
                            icon: "la-list",
                            link: "admin.role.list",
                        },
                    ],
                    /* User section edning */
                },
                {
                    /* User section starting */
                    name: "User",
                    permission: "user.update",
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
                        {
                            permission: "user.list",
                            name: "LIST",
                            icon: "la-list",
                            link: "admin.user.list",
                        },
                        {
                            permission: "user.my",
                            name: "MY",
                            icon: "la-list",
                            link: "admin.user.my",
                        },
                    ],
                    /* User section edning */
                },
                {
                    /* Seller section starting */
                    name: "Seller",
                    permission: "seller.list",
                    path_name: "/seller",
                    icon: "la-user-tie",
                    id: "#sellerinfo",
                    id_n: "sellerinfo",
                    sub: [
                        {
                            permission: "seller.list",
                            name: "LIST",
                            icon: "la-list",
                            link: "admin.seller.list",
                        },
                    ],
                    /* User section edning */
                },
                {
                    /* Boards section starting */
                    name: "Boards",
                    permission: "board.list",
                    path_name: "/board",
                    icon: "la-user-tie",
                    id: "#boardinfo",
                    id_n: "boardinfo",
                    sub: [
                        {
                            permission: "board.list",
                            name: "LIST",
                            icon: "la-list",
                            link: "admin.board.list",
                        },
                        {
                            permission: "board.list",
                            name: "LIST PREVIEW",
                            icon: "la-list",
                            link: "admin.board.preview",
                        },
                    ],
                    /* User section edning */
                },
                {
                    /* Subscriprion section starting */
                    name: "Subscription",
                    permission: "subscription.list",
                    path_name: "/subscriprtion",
                    icon: "la-user-tie",
                    id: "#subscriptioninfo",
                    id_n: "subscriptioninfo",
                    sub: [
                        {
                            permission: "subscription.list",
                            name: "LIST",
                            icon: "la-list",
                            link: "admin.subscription.list",
                        },
                    ],
                    /* User section edning */
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
