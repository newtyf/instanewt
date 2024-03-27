import "./bootstrap";
import { createApp } from "vue";
import Counter from "../views/components/common/publication.vue";
import Publicationlist from "../views/components/common/publicationlist.vue";
const app = createApp();
app.component("publication", Counter);
app.component("publicationlist", Publicationlist);

app.mount("#app");
