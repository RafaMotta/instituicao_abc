import './bootstrap';

import Alpine from 'alpinejs';
window.Alpine = Alpine;
Alpine.start();

import { createApp } from 'vue';
import app from './Components/app.vue'
import dashboard from './Components/dashboard.vue'
import turmas from './Components/turmas.vue'


createApp(app).mount("#app")
createApp(dashboard).mount("#dashboard")
createApp(turmas).mount("#turmas")
