const LayoutAdmin = () => import("../layouts/LayoutAdmin.vue");

const admin = [
    {
        // layout bố cục
        path: "/admin",
        component: LayoutAdmin,
        // thư mục con
        children: [
            {
                path: "users",
                name: "admin-users",
                component: () => import("../pages/admin/users/UserIndex.vue")

            },
            {
                path: "roles",
                name: "admin-roles",
                component: () => import("../pages/admin/roles/RoleIndex.vue")

            },
            {
                path: "settings",
                name: "admin-settings",
                component: () => import("../pages/admin/settings/SettingIndex.vue")

            }
        ]

    }
]
export default admin;