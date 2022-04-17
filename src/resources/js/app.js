require("./bootstrap");
// import router from "./routes";
import PiaComponent from "./components/PiaComponent.vue";

import { createApp } from "vue";

const app = createApp({
    components: {
        PiaComponent,
    },
}).mount("#app");
