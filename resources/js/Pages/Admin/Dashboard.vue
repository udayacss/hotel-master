<script>
import AppLayout from "../../Layouts/AppLayout.vue";
import moment from "moment";

export default {
    props: {
        allWithdrawals: Number,
        paidWithdrawals: Number,
        pendingWithdrawals: Number,
    },
    components: {
        AppLayout,
        moment,
    },
    methods: {
        formatdate(date) {
            const formattedDate = moment(date).format("YYYY/MM/DD");
            return formattedDate; //20171019
        },
    },
};
</script>

<template>
    <AppLayout>
        <!-- Page Content  -->
        <div id="content-page" class="content-page">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6 col-md-6 col-lg-3">
                        <div
                            class="iq-card iq-card-block ht"
                        >
                            <div class="iq-card-body iq-box-relative">
                                <div
                                    class="iq-box-absolute icon iq-icon-box rounded-circle iq-bg-primary"
                                >
                                    <i class="ri-focus-2-line"></i>
                                </div>
                                <p class="text-secondary">Total Withdrwals</p>
                                <div
                                    class="d-flex align-items-center justify-content-between"
                                >
                                    <h4>
                                        <b>{{ allWithdrawals }}</b>
                                    </h4>
                                    <div id="iq-chart-box1"></div>
                                    <span class="text-primary"
                                        ><b>
                                            <!-- +14% -->
                                            <i class="ri-arrow-up-fill"></i></b
                                    ></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-6 col-lg-3">
                        <div
                            class="iq-card iq-card-block iq-card-stretch iq-card-height"
                        >
                            <div class="iq-card-body iq-box-relative">
                                <div
                                    class="iq-box-absolute icon iq-icon-box rounded-circle iq-bg-success"
                                >
                                    <i class="ri-exchange-dollar-fill"></i>
                                </div>
                                <p class="text-secondary">
                                    Pending Withdrawals
                                </p>
                                <div
                                    class="d-flex align-items-center justify-content-between"
                                >
                                    <h4>
                                        <b>{{ pendingWithdrawals }}</b>
                                    </h4>
                                    <div id="iq-chart-box3"></div>
                                    <span class="text-success"
                                        ><b>
                                            <!-- +0.36% -->
                                            <i class="ri-arrow-up-fill"></i></b
                                    ></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-3">
                        <div
                            class="iq-card iq-card-block iq-card-stretch iq-card-height"
                        >
                            <div class="iq-card-body iq-box-relative">
                                <div
                                    class="iq-box-absolute icon iq-icon-box rounded-circle iq-bg-success"
                                >
                                    <i class="ri-exchange-dollar-fill"></i>
                                </div>
                                <p class="text-secondary">Paid Withdrawals</p>
                                <div
                                    class="d-flex align-items-center justify-content-between"
                                >
                                    <h4>
                                        <b>{{ paidWithdrawals }}</b>
                                    </h4>
                                    <div id="iq-chart-box3"></div>
                                    <span class="text-success"
                                        ><b>
                                            <!-- +0.36% -->
                                            <i class="ri-arrow-up-fill"></i></b
                                    ></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-8">
                        <div
                            class="iq-card iq-card-block iq-card-stretch iq-card-height"
                        >
                            <div
                                class="iq-card-header d-flex justify-content-between"
                            >
                                <div class="iq-header-title">
                                    <h4 class="card-title">Sellings</h4>
                                </div>
                                <div
                                    class="iq-card-header-toolbar d-flex align-items-center"
                                >
                                    <div class="dropdown">
                                        <span
                                            class="dropdown-toggle text-primary"
                                            id="dropdownMenuButton5"
                                            data-toggle="dropdown"
                                        >
                                            <i class="ri-more-fill"></i>
                                        </span>
                                        <div
                                            class="dropdown-menu dropdown-menu-right"
                                            aria-labelledby="dropdownMenuButton5"
                                        >
                                            <a class="dropdown-item" href="#"
                                                ><i class="ri-eye-fill mr-2"></i
                                                >View</a
                                            >
                                            <a class="dropdown-item" href="#"
                                                ><i
                                                    class="ri-delete-bin-6-fill mr-2"
                                                ></i
                                                >Delete</a
                                            >
                                            <a class="dropdown-item" href="#"
                                                ><i
                                                    class="ri-pencil-fill mr-2"
                                                ></i
                                                >Edit</a
                                            >
                                            <a class="dropdown-item" href="#"
                                                ><i
                                                    class="ri-printer-fill mr-2"
                                                ></i
                                                >Print</a
                                            >
                                            <a class="dropdown-item" href="#"
                                                ><i
                                                    class="ri-file-download-fill mr-2"
                                                ></i
                                                >Download</a
                                            >
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="iq-card-body">
                                <div class="table-responsive">
                                    <table class="table mb-0">
                                        <thead class="thead-light">
                                            <tr>
                                                <th scope="col">Customer</th>
                                                <th scope="col">Date</th>
                                                <th scope="col">Contact</th>
                                                <th scope="col">Status</th>
                                                <!-- <th scope="col">Action</th> -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- <tr
                                                v-for="(
                                                    quote, index
                                                ) in pending_quotations"
                                                :key="index"
                                            >
                                                <td>
                                                    {{
                                                        quote.customer
                                                            ?.first_name
                                                    }}
                                                </td>
                                                <td>{{ formatdate(quote.created_at) }}</td>
                                                <td>{{quote.customer.contact}}</td>
                                                <td>
                                                    <div
                                                        class="badge badge-pill badge-success"
                                                    >
                                                        Pending
                                                    </div>
                                                </td>
                                            </tr> -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div
                            class="iq-card iq-card-block iq-card-stretch iq-card-height banner-image-block-bg position-relative"
                            style="
                                background: transparent
                                    url(images/page-img/45.png) no-repeat scroll
                                    center bottom;
                                background-size: contain;
                                height: 440px;
                                box-shadow: none;
                            "
                        ></div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<style></style>
