<template>
    đây là trang quản lý setting
</template>

<script>
import { useMenu } from "../../../stores/use-menu.js"
export default {
    setup() {
        useMenu().onSelectedKeys(["admin-settings"]);
    }
}    
</script>