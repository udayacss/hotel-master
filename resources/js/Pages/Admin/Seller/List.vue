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
                                    <h4 class="card-title">Seller List</h4>
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
                                                            @input="
                                                                searchData()
                                                            "
                                                            type="search"
                                                            v-model="v_keyword"
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
                                            >
                                                <Link
                                                    as="button"
                                                    method="get"
                                                    class="iq-bg-danger btn"
                                                    :href="
                                                        route(
                                                            'admin.seller.create'
                                                        )
                                                    "
                                                >
                                                    ADD NEW
                                                </Link>
                                                <a
                                                    class="iq-bg-primary"
                                                    href="javascript:void();"
                                                >
                                                    Print
                                                </a>
                                                <a
                                                    class="iq-bg-primary"
                                                    href="javascript:void();"
                                                >
                                                    Excel
                                                </a>
                                                <a
                                                    class="iq-bg-primary"
                                                    href="javascript:void();"
                                                >
                                                    Pdf
                                                </a>
                                            </div>
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
                                                <th>Contact</th>
                                                <th>Referral</th>
                                                <th>Earnings</th>
                                                <th>Email</th>
                                                <th>Status</th>
                                                <th>Join Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr
                                                v-for="(
                                                    user, index
                                                ) in v_sellers.data"
                                                :key="index"
                                            >
                                                <td>
                                                    {{
                                                        user.first_name +
                                                        " " +
                                                        user.last_name
                                                    }}
                                                </td>
                                                <td>{{ user.mobile_no }}</td>
                                                <td>
                                                    {{ user.ref_no.ref_no }}
                                                </td>
                                                <td>
                                                    <span
                                                        @click="
                                                            withdraw(user.id)
                                                        "
                                                        class="badge iq-bg-primary btn"
                                                        >{{
                                                            user.earnings_balance_sum_points
                                                        }}</span
                                                    >
                                                </td>
                                                <td>{{ user.user.email }}</td>
                                                <td>
                                                    <span
                                                        class="badge iq-bg-primary"
                                                        >Active</span
                                                    >
                                                </td>

                                                <td>
                                                    {{
                                                        formatDate(
                                                            user.created_at
                                                        )
                                                    }}
                                                </td>
                                                <td>
                                                    <div
                                                        class="flex align-items-center list-user-action"
                                                    >
                                                        <!-- <button
                                                            class="btn iq-bg-primary"
                                                            data-toggle="tooltip"
                                                            data-placement="top"
                                                            title=""
                                                            data-original-title="Add"
                                                            @click="
                                                                aproveSeller(
                                                                    user.id
                                                                )
                                                            "
                                                        >
                                                            <i
                                                                class="ri-user-add-line"
                                                            ></i>
                                                        </button> -->
                                                        <a
                                                            class="iq-bg-primary"
                                                            data-toggle="tooltip"
                                                            data-placement="top"
                                                            title=""
                                                            data-original-title="Edit"
                                                            href="#"
                                                            ><i
                                                                class="ri-pencil-line"
                                                            ></i
                                                        ></a>
                                                        <a
                                                            class="iq-bg-primary"
                                                            data-toggle="tooltip"
                                                            data-placement="top"
                                                            title=""
                                                            data-original-title="Delete"
                                                            href="#"
                                                            ><i
                                                                class="ri-delete-bin-line"
                                                            ></i
                                                        ></a>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <paginations :data="v_sellers" />
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
import Paginations from "../Components/Paginations.vue";

export default {
    components: {
        AppLayout,
        Link,
        moment,
        Paginations,
    },

    props: {
        sellers: Object,
    },
    data() {
        return {
            errors: [],
            v_keyword: "",
            v_sellers: this.sellers,
        };
    },
    methods: {
        formatDate(date) {
            return moment(date).format("YYYY/MM/DD");
        },
        aproveSeller(seller_id) {
            this.showConfirmAlert(seller_id);
        },
        async approve(seller_id) {
            this.button_status = false; // setting button disable while submitting
            try {
                const response = await axios.post(
                    route("admin.seller.approve"),
                    {
                        seller_id: seller_id,
                    }
                );
                if (response.data.success) {
                    this.showAlert("Approved");
                    this.errors = [];
                    if (!this.role) {
                        this.form.reset();
                    }
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
        async searchData() {
            // if (this.v_keyword.length > 3) {
            var res = await axios.get(route("api.searchSeller"), {
                params: { keyword: this.v_keyword },
            });

            this.v_sellers = res?.data?.data;
            // }
        },
        withdraw(sellerId) {
            Swal.fire({
                title: "Withdrwal Amount",
                input: "text",
                inputAttributes: {
                    autocapitalize: "off",
                },
                showCancelButton: true,
                confirmButtonText: "Confirm",
                showLoaderOnConfirm: true,
                preConfirm: async (amount) => {
                    try {
                        if (amount.length > 0) {
                            const response = await this.handleWithdraw(
                                sellerId,
                                amount
                            );
                            if (response) {
                                Swal.fire({
                                    title:
                                        `Withdrawal Done to Seller : ` +
                                        sellerId,
                                });

                                return this.searchData();
                            } else {
                                Swal.showValidationMessage(`Request failed`);
                            }
                        } else {
                            Swal.showValidationMessage(`Invalid Amount`);
                        }
                    } catch (error) {
                        Swal.showValidationMessage(`Request failed: ${error}`);
                    }
                },
                allowOutsideClick: () => !Swal.isLoading(),
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: `Withdrawal Done to Seller : ` + sellerId,
                        imageUrl: result.value.avatar_url,
                    });
                }
            });
        },
        async handleWithdraw(sellerId, amount) {
            var res = await axios.get(route("api.withdraw"), {
                params: { amount: amount, sellerId: sellerId },
            });

            if (res.data.success) {
                return true;
            }

            return false;
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
        showConfirmAlert(seller_id) {
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
                    this.approve(seller_id);
                }
            });
        },
    },
};
</script>

<style></style>
