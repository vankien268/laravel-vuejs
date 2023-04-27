import { createRouter, createWebHistory } from "vue-router";
import admin from './admin.js';
// import public from './public.js'; (1)

const routes = [...admin]; // lấy hết item của admin [...admin,...public](2)
const router = createRouter({
    history: createWebHistory(), // sử dụng trình duyệt web với chế độ history, chứ không phải chế độ tắt
    routes
})
// nếu có các module tiếp theo thì link tiếp (1,2)
// export nó ra ngoài
export default router; // export cho main js gọi