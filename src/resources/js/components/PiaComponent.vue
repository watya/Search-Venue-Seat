<template>
    <div>
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
            <table class="arena">
                <div>
                    <div>
                        <th>ステージ</th>
                        <span v-for="n in 7" :key="n">
                            <tr id="arena-top">
                                <td id="arena-a">A{{ n }}</td>
                            </tr>
                            <tr id="arena-bottom">
                                <td id="arena-a"></td>
                            </tr>
                            <tr>
                                <td id="arena-a">B{{ n }}</td>
                            </tr>
                            <tr id="arena-bottom">
                                <td id="arena-a"></td>
                            </tr>
                        </span>
                    </div>
                    <div id="cd-arena">
                        <span v-for="k in 5" :key="k">
                            <tr>
                                <td id="arena-a">C{{ 1 + k }}</td>
                            </tr>
                            <tr id="arena-bottom">
                                <td id="arena-a"></td>
                            </tr>
                        </span>
                    </div>
                </div>
            </table>

            <table class="stand-2l" id="stand-2l">
                <div>
                    <h>2階席L</h>
                    <span v-for="n in 5" :key="n">
                        <tr id="stand-2lTop">
                            <td>L0{{ 2 * n - 1 }}</td>
                        </tr>
                        <tr id="stand-2lBottom">
                            <td>L0{{ 2 * n }}</td>
                        </tr>
                    </span>
                </div>
            </table>
            <table class="stand-3l" id="stand-3l">
                <div>
                    <h>3階席L</h>
                    <span v-for="n in 5" :key="n">
                        <tr id="stand-3lTop">
                            <td>L0{{ 2 * n - 1 }}</td>
                        </tr>
                        <tr id="stand-3lBottom">
                            <td>L0{{ 2 * n }}</td>
                        </tr>
                    </span>
                </div>
            </table>
            <table class="stand-4l" id="stand-4l">
                <div>
                    <h>4階席L</h>
                    <span v-for="n in 5" :key="n">
                        <tr id="stand-4lTop">
                            <td>L0{{ 2 * n - 1 }}</td>
                        </tr>
                        <tr id="stand-4lBottom">
                            <td>L0{{ 2 * n }}</td>
                        </tr>
                    </span>
                </div>
            </table>
        </div>
    </div>
</template>

<script>
export default {
    name: "PiaComponent",
};
</script>
