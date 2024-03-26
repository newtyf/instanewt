import "./bootstrap";
import { createApp } from "vue";
import Counter from "../views/components/common/publication.vue";
import publicationlist from "../views/components/common/publicationlist.vue";
const app = createApp();
app.component("publication", Counter);
app.component("publicationlist", publicationlist);

app.mount("#app");


document.addEventListener('dragstart', function(evt) {
  console.log("A")
  evt.preventDefault();
});
