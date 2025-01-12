<template>
    <div class="box flex items-center justify-center">
        <div class="w-[900px] rounded-lg p-8 shadow-lg lg:col-span-3 lg:p-12">
            <h2 class="pb-6 text-3xl font-bold">{{ status ? 'Edit' : 'Create' }} User</h2>
            <form action="#" method="post" class="space-y-4" @submit.prevent="save">
                <div>
                    <label class="text-gray-500 text-sm" for="name">Name</label>
                    <input
                        class="w-full mt-2 rounded-lg border border-gray-300 p-3 text-sm"
                        placeholder="Name"
                        type="text"
                        id="name"
                        v-model="form.name"
                    />
                    <p :class="errors.name ? 'text-red-700 text-xs mt-1' : ''" v-if="errors.name">{{ errors.name[0] }}</p>
                </div>

                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                    <div>
                        <label class="text-gray-500 text-sm" for="email">Email</label>
                        <input
                            class="w-full mt-2 rounded-lg border border-gray-300 p-3 text-sm"
                            placeholder="Email address"
                            type="email"
                            id="email"
                            v-model="form.email"
                        />
                        <p :class="errors.email ? 'text-red-700 text-xs mt-1' : ''" v-if="errors.email">{{ errors.email[0] }}</p>
                    </div>

                    <div>
                        <label class="text-gray-500 text-sm" for="phone">Phone</label>
                        <input
                            class="w-full mt-2 rounded-lg border border-gray-300 p-3 text-sm"
                            placeholder="Phone Number"
                            type="tel"
                            id="phone"
                            v-model="form.phone"
                        />
                        <p :class="errors.phone ? 'text-red-700 text-xs mt-1' : ''" v-if="errors.phone">{{ errors.phone[0] }}</p>
                    </div>
                </div>

                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                    <div>
                        <label class="text-gray-500 text-sm" for="dob">Date of Birth</label>
                        <input
                            class="w-full mt-2 rounded-lg border border-gray-300 p-3 text-sm"
                            placeholder="Date of Birth"
                            type="date"
                            id="dbo"
                            v-model="form.dob"
                        />
                        <p :class="errors.dob ? 'text-red-700 text-xs mt-1' : ''" v-if="errors.dob">{{ errors.dob[0] }}</p>
                    </div>
                </div>

                <div class="mt-4">
                    <button
                        type="submit"
                        class="inline-block w-full rounded-lg bg-black px-5 py-3 font-medium text-white sm:w-auto"
                    >
                        Send Enquiry
                    </button>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
export default {
    name: "Add",
    data () {
        return {
            status : false,
            form : {
                name : null,
                email: null,
                phone: null,
                dob  : null,
            },
            errors : {},
        }
    },
    computed: {
        user: function () {
            return this.$store.getters['user/show'];
        }
    },
    methods : {
        save: function () {
            if (this.$route.params.id) {
                this.$store.dispatch('user/temp', this.user.id);
            }
            this.$store.dispatch('user/save', {form : this.form, id: this.$route.params.id}).then(res => {
                this.errors     = {};
                this.form.name  = null;
                this.form.email = null;
                this.form.phone = null;
                this.form.dob   = null;
                this.$router.push('/user');
            }).catch((err) => {
                this.errors = err.response.data.errors;
            })
        },
        formatDate : function (date) {
            let   timestamp = new Date(date);
            const year      = timestamp.getFullYear();
            const month     = String(timestamp.getMonth() + 1).padStart(2, '0');  // Months are 0-based
            const day       = String(timestamp.getDate()).padStart(2, '0');
            return `${year}-${month}-${day}`;
        } ,
    }, 
    beforeCreate() {
        if (this.$route.params.id) {
            this.$store.dispatch('user/show', this.$route.params.id).then(res => {
                this.status     = true;
                this.form.name  = res.data.data.name;
                this.form.email = res.data.data.email;
                this.form.phone = res.data.data.phone;
                this.form.dob   = this.formatDate(res.data.data.dob);
            }).catch(err => {
                this.$router.push('/');
            });
        }
    },
};
</script>
