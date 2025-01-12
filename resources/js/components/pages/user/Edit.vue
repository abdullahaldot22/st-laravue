<template>
    <div class="box flex items-center justify-center">
        <div class="w-[900px] rounded-lg p-8 shadow-lg lg:col-span-3 lg:p-12">
            <h2 class="pb-6 text-3xl font-bold">{{ status ? 'Edit' : 'Create' }} User</h2>

            <form method="post" class="space-y-4" @submit.prevent="update">
                <div>
                    <label class="text-gray-500 text-sm" for="name">Name</label>
                    <input
                        class="w-full mt-2 rounded-lg border border-gray-300 p-3 text-sm"
                        placeholder="Name"
                        type="text"
                        id="name"
                        v-model="form.name"
                    />
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
                    </div>
                </div>

                <div class="mt-4">
                    <button
                        type="submit"
                        class="inline-block w-full rounded-lg bg-black px-5 py-3 font-medium text-white sm:w-auto cursor-pointer"
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
    name : "Edit",
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
    computed : {
        user : function (params) {
            return this.$store.getters['user/show'];
        },
    },
    methods : {
        update: function () {
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
        },
        formatDate : function (date) {
            let   timestamp = new Date(date);
            const year      = timestamp.getFullYear();
            const month     = String(timestamp.getMonth() + 1).padStart(2, '0');  // Months are 0-based
            const day       = String(timestamp.getDate()).padStart(2, '0');
            return `${year}-${month}-${day}`;
        } 
    },
    mounted() {
        this.$store.dispatch('user/show', this.$route.params.id).then (response => {            
            this.form.name  = response.data.data.name;
            this.form.email = response.data.data.email;
            this.form.phone = response.data.data.phone;
            this.form.dob   = this.formatDate(response.data.data.dob);
            this.status     = true;
        });
    }
}
</script>
