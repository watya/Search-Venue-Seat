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
                placeholder=""
                style="width: 60px"
            />列
            <input
                type="text"
                class="search_seat"
                v-model="seatNumber"
                placeholder=""
                style="width: 60px"
            />番
            <span class="input-group-btn">
                <button type="submit" class="btn btn-info" @click="seatSearch">
                    <i class="fa fa-search"></i>
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
                            <td>L0{{ 2 * n - 1 }}</td>
                        </tr>
                        <tr class="stand-4lBottom">
                            <td>L0{{ 2 * n }}</td>
                        </tr>
                    </span>
                </div>
                <div class="stand-3l">
                    <h>3階席L</h>
                    <span v-for="n in 5" :key="n">
                        <tr class="stand-3lTop">
                            <td>L0{{ 2 * n - 1 }}</td>
                        </tr>
                        <tr class="stand-3lBottom">
                            <td>L0{{ 2 * n }}</td>
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
                            <td>L0{{ 2 * n }}</td>
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
            floor: 0,
            rowNumber: "",
            seatNumber: "",
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

            // if (this.floor === 2) {
            //     if(1 <= this.seatNumber <= 14){

            //     }elseif(15 <= this.seatNumber <= 23){

            //     }
            // }elseif(this.floor === 3){

            // }elseif(this.floor === 4){

            // }
        },
    },
};
</script>
