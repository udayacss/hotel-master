<template>
    <AppLayout>
        <!-- Page Content  -->
        <div id="content-page" class="content-page">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="iq-card">
                            <div class="iq-card-body p-0">
                                <div class="iq-edit-list">
                                    <ul
                                        class="iq-edit-profile d-flex nav nav-pills"
                                    >
                                        <li class="col-md-3 p-0">
                                            <a
                                                class="nav-link active"
                                                data-toggle="pill"
                                                href="#personal-information"
                                            >
                                                Personal Information
                                            </a>
                                        </li>
                                        <li class="col-md-3 p-0">
                                            <a
                                                class="nav-link"
                                                data-toggle="pill"
                                                href="#chang-pwd"
                                            >
                                                Change Password
                                            </a>
                                        </li>
                                        <li class="col-md-3 p-0">
                                            <a
                                                class="nav-link"
                                                data-toggle="pill"
                                                href="#emailandsms"
                                            >
                                                Email and SMS
                                            </a>
                                        </li>
                                        <!-- <li class="col-md-3 p-0">
                                            <a
                                                class="nav-link"
                                                data-toggle="pill"
                                                href="#manage-contact"
                                            >
                                                Manage Contact
                                            </a>
                                        </li> -->
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="iq-edit-list-data">
                            <div class="tab-content">
                                <div
                                    class="tab-pane fade active show"
                                    id="personal-information"
                                    role="tabpanel"
                                >
                                    <div class="iq-card">
                                        <div
                                            class="iq-card-header d-flex justify-content-between"
                                        >
                                            <div class="iq-header-title">
                                                <h4 class="card-title">
                                                    Personal Information
                                                </h4>
                                            </div>
                                        </div>
                                        <div class="iq-card-body">
                                            <form>
                                                <!-- <div
                                                    class="form-group row align-items-center"
                                                >
                                                    <div class="col-md-12">
                                                        <div
                                                            class="profile-img-edit"
                                                        >
                                                            <img
                                                                class="profile-pic"
                                                                :src="'/images/user/11.png'"
                                                                alt="profile-pic"
                                                            />
                                                            <div
                                                                class="p-image"
                                                            >
                                                                <i
                                                                    class="ri-pencil-line upload-button"
                                                                ></i>
                                                                <input
                                                                    class="file-upload"
                                                                    type="file"
                                                                    accept="image/*"
                                                                />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> -->
                                                <div
                                                    class="row align-items-center"
                                                >
                                                    <div
                                                        class="form-group col-sm-6"
                                                    >
                                                        <label for="fname">
                                                            Name:</label
                                                        >
                                                        <input
                                                            type="text"
                                                            class="form-control"
                                                            v-model="form.name"
                                                        />
                                                    </div>
                                                    <div
                                                        class="form-group col-sm-6"
                                                    >
                                                        <label for="lname"
                                                            >E Mail:</label
                                                        >
                                                        <input
                                                            type="text"
                                                            disabled
                                                            class="form-control"
                                                            v-model="form.email"
                                                        />
                                                    </div>
                                                </div>
                                                <div class="btn-area">
                                                    <button
                                                        type="button"
                                                        class="btn btn-primary mr-2"
                                                        @click="submitPersonal"
                                                    >
                                                        Submit
                                                    </button>
                                                    <button
                                                        type="reset"
                                                        class="btn iq-bg-danger"
                                                    >
                                                        Cancel
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="tab-pane fade"
                                    id="chang-pwd"
                                    role="tabpanel"
                                >
                                    <div class="iq-card">
                                        <div
                                            class="iq-card-header d-flex justify-content-between"
                                        >
                                            <div class="iq-header-title">
                                                <h4 class="card-title">
                                                    Change Password
                                                </h4>
                                            </div>
                                        </div>
                                        <div class="iq-card-body">
                                            <form>
                                                <div class="form-group">
                                                    <label for="cpass"
                                                        >Current
                                                        Password:</label
                                                    >
                                                    <a
                                                        href="javascripe:void();"
                                                        class="float-right"
                                                        >Forgot Password</a
                                                    >
                                                    <input
                                                        type="Password"
                                                        class="form-control"
                                                        v-model="
                                                            form.old_password
                                                        "
                                                    />
                                                    <div
                                                        class="alert alert-danger mt-1 col-sm-6"
                                                        role="alert"
                                                        v-if="
                                                            errors.old_password
                                                        "
                                                    >
                                                        <div
                                                            class="iq-alert-text"
                                                        >
                                                            {{
                                                                errors.old_password
                                                            }}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="npass"
                                                        >New Password:</label
                                                    >
                                                    <input
                                                        type="Password"
                                                        class="form-control"
                                                        v-model="
                                                            form.new_password
                                                        "
                                                    />
                                                    <div
                                                        class="alert alert-danger mt-1 col-sm-6"
                                                        role="alert"
                                                        v-if="
                                                            errors.new_password
                                                        "
                                                    >
                                                        <div
                                                            class="iq-alert-text"
                                                        >
                                                            {{
                                                                errors.new_password
                                                            }}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="vpass"
                                                        >Verify Password:</label
                                                    >
                                                    <input
                                                        type="Password"
                                                        class="form-control"
                                                        v-model="
                                                            form.new_password_confirmation
                                                        "
                                                    />
                                                    <div
                                                        class="alert alert-danger mt-1 col-sm-6"
                                                        role="alert"
                                                        v-if="
                                                            errors.new_password
                                                        "
                                                    >
                                                        <div
                                                            class="iq-alert-text"
                                                        >
                                                            {{
                                                                errors.new_password
                                                            }}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="btn-area">
                                                    <button
                                                        type="button"
                                                        class="btn btn-primary mr-2"
                                                        @click="changePassword"
                                                    >
                                                        Submit
                                                    </button>
                                                    <button
                                                        type="reset"
                                                        class="btn iq-bg-danger"
                                                    >
                                                        Cancel
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="tab-pane fade"
                                    id="emailandsms"
                                    role="tabpanel"
                                >
                                    <div class="iq-card">
                                        <div
                                            class="iq-card-header d-flex justify-content-between"
                                        >
                                            <div class="iq-header-title">
                                                <h4 class="card-title">
                                                    Email and SMS
                                                </h4>
                                            </div>
                                        </div>
                                        <div class="iq-card-body">
                                            <form>
                                                <div
                                                    class="form-group row align-items-center"
                                                >
                                                    <label
                                                        class="col-md-3"
                                                        for="emailnotification"
                                                        >Email
                                                        Notification:</label
                                                    >
                                                    <div
                                                        class="col-md-9 custom-control custom-switch"
                                                    >
                                                        <input
                                                            type="checkbox"
                                                            class="custom-control-input"
                                                            id="emailnotification"
                                                            checked=""
                                                        />
                                                        <label
                                                            class="custom-control-label"
                                                            for="emailnotification"
                                                        ></label>
                                                    </div>
                                                </div>
                                                <div
                                                    class="form-group row align-items-center"
                                                >
                                                    <label
                                                        class="col-md-3"
                                                        for="smsnotification"
                                                        >SMS
                                                        Notification:</label
                                                    >
                                                    <div
                                                        class="col-md-9 custom-control custom-switch"
                                                    >
                                                        <input
                                                            type="checkbox"
                                                            class="custom-control-input"
                                                            id="smsnotification"
                                                            checked=""
                                                        />
                                                        <label
                                                            class="custom-control-label"
                                                            for="smsnotification"
                                                        ></label>
                                                    </div>
                                                </div>
                                                <div
                                                    class="form-group row align-items-center"
                                                >
                                                    <label
                                                        class="col-md-3"
                                                        for="npass"
                                                        >When To Email</label
                                                    >
                                                    <div class="col-md-9">
                                                        <div
                                                            class="custom-control custom-checkbox"
                                                        >
                                                            <input
                                                                type="checkbox"
                                                                class="custom-control-input"
                                                                id="email01"
                                                            />
                                                            <label
                                                                class="custom-control-label"
                                                                for="email01"
                                                                >You have new
                                                                notifications.</label
                                                            >
                                                        </div>
                                                        <div
                                                            class="custom-control custom-checkbox"
                                                        >
                                                            <input
                                                                type="checkbox"
                                                                class="custom-control-input"
                                                                id="email02"
                                                            />
                                                            <label
                                                                class="custom-control-label"
                                                                for="email02"
                                                                >You're sent a
                                                                direct
                                                                message</label
                                                            >
                                                        </div>
                                                        <div
                                                            class="custom-control custom-checkbox"
                                                        >
                                                            <input
                                                                type="checkbox"
                                                                class="custom-control-input"
                                                                id="email03"
                                                                checked=""
                                                            />
                                                            <label
                                                                class="custom-control-label"
                                                                for="email03"
                                                                >Someone adds
                                                                you as a
                                                                connection</label
                                                            >
                                                        </div>
                                                    </div>
                                                </div>
                                                <div
                                                    class="form-group row align-items-center"
                                                >
                                                    <label
                                                        class="col-md-3"
                                                        for="npass"
                                                        >When To Escalate
                                                        Emails</label
                                                    >
                                                    <div class="col-md-9">
                                                        <div
                                                            class="custom-control custom-checkbox"
                                                        >
                                                            <input
                                                                type="checkbox"
                                                                class="custom-control-input"
                                                                id="email04"
                                                            />
                                                            <label
                                                                class="custom-control-label"
                                                                for="email04"
                                                            >
                                                                Upon new
                                                                order.</label
                                                            >
                                                        </div>
                                                        <div
                                                            class="custom-control custom-checkbox"
                                                        >
                                                            <input
                                                                type="checkbox"
                                                                class="custom-control-input"
                                                                id="email05"
                                                            />
                                                            <label
                                                                class="custom-control-label"
                                                                for="email05"
                                                            >
                                                                New membership
                                                                approval</label
                                                            >
                                                        </div>
                                                        <div
                                                            class="custom-control custom-checkbox"
                                                        >
                                                            <input
                                                                type="checkbox"
                                                                class="custom-control-input"
                                                                id="email06"
                                                                checked=""
                                                            />
                                                            <label
                                                                class="custom-control-label"
                                                                for="email06"
                                                            >
                                                                Member
                                                                registration</label
                                                            >
                                                        </div>
                                                    </div>
                                                </div>
                                                <button
                                                    type="submit"
                                                    class="btn btn-primary mr-2"
                                                >
                                                    Submit
                                                </button>
                                                <button
                                                    type="reset"
                                                    class="btn iq-bg-danger"
                                                >
                                                    Cancel
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="tab-pane fade"
                                    id="manage-contact"
                                    role="tabpanel"
                                >
                                    <div class="iq-card">
                                        <div
                                            class="iq-card-header d-flex justify-content-between"
                                        >
                                            <div class="iq-header-title">
                                                <h4 class="card-title">
                                                    Manage Contact
                                                </h4>
                                            </div>
                                        </div>
                                        <div class="iq-card-body">
                                            <form>
                                                <div class="form-group">
                                                    <label for="cno"
                                                        >Contact Number:</label
                                                    >
                                                    <input
                                                        type="text"
                                                        class="form-control"
                                                        id="cno"
                                                        value="001 2536 123 458"
                                                    />
                                                </div>
                                                <div class="form-group">
                                                    <label for="email"
                                                        >Email:</label
                                                    >
                                                    <input
                                                        type="text"
                                                        class="form-control"
                                                        id="email"
                                                        value="Barryjone@demo.com"
                                                    />
                                                </div>
                                                <div class="form-group">
                                                    <label for="url"
                                                        >Url:</label
                                                    >
                                                    <input
                                                        type="text"
                                                        class="form-control"
                                                        id="url"
                                                        value="https://getbootstrap.com"
                                                    />
                                                </div>
                                                <div class="btn-area">
                                                    <button
                                                        type="submit"
                                                        class="btn btn-primary mr-2"
                                                    >
                                                        Submit
                                                    </button>
                                                    <button
                                                        type="reset"
                                                        class="btn iq-bg-danger"
                                                    >
                                                        Cancel
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<script>
import AppLayout from "../../../Layouts/AppLayout.vue";
import { Link, useForm } from "@inertiajs/vue3";
import Swal from "sweetalert2";

export default {
    props: {
        user: Object,
    },
    components: {
        AppLayout,
        Link,
    },
    data() {
        return {
            form: useForm({
                name: this.user.name,
                email: this.user.email,
                old_password: "",
                new_password: "",
                new_password_confirmation: "",
            }),
            errors: [],
            button_status: true,
        };
    },
    methods: {
        submitPersonal() {
            this.button_status = false; // setting button disable while submitting
            this.form.post(route("admin.user.changePersonal"), {
                onSuccess: (res) => {
                    this.showAlert("Details Changed");
                    window.location.href = route("admin.user.profile");
                },
                onError: (er) => {
                    this.errors = er;
                    this.button_status = true; //enabling submit
                },
            });
        },
        changePassword() {
            this.button_status = false; // setting button disable while submitting
            this.form.post(route("admin.user.changePassword"), {
                onSuccess: (res) => {
                    this.showAlert("Password Changed");
                    window.location.href = route("admin.user.profile");
                },
                onError: (er) => {
                    this.errors = er;
                    this.button_status = true; //enabling submit
                },
            });
        },
        showAlert(type) {
            Swal.fire({
                position: "top-end",
                icon: "success",
                title: type,
                showConfirmButton: false,
                timer: 1500,
            });
        },
    },
};
</script>

<style lang="scss">
.btn-area {
    display: flex;
    .btn {
        &.btn-primary {

        }
    }
}
</style>
