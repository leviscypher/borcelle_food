import { createApp } from "vue";
import { createPinia } from "pinia";
import App from "./App.vue";
import router from "./router";
import "./assets/main.css";

// Vuetify
import { createVuetify } from "vuetify";
import "vuetify/styles";
import * as components from "vuetify/components";
import * as directives from "vuetify/directives";
const app = createApp(App);
const vuetify = createVuetify({
  components,
  directives,
});
app.use(createPinia());
app.use(router);
app.use(vuetify);
app.mount("#app");
