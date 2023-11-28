<script setup>
import AppLayoutSignIn from "../../Layouts/AppLayoutSignIn.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";

defineProps({
    canResetPassword: Boolean,
    status: String,
});

const form = useForm({
    email: "",
    password: "",
    remember: false,
});

const submit = () => {
    form.transform((data) => ({
        ...data,
        remember: form.remember ? "on" : "",
    })).post(route("login"), {
        onFinish: () => form.reset("password"),
    });
};
</script>
<style lang="scss">
@import '../../../scss/variable.scss';
.sign-in-page {
    background-image: url('/images/bg-1.jpg');
    background-size: cover;
    .sign-in-page-data {
        border-radius: 20px;
        box-shadow: 3px 3px 10px rgba($black, 0.15);
        .sign-in-from {
            padding: 30px 40px 44px 40px;
            .logo {
                height: 80px;
                margin: 0 auto 0px auto;
                display: block;
            }
            .form-group {
                label {
                    margin: 0 0 1px 0;
                }
            }
            .sign-info {
                padding: 13px 0 0 0;
            }
        }
    }
}
@media only screen and (max-width: 768px) {
    .sign-in-page {
        .sign-in-page-data {
            padding: 0;
            .sign-in-from {
                margin-top: 0;
                padding: 20px;
                .iq-card-body {
                    padding: 0;
                }
            }
        }
    }
}
</style>
<template>
    <AppLayoutSignIn>
        <!-- Sign in Start -->
        <section class="sign-in-page">
            <!-- <div id="container-inside">
                <div class="cube"></div>
                <div class="cube"></div>
                <div class="cube"></div>
                <div class="cube"></div>
                <div class="cube"></div>
            </div> -->
            <div class="container p-0">
                <div class="row justify-content-center no-gutters height-self-center">
                    <div class="col-md-4 d-flex align-items-center rounded">
                        <div class="col-md-12 bg-white sign-in-page-data">
                            <div class="sign-in-from">
                                <img :src="'/images/travel-tube-logo.jpg'" class="logo" alt="" />
                                <h3 class="mb-0 text-center">Sign in</h3>
                                <!-- <p class="text-center text-dark">
                                    Enter your Email ID and password to access your dashboard.
                                </p> -->
                                <form class="mt-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1"
                                            >Email address</label
                                        >
                                        <input
                                            type="email"
                                            v-model="form.email"
                                            class="form-control mb-0"
                                            id="exampleInputEmail1"
                                            placeholder="Enter email"
                                        />
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1"
                                            >Password</label
                                        >
                                        <!-- <a href="#" class="float-right"
                                            >Forgot password?</a
                                        > -->
                                        <input
                                            type="password"
                                            v-model="form.password"
                                            class="form-control mb-0"
                                            id="exampleInputPassword1"
                                            placeholder="Password"
                                        />
                                    </div>
                                    <!-- <div class="d-inline-block w-100">
                                        <div
                                            class="custom-control custom-checkbox d-inline-block mt-2 pt-1"
                                        >
                                            <input
                                                type="checkbox"
                                                class="custom-control-input"
                                                id="customCheck1"
                                            />
                                            <label
                                                class="custom-control-label"
                                                for="customCheck1"
                                                >Remember Me</label
                                            >
                                        </div>
                                    </div> -->
                                    <div class="sign-info text-center">
                                        <button
                                            type="button"
                                            @click="submit"
                                            class="btn btn-primary d-block w-100 mb-2"
                                            :class="{
                                                'opacity-25':
                                                    form.processing,
                                            }"
                                            :disabled="form.processing"
                                        >
                                            Sign in
                                        </button>
                                        <!-- <span
                                            class="text-dark dark-color d-inline-block line-height-2"
                                            >Don't have an account?
                                            <a href="#">Sign up</a></span
                                        > -->
                                    </div>
                                </form>
                            </div>
                        </div>
                            <!-- <div
                                class="col-md-7 text-center sign-in-page-image"
                            >
                                <div class="sign-in-detail text-white">
                                    <img
                                        src="images/transparent 1.png"
                                        class="img-fluid"
                                        alt="logo"
                                    />
                                    <a class="sign-in-logo mb-5" href="#"> </a>
                                    <div
                                        class="owl-carousel"
                                        data-autoplay="true"
                                        data-loop="true"
                                        data-nav="false"
                                        data-dots="true"
                                        data-items="1"
                                        data-items-laptop="1"
                                        data-items-tab="1"
                                        data-items-mobile="1"
                                        data-items-mobile-sm="1"
                                        data-margin="0"
                                    >
                                        <div class="item">
                                            <img
                                                src="images/login/1.png"
                                                class="img-fluid mb-4"
                                                alt="logo"
                                            />
                                            <h4 class="mb-1 text-white">
                                                Find new friends
                                            </h4>
                                            <p>
                                                It is a long established fact
                                                that a reader will be distracted
                                                by the readable content.
                                            </p>
                                        </div>
                                        <div class="item">
                                            <img
                                                src="images/login/1.png"
                                                class="img-fluid mb-4"
                                                alt="logo"
                                            />
                                            <h4 class="mb-1 text-white">
                                                Connect with the world
                                            </h4>
                                            <p>
                                                It is a long established fact
                                                that a reader will be distracted
                                                by the readable content.
                                            </p>
                                        </div>
                                        <div class="item">
                                            <img
                                                src="images/login/1.png"
                                                class="img-fluid mb-4"
                                                alt="logo"
                                            />
                                            <h4 class="mb-1 text-white">
                                                Create new events
                                            </h4>
                                            <p>
                                                It is a long established fact
                                                that a reader will be distracted
                                                by the readable content.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                    </div>
                </div>
            </div>
        </section>
        <!-- Sign in END -->
    </AppLayoutSignIn>
</template>
