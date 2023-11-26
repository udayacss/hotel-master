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
                                                <th>SLOT 10</th>
                                                <th>SLOT 11</th>
                                                <th>SLOT 12</th>
                                                <th>SLOT 13</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr
                                                v-for="(item, index) in boards"
                                                :key="index"
                                            >
                                                <td>{{ item.name }}</td>

                                                <td>
                                                    <!-- <span
                                                        v-if="item.slot_one"
                                                        class="badge iq-bg-danger"
                                                        >FILLED</span
                                                    > -->
                                                    <span
                                                        v-if="item.slot_one"
                                                        class="badge iq-bg-primary ml-1"
                                                        >{{
                                                            item.one
                                                                .first_name +
                                                            " " +
                                                            item.one.last_name
                                                        }}</span
                                                    >
                                                    <br />
                                                    <span class="badge iq-bg-primary ml-1"
                                                        mt-0
                                                        mb-0
                                                        ml-0
                                                        v-if="item.slot_one"
                                                    >
                                                        by
                                                        {{
                                                            item.one?.referral
                                                                ?.name
                                                        }}
                                                    </span>
                                                </td>
                                                <td>
                                                    <span
                                                        v-if="item.slot_two"
                                                        class="badge iq-bg-danger"
                                                        >{{
                                                            item.two
                                                                .first_name +
                                                            " " +
                                                            item.two.last_name
                                                        }}</span
                                                    >
                                                    <br />
                                                    <span class="badge iq-bg-primary ml-1"
                                                        mt-0
                                                        mb-0
                                                        ml-0
                                                        v-if="item.slot_two"
                                                    >
                                                        by
                                                        {{
                                                            item.two?.referral
                                                                ?.name
                                                        }}
                                                    </span>
                                                </td>
                                                <td>
                                                    <span
                                                        v-if="item.slot_three"
                                                        class="badge iq-bg-danger"
                                                        >{{
                                                            item.three
                                                                .first_name +
                                                            " " +
                                                            item.three.last_name
                                                        }}</span
                                                    >
                                                    <br />
                                                    <span class="badge iq-bg-primary ml-1"
                                                        mt-0
                                                        mb-0
                                                        ml-0
                                                        v-if="item.slot_three"
                                                    >
                                                        by
                                                        {{
                                                            item.three?.referral
                                                                ?.name
                                                        }}
                                                    </span>
                                                </td>
                                                <td>
                                                    <span
                                                        v-if="item.slot_four"
                                                        class="badge iq-bg-danger"
                                                        >{{
                                                            item.four
                                                                .first_name +
                                                            " " +
                                                            item.four
                                                                .last_name
                                                        }}</span
                                                    >
                                                    <br />
                                                    <span class="badge iq-bg-primary ml-1"
                                                        mt-0
                                                        mb-0
                                                        ml-0
                                                        v-if="item.slot_four"
                                                    >
                                                        by
                                                        {{
                                                            item.four?.referral
                                                                ?.name
                                                        }}
                                                    </span>
                                                </td>
                                                <td>
                                                    <span
                                                        v-if="item.slot_five"
                                                        class="badge iq-bg-danger"
                                                        >{{
                                                            item.five
                                                                .first_name +
                                                            " " +
                                                            item.five.last_name
                                                        }}</span
                                                    >
                                                    <br />
                                                    <span class="badge iq-bg-primary ml-1"
                                                        mt-0
                                                        mb-0
                                                        ml-0
                                                        v-if="item.slot_five"
                                                    >
                                                        by
                                                        {{
                                                            item.five?.referral
                                                                ?.name
                                                        }}
                                                    </span>
                                                </td>
                                                <td>
                                                    <span
                                                        v-if="item.slot_six"
                                                        class="badge iq-bg-danger"
                                                        >{{
                                                            item.six
                                                                .first_name +
                                                            " " +
                                                            item.six.last_name
                                                        }}</span
                                                    >
                                                    <br />
                                                    <span class="badge iq-bg-primary ml-1"
                                                        mt-0
                                                        mb-0
                                                        ml-0
                                                        v-if="item.slot_six"
                                                    >
                                                        by
                                                        {{
                                                            item.six?.referral
                                                                ?.name
                                                        }}
                                                    </span>
                                                </td>
                                                <td>
                                                    <span
                                                        v-if="item.slot_seven"
                                                        class="badge iq-bg-danger"
                                                        >{{
                                                            item.seven
                                                                .first_name +
                                                            " " +
                                                            item.seven.last_name
                                                        }}</span
                                                    >
                                                    <br />
                                                    <span class="badge iq-bg-primary ml-1"
                                                        mt-0
                                                        mb-0
                                                        ml-0
                                                        v-if="item.slot_seven"
                                                    >
                                                        by
                                                        {{
                                                            item.seven?.referral
                                                                ?.name
                                                        }}
                                                    </span>
                                                </td>
                                                <td>
                                                    <span
                                                        v-if="item.slot_eight"
                                                        class="badge iq-bg-danger"
                                                        >{{
                                                            item.eight
                                                                .first_name +
                                                            " " +
                                                            item.eight.last_name
                                                        }}</span
                                                    >
                                                    <br />
                                                    <span class="badge iq-bg-primary ml-1"
                                                        mt-0
                                                        mb-0
                                                        ml-0
                                                        v-if="item.slot_eight"
                                                    >
                                                        by
                                                        {{
                                                            item.eight?.referral
                                                                ?.name
                                                        }}
                                                    </span>
                                                </td>
                                                <td>
                                                    <span
                                                        v-if="item.slot_nine"
                                                        class="badge iq-bg-danger"
                                                        >{{
                                                            item.nine
                                                                .first_name +
                                                            " " +
                                                            item.nine.last_name
                                                        }}</span
                                                    >
                                                    <br />
                                                    <span class="badge iq-bg-primary ml-1"
                                                        mt-0
                                                        mb-0
                                                        ml-0
                                                        v-if="item.slot_nine"
                                                    >
                                                        by
                                                        {{
                                                            item.nine?.referral
                                                                ?.name
                                                        }}
                                                    </span>
                                                </td>
                                                <td>
                                                    <span
                                                        v-if="item.slot_ten"
                                                        class="badge iq-bg-danger"
                                                        >{{
                                                            item.ten
                                                                .first_name +
                                                            " " +
                                                            item.ten.last_name
                                                        }}</span
                                                    >
                                                    <br />
                                                    <span class="badge iq-bg-primary ml-1"
                                                        mt-0
                                                        mb-0
                                                        ml-0
                                                        v-if="item.slot_ten"
                                                    >
                                                        by
                                                        {{
                                                            item.ten?.referral
                                                                ?.name
                                                        }}
                                                    </span>
                                                </td>
                                                <td>
                                                    <span
                                                        v-if="item.slot_eleven"
                                                        class="badge iq-bg-danger"
                                                        >{{
                                                            item.eleven
                                                                .first_name +
                                                            " " +
                                                            item.eleven
                                                                .last_name
                                                        }}</span
                                                    >
                                                    <br />
                                                    <span class="badge iq-bg-primary ml-1"
                                                        mt-0
                                                        mb-0
                                                        ml-0
                                                        v-if="item.slot_eleven"
                                                    >
                                                        by
                                                        {{
                                                            item.eleven
                                                                ?.referral?.name
                                                        }}
                                                    </span>
                                                </td>
                                                <td>
                                                    <span
                                                        v-if="item.slot_twelve"
                                                        class="badge iq-bg-danger"
                                                        >{{
                                                            item.twelve
                                                                .first_name +
                                                            " " +
                                                            item.twelve
                                                                .last_name
                                                        }}</span
                                                    >
                                                    <br />
                                                    <span class="badge iq-bg-primary ml-1"
                                                        mt-0
                                                        mb-0
                                                        ml-0
                                                        v-if="item.slot_twelve"
                                                    >
                                                        by
                                                        {{
                                                            item.twelve
                                                                ?.referral?.name
                                                        }}
                                                    </span>
                                                </td>
                                                <td>
                                                    <span
                                                        v-if="
                                                            item.slot_thirteen
                                                        "
                                                        class="badge iq-bg-danger"
                                                        >{{
                                                            item.thirteen
                                                                .first_name +
                                                            " " +
                                                            item.thirteen
                                                                .last_name
                                                        }}
                                                    </span>
                                                    <br />
                                                    <span class="badge iq-bg-primary ml-1"
                                                        mt-0
                                                        mb-0
                                                        ml-0
                                                        v-if="
                                                            item.slot_thirteen
                                                        "
                                                    >
                                                        by
                                                        {{
                                                            item.thirteen
                                                                ?.referral?.name
                                                        }}
                                                    </span>
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
    mounted() {
    },
};
</script>

<style></style>
