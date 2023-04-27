<template>
    đây là xem danh sách role
</template>

<script>
import { useMenu } from "../../../stores/use-menu.js"
export default {
    setup() {
        useMenu().onSelectedKeys(["admin-roles"]);
    }
}    
</script>