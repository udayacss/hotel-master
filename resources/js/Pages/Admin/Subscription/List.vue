<template>
    <AppLayout>
        <div id="content-page" class="content-page">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="iq-card">
                            <div
                                class="iq-card-header d-flex justify-content-between"
                            >
                                <div class="iq-header-title">
                                    <h4 class="card-title">
                                        Subscription List
                                    </h4>
                                </div>
                            </div>
                            <div class="iq-card-body">
                                <div class="table-responsive">
                                    <div class="row justify-content-between">
                                        <div class="col-sm-12 col-md-6">
                                            <div
                                                id="user_list_datatable_info"
                                                class="dataTables_filter"
                                            >
                                                <form
                                                    class="mr-3 position-relative"
                                                >
                                                    <div
                                                        class="form-group mb-0"
                                                    >
                                                        <input
                                                            type="search"
                                                            class="form-control"
                                                            id="exampleInputSearch"
                                                            placeholder="Search"
                                                            aria-controls="user-list-table"
                                                        />
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6">
                                            <div
                                                class="user-list-files d-flex float-right"
                                            ></div>
                                        </div>
                                    </div>
                                    <table
                                        id="user-list-table"
                                        class="table table-striped table-bordered mt-4"
                                        role="grid"
                                        aria-describedby="user-list-page-info"
                                    >
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Level</th>
                                                <th>Join Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr
                                                v-for="(item, index) in v_subs"
                                                :key="index"
                                            >
                                                <td>
                                                    {{
                                                        item.first_name +
                                                        " " +
                                                        item.last_name
                                                    }}
                                                </td>
                                                <td>{{ item.level_id }}</td>

                                                <td>
                                                    {{
                                                        formatDate(
                                                            item.created_at
                                                        )
                                                    }}
                                                </td>
                                                <td>
                                                    <div
                                                        class="flex align-items-center list-user-action"
                                                    >
                                                        <button
                                                            class="btn iq-bg-primary"
                                                            data-toggle="tooltip"
                                                            data-placement="top"
                                                            title=""
                                                            data-original-title="Add"
                                                            @click="
                                                                aproveSeller(
                                                                    item.sub_id
                                                                )
                                                            "
                                                        >
                                                            <i
                                                                class="ri-user-add-line"
                                                            ></i>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row justify-content-between mt-3">
                                    <div
                                        id="user-list-page-info"
                                        class="col-md-6"
                                    >
                                        <span>Showing 1 to 5 of 5 entries</span>
                                    </div>
                                    <div class="col-md-6">
                                        <nav
                                            aria-label="Page navigation example"
                                        >
                                            <ul
                                                class="pagination justify-content-end mb-0"
                                            >
                                                <li class="page-item disabled">
                                                    <a
                                                        class="page-link"
                                                        href="#"
                                                        tabindex="-1"
                                                        aria-disabled="true"
                                                        >Previous</a
                                                    >
                                                </li>
                                                <li class="page-item active">
                                                    <a
                                                        class="page-link"
                                                        href="#"
                                                        >1</a
                                                    >
                                                </li>
                                                <li class="page-item">
                                                    <a
                                                        class="page-link"
                                                        href="#"
                                                        >2</a
                                                    >
                                                </li>
                                                <li class="page-item">
                                                    <a
                                                        class="page-link"
                                                        href="#"
                                                        >3</a
                                                    >
                                                </li>
                                                <li class="page-item">
                                                    <a
                                                        class="page-link"
                                                        href="#"
                                                        >Next</a
                                                    >
                                                </li>
                                            </ul>
                                        </nav>
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
import { Link } from "@inertiajs/vue3";
import moment from "moment";
import Swal from "sweetalert2";

export default {
    components: {
        AppLayout,
        Link,
        moment,
    },

    props: {
        subs: Object,
    },
    data() {
        return {
            errors: [],
            v_subs: this.subs,
        };
    },
    methods: {
        formatDate(date) {
            return moment(date).format("YYYY/MM/DD");
        },
        aproveSeller(subscription_id) {
            this.showConfirmAlert(subscription_id);
        },
        async approve(subscription_id) {
            this.button_status = false; // setting button disable while submitting
            try {
                const response = await axios.post(
                    route("admin.subscription.approve"),
                    {
                        subscription_id: subscription_id,
                    }
                );
                if (response.data.success) {
                    this.showAlert("Approved");
                    this.v_subs = response.data.data;
                    this.errors = [];
                }
            } catch (error) {
                if (error.response.status === 422) {
                    // Validation error occurred
                    this.errors = error.response.data.errors;
                    this.showAlert(this.errors.seller_id, 2500, "error");
                    this.button_status;
                } else {
                    // Handle other types of errors
                    console.error(error);
                    this.button_status;
                }
            }
        },
        showAlert(type, time = 1500, icon = "success") {
            Swal.fire({
                position: "top-end",
                icon: icon,
                title: type,
                showConfirmButton: false,
                timer: time,
            });
        },
        showConfirmAlert(subscription_id) {
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, Approve !",
            }).then((result) => {
                if (result.isConfirmed) {
                    this.approve(subscription_id);
                }
            });
        },
    },
};
</script>

<style></style>
