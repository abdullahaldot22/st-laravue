import User from '@/components/pages/user/Index.vue';
import Add from '@/components/pages/user/Add.vue';
import Edit from '@/components/pages/user/Edit.vue';
import List from '@/components/pages/user/List.vue';
import View from '@/components/pages/user/View.vue';

export default [
    {
        path : "/user",
        name : "user",
        component : User,
        children : [
            {
                path : "",
                name : "user.list",
                component : List
            },
            {
                path : "add",
                name : "user.add",
                component : Add
            },
            {
                path : "edit/:id",
                name : "user.edit",
                component : Add,
            },
            {
                path : ":id",
                name : "user.view",
                component : View
            },

        ]
    }
]
