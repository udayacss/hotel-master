<template>
    <div class="row mt-5" v-for="board in v_boards" :key="board.id">
        <div class="circle1 col-md-6 col-xs-12">
            <div class="wrapper1">
                <!-- <span class="text1">{{
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
                }}</span> -->
                <span class="text1 badge badge-secondary" v-if="board?.five"
                    >5</span
                >
                <span class="text2 badge badge-secondary" v-if="board?.six"
                    >6</span
                >
                <span class="text3 badge badge-secondary" v-if="board?.seven"
                    >7</span
                >
                <span class="text4 badge badge-secondary" v-if="board?.eight"
                    >8</span
                >
                <span class="text5 badge badge-secondary" v-if="board?.nine"
                    >9</span
                >
                <span class="text6 badge badge-secondary" v-if="board?.ten"
                    >10</span
                >
                <span class="text7 badge badge-secondary" v-if="board?.eleven"
                    >11</span
                >
                <span class="text8 badge badge-secondary" v-if="board?.twelve"
                    >12</span
                >
                <span class="text9 badge badge-secondary" v-if="board?.thirteen"
                    >13</span
                >
                <div
                    class="sector1"
                    :class="getSaleCount(board?.id, board?.five?.id)"
                    style="transform: rotate(90deg) skew(50deg)"
                    data-toggle="modal"
                    data-target="#modal11"
                ></div>
                <div
                    class="sector1"
                    :class="getSaleCount(board?.id, board?.six?.id)"
                    style="transform: rotate(130deg) skew(50deg)"
                ></div>
                <div
                    class="sector1"
                    :class="getSaleCount(board?.id, board?.seven?.id)"
                    style="transform: rotate(165deg) skew(50deg)"
                ></div>
                <div
                    class="sector1"
                    :class="getSaleCount(board?.id, board?.eight?.id)"
                    style="transform: rotate(205deg) skew(50deg)"
                ></div>
                <div
                    class="sector1"
                    :class="getSaleCount(board?.id, board?.nine?.id)"
                    style="transform: rotate(245deg) skew(45deg)"
                ></div>
                <div
                    class="sector1"
                    :class="getSaleCount(board?.id, board?.ten?.id)"
                    style="transform: rotate(290deg) skew(45deg)"
                ></div>
                <div
                    class="sector1"
                    :class="getSaleCount(board?.id, board?.eleven?.id)"
                    style="transform: rotate(335deg) skew(50deg)"
                ></div>
                <div
                    class="sector1"
                    :class="getSaleCount(board?.id, board?.twelve?.id)"
                    style="transform: rotate(375deg) skew(50deg)"
                ></div>
                <div
                    class="sector1"
                    :class="getSaleCount(board?.id, board?.thirteen?.id)"
                    style="transform: rotate(410deg) skew(50deg)"
                ></div>
            </div>
            <div class="circle2">
                <div class="wrapper2">
                    <!-- <span class="text1">{{
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
                    }}</span> -->
                    <span class="text2 badge badge-secondary" v-if="board?.two"
                        >2</span
                    >
                    <span
                        class="text3 badge badge-secondary"
                        v-if="board?.three"
                        >3</span
                    >
                    <span class="text1 badge badge-secondary" v-if="board?.four"
                        >4</span
                    >
                    <div
                        class="sector2"
                        :class="getSaleCount(board?.id, board?.three?.id)"
                        style="transform: rotate(90deg) skew(155deg)"
                    ></div>
                    <div
                        class="sector2"
                        :class="getSaleCount(board?.id, board?.four?.id)"
                        style="transform: rotate(205deg) skew(140deg)"
                    ></div>
                    <div
                        class="sector2"
                        :class="getSaleCount(board?.id, board?.two?.id)"
                        style="transform: rotate(335deg) skew(155deg)"
                    ></div>
                </div>
            </div>
            <div class="circle3">
                <div
                    class="wrapper3"
                    :class="getSaleCount(board?.id, board?.one?.id)"
                >
                    <!-- <span class="text1">{{
                        getFullName(
                            board.owner?.first_name,
                            board.owner?.last_name
                        )
                    }}</span> -->
                    <span class="text1 badge badge-secondary">1</span>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div
            class="modal fade"
            id="modal1"
            tabindex="-1"
            role="dialog"
            aria-labelledby="exampleModalLabel"
            aria-hidden="true"
        >
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <!-- <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div> -->
                    <div class="modal-body">
                        <button
                            type="button"
                            class="close"
                            data-dismiss="modal"
                            aria-label="Close"
                        >
                            <span aria-hidden="true">&times;</span>
                        </button>
                        {{
                            board.five
                                ? getFullName(
                                      board.five?.first_name,
                                      board.five?.last_name,
                                      board.five?.ref_seller_id
                                  )
                                : ""
                        }}
                    </div>
                    <!-- <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div> -->
                </div>
            </div>
        </div>

        <div class="col-md-6 col-xs-12">
            <ol
                class="list-group list-group-numbered"
                v-if="v_my_seller_account"
            >
                <li
                    class="list-group-item d-flex justify-content-between align-items-start"
                >
                    <div class="ms-2 me-auto">
                        My Package Referral
                        <div class="font-weight-bold">
                            {{ v_my_seller_account?.ref_no?.ref_no }}
                        </div>
                    </div>
                </li>
                <li
                    class="list-group-item d-flex justify-content-between align-items-start"
                >
                    <div class="ms-2 me-auto">
                        My Sponser
                        <div class="font-weight-bold">
                            {{
                                v_my_seller_account?.sponsor?.first_name +
                                " " +
                                v_my_seller_account?.sponsor?.last_name
                            }}
                            -
                            {{ v_my_seller_account?.sponsor?.ref_no?.ref_no }}
                        </div>
                    </div>
                </li>
                <!-- <li
                    class="list-group-item d-flex justify-content-between align-items-start"
                >
                    <div class="ms-2 me-auto">
                        Address
                        <div class="font-weight-bold"></div>
                    </div>
                </li> -->
                <!-- <li
                    class="list-group-item d-flex justify-content-between align-items-start"
                >
                    <div class="ms-2 me-auto">
                        Phone
                        <div class="font-weight-bold">
                            {{ board.owner?.mobile_no }}
                        </div>
                    </div>
                </li> -->
                <!-- <li
                    class="list-group-item d-flex justify-content-between align-items-start"
                >
                    <div class="ms-2 me-auto">
                        My Referrals
                        <div class="font-weight-bold">
                            ...
                            <a href="#">View more</a>
                        </div>
                    </div>
                    <span class="badge bg-primary rounded-pill">14</span>
                </li> -->
            </ol>

            <ol class="list-group list-group-numbered mt-4">
                <div v-for="(slot_name, index) in v_slot_names" :key="index">
                    <li
                        class="list-group-item d-flex align-items-start"
                        v-if="board[`${slot_name}`]"
                    >
                        <span class="text1 badge badge-secondary mr-3">{{
                            index + 1
                        }}</span>
                        <div class="ms-2 w-100">
                            {{
                                getFullName(
                                    board[`${slot_name}`].first_name,
                                    board[`${slot_name}`].last_name
                                )
                            }}
                            <div class="font-weight-bold d-flex">
                                {{ board[`${slot_name}`].ref_no.ref_no }}
                                <a href="#" class="ml-auto">
                                    <span
                                        class="badge badge-secondary mx-1"
                                        v-for="(sale, index) in getSale(
                                            board.id,
                                            board[`${slot_name}`].id,
                                            board.owner_seller_id
                                        )"
                                        :key="index"
                                        >{{ getFullName(sale?.first_name,sale?.last_name) }} [ {{ sale?.ref_no?.ref_no }}]</span
                                    ></a
                                >
                            </div>
                        </div>
                    </li>
                </div>
            </ol>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        boards: Object,
        my_seller_account: Object,
    },
    data() {
        return {
            v_boards: this.boards,
            v_my_seller_account: this.my_seller_account,
            v_slot_names: [
                "one",
                "two",
                "three",
                "four",
                "five",
                "six",
                "seven",
                "eight",
                "nine",
                "ten",
                "eleven",
                "twelve",
                "thirteen",
            ],
        };
    },
    mounted() {},
    methods: {
        getFullName(first_name, last_name) {
            return first_name + " " + last_name;
        },
        getSaleCount(boardId, sellerId) {
            var slots = [];
            this.v_boards.forEach((b) => {
                if (b.id == boardId) {
                    slots = b.slots;
                }
            });

            var sales = 0;
            if (slots.length > 0) {
                slots.forEach((slot) => {
                    if (slot.ref_seller_id == sellerId) {
                        sales += 1;
                    }
                });
            }
            if (sales >= 3) {
                return "three-sales";
            }
            if (sales == 2) {
                return "two-sales";
            }
            if (sales == 1) {
                return "one-sales";
            }
            if (sales == 0) {
                return "zero-sales";
            }
        },
        getSale(boardId, sellerId,ownerSellerId = 0) {
            var slots = [];
            this.v_boards.forEach((b) => {
                if (b.id == boardId) {
                    slots = b.slots;
                }
            });

            var sales = [];
            if (slots.length > 0) {
                slots.forEach((slot) => {
                    if (slot.ref_seller_id == sellerId) {
                        sales.push(slot?.seller);
                    }
                });
            }
            return sales;
        },
    },
};
</script>

<style>
.circle1 {
    background: unset;
    /* width: 350px;
        height: 350px; */
    display: flex;
    align-items: center;
    justify-content: center;
}
.wrapper1 {
    width: 350px;
    height: 350px;
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
    cursor: pointer;
}
.wrapper2 {
    width: 225px;
    height: 225px;
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
.three-sales {
    background-color: rgb(21, 255, 0);
}
.two-sales {
    background-color: rgb(251, 255, 0);
}
.one-sales {
    background-color: rgb(255, 72, 0);
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
    color: #fff;
    position: absolute;
    font-size: 12px;
    z-index: 99;
}
/* Circle1 */
.circle1 .text1 {
    top: 9%;
    left: 61%;
}
.circle1 .text2 {
    top: 25%;
    left: 82%;
}
.circle1 .text3 {
    top: 51%;
    left: 88%;
}
.circle1 .text4 {
    top: 76%;
    left: 76%;
}
.circle1 .text5 {
    top: 88%;
    left: 49%;
}
.circle1 .text6 {
    top: 77.5%;
    left: 18.9%;
}
.circle1 .text7 {
    top: 50%;
    left: 6%;
}
.circle1 .text8 {
    top: 25%;
    left: 12%;
}
.circle1 .text9 {
    top: 9%;
    left: 32.8%;
}
/* Circle2 */
.circle1 .circle2 .text1 {
    top: 28%;
    left: 14%;
}
.circle1 .circle2 .text2 {
    top: 28%;
    left: 76%;
}
.circle1 .circle2 .text3 {
    top: 81%;
    left: 45%;
}
/* Circle3 */
.circle1 .circle3 .text1 {
    top: 40%;
    left: 41%;
}
</style>
