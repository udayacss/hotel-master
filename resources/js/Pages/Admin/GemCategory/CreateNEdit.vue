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
                                                GEM CATEGORY
                                                {{
                                                    gem_category
                                                        ? "UPDATE"
                                                        : "CREATE"
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
                                    id="personal-information"
                                    role="tabpanel"
                                >
                                    <div class="iq-card">
                                        <div
                                            class="iq-card-header d-flex justify-content-between"
                                        >
                                            <div class="iq-header-title">
                                                <h4 class="card-title">
                                                    Gem Category Information
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
                                                            >Name:</label
                                                        >
                                                        <input
                                                            type="text"
                                                            class="form-control"
                                                            required
                                                            v-model="form.name"
                                                        />
                                                        <div
                                                            class="alert alert-danger mt-1 col-sm-6"
                                                            role="alert"
                                                            v-if="errors.name"
                                                        >
                                                            <div
                                                                class="iq-alert-text"
                                                            >
                                                                {{
                                                                    errors.name
                                                                }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="form-group col-sm-12"
                                                    >
                                                        <image-upload
                                                            :lable_name="'Image'"
                                                            :folder_name="'GemCategories'"
                                                            :image_link="
                                                                form.image
                                                            "
                                                            :error="
                                                                errors.image
                                                            "
                                                            @setImageUrl="
                                                                form.image =
                                                                    $event
                                                            "
                                                        />
                                                    </div>
                                                    <div
                                                        class="form-group col-sm-12"
                                                    >
                                                        <image-upload
                                                            :lable_name="'Icon'"
                                                            :folder_name="'GemCategoryIcons'"
                                                            :error="errors.icon"
                                                            :image_link="
                                                                form.icon
                                                            "
                                                            @setImageUrl="
                                                                form.icon =
                                                                    $event
                                                            "
                                                        />
                                                    </div>
                                                </div>
                                                <button
                                                    type="button"
                                                    class="btn btn-primary mr-2"
                                                    @click="submit"
                                                    v-if="!gem_category"
                                                    :disabled="!button_status"
                                                >
                                                    Submit
                                                </button>
                                                <button
                                                    type="button"
                                                    class="btn btn-primary mr-2"
                                                    @click="update"
                                                    v-if="gem_category"
                                                    :disabled="!button_status"
                                                >
                                                    Edit
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
import { useForm } from "@inertiajs/vue3";
import Swal from "sweetalert2";
import ImageUpload from "../Components/ImageUpload.vue";

export default {
    components: {
        AppLayout,
        ImageUpload,
    },
    props: {
        gem_category: Object,
    },
    data() {
        return {
            form: useForm({
                id: this.gem_category?.id,
                name: this.gem_category?.name,
                image: this.gem_category?.image,
                icon: this.gem_category?.icon,
            }),
            errors: [],
            button_status: true,
            
        };
    },
    mounted() {
      
    },
    methods: {
        submit() {
            this.button_status = false; // setting button disable while submitting
            this.form.post(route("admin.gem_cat.store"), {
                onSuccess: (res) => {
                    this.showAlert("Gem Category Created");
                    window.location.href = route("admin.gem_cat.list");
                },
                onError: (er) => {
                    this.errors = er;
                    this.button_status = true; //enabling submit
                },
            });
        },
        update() {
            this.button_status = false; // setting button disable while submitting
            this.form.post(route("admin.gem_cat.update"), {
                onSuccess: (res) => {
                    this.showAlert("Gem Category Updated");
                    window.location.href = route("admin.gem_cat.list");
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
        getStatus(id) {
            if (id == this.center?.center_date) {
                return true;
            } else {
                return false;
            }
        },
       
    },
};
</script>

<style></style>
