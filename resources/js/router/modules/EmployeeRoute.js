import Employee from '@/components/pages/employee/Index.vue';
import Add from '@/components/pages/employee/Add.vue';
import Edit from '@/components/pages/employee/Edit.vue';
import List from '@/components/pages/employee/List.vue';

export default [
    {
        path : "/employee",
        name : "employee",
        component : Employee,
        children : [
            {
                path : "",
                name : "employee-list",
                component : List
            },
            {
                path : "add",
                name : "employee-add",
                component : Add
            },
            {
                path : "edit",
                name : "employee-edit",
                component : Edit
            },

        ]
    }
]
