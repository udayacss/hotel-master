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
                                    <h4 class="card-title">Gem Categoris</h4>
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
                                                <!-- <th>Profile</th> -->
                                                <th>No</th>
                                                <th>id</th>
                                                <th>Name</th>
                                                <th>Image</th>
                                                <th>Icon</th>
                                                <th>Status</th>

                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr
                                                v-for="(
                                                    cat, index
                                                ) in v_categories"
                                                :key="index"
                                            >
                                                <td>{{ index + 1 }}</td>
                                                <td>{{ cat.id }}</td>
                                                <td>{{ cat.name }}</td>
                                                <td>
                                                    <img :src="cat.image" />
                                                </td>
                                                <th><img :src="cat.icon" /></th>
                                                <td>{{ cat.status }}</td>

                                                <td>
                                                    <div
                                                        class="flex align-items-center list-user-action"
                                                    >
                                                        <!-- <a
                              class="iq-bg-primary"
                              data-toggle="tooltip"
                              data-placement="top"
                              title=""
                              data-original-title="Add"
                              href="#"
                              ><i class="ri-user-add-line"></i
                            ></a> -->
                                                        <Link
                                                            class="iq-bg-primary"
                                                            data-toggle="tooltip"
                                                            data-placement="top"
                                                            title=""
                                                            :href="
                                                                route(
                                                                    'admin.gem_cat.edit',
                                                                    cat.id
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
                                                                    cat.id
                                                                )
                                                            "
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

export default {
    props: {
        categories: Object,
    },
    components: {
        AppLayout,
        Link,
    },
    data() {
        return {
            v_categories: this.categories.data,
            v_data: this.categories,
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
    },
};
</script>

<style></style>
