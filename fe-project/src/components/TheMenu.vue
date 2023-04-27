<template>
  <a-menu
    v-model:openKeys="openKeys"
    v-model:selectedKeys="selectedKeys"
    mode="inline"
  >
    <a-menu-item key="admin-users">
      <router-link :to="{ name: 'admin-users' }">
        <span>Tài khoản</span>
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
        <span>Vai trò</span>
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
        <span>Cài đặt</span>
      </router-link>
    </a-menu-item>
  </a-menu>
</template>

<script>
import { defineComponent, reactive, toRefs } from "vue";
export default defineComponent({ // định nghĩa các component
  setup() {
    const state = reactive({ // reactive tham chiếu tới các biến bên trong
      selectedKeys: ["admin-users"],
      openKeys: [],
    });
    // const selectedKeys = ref(['admin-roles']);
    // console.log(selectedKeys);
    // const openKeys = [];
    return {
       ...toRefs(state), // return các biến sử dụng ra ngoài sử dụng toRefs(tham chiếu tới biến state),
      // nếu nhiều biến thì phải liệt kê hết nếu k dùng toRefs
      // selectedKeys,
      // openKeys
    };
  },
});
</script>
