<template>
  <div class="box w-full flex flex-col items-center justify-center">
        <div class="container w-[1000px] pt-6">
            <div class="top mb-3 flex items-center justify-end">
                <router-link
                    class="inline-block rounded border border-indigo-600 bg-indigo-600 px-12 py-3 text-sm font-medium text-white hover:bg-transparent hover:text-indigo-600 focus:outline-none focus:ring active:text-indigo-500"
                    to="/user/add">Add User</router-link>
            </div>

            <div class="rounded-lg border border-gray-200 dark:border-gray-700">
                <div class="overflow-x-auto rounded-t-lg">
                    <table
                        class="min-w-full divide-y-2 divide-gray-200 bg-white text-sm dark:divide-gray-700 dark:bg-gray-900">
                        <thead class="ltr:text-left rtl:text-right">
                            <tr>
                                <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900 dark:text-white">
                                    Sl no.
                                </th>
                                <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900 dark:text-white">
                                    Name
                                </th>
                                <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900 dark:text-white">
                                    Email
                                </th>
                                <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900 dark:text-white">
                                    Phone
                                </th>
                                <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900 dark:text-white">
                                    Date of Birth
                                </th>
                                <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900 dark:text-white">
                                    Action
                                </th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                            <tr :key="key" v-for="(user, key) in users">
                                <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-900 dark:text-white">
                                    {{ key + 1 }} 
                                </td>
                                <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-900 dark:text-white">
                                    {{ user.name }}
                                </td>
                                <td class="whitespace-nowrap px-4 py-2 text-gray-700 dark:text-gray-200">
                                    {{ user.email }}
                                </td>
                                <td class="whitespace-nowrap px-4 py-2 text-gray-700 dark:text-gray-200">
                                    {{ user.phone }}
                                </td>
                                <td class="whitespace-nowrap px-4 py-2 text-gray-700 dark:text-gray-200">
                                    {{ user.dob }}
                                </td>
                                <td class="whitespace-nowrap px-4 py-2 text-gray-700 dark:text-gray-200">
                                    <div class="inline-flex rounded-lg border border-gray-100 bg-gray-100 p-1 dark:border-gray-800 dark:bg-gray-900">
                                        
                                        <router-link :to="{name : 'user.view', params : {id : user.id}}"
                                            class="inline-flex items-center gap-2 rounded-md hover:bg-white px-4 py-2 text-sm hover:text-blue-400 shadow-sm focus:relative dark:hover:bg-gray-800 dark:text-gray-200">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="size-4">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            </svg>
                                        </router-link>

                                        <router-link :to="{name : 'user.edit', params : {id : user.id}}"
                                            class="inline-flex items-center gap-2 rounded-md hover:bg-white px-4 py-2 text-sm hover:text-blue-400 shadow-sm focus:relative dark:hover:bg-gray-800 dark:text-gray-200">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="size-4">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                            </svg>

                                        </router-link>


                                        <button @click="this.delete(user)"
                                            class="inline-flex items-center gap-2 rounded-md hover:bg-white px-4 py-2 text-sm hover:text-blue-400 shadow-sm focus:relative dark:hover:bg-gray-800 dark:text-gray-200">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="size-4">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                            </svg>

                                        </button>
                                    </div>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>

                <div class="rounded-b-lg border-t border-gray-200 px-4 py-2 dark:border-gray-700">
                    <div class="flex justify-end gap-1 text-xs font-medium">
						<PaginateListComponent :pagination="pagination" :method="getResults"/>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</template>

<script>
import PaginateListComponent from '@/components/fregmants/PaginateListComponent.vue';

export default {
    name : 'List',
    components : {
        PaginateListComponent,
    },
    data() {
        return {
            StuffListProps: {
                paginate: 1,
                page : 1,
                per_page: '',
                order_column: "id",
                order_type: ""
            }
        }
    },
    computed : {
        stuffs : function (params) {
            return this.$store.getters['stuff/lists'];
        },
    },
    methods : {
        getResults(page = 1) {
            this.UserListProps.page = page;
            this.$store.dispatch('stuff/lists', this.StuffListProps);
        },
    },
    mounted () {
        this.getResults();
    }

}
</script>

<style>

</style>