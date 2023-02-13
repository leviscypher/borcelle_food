import { createApp } from "vue";
import { createPinia } from "pinia";
import App from "./layouts/default.vue";
import router from "./router";
import "./assets/tailwind.css";
import 'bootstrap';
//icon
import { library } from "@fortawesome/fontawesome-svg-core";
import { fab } from "@fortawesome/free-brands-svg-icons";
import { fas } from "@fortawesome/free-solid-svg-icons";
import { far } from "@fortawesome/free-regular-svg-icons";
import { FontAwesomeIcon } from "@fortawesome/vue-fontawesome";
library.add(fab, fas, far);

const app = createApp(App);
app.component("font-awesome-icon", FontAwesomeIcon);

app.use(createPinia());
app.use(router);
app.mount("#app");
