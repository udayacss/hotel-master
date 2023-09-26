<template>
  <!-- Page Content  -->
        <div id="content-page" class="content-page">
            <div class="container-fluid">
                <div class="row">
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
                                                    Search
                                                </h4>
                                            </div>
                                        </div>
                                        <div class="iq-card-body">
                                            <form>
                                                <div
                                                    class="form-group row align-items-center"
                                                >
                                                    <div
                                                        class="col-md-12"
                                                    ></div>
                                                </div>
                                                <div
                                                    class="row align-items-center"
                                                >
                                                    <div
                                                        class="form-group col-sm-6"
                                                    >
                                                        <label for="uname"
                                                            >search here *(acc
                                                            number | nic |
                                                            member number)
                                                        </label>
                                                        <input
                                                            type="text"
                                                            class="form-control"
                                                            @input="filterUsers"
                                                            v-model="
                                                                filter_input
                                                            "
                                                        />
                                                        <div
                                                            class="panel-footer"
                                                        >
                                                            <ul
                                                                class="list-group"
                                                            >
                                                                <li
                                                                    class="list-group-item"
                                                                    v-for="(
                                                                        filter,
                                                                        index
                                                                    ) in filtered"
                                                                    :key="index"
                                                                >
                                                                    {{
                                                                        filter.name
                                                                    }}
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="iq-card">
                                        <div
                                            class="iq-card-header d-flex justify-content-between"
                                        >
                                            <div class="iq-header-title">
                                                <h4 class="card-title">
                                                    Create New Loan
                                                </h4>
                                            </div>
                                        </div>
                                        <div class="iq-card-body">
                                            <form>
                                                <div
                                                    class="form-group row align-items-center"
                                                >
                                                    <div
                                                        class="col-md-12"
                                                    ></div>
                                                </div>
                                                <div
                                                    class="row align-items-center"
                                                >
                                                    <div
                                                        class="form-group col-sm-4"
                                                    >
                                                        <label
                                                            >Branch Name:</label
                                                        >
                                                        <select
                                                            class="form-control"
                                                            id="exampleFormControlSelect1"
                                                        >
                                                            <option selected="">
                                                                Kesbewa
                                                            </option>
                                                            <option>
                                                                Branch 02
                                                            </option>
                                                            <option>
                                                                Branch 03
                                                            </option>
                                                            <option>
                                                                Branch 04
                                                            </option>
                                                            <option>
                                                                Branch 05
                                                            </option>
                                                        </select>
                                                    </div>

                                                    <div
                                                        class="form-group col-sm-4"
                                                    >
                                                        <label
                                                            >Center Name:</label
                                                        >
                                                        <select
                                                            class="form-control"
                                                            id="exampleFormControlSelect1"
                                                        >
                                                            <option selected="">
                                                                Center 01
                                                            </option>
                                                            <option>
                                                                Center 02
                                                            </option>
                                                            <option>
                                                                Center 03
                                                            </option>
                                                            <option>
                                                                Center 04
                                                            </option>
                                                            <option>
                                                                Center 05
                                                            </option>
                                                        </select>
                                                    </div>

                                                    <div
                                                        class="form-group col-sm-4"
                                                    >
                                                        <label
                                                            >Group No.:</label
                                                        >
                                                        <select
                                                            class="form-control"
                                                            id="exampleFormControlSelect2"
                                                        >
                                                            <option selected="">
                                                                Group 01
                                                            </option>
                                                            <option>
                                                                Group 02
                                                            </option>
                                                            <option>
                                                                Group 03
                                                            </option>
                                                            <option>
                                                                Group 04
                                                            </option>
                                                            <option>
                                                                Group 05
                                                            </option>
                                                        </select>
                                                    </div>

                                                    <div
                                                        class="form-group col-sm-12"
                                                    >
                                                        <label
                                                            >Borrower
                                                            No.:</label
                                                        >
                                                        <select
                                                            class="form-control"
                                                            id="exampleFormControlSelect2"
                                                        >
                                                            <option selected="">
                                                                01
                                                            </option>
                                                            <option>02</option>
                                                            <option>03</option>
                                                            <option>04</option>
                                                            <option>05</option>
                                                        </select>
                                                    </div>

                                                    <div
                                                        class="form-group col-sm-6"
                                                    >
                                                        <label for="uname"
                                                            >Loan Stage:</label
                                                        >
                                                        <input
                                                            type="text"
                                                            class="form-control"
                                                            id="loanstage"
                                                            value=""
                                                        />
                                                    </div>

                                                    <div
                                                        class="form-group col-sm-6"
                                                    >
                                                        <label for="cname"
                                                            >Loan Release
                                                            Date:</label
                                                        >
                                                        <input
                                                            type="date"
                                                            class="form-control"
                                                            id="loandate"
                                                            value=""
                                                        />
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</template>

<script>

export default {
    components: {
    },
    data() {
        return {
            users: [
                { id: 1, name: "indunil", nic: "943090149V" },
                { id: 2, name: "rrrrrrrrr", nic: "111111111V" },
                { id: 3, name: "eeeeeee", nic: "22222222V" },
            ],
            data: [
                { id: 1, name: "indunil", nic: "943090149V" },
                { id: 2, name: "rrrrrrrrr", nic: "111111111V" },
                { id: 3, name: "eeeeeee", nic: "22222222V" },
            ],
            filtered: [],
            filter_input: null,
        };
    },
    methods: {
        filterUsers() {
            if (this.filter_input.length > 0) {
                this.filtered = [
                    ...this.users.filter(
                        (item) =>
                            item.name
                                .toLowerCase()
                                .indexOf(this.filter_input.toLowerCase()) > -1
                    ),

                    ...this.users.filter(
                        (item) =>
                            item.nic
                                .toLowerCase()
                                .indexOf(this.filter_input.toLowerCase()) > -1
                    ),
                ];
            } else {
                this.filtered = [];
            }
        },
    },
};
</script>

<style scoped>
.panel-footer {
    position: absolute;
    width: calc(100% - 30px);
    z-index: 9;
}
.form-group {
    position: relative;
}
</style>