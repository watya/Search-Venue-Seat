<template>
    <div>
        <div class="search-box">
            <div>座席選択</div>
            <select
                input
                type="id"
                name="floor"
                v-model="floor"
                style="width: 180px"
            >
                <option disabled selected value>選択してください</option>
                <option value="2">2階スタンド</option>
                <option value="3">3階スタンド</option>
                <option value="4">4階スタンド</option>
            </select>
            <div>
                <input
                    type="text"
                    class="search_row"
                    v-model="rowNumber"
                    style="width: 130px"
                />列
                <input
                    type="text"
                    class="search_seat"
                    v-model="seatNumber"
                    style="width: 130px"
                />番
                <span class="input-group-btn">
                    <button
                        type="submit"
                        class="btn btn-info"
                        @click="seatSearch"
                        v-show="searchButton"
                        style="width: 60px"
                    >
                        <i class="fa fa-search"></i>
                    </button>
                    <button
                        class="btn btn-info"
                        v-show="toTop"
                        @click="reSearch"
                    >
                        別の座席を検索する
                    </button>
                </span>
            </div>

            <div>
                ※スタンド席のみ検索可(アリーナの座席配置はライブによって変わります)
            </div>
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
                            <td
                                :class="{
                                    stand211: 2 * n - 1 === 1, //2階席L01
                                    stand232: 2 * n - 1 === 3, //2階席L03
                                    stand250: 2 * n - 1 === 5, //2階席L05
                                    stand268: 2 * n - 1 === 7, //2階席L07
                                    stand288: 2 * n - 1 === 9, //2階席L09
                                }"
                            >
                                L0{{ 2 * n - 1 }}
                            </td>
                        </tr>
                        <tr class="stand-2lBottom">
                            <td
                                v-if="n != 5"
                                :class="{
                                    stand223: 2 * n === 2, //2階席L02
                                    stand241: 2 * n === 4, //2階席L04
                                    stand259: 2 * n === 6, //2階席L06
                                    stand277: 2 * n === 8, //2階席L08
                                }"
                            >
                                L0{{ 2 * n }}
                            </td>
                            <td class="stand288" v-if="n === 5">
                                <!-- 2階席L10 -->
                                L{{ 2 * n }}
                            </td>
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
                            <td
                                :class="{
                                    stand2330: 2 * n - 1 === 1, //2階席R38
                                    stand2307: 2 * n - 1 === 3, //2階席R36
                                    stand2289: 2 * n - 1 === 5, //2階席R34
                                    stand2271: 2 * n - 1 === 7, //2階席R32
                                    stand2253: 2 * n - 1 === 9, //2階席R30
                                }"
                            >
                                R{{ 39 - (2 * n - 1) }}
                            </td>
                        </tr>
                        <tr class="stand-2rBottom">
                            <td
                                :class="{
                                    stand2319: 2 * n === 2, //2階席R37
                                    stand2298: 2 * n === 4, //2階席R35
                                    stand2280: 2 * n === 6, //2階席R33
                                    stand2262: 2 * n === 8, //2階席R31
                                    stand2253: 2 * n === 8, //2階席R29
                                }"
                            >
                                R{{ 39 - 2 * n }}
                            </td>
                        </tr>
                    </span>
                </div>
                <div class="stand-3r">
                    <div>
                        <h>3階席R</h>
                        <span v-for="n in 5" :key="n">
                            <tr class="stand-3rTop">
                                <td
                                    :class="{
                                        stand3318: 2 * n - 1 === 1, //3階席R38
                                        stand3300: 2 * n - 1 === 3, //3階席R36
                                        stand3282: 2 * n - 1 === 5, //3階席R34
                                        stand3264: 2 * n - 1 === 7, //3階席R32
                                        stand3246: 2 * n - 1 === 9, //3階席R30
                                    }"
                                >
                                    R{{ 39 - (2 * n - 1) }}
                                </td>
                            </tr>
                            <tr class="stand-3rBottom">
                                <td
                                    :class="{
                                        stand3309: 2 * n === 2, //3階席R37
                                        stand3291: 2 * n === 4, //3階席R35
                                        stand3273: 2 * n === 6, //3階席R33
                                        stand3255: 2 * n === 8, //3階席R31
                                        stand3246: 2 * n === 10, //3階席R29
                                    }"
                                >
                                    R{{ 39 - 2 * n }}
                                </td>
                            </tr>
                        </span>
                    </div>
                </div>
                <div class="stand-4r">
                    <div>
                        <h>4階席R</h>
                        <span v-for="n in 5" :key="n">
                            <tr class="stand-4rTop">
                                <td
                                    :class="{
                                        stand4325: 2 * n - 1 === 1, //4階席R38
                                        stand4302: 2 * n - 1 === 3, //4階席R36
                                        stand4284: 2 * n - 1 === 5, //4階席R34
                                        stand4266: 2 * n - 1 === 7, //4階席R32
                                        stand4248: 2 * n - 1 === 9, //4階席R30
                                    }"
                                >
                                    R{{ 39 - (2 * n - 1) }}
                                </td>
                            </tr>
                            <tr class="stand-4rBottom">
                                <td
                                    :class="{
                                        stand4314: 2 * n === 2, //4階席R37
                                        stand4293: 2 * n === 4, //4階席R35
                                        stand4273: 2 * n === 6, //4階席R33
                                        stand4257: 2 * n === 8, //4階席R31
                                        stand4248: 2 * n === 10, //4階席R29
                                    }"
                                >
                                    R{{ 39 - 2 * n }}
                                </td>
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
                        <td
                            :class="{
                                stand2147: 2 * n - 1 === 1, //2階席C16,17
                                stand2165: 2 * n - 1 === 3, //2階席C18,19
                                stand2183: 2 * n - 1 === 5, //2階席C20,21
                                stand2200: 2 * n - 1 === 7, //2階席C22,23
                            }"
                        >
                            C{{ 15 + (2 * n - 1) }} C{{ 15 + 2 * n }}
                        </td>
                    </span>
                </div>
                <tr>
                    3階席C
                </tr>
                <div class="stand-3c">
                    <span v-for="n in 4" :key="n">
                        <td
                            :class="{
                                stand3141: 2 * n - 1 === 1, //3階席C16,17
                                stand3159: 2 * n - 1 === 3, //3階席C18,19
                                stand3177: 2 * n - 1 === 5, //3階席C20,21
                                stand3194: 2 * n - 1 === 7, //3階席C22,23
                            }"
                        >
                            C{{ 15 + (2 * n - 1) }} C{{ 15 + 2 * n }}
                        </td>
                    </span>
                </div>
                <tr>
                    4階席C
                </tr>
                <div class="stand-4c">
                    <td class="stand4148">C16 C17</td>
                    <td class="stand4175">C17 C18</td>
                    <td class="stand4195">C18 C21</td>
                </div>
            </table>

            <!-- LC席 -->
            <table class="LC">
                <h>2階席L</h>
                <div class="stand-2lc">
                    <td class="stand2101">L11 L12</td>
                    <td class="stand2119">L12 ~ L14</td>
                    <td class="stand2130">L14 L15</td>
                </div>
                <h>3階席L</h>
                <div class="stand-3lc">
                    <td class="stand396">L11 L12</td>
                    <td class="stand3114">L12 ~ L14</td>
                    <td class="stand3124">L14 L15</td>
                </div>
                <h>4階席L</h>
                <div class="stand-4lc">
                    <td class="stand4103">L11 L12</td>
                    <td class="stand4121">L12 ~ L14</td>
                    <td class="stand4132">L14 L15</td>
                </div>
            </table>

            <!-- RC席 -->
            <table class="RC">
                <h>2階席R</h>
                <div class="stand-2rc">
                    <td class="stand2211">R24 R25</td>
                    <td class="stand2229">R25 ~ R27</td>
                    <td class="stand2242">R27 R28</td>
                </div>
                <h>3階席R</h>
                <div class="stand-3rc">
                    <td class="stand3204">R24 R25</td>
                    <td class="stand3222">R26 R27</td>
                    <td class="stand3235">R27 R28</td>
                </div>
                <h>4階席R</h>
                <div class="stand-4rc">
                    <div class="stand4215">
                        <td></td>
                    </div>
                    <div class="stand4235">
                        <td></td>
                    </div>
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
            } else if (this.floor === "2" && this.seatNumber > 330) {
                alert("正しい席番号を入力してください");
                return;
            } else if (this.floor === "3" && this.seatNumber > 318) {
                alert("正しい席番号を入力してください");
                return;
            } else if (this.floor === "4" && this.seatNumber > 325) {
                alert("正しい席番号を入力してください");
                return;
            }

            function getClosestNum(searchNumber, seats) {
                const num = seats.reduce((a, b) => {
                    let aDiff = Math.abs(a - searchNumber);
                    let bDiff = Math.abs(b - searchNumber);
                    if (aDiff == bDiff) {
                        return a > b ? a : b;
                    } else {
                        return bDiff < aDiff ? b : a;
                    }
                });
                if (num < searchNumber) {
                    const index = seats.indexOf(num);
                    seats.splice(index, 1);
                    const reNum = seats.reduce((a, b) => {
                        let aDiff = Math.abs(a - searchNumber);
                        let bDiff = Math.abs(b - searchNumber);
                        if (aDiff == bDiff) {
                            return a > b ? a : b;
                        } else {
                            return bDiff < aDiff ? b : a;
                        }
                    });
                    if (reNum < searchNumber) {
                        const index = seats.indexOf(reNum);
                        seats.splice(index, 1);
                        const reReNum = seats.reduce((a, b) => {
                            let aDiff = Math.abs(a - searchNumber);
                            let bDiff = Math.abs(b - searchNumber);
                            if (aDiff == bDiff) {
                                return a > b ? a : b;
                            } else {
                                return bDiff < aDiff ? b : a;
                            }
                        });
                        return reReNum;
                    } else {
                        return reNum;
                    }
                } else {
                    return num;
                }
            }

            if (this.floor === "2") {
                this.seats = [
                    11, 23, 32, 41, 50, 59, 68, 77, 88, 101, 119, 130, 147, 165,
                    183, 200, 211, 229, 242, 253, 262, 271, 280, 289, 298, 307,
                    319, 330,
                ];
            } else if (this.floor === "3") {
                this.seats = [
                    9, 18, 27, 36, 45, 54, 63, 72, 83, 96, 114, 124, 141, 159,
                    177, 194, 204, 222, 235, 246, 255, 264, 273, 282, 291, 300,
                    309, 318,
                ];
            } else if (this.floor === "4") {
                this.seats = [
                    11, 23, 32, 41, 50, 59, 68, 77, 90, 103, 121, 132, 148, 175,
                    195, 215, 235, 248, 257, 266, 273, 284, 293, 302, 314, 325,
                ];
            } else {
                return;
            }

            const searchNumber = this.seatNumber;
            const seats = this.seats;
            const closest = getClosestNum(searchNumber, seats);

            console.log("stand" + this.floor + closest);

            document
                .querySelector(".stand" + this.floor + closest, +closest)
                .classList.replace("stand" + this.floor + closest, "mySeat");
            this.beforeNumber = "stand" + this.floor + closest;

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
