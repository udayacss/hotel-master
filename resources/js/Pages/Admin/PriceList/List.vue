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
                                    <h4 class="card-title">Quotations</h4>
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
                                            >
                                                <button
                                                    class="btn iq-bg-primary"
                                                    @click="printTable"
                                                >
                                                    Print
                                                </button>
                                                <a
                                                    class="iq-bg-primary"
                                                    :href="
                                                        route(
                                                            'admin.export.exportCustomerAsCsv'
                                                        )
                                                    "
                                                >
                                                    Excel
                                                </a>
                                                <!-- <a
                                                    class="iq-bg-primary"
                                                    href="javascript:void();"
                                                >
                                                    Pdf
                                                </a> -->
                                            </div>
                                        </div>
                                    </div>
                                    <table
                                        id="quote-list-table"
                                        class="table table-striped table-bordered mt-4"
                                        role="grid"
                                        aria-describedby="user-list-page-info"
                                    >
                                        <thead>
                                            <tr>
                                                <!-- <th>Profile</th> -->
                                                <th>No</th>
                                                <th>Date</th>
                                                <th>Name</th>
                                                <th>Address</th>
                                                <th>Contact</th>
                                                <th>Units</th>
                                                <th>Project</th>

                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr
                                                v-for="(
                                                    quote, index
                                                ) in v_quotations"
                                                :key="index"
                                            >
                                                <td>{{ index + 1 }}</td>
                                                <td>
                                                    {{
                                                        formatdate(
                                                            quote.created_at
                                                        )
                                                    }}
                                                </td>

                                                <td>
                                                    {{
                                                        quote.customer
                                                            .first_name +
                                                        " " +
                                                        quote.customer.last_name
                                                    }}
                                                </td>
                                                <td>
                                                    {{ quote.customer.address }}
                                                </td>
                                                <td>
                                                    {{ quote.customer.contact }}
                                                </td>

                                                <td>{{ quote.units }}</td>
                                                <td>
                                                    {{ quote.project.type }}
                                                </td>

                                                <td>
                                                    <div
                                                        class="flex align-items-center list-user-action"
                                                    >
                                                        <a
                                                            class="iq-bg-primary"
                                                            data-toggle="tooltip"
                                                            data-placement="top"
                                                            title=""
                                                            v-if="
                                                                quote.quotation_path
                                                            "
                                                            data-original-title="Add"
                                                            :href="route('admin.pdf.export')"
                                                            ><i
                                                                class="ri-share-line"
                                                            ></i
                                                        ></a>
                                                        <a
                                                            class="iq-bg-primary"
                                                            data-toggle="tooltip"
                                                            data-placement="top"
                                                            title=""
                                                            v-if="
                                                                !quote.quotation_path
                                                            "
                                                            data-original-title="Add"
                                                            target="_blank"
                                                           :href="route('admin.pdf.export',quote.id)"
                                                            ><i
                                                                class="ri-funds-fill"
                                                            ></i
                                                        ></a>
                                                        <!-- <Link
                                                            class="iq-bg-primary"
                                                            data-toggle="tooltip"
                                                            data-placement="top"
                                                            title=""
                                                            :href="
                                                                route(
                                                                    'admin.gem_cat.edit',
                                                                    quote.id
                                                                )
                                                            "
                                                            data-original-title="Edit"
                                                            ><i
                                                                class="ri-pencil-line"
                                                            ></i
                                                        ></Link>
                                                        <a
                                                            class="iq-bg-primary"
                                                            data-toggle="tooltip"
                                                            data-placement="top"
                                                            title=""
                                                            data-original-title="Delete"
                                                            @click="
                                                                deleteData(
                                                                    quote.id
                                                                )
                                                            "
                                                            ><i
                                                                class="ri-delete-bin-line"
                                                            ></i
                                                        ></a> -->
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
                                        <span
                                            >Showing
                                            {{
                                                v_data.current_page *
                                                v_data.per_page
                                            }}
                                            to
                                            {{
                                                v_data.last_page *
                                                v_data.per_page
                                            }}
                                            of
                                            {{
                                                v_data.last_page *
                                                v_data.per_page
                                            }}
                                            entries</span
                                        >
                                    </div>
                                    <div class="col-md-6">
                                        <nav
                                            aria-label="Page navigation example"
                                        >
                                            <ul
                                                class="pagination justify-content-end mb-0"
                                            >
                                                <div
                                                    v-for="(
                                                        link, index
                                                    ) in v_data.links"
                                                    :key="index"
                                                >
                                                    <Link
                                                        method="get"
                                                        as="button"
                                                        class="page-item btn"
                                                        :class="{
                                                            active: link.active,
                                                        }"
                                                        :href="link.url"
                                                        v-if="
                                                            Number(link.label)
                                                        "
                                                    >
                                                        <a class="page-link">{{
                                                            link.label
                                                        }}</a>
                                                    </Link>
                                                </div>
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
import Swal from "sweetalert2";
import { Link } from "@inertiajs/vue3";
import moment from "moment";

export default {
    props: {
        quotations: Object,
    },
    components: {
        AppLayout,
        Link,
        moment,
    },
    data() {
        return {
            v_quotations: this.quotations.data,
            v_data: this.quotations,
        };
    },
    methods: {
        deleteData(id) {
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!",
            }).then((result) => {
                if (result.isConfirmed) {
                    axios
                        .delete(route("admin.gem_cat.delete", id))
                        .then((res) => {
                            this.v_categories = res.data.data.data;
                            this.v_data = res.data.data;
                        });
                    Swal.fire(
                        "Deleted!",
                        "Your file has been deleted.",
                        "success"
                    );
                }
            });
        },
        pintQuotation(id) {
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, Print it!",
            }).then((result) => {
                if (result.isConfirmed) {
                    axios
                        .get(route("admin.pdf.export"))
                        // .get(route("admin.pdf.export", id))
                        .then((res) => {
                            this.v_categories = res.data.data.data;
                            this.v_data = res.data.data;
                        });
                    Swal.fire(
                        "Deleted!",
                        "Your file has been deleted.",
                        "success"
                    );
                }
            });
        },
        formatdate(date) {
            const formattedDate = moment(date).format("YYYY/MM/DD");
            return formattedDate; //20171019
        },
        printTable() {
            window.print();
        },
    },
};
</script>

<style></style>
