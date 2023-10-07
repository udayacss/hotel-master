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
                                                href="#roleinfo"
                                            >
                                                {{
                                                    role
                                                        ? "Role Update"
                                                        : "Role Create"
                                                }}
                                            </a>
                                        </li>
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
                                    id="roleinfo"
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
                                                            v-model="
                                                                form.role_name
                                                            "
                                                            placeholder="Role Name"
                                                        />
                                                        <div
                                                            class="alert alert-danger mt-1 col-sm-12"
                                                            role="alert"
                                                            v-if="
                                                                errors.role_name
                                                            "
                                                        >
                                                            <div
                                                                class="iq-alert-text"
                                                            >
                                                                {{
                                                                    errors
                                                                        .role_name[0]
                                                                }}
                                                            </div>
                                                        </div>
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
                                                                        section,
                                                                        $event
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
                                                                    form.selected_permissions
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
                                                    v-if="!role"
                                                    type="button"
                                                    @click="submitRole"
                                                    class="btn btn-primary mr-2"
                                                >
                                                    Submit
                                                </button>
                                                <button
                                                    v-if="role"
                                                    type="button"
                                                    @click="updateRole"
                                                    class="btn btn-primary mr-2"
                                                >
                                                    Update
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
import axios from "axios";

export default {
    components: {
        AppLayout,
    },
    props: {
        permissions: Object,
        role: Object,
    },
    data() {
        return {
            v_permissions: this.permissions,
            // all_selected: false,
            v_role: this.role?.permissions ? this.role?.permissions : [],
            form: useForm({
                selected_permissions: [],
                role_id: this.role ? this.role?.id : null,
                role_name: this.role ? this.role.name : "",
            }),
            errors: [],
        };
    },
    mounted() {
        if (this.role?.permissions) {
            this.setPermissions();
        }
    },
    methods: {
        submitRole() {
            this.submit();
        },
        updateRole() {
            this.submit();
        },
        setPermissions() {
            this.role.permissions.forEach((pem) => {
                this.form.selected_permissions.push(pem.id);
            });
        },

        selectPermission() {},
        selectAll(section, event) {
            let selected_permissions_updated = [];
            section.forEach((element) => {
                if (!event.target.checked) {
                    this.selected_permissions_updated =
                        this.form.selected_permissions.filter((permission) => {
                            permission != element.id;
                        });
                } else {
                    selected_permissions_updated =
                        this.form.selected_permissions;
                    selected_permissions_updated.push(element.id);
                }
            });
            this.form.selected_permissions = selected_permissions_updated;
        },
        async submit() {
            this.button_status = false; // setting button disable while submitting
            try {
                const response = await axios.post(
                    route("admin.role.store"),
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

<style></style>
