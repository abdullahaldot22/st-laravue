import Stuff from '@/components/pages/stuff/Index.vue';
import List from '@/components/pages/stuff/List.vue';
// import Add from '@/components/pages/user/Add.vue';
// import Edit from '@/components/pages/user/Edit.vue';
// import View from '@/components/pages/user/View.vue';

export default [
    {
        path : "/stuff",
        name : "stuff",
        component : Stuff,
        children : [
            {
                path : "",
                name : "stuff.list",
                component : List
            },
            // {
            //     path : "add",
            //     name : "user.add",
            //     component : Add
            // },
            // {
            //     path : "edit/:id",
            //     name : "user.edit",
            //     component : Add,
            // },
            // {
            //     path : ":id",
            //     name : "user.view",
            //     component : View
            // },

        ]
    }
]
