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
                                                User Create
                                            </a>
                                        </li>

                                        <!-- <li class="col-md-3 p-0">
                                            <a
                                                class="nav-link"
                                                data-toggle="pill"
                                                href="#emailandsms"
                                            >
                                                Roles
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
                                                    Create User
                                                </h4>
                                            </div>
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
                                                            >Email:</label
                                                        >
                                                        <input
                                                            type="text"
                                                            class="form-control"
                                                             v-model="form.email"
                                                            placeholder="Email"
                                                        />
                                                    </div>

                                                    <div
                                                        class="form-group col-sm-6"
                                                    >
                                                        <label>Role:</label>
                                                        <select
                                                            class="form-control"
                                                            v-model="form.role"
                                                        >
                                                            <option v-for="(role,index) in v_roles" :key="index">
                                                                {{role.name}}
                                                            </option>
                                                        </select>
                                                    </div>
                                                    <!-- <div
                                                        class="form-group col-sm-6"
                                                    >
                                                        <label>Country:</label>
                                                        <select
                                                            class="form-control"
                                                            id="exampleFormControlSelect3"
                                                        >
                                                            <option>
                                                                Caneda
                                                            </option>
                                                            <option>
                                                                Noida
                                                            </option>
                                                            <option selected="">
                                                                USA
                                                            </option>
                                                            <option>
                                                                India
                                                            </option>
                                                            <option>
                                                                Africa
                                                            </option>
                                                        </select>
                                                    </div> -->
                                                </div>
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
    </AppLayout>
</template>

<script>
import AppLayout from "../../../Layouts/AppLayout.vue";
import { Link, useForm } from "@inertiajs/vue3";

export default {
    components: {
        AppLayout,
    },
    props: {
        permissions: Object,
        user_permissions : Object,
        roles : Object,
    },
    data() {
        return {
            v_permissions: [],
            v_roles: this.roles,
            selected_permissions: [],
            all_selected: false,
            form : useForm({
                role: this.role ? this.role.name : null,
                email : null,
            }),
            errors: [],
        };
    },
    mounted() {
        this.setPermissions();
    },
    methods: {
        submitRole() {
            console.log(this.selected_permissions);
        },
        setPermissions() {
            this.v_permissions = this.permissions;
            // this.v_permissions.forEach((p) => {
            //     p.checked = false;
            // });
        },

        selectPermission() {
            console.log(this.selected_permissions);
        },
        selectAll(section,event) {
            let selected_permissions_updated = [];
            section.forEach((element) => {
                if (!event.target.checked) {
                    this.selected_permissions_updated =
                        this.selected_permissions.filter((permission) => {
                            permission != element.id;
                        });
                } else {
                    selected_permissions_updated.push(element.id);
                }
            });
            this.selected_permissions = selected_permissions_updated;
        },
    },
};
</script>

<style></style>
