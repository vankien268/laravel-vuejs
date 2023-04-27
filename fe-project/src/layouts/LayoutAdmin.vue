<template>
  <TheHeader></TheHeader>
  <!-- để router-view để gọi component con admin/users-->
  <div class="container-fluid mt-3">
    <div class="row">
      <div class="col-sm-3 d-none d-sm-flex">
        <!-- <h1>sider bar</h1> -->
        <a-list bordered style="with: 100%;">
          <the-menu></the-menu>
          <template #header>
            <div>BẢNG ĐIỀU KHIỂN</div>
          </template>
        </a-list>
      </div>
      <div class="col-12 col-sm-9">
        <router-view></router-view>
      </div>
    </div>
  </div>
</template>

<script>
import TheHeader from "../components/TheHeader.vue";
import TheMenu from "../components/TheMenu.vue";
export default {
  components: {
    TheHeader,
    TheMenu,
  },
};
</script>

<style></style>
