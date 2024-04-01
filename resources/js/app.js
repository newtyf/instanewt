import "./bootstrap";
import { createApp } from "vue";
import Counter from "../views/components/common/publication.vue";
import Publicationlist from "../views/components/common/publicationlist.vue";
import Upload from "../views/components/common/upload.vue";
import UploadProfile from "../views/components/common/uploadProfile.vue";
import FollowButton from "../views/components/common/FollowButton.vue";

const app = createApp();
app.component("publication", Counter);
app.component("publicationlist", Publicationlist);
app.component("upload", Upload);
app.component("uploadprofile", UploadProfile);
app.component("followButton", FollowButton);

app.mount("#app");

document.addEventListener('dragstart', function(evt) {
    evt.preventDefault();
});