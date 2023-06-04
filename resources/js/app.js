import './bootstrap';
import { createApp } from "vue";
import FilepondForm from "./components/FilepondForm.vue";

const app = createApp({});

app.component('filepondForm', FilepondForm);

app.mount('#app');
