import { createApp } from 'vue'
import { createPinia } from 'pinia'
import router from './router/index.js'
import App from './App.vue'
import { 
    Menu,
    List,
    Drawer,
    Button, 
    message 
} from 'ant-design-vue';

// import '../src/static/fontawesome/css/all.min.css'; //nên import cách này cho đỡ dài dòng
import { library } from '@fortawesome/fontawesome-svg-core'

import { fas } from '@fortawesome/free-solid-svg-icons';
import { far } from '@fortawesome/free-regular-svg-icons';
import { fab } from '@fortawesome/free-brands-svg-icons';
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

library.add(fas, far, fab)


import 'ant-design-vue/dist/antd.css';
import '../node_modules/bootstrap/dist/css/bootstrap-grid.min.css';
import '../node_modules/bootstrap/dist/css/bootstrap-utilities.min.css';
const app = createApp(App);
app.component('font-awesome-icon', FontAwesomeIcon)
app.use(createPinia());
app.use(router); // use nó để hoạt động, xem nó đã chạy đc chưa.
app.use(Button);
app.use(Drawer);
app.use(List);
app.use(Menu);
app.mount('#app')
app.config.globalProperties.$message = message;