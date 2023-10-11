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
                                    <h4 class="card-title">Board List</h4>
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
                                                <Link
                                                    as="button"
                                                    method="get"
                                                    class="iq-bg-danger btn"
                                                    :href="
                                                        route(
                                                            'admin.board.create'
                                                        )
                                                    "
                                                >
                                                    ADD NEW
                                                </Link>
                                             
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
                                                <th>BOARD</th>
                                                <th>SLOT 1</th>
                                                <th>SLOT 2</th>
                                                <th>SLOT 3</th>
                                                <th>SLOT 4</th>
                                                <th>SLOT 5</th>
                                                <th>SLOT 6</th>
                                                <th>SLOT 7</th>
                                                <th>SLOT 8</th>
                                                <th>SLOT 9</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr
                                                v-for="(item, index) in boards"
                                                :key="index"
                                            >
                                                <td>{{ item.name }}</td>

                                                <td>
                                                    <span v-if="item.slot_one"
                                                        class="badge iq-bg-danger"
                                                        >FILLED</span
                                                    >
                                                </td>
                                                <td>
                                                    <span v-if="item.slot_two"
                                                        class="badge iq-bg-danger"
                                                        >FILLED</span
                                                    >
                                                </td>
                                                <td>
                                                    <span v-if="item.slot_three"
                                                        class="badge iq-bg-danger"
                                                        >FILLED</span
                                                    >
                                                </td>
                                                <td>
                                                    <span v-if="item.slot_four"
                                                        class="badge iq-bg-danger"
                                                        >FILLED</span
                                                    >
                                                </td>
                                                <td>
                                                    <span v-if="item.slot_five"
                                                        class="badge iq-bg-danger"
                                                        >FILLED</span
                                                    >
                                                </td>
                                                <td>
                                                    <span v-if="item.slot_six"
                                                        class="badge iq-bg-danger"
                                                        >FILLED</span
                                                    >
                                                </td>
                                                <td>
                                                    <span v-if="item.slot_seven"
                                                        class="badge iq-bg-danger"
                                                        >FILLED</span
                                                    >
                                                </td>
                                                <td>
                                                    <span v-if="item.slot_eight"
                                                        class="badge iq-bg-danger"
                                                        >FILLED</span
                                                    >
                                                </td>
                                                <td>
                                                    <span v-if="item.slot_nine"
                                                        class="badge iq-bg-danger"
                                                        >FILLED</span
                                                    >
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

export default {
    components: {
        AppLayout,
        Link,
    },

    props: {
        boards: Object,
    },
};
</script>

<style></style>
