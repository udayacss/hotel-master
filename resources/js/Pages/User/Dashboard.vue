<script>
import AppLayout from "../../Layouts/AppLayout.vue";
import moment from "moment";

export default {
    components: {
        AppLayout,
        moment,
    },
    props: {
        boards: Object,
    },
    data() {
        return {
            v_boards: this.boards,
        };
    },
    mounted() {
        console.log(this.boards);
    },
    methods: {
        getFullName(first_name, last_name) {
            return first_name + " " + last_name;
        },

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
                <!-- Container -->
                <div class="container">
                    <div
                        class="row mt-5"
                        v-for="board in v_boards"
                        :key="board.id"
                    >
                        <div class="circle1 col-md-6 col-xs-12">
                            <div class="wrapper1">
                                <span class="text1">{{
                                    board.five
                                        ? getFullName(
                                              board.five?.first_name,
                                              board.five?.last_name
                                          )
                                        : ""
                                }}</span>
                                <span class="text2">{{
                                    board.six
                                        ? getFullName(
                                              board.six?.first_name,
                                              board.six?.last_name
                                          )
                                        : ""
                                }}</span>
                                <span class="text3">{{
                                    board.seven
                                        ? getFullName(
                                              board.seven?.first_name,
                                              board.seven?.last_name
                                          )
                                        : ""
                                }}</span>
                                <span class="text4">{{
                                    board.eight
                                        ? getFullName(
                                              board.eight?.first_name,
                                              board.eight?.last_name
                                          )
                                        : ""
                                }}</span>
                                <span class="text5">{{
                                    board.nine
                                        ? getFullName(
                                              board.nine?.first_name,
                                              board.nine?.last_name
                                          )
                                        : ""
                                }}</span>
                                <span class="text6">{{
                                    board.ten
                                        ? getFullName(
                                              board.ten?.first_name,
                                              board.ten?.last_name
                                          )
                                        : ""
                                }}</span>
                                <span class="text7">{{
                                    board.eleven
                                        ? getFullName(
                                              board.eleven?.first_name,
                                              board.eleven?.last_name
                                          )
                                        : ""
                                }}</span>
                                <span class="text8">{{
                                    board.twelve
                                        ? getFullName(
                                              board.twelve?.first_name,
                                              board.twelve?.last_name
                                          )
                                        : ""
                                }}</span>
                                <span class="text9">{{
                                    board.thirteen
                                        ? getFullName(
                                              board.thirteen?.first_name,
                                              board.thirteen?.last_name
                                          )
                                        : ""
                                }}</span>
                                <div
                                    class="sector1"
                                    style="transform: rotate(90deg) skew(50deg)"
                                ></div>
                                <div
                                    class="sector1"
                                    style="
                                        transform: rotate(130deg) skew(50deg);
                                    "
                                ></div>
                                <div
                                    class="sector1"
                                    style="
                                        transform: rotate(165deg) skew(50deg);
                                    "
                                ></div>
                                <div
                                    class="sector1"
                                    style="
                                        transform: rotate(205deg) skew(50deg);
                                    "
                                ></div>
                                <div
                                    class="sector1"
                                    style="
                                        transform: rotate(245deg) skew(45deg);
                                    "
                                ></div>
                                <div
                                    class="sector1"
                                    style="
                                        transform: rotate(290deg) skew(45deg);
                                    "
                                ></div>
                                <div
                                    class="sector1"
                                    style="
                                        transform: rotate(335deg) skew(50deg);
                                    "
                                ></div>
                                <div
                                    class="sector1"
                                    style="
                                        transform: rotate(375deg) skew(50deg);
                                    "
                                ></div>
                                <div
                                    class="sector1"
                                    style="
                                        transform: rotate(410deg) skew(50deg);
                                    "
                                ></div>
                            </div>
                            <div class="circle2">
                                <div class="wrapper2">
                                    <span class="text1">{{
                                        board.two
                                            ? getFullName(
                                                  board.two?.first_name,
                                                  board.two?.last_name
                                              )
                                            : ""
                                    }}</span>
                                    <span class="text2">{{
                                        board.three
                                            ? getFullName(
                                                  board.three?.first_name,
                                                  board.three?.last_name
                                              )
                                            : ""
                                    }}</span>
                                    <span class="text3">{{
                                        board.four
                                            ? getFullName(
                                                  board.four?.first_name,
                                                  board.four?.last_name
                                              )
                                            : ""
                                    }}</span>
                                    <div
                                        class="sector2"
                                        style="
                                            transform: rotate(90deg)
                                                skew(155deg);
                                        "
                                    ></div>
                                    <div
                                        class="sector2"
                                        style="
                                            transform: rotate(205deg)
                                                skew(140deg);
                                        "
                                    ></div>
                                    <div
                                        class="sector2"
                                        style="
                                            transform: rotate(335deg)
                                                skew(155deg);
                                        "
                                    ></div>
                                </div>
                            </div>
                            <div class="circle3">
                                <div class="wrapper3">
                                    <span class="text1">{{
                                        getFullName(
                                            board.owner?.first_name,
                                            board.owner?.last_name
                                        )
                                    }}</span>
                                </div>
                            </div>
                        </div>

                        <ol
                            class="list-group list-group-numbered col-md-6 col-xs-12"
                        >
                            <li
                                class="list-group-item d-flex justify-content-between align-items-start"
                            >
                                <div class="ms-2 me-auto">
                                    Name
                                    <div class="font-weight-bold">
                                        {{
                                            board.owner?.first_name +
                                            " " +
                                            board.owner?.last_name
                                        }}
                                    </div>
                                </div>
                            </li>
                            <li
                                class="list-group-item d-flex justify-content-between align-items-start"
                            >
                                <div class="ms-2 me-auto">
                                    Address
                                    <div class="font-weight-bold"></div>
                                </div>
                            </li>
                            <li
                                class="list-group-item d-flex justify-content-between align-items-start"
                            >
                                <div class="ms-2 me-auto">
                                    Phone
                                    <div class="font-weight-bold">
                                        {{ board.owner?.mobile_no }}
                                    </div>
                                </div>
                            </li>
                            <li
                                class="list-group-item d-flex justify-content-between align-items-start"
                            >
                                <div class="ms-2 me-auto">
                                    My Referrals
                                    <div class="font-weight-bold">
                                        ...
                                        <a href="#">View more</a>
                                    </div>
                                </div>
                                <span class="badge bg-primary rounded-pill"
                                    >14</span
                                >
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<style>
.circle1 {
    background: #fff;
    /* width: 350px;
        height: 350px; */
    display: flex;
    align-items: center;
    justify-content: center;
}
.wrapper1 {
    width: 300px;
    height: 300px;
    border: 2px solid #fff;
    border-radius: 50%;
    position: relative;
    overflow: hidden;
}
.sector1 {
    position: absolute;
    transform-origin: 100% 100%;
    background: rgb(201, 201, 201);
    width: 5000px;
    height: 5000px;
    left: 50%;
    top: 50%;
    border: 0.5px solid #ffffff;
    box-shadow: inset 0px 0px 0px 0.5px #ffffff;
    margin-top: -5000px;
    margin-left: -5000px;
}
.wrapper2 {
    width: 200px;
    height: 200px;
    border: 2px solid #ffffff;
    border-radius: 50%;
    position: relative;
    overflow: hidden;
}
.circle2 {
    position: absolute;
}
.sector2 {
    position: absolute;
    transform-origin: 100% 100%;
    background: rgb(148, 147, 153);
    width: 5000px;
    height: 5000px;
    left: 50%;
    top: 50%;
    border: 0.5px solid #ffffff;
    box-shadow: inset 0px 0px 0px 0.5px #ffffff;
    margin-top: -5000px;
    margin-left: -5000px;
}
.circle3 {
    position: absolute;
}
.wrapper3 {
    width: 100px;
    height: 100px;
    border: 2px solid #ffffff;
    border-radius: 50%;
    position: relative;
    overflow: hidden;
    background: rgb(1, 1, 1);
}
/* Text */
.circle1 .text1,
.circle1 .text2,
.circle1 .text3,
.circle1 .text4,
.circle1 .text5,
.circle1 .text6,
.circle1 .text7,
.circle1 .text8,
.circle1 .text9,
.circle1 .circle2 .text1,
.circle1 .circle2 .text2,
.circle1 .circle2 .text3,
.circle1 .circle3 .text1 {
    color: red;
    position: absolute;
    font-size: 10px;
    z-index: 99;
}
/* Circle1 */
.circle1 .text1 {
    top: 10%;
    left: 60%;
}
.circle1 .text2 {
    top: 28%;
    left: 80%;
}
.circle1 .text3 {
    top: 53%;
    left: 85%;
}
.circle1 .text4 {
    top: 77%;
    left: 73%;
}
.circle1 .text5 {
    top: 90%;
    left: 46%;
}
.circle1 .text6 {
    top: 77%;
    left: 15%;
}
.circle1 .text7 {
    top: 50%;
    left: 3%;
}
.circle1 .text8 {
    top: 28%;
    left: 8%;
}
.circle1 .text9 {
    top: 10%;
    left: 30%;
}
/* Circle2 */
.circle1 .circle2 .text1 {
    top: 30%;
    left: 8%;
}
.circle1 .circle2 .text2 {
    top: 30%;
    left: 75%;
}
.circle1 .circle2 .text3 {
    top: 82%;
    left: 40%;
}
/* Circle3 */
.circle1 .circle3 .text1 {
    top: 45%;
    left: 35%;
}
</style>
