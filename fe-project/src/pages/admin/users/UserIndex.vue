<template>
  <a-card title="Tài khoản" style="width: 100%" >
    <div class="row mb-3">
        <div class="col-12 d-flex justify-content-end">
            <a-Button type="primary">
              <router-link :to="{ name: 'admin-users-create' }">
                <i class="fa-solid fa-plus"></i>
              </router-link>
            </a-Button>
        </div>
    </div>
    <div class="row">
      <div class="col-12">
        <a-table :dataSource="users" :columns="columns">
          <template #bodyCell="{ column, index, record }">
            <template v-if="column.key === 'index'">
              <span>
                {{ index+1 }}
              </span>
            </template>

            <template v-if="column.key === 'status_name'">
              <span v-if="record.status_id === 1" class="text-primary"> 
                    {{ record.status_name }}
              </span>
              <span v-else-if="record.status_id === 2" class="text-danger">
                  {{ record.status_name }}
              </span>
            </template>

          </template>
        </a-table>
      </div>
    </div>
  </a-card>
</template>

<script>
import axios from "axios";
import { defineComponent, ref } from "vue";
import { useMenu } from "../../../stores/use-menu.js";
export default defineComponent({
  setup() {
    useMenu().onSelectedKeys(["admin-users"]);

    const columns = [
      // cột 0
      {
        title: "#",
        key: "index",
      },
      // cột 1
      {
        title: "Tài khoản",
        dataIndex: "email",
        key: "email",
      },
      // cột 2
      {
        title: "Họ tên",
        dataIndex: "name",
        key: "name",
      },
      // cột 3
      {
        title: "Phòng ban",
        dataIndex: "department_name",
        key: "department_name",
      },
      // cột 4
      {
        title: "Vai trò",
        dataIndex: "role_name",
        key: "role_name",
      },
      // cột 5
      {
        title: "Tình trạng",
        dataIndex: "status_name",
        key: 'status_name',
      },
    ];
    const users = ref([]);
    const getUsers = () => {
      axios
        .get("http://127.0.0.1:8000/api/v1/users")
        .then((response) => {
          // handle success
          users.value = response.data;
        })
        .catch(function (error) {
          // handle error
          console.log(error);
        });
    };
    getUsers(); // gọi nó ra;
    return {
      users,
      columns,
    };
  },
});
</script>

<style></style>
