<template>
    <div>
        <!-- TOP Nav Bar -->
        <div class="iq-top-navbar">
            <div class="iq-navbar-custom">
                <nav class="navbar navbar-expand-lg navbar-light p-0">
                    <div class="iq-menu-bt d-flex align-items-center">
                        <div class="wrapper-menu">
                            <div class="main-circle">
                                <i class="ri-menu-line"></i>
                            </div>
                            <div class="hover-circle">
                                <i class="ri-close-fill"></i>
                            </div>
                        </div>
                        <div
                            class="iq-navbar-logo d-flex justify-content-between ml-3"
                        >
                            <Link
                                :href="route('admin.dashboard')"
                                class="header-logo"

                            >
                                <img
                                    :src="'/images/logo.png'"
                                    class="img-fluid rounded"
                                    alt=""
                                />
                                <span>TravelTube</span>
                            </Link>
                        </div>
                    </div>
                    <div class="iq-search-bar">
                        <!-- <form action="#" class="searchbox">
                            <input
                                type="text"
                                class="text search-input"
                                placeholder="Type here to search..."
                            />
                            <a class="search-link" href="#"
                                ><i class="ri-search-line"></i
                            ></a>
                        </form> -->
                    </div>
                    <button
                        class="navbar-toggler"
                        type="button"
                        data-toggle="collapse"
                        data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent"
                        aria-label="Toggle navigation"
                    >
                        <i class="ri-menu-3-line"></i>
                    </button>
                    <div
                        class="collapse navbar-collapse"
                        id="navbarSupportedContent"
                    >
                        <ul class="navbar-nav ml-auto navbar-list">
                            <li class="nav-item nav-icon dropdown">
                                <a
                                    href="#"
                                    class="search-toggle iq-waves-effect bg-primary rounded"
                                    v-if="v_notificationCount > 0"
                                >
                                    <i class="ri-mail-line"></i>
                                    <span class="bg-danger count-mail"></span>
                                </a>
                                <a

                                    v-if="v_notificationCount == 0"
                                >

                                </a>
                                <div class="iq-sub-dropdown">
                                    <div class="iq-card shadow-none m-0">
                                        <div class="iq-card-body p-0">
                                            <div class="bg-primary p-3">
                                                <h5 class="mb-0 text-white">
                                                    All Messages<small
                                                        class="badge badge-light float-right pt-1"
                                                        >{{
                                                            v_notificationCount
                                                        }}</small
                                                    >
                                                </h5>
                                            </div>
                                            <a href="#" class="iq-sub-card">
                                                <div
                                                    class="media align-items-center"
                                                >
                                                    <div class="">
                                                        <!-- <img
                                                            class="avatar-40 rounded"
                                                            :src="'/images/user/01.jpg'"
                                                            alt=""
                                                        /> -->
                                                    </div>
                                                    <div
                                                        class="media-body ml-3"
                                                    >
                                                        <h6 class="mb-0">
                                                            Pending
                                                            Subscriptions<small
                                                                class="badge badge-light float-right pt-1"
                                                                >{{
                                                                    v_pendingSubcriptions
                                                                }}</small
                                                            >
                                                        </h6>
                                                        <small
                                                            class="float-left font-size-12"
                                                        ></small>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <ul class="navbar-list">
                        <li class="line-height">
                            <a
                                href="#"
                                class="search-toggle iq-waves-effect d-flex align-items-center"
                            >
                                <img
                                    :src="'/images/user/1.jpg'"
                                    class="img-fluid rounded mr-3"
                                    alt="user"
                                />
                                <div class="caption">
                                    <h6 class="mb-0 line-height">
                                        {{ $page.props.auth?.user?.name }}
                                    </h6>
                                    <p class="mb-0">User</p>
                                </div>
                            </a>
                            <div class="iq-sub-dropdown iq-user-dropdown">
                                <div class="iq-card shadow-none m-0">
                                    <div class="iq-card-body p-0">
                                        <div class="bg-primary p-3">
                                            <h5
                                                class="mb-0 text-white line-height"
                                            >
                                                Hello
                                                {{
                                                    $page.props.auth?.user?.name
                                                }}
                                            </h5>
                                            <span
                                                class="text-white font-size-12"
                                                >Available</span
                                            >
                                        </div>

                                        <div
                                            class="d-inline-block w-100 text-center p-3"
                                        >
                                            <Link
                                                class="bg-primary iq-sign-btn"
                                                :href="route('logout')"
                                                method="POST"
                                                role="button"
                                                >Sign out<i
                                                    class="ri-login-box-line ml-2"
                                                ></i
                                            ></Link>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <!-- TOP Nav Bar END -->
    </div>
</template>

<script>
import { Link } from "@inertiajs/vue3";

export default {
    components: {
        Link,
    },
    data() {
        return {
            v_pendingSubcriptions: 0,
            v_notificationCount: 0,
        };
    },
    methods: {
        async getNavData() {
            var res = await axios.get(route("api.getNavData"));
            this.v_pendingSubcriptions = res?.data?.data?.sellerSubscriptions;
            this.v_notificationCount += this.v_pendingSubcriptions;
        },
    },
    mounted() {
        this.getNavData();
    },
};
</script>
