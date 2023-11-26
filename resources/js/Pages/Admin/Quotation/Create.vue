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
                                                    :class="{
                                                        active: pages.page_one,
                                                    }"
                                                    id="personal"
                                                >
                                                    <a
                                                        @click="enablePersonal"
                                                        href="javascript:void();"
                                                    >
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
                                                    <a
                                                        @click="enableForm"
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
                                                <!-- fieldsets -->
                                                <fieldset v-if="pages.page_one">
                                                    <div
                                                        class="form-card text-left"
                                                    >
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <h3
                                                                    class="mb-4"
                                                                >
                                                                    Customer
                                                                    Details
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
                                                                        for="fname"
                                                                        >First
                                                                        Name:
                                                                        *</label
                                                                    >
                                                                    <input
                                                                        type="text"
                                                                        class="form-control"
                                                                        v-model="
                                                                            form.fname
                                                                        "
                                                                        placeholder="First Name"
                                                                        required="required"
                                                                    />
                                                                    <div
                                                                        class="alert alert-danger mt-1 col-sm-12"
                                                                        role="alert"
                                                                        v-if="
                                                                            errors.fname
                                                                        "
                                                                    >
                                                                        <div
                                                                            class="iq-alert-text"
                                                                        >
                                                                            {{
                                                                                errors.fname
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
                                                                        for="lname"
                                                                        >Last
                                                                        Name:
                                                                        *</label
                                                                    >
                                                                    <input
                                                                        type="text"
                                                                        class="form-control"
                                                                        v-model="
                                                                            form.lname
                                                                        "
                                                                        placeholder="Last Name"
                                                                    />
                                                                    <div
                                                                        class="alert alert-danger mt-1 col-sm-12"
                                                                        role="alert"
                                                                        v-if="
                                                                            errors.lname
                                                                        "
                                                                    >
                                                                        <div
                                                                            class="iq-alert-text"
                                                                        >
                                                                            {{
                                                                                errors.lname
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
                                                                        >E- Mail
                                                                        Address:
                                                                    </label>
                                                                    <input
                                                                        type="email"
                                                                        class="form-control"
                                                                        v-model="
                                                                            form.email
                                                                        "
                                                                        placeholder="E- Mail"
                                                                    />
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="col-md-12"
                                                            >
                                                                <div
                                                                    class="form-group"
                                                                >
                                                                    <label
                                                                        >Contact:
                                                                    </label>
                                                                    <input
                                                                        type="number"
                                                                        class="form-control"
                                                                        v-model="
                                                                            form.contact
                                                                        "
                                                                        placeholder="contact"
                                                                    />
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="col-md-12"
                                                            >
                                                                <div
                                                                    class="form-group"
                                                                >
                                                                    <label
                                                                        for="dob"
                                                                        >Address
                                                                        :
                                                                        *</label
                                                                    >
                                                                    <input
                                                                        type="text"
                                                                        class="form-control"
                                                                        v-model="
                                                                            form.address
                                                                        "
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

                                                        <ul
                                                            class="nav nav-tabs"
                                                            id="myTab-1"
                                                            role="tablist"
                                                        >
                                                            <li
                                                                class="nav-item"
                                                            >
                                                                <a
                                                                    class="nav-link active"
                                                                    id="home-tab"
                                                                    data-toggle="tab"
                                                                    href="#home"
                                                                    role="tab"
                                                                    aria-controls="home"
                                                                    aria-selected="true"
                                                                    >Full German</a
                                                                >
                                                            </li>
                                                            <li
                                                                class="nav-item"
                                                            >
                                                                <a
                                                                    class="nav-link"
                                                                    id="profile-tab"
                                                                    data-toggle="tab"
                                                                    href="#profile"
                                                                    role="tab"
                                                                    aria-controls="profile"
                                                                    aria-selected="false"
                                                                    >Semi German</a
                                                                >
                                                            </li>
                                                        </ul>

                                                        <div
                                                            class="tab-content"
                                                            id="myTabContent-2"
                                                        >
                                                            <div
                                                                class="tab-pane fade show active"
                                                                id="home"
                                                                role="tabpanel"
                                                                aria-labelledby="home-tab"
                                                            >
                                                                <div
                                                                    class="row"
                                                                >
                                                                    <div
                                                                        class="col-md-12"
                                                                    >
                                                                        <div
                                                                            class="form-group"
                                                                        >
                                                                            <label
                                                                                for="exampleFormControlSelect1"
                                                                                >Select
                                                                                Project
                                                                                Type</label
                                                                            >
                                                                            <select
                                                                                class="form-control"
                                                                                id="exampleFormControlSelect1"
                                                                                v-model="
                                                                                    form.project_type
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
                                                                                    ) in project_types"
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
                                                                                    errors.project_type
                                                                                "
                                                                            >
                                                                                <div
                                                                                    class="iq-alert-text"
                                                                                >
                                                                                    {{
                                                                                        errors.project_type
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
                                                                                @input="
                                                                                    setCapacityAndUnits(
                                                                                        1
                                                                                    )
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
                                                                                @input="
                                                                                    setCapacityAndUnits(
                                                                                        2
                                                                                    )
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
                                                                        class="col-md-12"
                                                                    >
                                                                        <div
                                                                            class="form-group"
                                                                        >
                                                                            <label
                                                                                for="exampleFormControlSelect1"
                                                                                >Select
                                                                                Type
                                                                                of
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
                                                                                    value="1"
                                                                                >
                                                                                    SMA
                                                                                </option>
                                                                                <!-- <option
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
                                                                                </option> -->
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
                                                            <div
                                                                class="tab-pane fade"
                                                                id="profile"
                                                                role="tabpanel"
                                                                aria-labelledby="profile-tab"
                                                            >
                                                                <div
                                                                    class="row"
                                                                >
                                                                    <div
                                                                        class="col-md-12"
                                                                    >
                                                                        <div
                                                                            class="form-group"
                                                                        >
                                                                            <label
                                                                                for="exampleFormControlSelect1"
                                                                                >Select
                                                                                Project
                                                                                Type</label
                                                                            >
                                                                            <select
                                                                                class="form-control"
                                                                                id="exampleFormControlSelect1"
                                                                                v-model="
                                                                                    form2.project_type
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
                                                                                    ) in project_types"
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
                                                                            <!-- <div
                                                                                class="alert alert-danger mt-1 col-sm-12"
                                                                                role="alert"
                                                                                v-if="
                                                                                    errors.project_type
                                                                                "
                                                                            >
                                                                                <div
                                                                                    class="iq-alert-text"
                                                                                >
                                                                                    {{
                                                                                        errors.project_type
                                                                                    }}
                                                                                </div>
                                                                            </div> -->
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
                                                                                    form2.unit_count
                                                                                "
                                                                                @input="
                                                                                    setCapacityAndUnitsStepTwo(
                                                                                        1
                                                                                    )
                                                                                "
                                                                                placeholder="Units."
                                                                            />
                                                                            <!-- <div
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
                                                                            </div> -->
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
                                                                                    form2.capacity
                                                                                "
                                                                                @input="
                                                                                    setCapacityAndUnitsStepTwo(
                                                                                        2
                                                                                    )
                                                                                "
                                                                                placeholder="Capacity.(Kw)"
                                                                            />
                                                                            <!-- <div
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
                                                                            </div> -->
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
                                                                                    form2.phase_type
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
                                                                            <!-- <div
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
                                                                            </div> -->
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
                                                                                Type
                                                                                of
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
                                                                                    form2.system_type
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
                                                                            <!-- <div
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
                                                                            </div> -->
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
                                                                                    form2.panel_type
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
                                                                            <!-- <div
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
                                                                            </div> -->
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
                                                                                    form2.inverter_type
                                                                                "
                                                                            >
                                                                                <option
                                                                                    selected=""
                                                                                    disabled=""
                                                                                >
                                                                                    Select
                                                                                </option>
                                                                                <!-- <option
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
                                                                                </option> -->
                                                                                <option
                                                                                    
                                                                                    value="4"
                                                                                >
                                                                                    SOLIS
                                                                                </option>
                                                                            </select>
                                                                            <!-- <div
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
                                                                            </div> -->
                                                                        </div>
                                                                    </div>
                                                                    <div
                                                                        class="col-md-12"
                                                                        v-if="
                                                                            form2.system_type !=
                                                                                1 &&
                                                                            form2.system_type
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
            }),
            form2: useForm({
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
                        this.form.requested_capacity = this.form.capacity;
                    }
                });
            }
            if (type == 2) {
                if (!this.form.capacity > 0) {
                    this.form.unit_count = 0;
                }
                this.form.requested_capacity = this.form.capacity;
                console.log(this.form.requested_capacity);
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
        setCapacityAndUnitsStepTwo(type) {
            //1 = when enter units 2= when enter capacity
            if (type == 1) {
                this.unite_ranges.forEach((range) => {
                    if (
                        range.min <= this.form2.unit_count &&
                        range.max >= this.form2.unit_count
                    ) {
                        this.form2.capacity = range.capacity;
                        this.form2.requested_capacity = this.form2.capacity;
                    }
                });
            }
            if (type == 2) {
                if (!this.form2.capacity > 0) {
                    this.form2.unit_count = 0;
                }
                this.form2.requested_capacity = this.form2.capacity;
                var capacities = [];
                this.unite_ranges.forEach((range) => {
                    if (range.capacity >= this.form2.capacity) {
                        capacities.push(range.capacity);
                    }
                });

                this.unite_ranges.forEach((range) => {
                    if (range.capacity == Math.min.apply(Math, capacities)) {
                        this.form2.unit_count = range.max;
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
            axios
                .post(route("admin.quotation.store"), this.form)
                .then((response) => {
                    if (response.data.success == false) {
                        this.errors = response.data.errors;
                        this.button_status = true; //enabling submit
                    } else {
                        this.showAlert("Details Changed", response.data.id);
                    }
                })
                .catch((error) => {
                    this.button_status = true; //enabling submit
                });
            // this.form.post(route("admin.quotation.store"), {
            //     onSuccess: (res) => {
            //         this.showAlert("Details Changed");
            //         console.log(res);
            //         // window.location.href = route("admin.quotation.index");
            //     },
            //     onError: (er) => {
            //         this.errors = er;
            //         this.button_status = true; //enabling submit
            //     },
            // });
        },
        showAlert(type, id) {
            Swal.fire({
                position: "top-end",
                icon: "success",
                title: type,
                showConfirmButton: false,
                timer: 1500,
            });

            this.showAlertWithButton(id);
        },
        showAlertWithButton(id) {
            Swal.fire({
                title: "Generate PDF",
                text: "Now You can Generate PDF by Clicking Yes",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes, Generate it!",
                cancelButtonText: "No, cancel!",
                reverseButtons: true,
            }).then((result) => {
                if (result.isConfirmed) {
                    window.open(route("admin.pdf.export", id), "_blank");
                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    Swal.fire(
                        "Cancelled",
                        "Your imaginary file is safe :)",
                        "error"
                    );
                }
            });
        },
    },
};
</script>

<style></style>
