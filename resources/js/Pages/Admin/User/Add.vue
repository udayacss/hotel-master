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

                                        <li class="col-md-3 p-0">
                                            <a
                                                class="nav-link"
                                                data-toggle="pill"
                                                href="#emailandsms"
                                            >
                                                Roles
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
                                                            >First Name:</label
                                                        >
                                                        <input
                                                            type="text"
                                                            class="form-control"
                                                            id="fname"
                                                            value="Barry"
                                                        />
                                                    </div>

                                                    <div
                                                        class="form-group col-sm-6"
                                                    >
                                                        <label>Age:</label>
                                                        <select
                                                            class="form-control"
                                                            id="exampleFormControlSelect2"
                                                        >
                                                            <option>
                                                                12-18
                                                            </option>
                                                            <option>
                                                                19-32
                                                            </option>
                                                            <option selected="">
                                                                33-45
                                                            </option>
                                                            <option>
                                                                46-62
                                                            </option>
                                                            <option>
                                                                63 >
                                                            </option>
                                                        </select>
                                                    </div>
                                                    <div
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
                                                    </div>
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

                                <div
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
                                            <form>
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
                                                            id="fname"
                                                            value="Barry"
                                                        />
                                                    </div>
                                                </div>

                                                <div
                                                    class="form-group row align-items-center"
                                                >
                                                    <label
                                                        class="col-md-3"
                                                        for="npass"
                                                        >When To Email</label
                                                    >
                                                    <div class="col-md-9">
                                                        <div
                                                            class="custom-control custom-checkbox"
                                                        >
                                                            <input
                                                                type="checkbox"
                                                                class="custom-control-input"
                                                                id="email01"
                                                            />
                                                            <label
                                                                class="custom-control-label"
                                                                for="email01"
                                                                >You have new
                                                                notifications.</label
                                                            >
                                                        </div>
                                                        <div
                                                            class="custom-control custom-checkbox"
                                                        >
                                                            <input
                                                                type="checkbox"
                                                                class="custom-control-input"
                                                                id="email01"
                                                            />
                                                            <label
                                                                class="custom-control-label"
                                                                for="email01"
                                                                >You have new
                                                                notifications.</label
                                                            >
                                                        </div>
                                                        <div
                                                            class="custom-control custom-checkbox"
                                                        >
                                                            <input
                                                                type="checkbox"
                                                                class="custom-control-input"
                                                                id="email02"
                                                            />
                                                            <label
                                                                class="custom-control-label"
                                                                for="email02"
                                                                >You're sent a
                                                                direct
                                                                message</label
                                                            >
                                                        </div>
                                                        <div
                                                            class="custom-control custom-checkbox"
                                                        >
                                                            <input
                                                                type="checkbox"
                                                                class="custom-control-input"
                                                                id="email03"
                                                                checked=""
                                                            />
                                                            <label
                                                                class="custom-control-label"
                                                                for="email03"
                                                                >Someone adds
                                                                you as a
                                                                connection</label
                                                            >
                                                        </div>
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
    </AppLayout>
</template>

<script>
import AppLayout from "../../../Layouts/AppLayout.vue";


export default {
    components: {
        AppLayout,
    },
};
</script>

<style></style>
