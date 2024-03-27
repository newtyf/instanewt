import "./bootstrap";
import { createApp } from "vue";
import Counter from "../views/components/common/publication.vue";
const app = createApp();
app.component("publication", Counter);

app.mount("#app");
