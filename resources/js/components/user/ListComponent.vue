<template>
    <!--    <div class="mt-10 mb-10">-->
    <!--        <router-link :to="{name : 'user.add'}"-->
    <!--                     class="w-full border border-amber-500 max-w-[250px] py-3 rounded-2xl p-10 capitalize text-base font-medium leading-6 mt-10 text-center bg-primary text-black">-->
    <!--            + Add User-->
    <!--        </router-link>-->
    <!--    </div>-->

    <div class="mt-10 mb-10">
        <button @click.prevent="add"
                class="w-full border border-amber-500 max-w-[250px] py-3 rounded-2xl p-10 capitalize text-base font-medium leading-6 mt-10 text-center bg-primary text-black">
            + Add User
        </button>
    </div>

    <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Name
                </th>
                <th scope="col" class="px-6 py-3">
                    Email
                </th>
                <th scope="col" class="px-6 py-3">
                    Phone
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="user in users" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ user.name }}</td>
                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ user.email }}</td>
                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ user.phone }}</td>
                <td class="inline-flex px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    <router-link class="h-10 bg-green-500 rounded-md p-2 m-1"
                                 :to="{name : `user.view`, params:{id : user.id}}">
                        view
                    </router-link>

<!--                    <router-link class=" h-10 bg-yellow-500 rounded-md p-2 m-1"-->
<!--                                 :to="{name : `user.edit`, params:{id : user.id}}">-->
<!--                        edit-->
<!--                    </router-link>-->

                    <button @click.prevent="edit(user)" class=" h-10 bg-yellow-500 rounded-md p-2 m-1">
                        edit
                    </button>
                </td>
            </tr>
            </tbody>
        </table>
    </div>

    <div id="modal" class="modal" data-modal="modal">
        <div class="modal-dialog">
            <div class="modal-header">
                <h3 class="modal-title">user</h3>
                <button class="modal-close text-xl text-slate-400 hover:text-red-500" @click="reset">X</button>
            </div>
            <div class="modal-body">
                <form @submit.prevent="save">
                    <div class="flex flex-col mb-3">
                        <label class="text-lg" for="name">Name</label>
                        <input v-model="props.form.name" :class="errors.name ? '!border-red-700' : ''"
                               class="border p-1 rounded-md border-blue-500 h-9" type="text" id="name">
                        <p :class="errors.name ? 'text-red-700' : ''" v-if="errors.name">{{ errors.name[0] }}</p>
                    </div>

                    <div class="flex flex-col mb-3">
                        <label class="text-lg" for="email">Email</label>
                        <input v-model="props.form.email" :class="errors.email ? '!border-red-700' : ''"
                               class="border p-1 rounded-md border-blue-500 h-9" type="email" id="email">
                        <p :class="errors.email ? 'text-red-700' : ''" v-if="errors.email">{{ errors.email[0] }}</p>
                    </div>

                    <div class="flex flex-col mb-3">
                        <label class="text-lg" for="phone">Phone</label>
                        <input v-model="props.form.phone" :class="errors.phone ? '!border-red-700' : ''"
                               class="border p-1 rounded-md border-blue-500 h-9" type="text" id="phone">
                        <p :class="errors.phone ? 'text-red-700' : ''" v-if="errors.phone">{{ errors.phone[0] }}</p>
                    </div>

                    <div class="flex flex-col mb-3">
                        <label class="text-lg" for="password">Password</label>
                        <input v-model="props.form.password" :class="errors.password ? '!border-red-700' : ''"
                               class="border p-1 rounded-md border-blue-500 h-9" type="password" id="password">
                        <p :class="errors.password ? 'text-red-700' : ''" v-if="errors.password">{{
                                errors.password[0]
                            }}</p>
                    </div>

                    <div class="flex flex-col mb-3">
                        <button class="bg-blue-500 h-10 rounded-md text-white" type="submit">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


</template>
<script>
import router from "../../router/index.js";
import appService from "../../services/appService.js";

export default {
    name: "ListComponent",
    data() {
        return {
            props: {
                form: {
                    name: null,
                    email: null,
                    phone: null,
                    password: null
                },
                search: {
                    paginate: 0,
                    per_page: 10,
                    order_column: "id",
                    order_type: "desc"
                }
            },
            errors: {},
        }
    },
    computed: {
        users: function () {
            return this.$store.getters['user/lists'];
        }
    },
    mounted() {
        this.$store.dispatch('user/lists', this.props.search);
    },
    methods: {
        reset: function () {
            appService.modalHide('#modal');
            this.errors              = {};
            this.props.form.name     = null;
            this.props.form.email    = null;
            this.props.form.phone    = null;
            this.props.form.password = null;
        },
        add: function () {
            appService.modalShow('#modal');
        },
        edit: function(user) {
            appService.modalShow('#modal');
            this.$store.dispatch('user/temp', user.id);
            this.props.form.name = user.name;
            this.props.form.email = user.email;
            this.props.form.phone = user.phone;
        },
        save: function () {
            try {
                this.$store.dispatch('user/save', this.props).then(res => {
                    this.reset();
                }).catch((err) => {
                    this.errors = err.response.data.errors;
                })
            } catch (err) {
                console.log(err);
            }
        }
    }
}
</script>
