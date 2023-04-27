<template>
  <h1>Daay la xem user</h1>
</template>

<script>
import { useMenu } from "../../../stores/use-menu.js";
export default {
  setup() {
     useMenu().onSelectedKeys(["admin-users"])
  }
}
</script>

<style>

</style>