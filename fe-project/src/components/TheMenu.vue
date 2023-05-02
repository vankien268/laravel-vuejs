<template>
  <a-menu
    v-model:openKeys="openKeys"
    v-model:selectedKeys="selectedKeys"
    mode="inline"
  >
    <a-menu-item key="admin-users">
      <router-link :to="{ name: 'admin-users' }">
        <span><user-outlined class="me-1"/>Tài khoản</span>
      </router-link>
    </a-menu-item>
  </a-menu>

   <a-menu
    v-model:openKeys="openKeys"
    v-model:selectedKeys="selectedKeys"
    mode="inline"
  >
    <a-menu-item key="admin-roles">
      <router-link :to="{ name: 'admin-roles' }">
        <span>
          <tag-outlined class="me-1"/> Vai trò
        </span>
      </router-link>
    </a-menu-item>
  </a-menu>

   <a-menu
    v-model:openKeys="openKeys"
    v-model:selectedKeys="selectedKeys"
    mode="inline"
  >
    <a-menu-item key="admin-settings">
      <router-link :to="{ name: 'admin-settings' }">
        <span><tag-outlined class="me-1"/>Cài đặt</span>
      </router-link>
    </a-menu-item>
  </a-menu>
</template>

<script>
import { UserOutlined, TagOutlined } from '@ant-design/icons-vue'; // icon của ant design vue, viết icon dạng passcalcase
// import { defineComponent, reactive, toRefs } from "vue";
import { storeToRefs } from "pinia";
import { defineComponent } from "vue";
import { useMenu } from "../stores/use-menu.js";
export default defineComponent({ // định nghĩa các component
  components: {
    UserOutlined,
    TagOutlined,
    },
  // setup() {
  //   const state = reactive({ // reactive tham chiếu tới các biến bên trong
  //     selectedKeys: ["admin-users"],
  //     openKeys: [],
  //   });
  //   // const selectedKeys = ref(['admin-roles']);
  //   // console.log(selectedKeys);
  //   // const openKeys = [];
  //   return {
  //      ...toRefs(state), // return các biến sử dụng ra ngoài sử dụng toRefs(tham chiếu tới biến state),
  //     // nếu nhiều biến thì phải liệt kê hết nếu k dùng toRefs
  //     // selectedKeys,
  //     // openKeys
  //   };
  // },

  // sử dụng store(pinia)
    setup() {
        const storeMenu = useMenu();
        // const { selectedKeys, openKeys } = storeMenu;
      return {
        // selectedKeys,
        // openKeys
        ...storeToRefs(storeMenu) // tham chiếu tới các biến
      }
    }
});
</script>
