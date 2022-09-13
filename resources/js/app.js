import './bootstrap';

import Alpine from 'alpinejs';
window.Alpine = Alpine;
Alpine.start();

//Import Vue Components
import { createApp } from 'vue';
import dashboard from './Components/dashboard.vue'
import turmas from './Components/turmas.vue'
import materiais from './Components/materiais.vue'
import disciplinas from './Components/disciplinas.vue'

//Render Vue Components
createApp(dashboard).mount("#dashboard")
createApp(turmas).mount("#turmas")
createApp(materiais).mount("#materiais")
createApp(disciplinas).mount("#disciplinas")
