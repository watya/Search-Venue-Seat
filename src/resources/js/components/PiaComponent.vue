<template>
    <div>
        <h1>ぴあアリーナMM</h1>
        <p>神奈川県横浜市西区みなとみらい3-2-2</p>

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
                    <span v-for="n in 6" :key="n">
                        <tr id="stand-2lTop">
                            <td >L0{{ 2 * n - 1 }}</td>
                        </tr>
                        <tr id="stand-2lBottom">
                            <td >L0{{ 2 * n }}</td>
                        </tr>
                    </span>
                </div>
            </table>
        </div>
        <div>
            <a href="https://pia-arena-mm.jp/" target="_blank">>公式サイト</a>
            <img
                src="https://pia-arena-mm.jp/wp-content/uploads/2020/07/arena.jpg"
            />
        </div>
        <div>
            <a
                class="twitter-timeline"
                href="https://twitter.com/pia_arena_mm?ref_src=twsrc%5Etfw"
                width="350px"
                height="600px"
                >Tweets by pia_arena_mm</a
            >
        </div>
    </div>
</template>

<script>
export default {
    name: "PiaComponent",
};
</script>
