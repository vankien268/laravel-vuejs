<template>
  <div class="container-fuild">
    <div class="row text-white" style="background: orange; padding:1rem;">
        <div class="col-1 d-flex d-sm-none align-items-center justify-content-center">
            <span @click="showDrawer()">x</span>
        </div>
        <div class="col-10 col-sm-9 d-flex align-items-center justify-content-center justify-content-sm-start">
            <!-- justify-content-sm-start đẩy logo về bên trái, align-items-center ở giữa -->
            <img src="../assets/logo.png" alt="" height="32" width="34" class="ms-3 me-3">
            <span class="d-none d-sm-flex">QUẢN TRỊ</span>
        </div>
        <div class="col-sm-3 d-none d-sm-flex align-items-center justify-content-sm-end">
            <span>Admin</span>
        </div>
        <div class="col-1 d-flex d-sm-none align-items-center justify-content-center">
            <span @click="showDrawerUser()">x</span>
        </div>
    </div>
  </div>

  <a-drawer
    v-model:visible="visible"
    title="DANH MỤC"
    placement="left"
  >
  <the-menu></the-menu>
  </a-drawer>

    <a-drawer
    v-model:visible_user="visible_user"
    title="ADMIN"
    placement="right"
  >
    <p>Some contents...</p>
    <p>Some contents...</p>
    <p>Some contents...</p>
  </a-drawer>

</template>

<script>
import { defineComponent, ref } from 'vue';
import TheMenu from './TheMenu.vue';
export default defineComponent({
  components: {
    TheMenu
  },
  setup() {
    const visible = ref(false);
    const visible_user = ref(false);

    const showDrawer = () => {
      visible.value = true;
    };
     const showDrawerUser = () => {
      visible_user.value = true;
    };
    return {
      visible,
      visible_user,
      showDrawer,
      showDrawerUser
    };
  },
});
</script>
