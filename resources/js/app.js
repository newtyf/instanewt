import "./bootstrap";
import { createApp } from "vue";
import Counter from "../views/components/common/publication.vue";
import Publicationlist from "../views/components/common/publicationlist.vue";
import Upload from "../views/components/common/upload.vue";
import UploadProfile from "../views/components/common/uploadProfile.vue";

const app = createApp();
app.component("publication", Counter);
app.component("publicationlist", Publicationlist);
app.component("upload", Upload);
app.component("uploadprofile", UploadProfile);

app.mount("#app");
