const LayoutAdmin = () => import("../layouts/LayoutAdmin.vue");

const admin = [
    {
        // layout bố cục
        path: "/admin",
        component: LayoutAdmin,
        // thư mục con
        children: [
            // QL users
            {
                path: "users",
                name: "admin-users",
                component: () => import("../pages/admin/users/UserIndex.vue")

            },
            {
                path: "users/create",
                name: "admin-users-create",
                component: () => import("../pages/admin/users/UserCreate.vue")

            },
            {
                path: "users/:id/edit",
                name: "admin-users-edit",
                component: () => import("../pages/admin/users/UserEdit.vue")

            },
             // QL roles
            {
                path: "roles",
                name: "admin-roles",
                component: () => import("../pages/admin/roles/RoleIndex.vue")

            },
             // QL settings
            {
                path: "settings",
                name: "admin-settings",
                component: () => import("../pages/admin/settings/SettingIndex.vue")

            }
        ]

    }
]
export default admin;