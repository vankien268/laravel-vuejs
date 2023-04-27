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

import 'ant-design-vue/dist/antd.css';
import '../node_modules/bootstrap/dist/css/bootstrap-grid.min.css';
import '../node_modules/bootstrap/dist/css/bootstrap-utilities.min.css';
const app = createApp(App);
app.use(createPinia);
app.use(router); // use nó để hoạt động, xem nó đã chạy đc chưa.
app.use(Button);
app.use(Drawer);
app.use(List);
app.use(Menu);
app.mount('#app')
app.config.globalProperties.$message = message;