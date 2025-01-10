<template>
    <div class="box flex items-center justify-center">
        <div class="w-[900px] rounded-lg p-8 shadow-lg lg:col-span-3 lg:p-12">
            <form action="#" method="post" class="space-y-4">
                <div>
                    <label class="sr-only" for="name">Name</label>
                    <input
                        class="w-full rounded-lg border border-gray-300 p-3 text-sm"
                        placeholder="Name"
                        type="text"
                        id="name"
                    />
                </div>

                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                    <div>
                        <label class="sr-only" for="email">Email</label>
                        <input
                            class="w-full rounded-lg border border-gray-300 p-3 text-sm"
                            placeholder="Email address"
                            type="email"
                            id="email"
                        />
                    </div>

                    <div>
                        <label class="sr-only" for="phone">Phone</label>
                        <input
                            class="w-full rounded-lg border border-gray-300 p-3 text-sm"
                            placeholder="Phone Number"
                            type="tel"
                            id="phone"
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
                        />
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
};
</script>
