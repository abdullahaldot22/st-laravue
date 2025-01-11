<template>
    <div class="w-[400px] mx-auto mt-6">
        <div class="text-2xl mb-3">{{ status ? 'Edit' : 'Create' }} user</div>

        <div class="mb-5">
            <router-link to="/">Back to the user -></router-link>
        </div>
        <form @submit.prevent="save">
            <div class="flex flex-col mb-3">
                <label class="text-lg" for="name">Name</label>
                <input v-model="form.name" :class="errors.name ? '!border-red-700' : ''"
                       class="border p-1 rounded-md border-blue-500 h-9" type="text" id="name">
                <p :class="errors.name ? 'text-red-700' : ''" v-if="errors.name">{{ errors.name[0] }}</p>
            </div>

            <div class="flex flex-col mb-3">
                <label class="text-lg" for="email">Email</label>
                <input v-model="form.email" :class="errors.email ? '!border-red-700' : ''"
                       class="border p-1 rounded-md border-blue-500 h-9" type="email" id="email">
                <p :class="errors.email ? 'text-red-700' : ''" v-if="errors.email">{{ errors.email[0] }}</p>
            </div>

            <div class="flex flex-col mb-3">
                <label class="text-lg" for="phone">Phone</label>
                <input v-model="form.phone" :class="errors.phone ? '!border-red-700' : ''"
                       class="border p-1 rounded-md border-blue-500 h-9" type="text" id="phone">
                <p :class="errors.phone ? 'text-red-700' : ''" v-if="errors.phone">{{ errors.phone[0] }}</p>
            </div>

            <div class="flex flex-col mb-3">
                <label class="text-lg" for="password">Password</label>
                <input v-model="form.password" :class="errors.password ? '!border-red-700' : ''"
                       class="border p-1 rounded-md border-blue-500 h-9" type="password" id="password">
                <p :class="errors.password ? 'text-red-700' : ''" v-if="errors.password">{{ errors.password[0] }}</p>
            </div>

            <div class="flex flex-col mb-3">
                <button class="bg-blue-500 h-10 rounded-md text-white" type="submit">Save</button>
            </div>
        </form>
    </div>

</template>
<script>
import router from "../../router/index.js";

export default {
    name: "AddComponent",
    data() {
        return {
            status: false,
            form: {
                name: null,
                email: null,
                phone: null,
                password: null
            },
            errors: {},
        }
    },
    computed: {
        user: function () {
            return this.$store.getters['user/show'];
        }
    },
    beforeCreate() {
        if (this.$route.params.id) {
            this.$store.dispatch('user/show', this.$route.params.id).then(res => {
                this.status     = true;
                this.form.name  = res.data.data.name;
                this.form.email = res.data.data.email;
                this.form.phone = res.data.data.phone;
            }).catch(err => {
                this.$router.push('/');
            });
        }
    },
    methods: {
        save: function () {
            this.$store.dispatch('user/save', {form : this.form, id: this.$route.params.id}).then(res => {
                this.errors        = {};
                this.form.name     = null;
                this.form.email    = null;
                this.form.phone    = null;
                this.form.password = null;
                router.push('/');
            }).catch((err) => {
                this.errors = err.response.data.errors;
            })
        }
    }
}
</script>
