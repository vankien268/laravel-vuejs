import { createApp } from 'vue'
import { createPinia } from 'pinia'
import router from './router/index.js'
import App from './App.vue'
// import axios from 'axios'
// window.axios = axios; // sử dụng toàn cục. do sd axios trên trình duyệt web nên object window
// tham chiếu tới axios. 
// tag card, list, btn,... nó tái sử dụng nhiều nơi nên cần đăng ký dạng global
import { 
    Card,
    Menu,
    List,
    Drawer,
    Button, 
    message,
    Table,
    Avatar,
    Select,
    Input,
    InputPassword,
    Checkbox,
} from 'ant-design-vue';

import '../src/static/fontawesome/css/all.min.css'; //nên import cách này cho đỡ dài dòng
// import { library } from '@fortawesome/fontawesome-svg-core'

// import { fas } from '@fortawesome/free-solid-svg-icons';
// import { far } from '@fortawesome/free-regular-svg-icons';
// import { fab } from '@fortawesome/free-brands-svg-icons';
// import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

// library.add(fas, far, fab)


import 'ant-design-vue/dist/antd.css';
import '../node_modules/bootstrap/dist/css/bootstrap-grid.min.css';
import '../node_modules/bootstrap/dist/css/bootstrap-utilities.min.css';
const app = createApp(App);
// app.component('font-awesome-icon', FontAwesomeIcon)
app.use(createPinia());
app.use(router); // use nó để hoạt động, xem nó đã chạy đc chưa.
app.use(Card);
app.use(Button);
app.use(Drawer);
app.use(List);
app.use(Menu);
app.use(Table);
app.use(Avatar);
app.use(Select);
app.use(Input);
app.use(InputPassword);
app.use(Checkbox);

app.mount('#app')
app.config.globalProperties.$message = message;