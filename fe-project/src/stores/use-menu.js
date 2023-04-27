import { defineStore } from "pinia";

export const useMenu = defineStore('menuId', {
    state: () => ({ 
        // state quản lý các trạng thái
         selectedKeys: [],
         openKeys: [],
    }),
    actions: {
        onSelectedKeys(data) {
            this.selectedKeys = data
        },
        onOpenKeys(data) {
            this.openKeys = data;
        }
    }
    // refs => state, computed => getters, function() => actions
})
