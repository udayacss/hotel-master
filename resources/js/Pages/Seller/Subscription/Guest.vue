<style lang="scss">
@import '../../../../scss/variable.scss';
.login-page {
    // min-height: calc(100vh - 70px);
    margin-left: 0;
    padding: 0;
    background-image: url('/images/bg-1.jpg');
    background-size: cover;
    display: flex;
    align-items: center;
    .btn {
        &.btn-primary {
            padding: 5px 30px;
        }
        &.corner {
            position: absolute;
            top: 20px;
            right: 20px;
            z-index: 99999;
        }
    }
    .iq-card {
        padding: 30px 40px 40px 40px;
        border-radius: 20px;
        .logo {
            height: 80px;
            display: table;
            margin: 0 auto 20px auto;
        }
        .iq-card-header {
            border: unset;
        }
        .form-group {
            label {
                margin: 0 0 1px 0;
            }
        }
        .btn-area {
            display: flex;
            justify-content: center;
            margin-top: 22px;
            column-gap: 20px;
            .btn {
                width: 100%;
                max-width: 275px;
            }
        }
    }
}
@media only screen and (max-width: 768px) {
    .login-page {
        .iq-card {
            margin-top: 86px;
            padding: 20px;
            .iq-card-body {
                padding: 0;
            }
        }
    }
}
</style>
<template>
        <!-- Page Content  -->
        <div id="content-page" class="content-page login-page">
            <a class="btn btn-primary corner" href="/login">Sign in</a>
            <div class="container-fluid">
                <!-- <div class="row">
                    <div class="col-md-6">
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
                                                Seller Create
                                            </a>
                                        </li>
                                        <li class="col-md-3 p-0">
                                            <a
                                                class="nav-link active"
                                                href="/login"
                                            >
                                                Login
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="iq-edit-list-data">
                            <div class="tab-content">
                                <div
                                    class="tab-pane fade active show"
                                    id="personal-information"
                                    role="tabpanel"
                                >
                                    <div class="iq-card">
                                        <img :src="'/images/travel-tube-logo.jpg'" class="logo" alt="" />
                                        <div
                                            class="iq-card-header d-flex justify-content-between"
                                        >
                                            <h3 class="card-title text-center w-100">
                                                Create Seller
                                            </h3>
                                        </div>
                                        <div class="iq-card-body">
                                            <form>
                                                <div
                                                    class="row align-items-center"
                                                >
                                                    <div
                                                        class="form-group col-sm-6"
                                                    >
                                                        <label for="fname"
                                                            >First Name:</label
                                                        >
                                                        <input
                                                            type="text"
                                                            class="form-control"
                                                            v-model="
                                                                form.first_name
                                                            "
                                                            placeholder="First Name"
                                                        />
                                                        <div
                                                            class="alert alert-danger mt-1 col-sm-12"
                                                            role="alert"
                                                            v-if="
                                                                errors.first_name
                                                            "
                                                        >
                                                            <div
                                                                class="iq-alert-text"
                                                            >
                                                                {{
                                                                    errors.first_name[0]
                                                                }}
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div
                                                        class="form-group col-sm-6"
                                                    >
                                                        <label for="fname"
                                                            >Last Name:</label
                                                        >
                                                        <input
                                                            type="text"
                                                            class="form-control"
                                                            v-model="
                                                                form.last_name
                                                            "
                                                            placeholder="Last Name"
                                                        />
                                                        <div
                                                            class="alert alert-danger mt-1 col-sm-12"
                                                            role="alert"
                                                            v-if="
                                                                errors.last_name
                                                            "
                                                        >
                                                            <div
                                                                class="iq-alert-text"
                                                            >
                                                                {{
                                                                    errors.last_name[0]
                                                                }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="form-group col-sm-6"
                                                    >
                                                        <label for="fname"
                                                            >Mobile No:</label
                                                        >
                                                        <input
                                                            type="number"
                                                            class="form-control"
                                                            v-model="
                                                                form.mobile_no
                                                            "
                                                            placeholder="Mobile No"
                                                        />
                                                        <div
                                                            class="alert alert-danger mt-1 col-sm-12"
                                                            role="alert"
                                                            v-if="
                                                                errors.mobile_no
                                                            "
                                                        >
                                                            <div
                                                                class="iq-alert-text"
                                                            >
                                                                {{
                                                                    errors.mobile_no[0]
                                                                }}
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div
                                                        class="form-group col-sm-6"
                                                    >
                                                        <label for="fname"
                                                            >Email:</label
                                                        >
                                                        <input
                                                            type="text"
                                                            class="form-control"
                                                            v-model="form.email"
                                                            placeholder="Email"
                                                        />
                                                        <div
                                                            class="alert alert-danger mt-1 col-sm-12"
                                                            role="alert"
                                                            v-if="errors.email"
                                                        >
                                                            <div
                                                                class="iq-alert-text"
                                                            >
                                                                {{
                                                                    errors.email[0]
                                                                }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="form-group col-sm-6"
                                                    >
                                                        <label for="fname"
                                                            >Referral:</label
                                                        >
                                                        <input
                                                            type="text"
                                                            class="form-control"
                                                            v-model="
                                                                form.referral
                                                            "
                                                            placeholder="Referrel"
                                                        />
                                                        <div
                                                            class="alert alert-danger mt-1 col-sm-12"
                                                            role="alert"
                                                            v-if="
                                                                errors.referral
                                                            "
                                                        >
                                                            <div
                                                                class="iq-alert-text"
                                                            >
                                                                {{
                                                                    errors.referral[0]
                                                                }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="form-group col-sm-6"
                                                    >
                                                        <label for="fname"
                                                            >Bank Ref:</label
                                                        >
                                                        <input
                                                            type="text"
                                                            class="form-control"
                                                            v-model="
                                                                form.bank_ref
                                                            "
                                                            placeholder="Referrel"
                                                        />
                                                        <div
                                                            class="alert alert-danger mt-1 col-sm-12"
                                                            role="alert"
                                                            v-if="
                                                                errors.bank_ref
                                                            "
                                                        >
                                                            <div
                                                                class="iq-alert-text"
                                                            >
                                                                {{
                                                                    errors.bank_ref[0]
                                                                }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="btn-area">
                                                    <button
                                                        type="reset"
                                                        class="btn btn-secondary"
                                                    >
                                                        Cancel
                                                    </button>
                                                    <button
                                                        type="button"
                                                        @click="submitSeller"
                                                        class="btn btn-primary mr-2"
                                                    >
                                                        Submit
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <!-- <div
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
                                                    Roles
                                                </h4>
                                            </div>
                                        </div>
                                        <div class="iq-card-body">
                                            <form id="form_roles">
                                                <div
                                                    class="form-group row align-items-center"
                                                >
                                                    <div
                                                        class="form-group col-sm-6"
                                                    >
                                                        <label for="fname"
                                                            >Role Name:</label
                                                        >
                                                        <input
                                                            type="text"
                                                            class="form-control"
                                                            placeholder="Role Name"
                                                        />
                                                    </div>
                                                </div>

                                                <div
                                                    class="form-group row align-items-center"
                                                    v-for="(
                                                        section, index
                                                    ) in v_permissions"
                                                    :key="index"
                                                >
                                                    <label
                                                        class="col-md-3"
                                                        for="npass"
                                                        >{{
                                                            section[0].section
                                                        }}</label
                                                    >
                                                    <div class="col-md-9">
                                                        <div
                                                            class="custom-control custom-checkbox"
                                                        >
                                                            <input
                                                                type="checkbox"
                                                                class="custom-control-input"
                                                                :id="
                                                                    section[0]
                                                                        .id
                                                                "
                                                                @click="
                                                                    selectAll(
                                                                        section,$event
                                                                    )
                                                                "
                                                            />
                                                            <label
                                                                class="custom-control-label"
                                                                :for="
                                                                    section[0]
                                                                        .id
                                                                "
                                                                >{{
                                                                    index
                                                                }}</label
                                                            >
                                                        </div>
                                                        <div
                                                            v-for="(
                                                                permission,
                                                                p_index
                                                            ) in section"
                                                            :key="p_index"
                                                            class="custom-control custom-checkbox"
                                                        >
                                                            <input
                                                                type="checkbox"
                                                                class="custom-control-input"
                                                                v-model="
                                                                    selected_permissions
                                                                "
                                                                :id="
                                                                    'permission' +
                                                                    permission.id
                                                                "
                                                                :value="
                                                                    permission.id
                                                                "
                                                                @select="
                                                                    selectPermission
                                                                "
                                                            />
                                                            <label
                                                                class="custom-control-label"
                                                                :for="
                                                                    'permission' +
                                                                    permission.id
                                                                "
                                                                >{{
                                                                    permission?.name
                                                                }}</label
                                                            >
                                                        </div>
                                                    </div>
                                                </div>

                                                <button
                                                    type="button"
                                                    @click="submitRole"
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
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</template>

<script>
import AppLayout from "../../../Layouts/AppLayout.vue";
import { Link, useForm } from "@inertiajs/vue3";
import Swal from "sweetalert2";

export default {
    components: {
        AppLayout,
    },
    props: {},
    data() {
        return {
            form: useForm({
                first_name: this.role ? this.role.name : null,
                email: null,
                last_name: null,
                mobile_no: null,
                referral: null,
                bank_ref: null,
            }),
            errors: [],
        };
    },

    methods: {
        submitSeller() {
            this.submit();
        },
        async submit() {
            this.button_status = false; // setting button disable while submitting
            try {
                const response = await axios.post(
                    route("guest.seller.store"),
                    this.form
                );
                if (response.data.success) {
                    this.showAlert("Details Changed");
                    this.errors = [];
                    if (!this.role) {
                        this.form.reset();
                    }
                }
            } catch (error) {
                if (error.response.status === 422) {
                    // Validation error occurred
                    this.errors = error.response.data.errors;
                    this.button_status;
                } else {
                    // Handle other types of errors
                    console.error(error);
                    this.button_status;
                }
            }
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
