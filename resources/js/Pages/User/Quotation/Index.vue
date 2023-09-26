<template>
    <!-- <AppLayout > -->
    <!-- <AppLayout
        :side_menu_enabled="false"
        :top_nav_enabled="false"
        :footer_enabled="false"
    > -->
    <!-- Page Content  -->
    <div>
        <!-- <div id="content-page" class="content-page"> -->
        <div class="container-fluid mt-5">
            <div class="row">
                <div class="col-sm-12 col-lg-12">
                    <div class="iq-card">
                        <div
                            class="iq-card-header d-flex justify-content-between"
                        >
                            <div class="iq-header-title">
                                <h4 class="card-title">Get Quotation</h4>
                            </div>
                        </div>
                        <div class="iq-card-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <ul id="top-tabbar-vertical" class="p-0">
                                        <li
                                            :class="{
                                                active: pages.page_one,
                                            }"
                                            id="personal"
                                        >
                                            <a href="javascript:void();">
                                                <i
                                                    class="ri-lock-unlock-line text-primary"
                                                ></i
                                                ><span>Personal</span>
                                            </a>
                                        </li>
                                        <li
                                            id="contact"
                                            :class="{
                                                active: pages.page_two,
                                            }"
                                        >
                                            <a href="javascript:void();">
                                                <i
                                                    class="ri-user-fill text-danger"
                                                ></i
                                                ><span
                                                    >Solar Panel Details</span
                                                >
                                            </a>
                                        </li>
                                        <!-- <li id="official">
                                                <a href="javascript:void();">
                                                    <i
                                                        class="ri-camera-fill text-success"
                                                    ></i
                                                    ><span>Official</span>
                                                </a>
                                            </li>
                                            <li id="payment">
                                                <a href="javascript:void();">
                                                    <i
                                                        class="ri-check-fill text-warning"
                                                    ></i
                                                    ><span>Payment</span>
                                                </a>
                                            </li> -->
                                    </ul>
                                </div>
                                <div class="col-md-6">
                                    <form id="form-wizard3" class="text-center">
                                        <!-- fieldsets -->
                                        <fieldset v-if="pages.page_one">
                                            <div class="form-card text-left">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <h3 class="mb-4">
                                                            Customer Details
                                                        </h3>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="fname"
                                                                >First Name:
                                                                *</label
                                                            >
                                                            <input
                                                                type="text"
                                                                class="form-control"
                                                                id="fname"
                                                                name="fname"
                                                                placeholder="First Name"
                                                                required="required"
                                                            />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="lname"
                                                                >Last Name:
                                                                *</label
                                                            >
                                                            <input
                                                                type="text"
                                                                class="form-control"
                                                                id="lname"
                                                                name="lname"
                                                                placeholder="Last Name"
                                                            />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label
                                                                >E- Mail
                                                                Address:
                                                            </label>
                                                            <input
                                                                type="text"
                                                                class="form-control"
                                                                id="lname"
                                                                name="lname"
                                                                placeholder="E- Mail"
                                                            />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="dob"
                                                                >Address :
                                                                *</label
                                                            >
                                                            <input
                                                                type="text"
                                                                class="form-control"
                                                                id="dob"
                                                                name="dob"
                                                                placeholder="Address"
                                                            />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <button
                                                type="button"
                                                class="btn btn-primary next action-button float-right"
                                                @click="nextPage(2)"
                                            >
                                                Next
                                            </button>
                                        </fieldset>
                                        <fieldset v-if="pages.page_two">
                                            <div class="form-card text-left">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <h3 class="mb-4">
                                                            Solar Panel Details:
                                                        </h3>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label
                                                                for="exampleFormControlSelect1"
                                                                >Select Project
                                                                Type</label
                                                            >
                                                            <select
                                                                class="form-control"
                                                                id="exampleFormControlSelect1"
                                                            >
                                                                <option
                                                                    selected=""
                                                                    disabled=""
                                                                >
                                                                    Select
                                                                </option>
                                                                <option>
                                                                    Domestic
                                                                </option>
                                                                <option>
                                                                    Commercial
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="city"
                                                                >Units: *</label
                                                            >
                                                            <input
                                                                type="text"
                                                                class="form-control"
                                                                id="city"
                                                                name="city"
                                                                placeholder="City."
                                                            />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label
                                                                for="exampleFormControlSelect1"
                                                                >Select Phase
                                                                Type</label
                                                            >
                                                            <select
                                                                class="form-control"
                                                                id="exampleFormControlSelect1"
                                                            >
                                                                <option
                                                                    selected=""
                                                                    disabled=""
                                                                >
                                                                    Select
                                                                </option>
                                                                <option>
                                                                    Single-phase
                                                                </option>
                                                                <option>
                                                                    Three-phase
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label
                                                                for="exampleFormControlSelect1"
                                                                >Select Type of
                                                                Solar Power
                                                                System</label
                                                            >
                                                            <select
                                                                class="form-control"
                                                                id="exampleFormControlSelect1"
                                                            >
                                                                <option
                                                                    selected=""
                                                                    disabled=""
                                                                >
                                                                    Select
                                                                </option>
                                                                <option>
                                                                    On-grid
                                                                </option>
                                                                <option>
                                                                    Off-grid
                                                                </option>
                                                                <option>
                                                                    Hybrid
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label
                                                                for="exampleFormControlSelect1"
                                                                >Select
                                                                Panel</label
                                                            >
                                                            <select
                                                                class="form-control"
                                                                id="exampleFormControlSelect1"
                                                            >
                                                                <option
                                                                    selected=""
                                                                    disabled=""
                                                                >
                                                                    Select
                                                                </option>
                                                                <option>
                                                                    German
                                                                </option>
                                                                <option>
                                                                    China
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label
                                                                for="exampleFormControlSelect1"
                                                                >Select Inverter
                                                                Type</label
                                                            >
                                                            <select
                                                                class="form-control"
                                                                id="exampleFormControlSelect1"
                                                            >
                                                                <option
                                                                    selected=""
                                                                    disabled=""
                                                                >
                                                                    Select
                                                                </option>
                                                                <option>
                                                                    Growatt
                                                                </option>
                                                                <option>
                                                                    SMA
                                                                </option>
                                                                <option>
                                                                    Solax
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label
                                                                for="exampleFormControlSelect1"
                                                                >Select Battery
                                                                Type</label
                                                            >
                                                            <select
                                                                class="form-control"
                                                                id="exampleFormControlSelect1"
                                                            >
                                                                <option
                                                                    selected=""
                                                                    disabled=""
                                                                >
                                                                    Select
                                                                </option>
                                                                <option>
                                                                    sample 1
                                                                </option>
                                                                <option>
                                                                    sample 2
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <button
                                                type="button"
                                                name="next"
                                                class="btn btn-primary next action-button float-right"
                                                @click="submit"
                                            >
                                                Submit
                                            </button>
                                            <button
                                                type="button"
                                                class="btn btn-dark previous action-button-previous float-right mr-3"
                                                @click="nextPage(1)"
                                            >
                                                Previous
                                            </button>
                                        </fieldset>
                                        <!-- <fieldset>
                                                <div
                                                    class="form-card text-left"
                                                >
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <h3 class="mb-4">
                                                                Official
                                                                Information:
                                                            </h3>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div
                                                                class="form-group"
                                                            >
                                                                <label
                                                                    for="empid"
                                                                    >Employee
                                                                    Id: *</label
                                                                >
                                                                <input
                                                                    type="email"
                                                                    class="form-control"
                                                                    id="empid"
                                                                    name="empid"
                                                                    placeholder="Employee Id."
                                                                />
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div
                                                                class="form-group"
                                                            >
                                                                <label
                                                                    for="desg"
                                                                    >Designation:
                                                                    *</label
                                                                >
                                                                <input
                                                                    type="text"
                                                                    class="form-control"
                                                                    id="desg"
                                                                    name="desg"
                                                                    placeholder="Designation."
                                                                />
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div
                                                                class="form-group"
                                                            >
                                                                <label
                                                                    for="accname"
                                                                    >Departmrnt
                                                                    Name:
                                                                    *</label
                                                                >
                                                                <input
                                                                    type="text"
                                                                    class="form-control"
                                                                    id="accname"
                                                                    name="accname"
                                                                    placeholder="Departmrnt Name."
                                                                />
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div
                                                                class="form-group"
                                                            >
                                                                <label
                                                                    for="workhour"
                                                                    >Working
                                                                    Hour:
                                                                    *</label
                                                                >
                                                                <input
                                                                    type="text"
                                                                    class="form-control"
                                                                    id="workhour"
                                                                    name="workhour"
                                                                    placeholder="Working Hour."
                                                                />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button
                                                    type="button"
                                                    name="next"
                                                    class="btn btn-primary next action-button float-right"
                                                    value="Submit"
                                                >
                                                    Submit
                                                </button>
                                                <button
                                                    type="button"
                                                    name="previous"
                                                    class="btn btn-dark previous action-button-previous float-right mr-3"
                                                    value="Previous"
                                                >
                                                    Previous
                                                </button>
                                            </fieldset>
                                            <fieldset>
                                                <div
                                                    class="form-card text-left"
                                                >
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <h3
                                                                class="mb-4 text-left"
                                                            >
                                                                Payment:
                                                            </h3>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div
                                                                class="form-group"
                                                            >
                                                                <label
                                                                    for="panno"
                                                                    >Pan No:
                                                                    *</label
                                                                >
                                                                <input
                                                                    type="text"
                                                                    class="form-control"
                                                                    id="panno"
                                                                    name="panno"
                                                                    placeholder="Pan No."
                                                                />
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div
                                                                class="form-group"
                                                            >
                                                                <label
                                                                    for="accno"
                                                                    >Account No:
                                                                    *</label
                                                                >
                                                                <input
                                                                    type="text"
                                                                    class="form-control"
                                                                    id="accno"
                                                                    name="accno"
                                                                    placeholder="Account No."
                                                                />
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div
                                                                class="form-group"
                                                            >
                                                                <label
                                                                    for="holname"
                                                                    >Account
                                                                    Holder Name:
                                                                    *</label
                                                                >
                                                                <input
                                                                    type="text"
                                                                    class="form-control"
                                                                    id="holname"
                                                                    name="accname"
                                                                    placeholder="Account Holder Name."
                                                                />
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div
                                                                class="form-group"
                                                            >
                                                                <label
                                                                    for="ifsc"
                                                                    >IFSC Code:
                                                                    *</label
                                                                >
                                                                <input
                                                                    type="text"
                                                                    class="form-control"
                                                                    id="ifsc"
                                                                    name="ifsc"
                                                                    placeholder="IFSC Code."
                                                                />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <a
                                                    class="btn btn-primary action-button float-right"
                                                    href="form-wizard-vertical.html"
                                                    >Submit</a
                                                >
                                                <button
                                                    type="button"
                                                    name="previous"
                                                    class="btn btn-dark previous action-button-previous float-right mr-3"
                                                    value="Previous"
                                                >
                                                    Previous
                                                </button>
                                            </fieldset> -->
                                    </form>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- </AppLayout> -->
</template>

<script>
import AppLayout from "@/Layouts/AppLayout.vue";
import { Link, useForm } from "@inertiajs/vue3";
import Swal from "sweetalert2";

export default {
    components: {
        AppLayout,
        Link,
    },
    data() {
        return {
            pages: {
                page_one: true,
                page_two: false,
            },
            form: useForm({
                name: "",
                email: "",
                old_password: "",
                new_password: "",
                new_password_confirmation: "",
            }),
            errors: [],
            button_status: true,
        };
    },
    methods: {
        nextPage(page_no) {
            switch (page_no) {
                case 1:
                    this.pages.page_one = true;
                    this.pages.page_two = false;
                    break;
                case 2:
                    this.pages.page_one = false;
                    this.pages.page_two = true;
                    break;
                default:
                // code block
            }
        },
        submit() {
            this.button_status = false; // setting button disable while submitting
            this.form.post(route("admin.user.changePersonal"), {
                onSuccess: (res) => {
                    this.showAlert("Details Changed");
                    window.location.href = route("admin.user.profile");
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
    },
};
</script>

<style></style>
