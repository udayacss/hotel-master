<template>
    <AppLayout>
        <!-- <AppLayout
        :side_menu_enabled="false"
        :top_nav_enabled="false"
        :footer_enabled="false"
    > -->
        <!-- Page Content  -->
        <div>
            <div id="content-page" class="content-page">
                <div class="container-fluid mt-5">
                    <div class="row">
                        <div class="col-sm-12 col-lg-12">
                            <div class="iq-card">
                                <div
                                    class="iq-card-header d-flex justify-content-between"
                                >
                                    <div class="iq-header-title">
                                        <h4 class="card-title">
                                            Get Quotation
                                        </h4>
                                    </div>
                                </div>
                                <div class="iq-card-body">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <ul
                                                id="top-tabbar-vertical"
                                                class="p-0"
                                            >
                                              
                                                <li
                                                    id="contact"
                                                    :class="{
                                                        active: pages.page_two,
                                                    }"
                                                >
                                                    <a
                                                        href="javascript:void();"
                                                    >
                                                        <i
                                                            class="ri-user-fill text-danger"
                                                        ></i
                                                        ><span
                                                            >Solar Panel
                                                            Details</span
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
                                        <div class="col-md-4">
                                            <form
                                                id="form-wizard3"
                                                class="text-center"
                                            >
                                           
                                                <fieldset >
                                                    <div
                                                        class="form-card text-left"
                                                    >
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <h3
                                                                    class="mb-4"
                                                                >
                                                                    Solar Panel
                                                                    Details:
                                                                </h3>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div
                                                                class="col-md-12"
                                                            >
                                                                <div
                                                                    class="form-group"
                                                                >
                                                                    <label
                                                                        for="exampleFormControlSelect1"
                                                                        >Select
                                                                        Type of
                                                                        Solar
                                                                        Power
                                                                        System</label
                                                                    >
                                                                    <select
                                                                        class="form-control"
                                                                        id="exampleFormControlSelect1"
                                                                        @change="
                                                                            onSystemTypeSelect
                                                                        "
                                                                        v-model="
                                                                            form.system_type
                                                                        "
                                                                    >
                                                                        <option
                                                                            value="0"
                                                                            selected
                                                                        >
                                                                            Select
                                                                        </option>
                                                                        <option
                                                                            v-for="(
                                                                                type,
                                                                                index
                                                                            ) in system_types"
                                                                            :key="
                                                                                index
                                                                            "
                                                                            :value="
                                                                                type.id
                                                                            "
                                                                        >
                                                                            {{
                                                                                type.type
                                                                            }}
                                                                        </option>
                                                                    </select>
                                                                    <div
                                                                        class="alert alert-danger mt-1 col-sm-12"
                                                                        role="alert"
                                                                        v-if="
                                                                            errors.system_type
                                                                        "
                                                                    >
                                                                        <div
                                                                            class="iq-alert-text"
                                                                        >
                                                                            {{
                                                                                errors.system_type
                                                                            }}
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="col-md-12"
                                                            >
                                                                <div
                                                                    class="form-group"
                                                                >
                                                                    <label
                                                                        for="exampleFormControlSelect1"
                                                                        >Select
                                                                        Panel</label
                                                                    >
                                                                    <select
                                                                        class="form-control"
                                                                        id="exampleFormControlSelect1"
                                                                        v-model="
                                                                            form.panel_type
                                                                        "
                                                                    >
                                                                        <option
                                                                            selected
                                                                        >
                                                                            Select
                                                                        </option>
                                                                        <option
                                                                            v-for="(
                                                                                type,
                                                                                index
                                                                            ) in panel_types"
                                                                            :key="
                                                                                index
                                                                            "
                                                                            :value="
                                                                                type.id
                                                                            "
                                                                        >
                                                                            {{
                                                                                type.type
                                                                            }}
                                                                        </option>
                                                                    </select>
                                                                    <div
                                                                        class="alert alert-danger mt-1 col-sm-12"
                                                                        role="alert"
                                                                        v-if="
                                                                            errors.panel_type
                                                                        "
                                                                    >
                                                                        <div
                                                                            class="iq-alert-text"
                                                                        >
                                                                            {{
                                                                                errors.panel_type
                                                                            }}
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="col-md-12"
                                                            >
                                                                <div
                                                                    class="form-group"
                                                                >
                                                                    <label
                                                                        for="exampleFormControlSelect1"
                                                                        >Select
                                                                        Inverter
                                                                        Type</label
                                                                    >
                                                                    <select
                                                                        class="form-control"
                                                                        id="exampleFormControlSelect1"
                                                                        v-model="
                                                                            form.inverter_type
                                                                        "
                                                                    >
                                                                        <option
                                                                            selected=""
                                                                            disabled=""
                                                                        >
                                                                            Select
                                                                        </option>
                                                                        <option
                                                                            v-for="(
                                                                                type,
                                                                                index
                                                                            ) in inverter_types"
                                                                            :key="
                                                                                index
                                                                            "
                                                                            :value="
                                                                                type.id
                                                                            "
                                                                        >
                                                                            {{
                                                                                type.type
                                                                            }}
                                                                        </option>
                                                                    </select>
                                                                    <div
                                                                        class="alert alert-danger mt-1 col-sm-12"
                                                                        role="alert"
                                                                        v-if="
                                                                            errors.inverter_type
                                                                        "
                                                                    >
                                                                        <div
                                                                            class="iq-alert-text"
                                                                        >
                                                                            {{
                                                                                errors.inverter_type
                                                                            }}
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="col-md-6"
                                                            >
                                                                <div
                                                                    class="form-group"
                                                                >
                                                                    <label
                                                                        for="city"
                                                                        >Capacity
                                                                        (Kw):
                                                                        *</label
                                                                    >
                                                                    <input
                                                                        type="number"
                                                                        class="form-control col-md-12"
                                                                        v-model="
                                                                            form.capacity
                                                                        "
                                                                      
                                                                        placeholder="Capacity.(Kw)"
                                                                    />
                                                                    <div
                                                                        class="alert alert-danger mt-1 col-sm-12"
                                                                        role="alert"
                                                                        v-if="
                                                                            errors.capacity
                                                                        "
                                                                    >
                                                                        <div
                                                                            class="iq-alert-text"
                                                                        >
                                                                            {{
                                                                                errors.capacity
                                                                            }}
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="col-md-6"
                                                            >
                                                                <div
                                                                    class="form-group"
                                                                >
                                                                    <label
                                                                        for="city"
                                                                        >Units:
                                                                        *</label
                                                                    >
                                                                    <input
                                                                        type="number"
                                                                        class="form-control col-md-12"
                                                                        v-model="
                                                                            form.unit_count
                                                                        "
                                                                       
                                                                        placeholder="Units."
                                                                    />
                                                                    <div
                                                                        class="alert alert-danger mt-1 col-sm-12"
                                                                        role="alert"
                                                                        v-if="
                                                                            errors.unit_count
                                                                        "
                                                                    >
                                                                        <div
                                                                            class="iq-alert-text"
                                                                        >
                                                                            {{
                                                                                errors.unit_count
                                                                            }}
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            
                                                            <div
                                                                class="col-md-12"
                                                            >
                                                                <div
                                                                    class="form-group"
                                                                >
                                                                    <label
                                                                        for="exampleFormControlSelect1"
                                                                        >Select
                                                                        Phase
                                                                        Type</label
                                                                    >
                                                                    <select
                                                                        class="form-control"
                                                                        id="exampleFormControlSelect1"
                                                                        v-model="
                                                                            form.phase_type
                                                                        "
                                                                    >
                                                                        <option
                                                                            selected=""
                                                                            disabled=""
                                                                        >
                                                                            Select
                                                                        </option>
                                                                        <option
                                                                            v-for="(
                                                                                type,
                                                                                index
                                                                            ) in phase_types"
                                                                            :key="
                                                                                index
                                                                            "
                                                                            :value="
                                                                                type.id
                                                                            "
                                                                        >
                                                                            {{
                                                                                type.type
                                                                            }}
                                                                        </option>
                                                                    </select>
                                                                    <div
                                                                        class="alert alert-danger mt-1 col-sm-12"
                                                                        role="alert"
                                                                        v-if="
                                                                            errors.phase_type
                                                                        "
                                                                    >
                                                                        <div
                                                                            class="iq-alert-text"
                                                                        >
                                                                            {{
                                                                                errors.phase_type
                                                                            }}
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            
                                                            
                                                             <div
                                                                class="col-md-6"
                                                            >
                                                                <div
                                                                    class="form-group"
                                                                >
                                                                    <label
                                                                        for="city"
                                                                        >Average bill:
                                                                        *</label
                                                                    >
                                                                    <input
                                                                        type="number"
                                                                        class="form-control col-md-12"
                                                                        v-model="
                                                                            form.avetage_bill
                                                                        "
                                                                       
                                                                        placeholder=""
                                                                    />
                                                                    <div
                                                                        class="alert alert-danger mt-1 col-sm-12"
                                                                        role="alert"
                                                                        v-if="
                                                                            errors.avetage_bill
                                                                        "
                                                                    >
                                                                        <div
                                                                            class="iq-alert-text"
                                                                        >
                                                                            {{
                                                                                errors.avetage_bill
                                                                            }}
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="col-md-6"
                                                            >
                                                                <div
                                                                    class="form-group"
                                                                >
                                                                    <label
                                                                        for="city"
                                                                        >Price:
                                                                        *</label
                                                                    >
                                                                    <input
                                                                        type="number"
                                                                        class="form-control col-md-12"
                                                                        v-model="
                                                                            form.price
                                                                        "
                                                                     
                                                                        placeholder=""
                                                                    />
                                                                    <div
                                                                        class="alert alert-danger mt-1 col-sm-12"
                                                                        role="alert"
                                                                        v-if="
                                                                            errors.price
                                                                        "
                                                                    >
                                                                        <div
                                                                            class="iq-alert-text"
                                                                        >
                                                                            {{
                                                                                errors.price
                                                                            }}
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- <div
                                                                class="col-md-12"
                                                                v-if="
                                                                    form.system_type
                                                                "
                                                            >
                                                                <div
                                                                    class="form-group"
                                                                >
                                                                    <label
                                                                        for="exampleFormControlSelect1"
                                                                        >Select
                                                                        Brand</label
                                                                    >
                                                                    <select
                                                                        class="form-control"
                                                                        id="exampleFormControlSelect1"
                                                                        v-model="
                                                                            form.system_brand
                                                                        "
                                                                    >
                                                                        <option
                                                                            value="0"
                                                                            selected
                                                                        >
                                                                            Select
                                                                        </option>
                                                                        <option
                                                                            v-for="(
                                                                                type,
                                                                                index
                                                                            ) in v_system_brands"
                                                                            :key="
                                                                                index
                                                                            "
                                                                            :value="
                                                                                type.id
                                                                            "
                                                                        >
                                                                            {{
                                                                                type.type
                                                                            }}
                                                                        </option>
                                                                    </select>
                                                                    <div
                                                                        class="alert alert-danger mt-1 col-sm-12"
                                                                        role="alert"
                                                                        v-if="
                                                                            errors.system_brand
                                                                        "
                                                                    >
                                                                        <div
                                                                            class="iq-alert-text"
                                                                        >
                                                                            {{
                                                                                errors.system_brand
                                                                            }}
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div> -->
                                                            
                                                            
                                                            <div
                                                                class="col-md-12"
                                                                v-if="
                                                                    form.system_type !=
                                                                        1 &&
                                                                    form.system_type
                                                                "
                                                            >
                                                                <div
                                                                    class="form-group"
                                                                >
                                                                    <label
                                                                        for="exampleFormControlSelect1"
                                                                        >Select
                                                                        Battery
                                                                        Type</label
                                                                    >
                                                                    <select
                                                                        class="form-control"
                                                                        id="exampleFormControlSelect1"
                                                                        v-model="
                                                                            form.battery_type
                                                                        "
                                                                    >
                                                                        <option
                                                                            selected=""
                                                                            disabled=""
                                                                        >
                                                                            Select
                                                                        </option>
                                                                        <option
                                                                            v-for="(
                                                                                type,
                                                                                index
                                                                            ) in battery_types"
                                                                            :key="
                                                                                index
                                                                            "
                                                                            :value="
                                                                                type.id
                                                                            "
                                                                        >
                                                                            {{
                                                                                type.type
                                                                            }}
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
import AppLayout from "@/Layouts/AppLayout.vue";
import { Link, useForm } from "@inertiajs/vue3";
import Swal from "sweetalert2";

export default {
    props: {
        project_types: Object,
        unite_ranges: Object,
        phase_types: Object,
        system_types: Object,
        panel_types: Object,
        inverter_types: Object,
        battery_types: Object,
        system_brands: Object,
    },
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
                fname: "",
                email: "",
                lname: "",
                contact: "",
                battery_type: "",
                inverter_type: "",
                panel_type: "",
                system_type: null,
                system_brand: null,
                phase_type: "",
                unit_count: "",
                capacity: "",
                project_type: "",
                address: "",
                requested_capacity: "",
                price: "",
                avetage_bill: "",
            }),
            v_system_brands: [],
            errors: [],
            button_status: true,
        };
    },
    mounted() {},
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
        setCapacityAndUnits(type) {
            //1 = when enter units 2= when enter capacity
            if (type == 1) {
                this.unite_ranges.forEach((range) => {
                    if (
                        range.min <= this.form.unit_count &&
                        range.max >= this.form.unit_count
                    ) {
                        this.form.capacity = range.capacity;
                    }
                });
            }
            if (type == 2) {
                if (!this.form.capacity > 0) {
                    this.form.unit_count = 0;
                }
                this.form.requested_capacity = this.form.capacity;
                var capacities = [];
                this.unite_ranges.forEach((range) => {
                    if (range.capacity >= this.form.capacity) {
                        capacities.push(range.capacity);
                    }
                });

                this.unite_ranges.forEach((range) => {
                    if (range.capacity == Math.min.apply(Math, capacities)) {
                        this.form.unit_count = range.max;
                    }
                });
            }
        },
        onSystemTypeSelect() {
            this.setSystemBrands();
        },
        setSystemBrands() {
            this.v_system_brands = [];

            this.system_brands.forEach((brand) => {
                if (brand.system_type_id == this.form.system_type) {
                    this.v_system_brands.push(brand);
                }
            });
        },
        submit() {
            this.button_status = false; // setting button disable while submitting
            this.form.post(route("admin.price_list.store"), {
                onSuccess: (res) => {
                    this.showAlert("Details Changed");
                    // this.form.reset();
                    // window.location.href = route("admin.price_list.index");
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
        showAlertWithButton(){

        }
    },
};
</script>

<style></style>
