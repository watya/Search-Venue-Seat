<template>
    <div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">座席選択</label>
            <select
                input
                type="id"
                name="floor"
                v-model="floor"
                style="width: 110px"
            >
                <option disabled selected value>選択してください</option>
                <option value="2">2階スタンド</option>
                <option value="3">3階スタンド</option>
                <option value="4">4階スタンド</option>
            </select>
            <input
                type="text"
                class="search_row"
                v-model="rowNumber"
                style="width: 60px"
            />列
            <input
                type="text"
                class="search_seat"
                v-model="seatNumber"
                style="width: 60px"
            />番
            <span class="input-group-btn">
                <button
                    type="submit"
                    class="btn btn-info"
                    @click="seatSearch"
                    v-show="searchButton"
                >
                    <i class="fa fa-search"></i>
                </button>
                <!-- <a href="/venue/pia" class="btn btn-info" v-show="toTop">
                    別の座席を検索する
                </a> -->
                <button class="btn btn-info" v-show="toTop" @click="reSearch">
                    別の座席を検索する
                </button>
            </span>
        </div>

        <div class="venue">
            <!-- <table class="arena">
                <div>
                    <div>
                        <th>ステージ</th>
                        <span v-for="n in 7" :key="n">
                            <tr id="top">
                                <td id="a">A{{ n }}</td>
                            </tr>
                            <tr id="bottom">
                                <td id="a"></td>
                            </tr>
                            <tr>
                                <td id="a">B{{ n }}</td>
                            </tr>
                            <tr id="bottom">
                                <td id="a"></td>
                            </tr>
                            <tr>
                                <td id="a">C{{ n }}</td>
                            </tr>
                            <tr id="bottom">
                                <td id="a"></td>
                            </tr>
                        </span>
                    </div>
                    <div id="d-arena">
                        <span v-for="k in 5" :key="k">
                            <tr>
                                <td id="a">D{{ 1 + k }}</td>
                            </tr>
                            <tr id="bottom">
                                <td id="a"></td>
                            </tr>
                        </span>
                    </div>
                </div>
            </table> -->

            <!-- アリーナ -->
            <table>
                <div>
                    <div>
                        <th class="stage">ステージ</th>
                        <span v-for="n in 7" :key="n">
                            <tr class="arena-top">
                                <td class="arena">A{{ n }}</td>
                            </tr>
                            <tr class="arena-bottom">
                                <td class="arena"></td>
                            </tr>
                            <tr>
                                <td class="arena">B{{ n }}</td>
                            </tr>
                            <tr class="arena-bottom">
                                <td class="arena"></td>
                            </tr>
                        </span>
                    </div>
                    <div class="cd-arena">
                        <span v-for="k in 5" :key="k">
                            <tr>
                                <td class="arena">C{{ 1 + k }}</td>
                            </tr>
                            <tr class="arena-bottom">
                                <td class="arena"></td>
                            </tr>
                        </span>
                    </div>
                </div>
            </table>

            <!-- L席 -->
            <table class="L">
                <div class="stand-4l">
                    <h>4階席L</h>
                    <span v-for="n in 5" :key="n">
                        <tr class="stand-4lTop">
                            <td
                                :class="{
                                    stand411: 2 * n - 1 === 1, //４階席L01
                                    stand432: 2 * n - 1 === 3, //４階席L03
                                    stand450: 2 * n - 1 === 5, //４階席L05
                                    stand468: 2 * n - 1 === 7, //４階席L07
                                    stand490: 2 * n - 1 === 9, //４階席L09
                                }"
                            >
                                L0{{ 2 * n - 1 }}
                            </td>
                        </tr>
                        <tr class="stand-4lBottom">
                            <td
                                v-if="n != 5"
                                :class="{
                                    stand423: 2 * n === 2, //４階席L02
                                    stand441: 2 * n === 4, //４階席L04
                                    stand459: 2 * n === 6, //４階席L06
                                    stand477: 2 * n === 8, //４階席L08
                                }"
                            >
                                L0{{ 2 * n }}
                            </td>
                            <td class="stand490" v-if="n === 5">
                                <!-- ４階席L10 -->
                                L{{ 2 * n }}
                            </td>
                        </tr>
                    </span>
                </div>
                <div class="stand-3l">
                    <h>3階席L</h>
                    <span v-for="n in 5" :key="n">
                        <tr class="stand-3lTop">
                            <td
                                :class="{
                                    stand39: 2 * n - 1 === 1, //3階席L01
                                    stand327: 2 * n - 1 === 3, //3階席L03
                                    stand345: 2 * n - 1 === 5, //3階席L05
                                    stand363: 2 * n - 1 === 7, //3階席L07
                                    stand383: 2 * n - 1 === 9, //3階席L09
                                }"
                            >
                                L0{{ 2 * n - 1 }}
                            </td>
                        </tr>
                        <tr class="stand-3lBottom">
                            <!-- <td v-if="n != 5">L0{{ 2 * n }}</td>
                            <td v-if="n === 5">L{{ 2 * n }}</td> -->

                            <td
                                v-if="n != 5"
                                :class="{
                                    stand318: 2 * n === 2, //3階席L02
                                    stand336: 2 * n === 4, //3階席L04
                                    stand354: 2 * n === 6, //3階席L06
                                    stand372: 2 * n === 8, //3階席L08
                                }"
                            >
                                L0{{ 2 * n }}
                            </td>
                            <td class="stand383" v-if="n === 5">
                                <!-- 3階席L10 -->
                                L{{ 2 * n }}
                            </td>
                        </tr>
                    </span>
                </div>
                <div class="stand-2l">
                    <h>2階席L</h>
                    <span v-for="n in 5" :key="n">
                        <tr class="stand-2lTop">
                            <td>L0{{ 2 * n - 1 }}</td>
                        </tr>
                        <tr class="stand-2lBottom">
                            <td v-if="n != 5">L0{{ 2 * n }}</td>
                            <td v-if="n === 5">L{{ 2 * n }}</td>
                        </tr>
                    </span>
                </div>
            </table>
            <!-- R席 -->
            <table class="R">
                <div class="stand-2r">
                    <h>2階席R</h>
                    <span v-for="n in 5" :key="n">
                        <tr class="stand-2rTop">
                            <td>R{{ 39 - (2 * n - 1) }}</td>
                        </tr>
                        <tr class="stand-2rBottom">
                            <td>R{{ 39 - 2 * n }}</td>
                        </tr>
                    </span>
                </div>
                <div class="stand-3r">
                    <div>
                        <h>3階席R</h>
                        <span v-for="n in 5" :key="n">
                            <tr class="stand-3rTop">
                                <td>R{{ 39 - (2 * n - 1) }}</td>
                            </tr>
                            <tr class="stand-3rBottom">
                                <td>R{{ 39 - 2 * n }}</td>
                            </tr>
                        </span>
                    </div>
                </div>
                <div class="stand-4r">
                    <div>
                        <h>4階席R</h>
                        <span v-for="n in 5" :key="n">
                            <tr class="stand-4rTop">
                                <td>R{{ 39 - (2 * n - 1) }}</td>
                            </tr>
                            <tr class="stand-4rBottom">
                                <td>R{{ 39 - 2 * n }}</td>
                            </tr>
                        </span>
                    </div>
                </div>
            </table>
            <!--  C席 -->
            <table class="C">
                <tr>
                    2階席C
                </tr>
                <div class="stand-2c">
                    <span v-for="n in 4" :key="n">
                        <td>C{{ 15 + (2 * n - 1) }} C{{ 15 + 2 * n }}</td>
                    </span>
                </div>
                <tr>
                    3階席C
                </tr>
                <div class="stand-3c">
                    <span v-for="n in 4" :key="n">
                        <td>C{{ 15 + (2 * n - 1) }} C{{ 15 + 2 * n }}</td>
                    </span>
                </div>
                <tr>
                    4階席C
                </tr>
                <div class="stand-4c">
                    <td>C16 C17</td>
                    <td>C17 C18</td>
                    <td>C18 C21</td>
                </div>
            </table>

            <!-- LC席 -->
            <table class="LC">
                <h>2階席L</h>
                <div class="stand-2lc">
                    <td>L11 L12</td>
                    <td>L12 ~ L14</td>
                    <td>L14 L15</td>
                </div>
                <h>3階席L</h>
                <div class="stand-3lc">
                    <td>L11 L12</td>
                    <td>L12 ~ L14</td>
                    <td>L14 L15</td>
                </div>
                <h>4階席L</h>
                <div class="stand-4lc">
                    <td>L11 L12</td>
                    <td>L12 ~ L14</td>
                    <td>L14 L15</td>
                </div>
            </table>

            <!-- RC席 -->
            <table class="RC">
                <h>2階席R</h>
                <div class="stand-2rc">
                    <td>R24 R25</td>
                    <td>R25 ~ R27</td>
                    <td>R27 R28</td>
                </div>
                <h>3階席R</h>
                <div class="stand-3rc">
                    <td>R24 R25</td>
                    <td>R26 R27</td>
                    <td>R27 R28</td>
                </div>
                <h>4階席R</h>
                <div class="stand-4rc">
                    <td></td>
                    <td></td>
                    <td></td>
                </div>
            </table>
        </div>
    </div>
</template>

<script>
export default {
    name: "PiaComponent",
    data() {
        return {
            floor: "", //階
            rowNumber: "", //列
            seatNumber: "", //席番号
            beforeNumber: "", //元のclass名
            searchButton: true,
            toTop: false,
        };
    },
    methods: {
        seatSearch() {
            if (this.floor === "") {
                alert("座席フロアを選択してください");
                return;
            } else if (this.rowNumber === "") {
                alert("列が入力されていません");
                return;
            } else if (this.seatNumber === "") {
                alert("席番号が入力されていません");
                return;
            }

            function getClosestNum(searchNumber, seats) {
                return seats.reduce((a, b) => {
                    let aDiff = Math.abs(a - searchNumber);
                    let bDiff = Math.abs(b - searchNumber);
                    if (aDiff == bDiff) {
                        return a > b ? a : b;
                    } else {
                        return bDiff < aDiff ? b : a;
                    }
                });
            }

            if (this.floor === "2") {
                var seats = [11, 23, 32, 41, 50, 59, 68, 77, 90];
            } else if (this.floor === "3") {
                var seats = [9, 18, 27, 36, 45, 54, 63, 72, 83];
            } else if (this.floor === "4") {
                var seats = [11, 23, 32, 41, 50, 59, 68, 77, 90];
            } else {
                return;
            }

            const searchNumber = this.seatNumber;
            const closest = getClosestNum(searchNumber, seats);

            if (closest < searchNumber) {
                const index = seats.indexOf(closest);
                seats.splice(index, 1);

                const newClosest = getClosestNum(searchNumber, seats);

                console.log("stand" + this.floor + newClosest);

                document
                    .querySelector(".stand" + this.floor + newClosest)
                    .classList.replace(
                        "stand" + this.floor + newClosest,
                        "mySeat"
                    );

                this.beforeNumber = "stand" + this.floor + newClosest;
            } else {
                console.log("stand" + this.floor + closest);

                document
                    .querySelector(".stand" + this.floor + closest, +closest)
                    .classList.replace(
                        "stand" + this.floor + closest,
                        "mySeat"
                    );
                this.beforeNumber = "stand" + this.floor + closest;
            }

            this.searchButton = !this.searchButton;
            this.toTop = !this.toTop;
        },

        reSearch() {
            document
                .querySelector(".mySeat")
                .classList.replace("mySeat", this.beforeNumber);

            this.searchButton = !this.searchButton;
            this.toTop = !this.toTop;
        },
    },
};
</script>
