<template>
  <form @submit.prevent="createUser()">
    <a-card title="Tạo tài khoản mới" style="width: 100%">
      <div class="row">
        <div class="col-12 col-sm-4">
          <div class="row">
            <div class="col-12 d-flex justify-content-center mb-3">
              <a-avatar shape="square" :size="150">
                <template #icon
                  ><img src="../../../assets/users/default.jpg" alt="Avatar"
                /></template>
              </a-avatar>
            </div>
            <div class="col-12 d-flex justify-content-center">
              <a-button type="primary">
                <i class="fa-regular fa-plus me-1"></i> Chọn ảnh
              </a-button>
            </div>
          </div>
        </div>
        <div class="col-12 col-sm-8">
          <div class="row">
            <div class="col-12 col-sm-3 text-start text-sm-end">
              <label>
                <span class="text-danger me-1"> * </span>
                <span>Tình trạng: </span>
              </label>
            </div>
            <div class="col-12 col-sm-5">
              <a-select
                show-search
                placeholder="Chọn tình trạng"
                :filter-option="filterOption"
                style="width: 100%"
                v-model:value="status_id"
                :class="{ 'select-danger' : errors.status_id }"
              >
                <a-select-option
                  v-for="(item, index) in userStatus"
                  :key="index"
                  :value="item.id"
                  :title="item.name"
                >
                  {{ item.name }}
                </a-select-option>
              </a-select>
              <div class="w-100"></div>
               <small v-if="errors.status_id" class="text-danger">{{ errors.status_id[0] }}</small>
            </div>
          </div>

          <div class="row mt-3">
            <div class="col-12 col-sm-3 text-start text-sm-end">
              <label>
                <span class="text-danger me-1"> * </span>
                <span>Tên tài khoản: </span>
              </label>
            </div>
            <div class="col-12 col-sm-5">
              <a-input placeholder="Nhập tên tài khoản" :class="{ 'input-danger' : errors.username }" v-model:value="username" />
            <div class="w-100"></div>
            <small v-if="errors.username" class="text-danger">{{ errors.username[0] }}</small>
            </div>
          </div>
          <div class="row mt-3">
            <div class="col-12 col-sm-3 text-start text-sm-end">
              <label>
                <span class="text-danger me-1"> * </span>
                <span>Họ và tên: </span>
              </label>
            </div>
            <div class="col-12 col-sm-5">
              <a-input placeholder="Nhập họ và tên" v-model:value="name" />
            </div>
          </div>
          <div class="row mt-3">
            <div class="col-12 col-sm-3 text-start text-sm-end">
              <label>
                <span class="text-danger me-1"> * </span>
                <span>Email: </span>
              </label>
            </div>
            <div class="col-12 col-sm-5">
              <a-input placeholder="Nhập email" v-model:value="email" />
            </div>
          </div>
          <div class="row mt-3">
            <div class="col-12 col-sm-3 text-start text-sm-end">
              <label>
                <span class="text-danger me-1"> * </span>
                <span>Phòng ban: </span>
              </label>
            </div>
            <div class="col-12 col-sm-5">
              <a-select
                show-search
                placeholder="Chọn phòng ban"
                :filter-option="filterOption"
                style="width: 100%"
                v-model:value="department_id"
              >
                <a-select-option
                  v-for="(item, index) in departments"
                  :key="index"
                  :value="item.id"
                  :title="item.name"
                >
                  {{ item.name }}
                </a-select-option>
              </a-select>
            </div>
          </div>

          <div class="row mt-3">
            <div class="col-12 col-sm-3 text-start text-sm-end">
              <label>
                <span class="text-danger me-1"> * </span>
                <span>Mật khẩu: </span>
              </label>
            </div>
            <div class="col-12 col-sm-5">
              <a-input-password placeholder="Nhập mật khẩu" v-model:value="password"/>
            </div>
          </div>

          <div class="row mt-3">
            <div class="col-12 col-sm-3 text-start text-sm-end">
              <label>
                <span class="text-danger me-1"> * </span>
                <span>Xác nhận mật khẩu: </span>
              </label>
            </div>
            <div class="col-12 col-sm-5">
              <a-input-password placeholder="Nhập xác nhận mật khẩu" v-model:value="confirm_password" />
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12 d-grid d-sm-flex justify-content-sm-end mx-auto">
          <a-button class="me-0 me-sm-2 mb-3 mb-sm-0">
            <router-link :to="{ name: 'admin-users' }">
              <span>Hủy</span>
            </router-link>
          </a-button>
          <a-button type="primary" html-type="submit">
            <span>Lưu</span>
          </a-button>
        </div>
      </div>
    </a-card>
  </form>
</template>

<script>
import axios from "axios";
import { defineComponent, ref, reactive, toRefs } from "vue";
import { useMenu } from "../../../stores/use-menu.js";
export default defineComponent({
  setup() {
    useMenu().onSelectedKeys(["admin-users"]);

    const departments = ref([]);
    const userStatus = ref([]);
    const user = reactive({
        name: "",
        username: "",
        email: "",
        password: "",
        confirm_password: "",
        department_id: "",
        status_id: "",
    });
    const getUserCreate = () => {
      axios
        .get("http://127.0.0.1:8000/api/v1/users/create")
        .then((res) => {
          departments.value = res.data.departments;
          userStatus.value = res.data.userStatus;
        })
        .catch((error) => {
          console.log(error);
        });
    };
    getUserCreate();
    const filterOption = (input, option) => {
      return option.title.toLowerCase().indexOf(input.toLowerCase()) >= 0;
    };
    const errors = ref([]);
    const createUser = () => {
        axios.post('http://127.0.0.1:8000/api/v1/users/store', user)
        .then((res) => {
            console.log(res)
        }).catch(error => {
            console.log(error)
            errors.value = error.response.data.errors;
        });
    }

    return {
      departments,
      userStatus,
      filterOption,
      ...toRefs(user),
      createUser,
      errors,
    };
  },
});
</script>

<style scoped>
.input-danger{
    border:1px solid red;
}
.select-danger{
    border:1px solid red;
}
</style>
