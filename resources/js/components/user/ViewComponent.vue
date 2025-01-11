<template>
    <p>
        hello,
        <span class="font-bold">{{ user.name }}</span>
        Welcome your site
    </p>
</template>
<script>

export default {
    name : "ViewComponent",
    computed: {
        user: function() {
            return this.$store.getters['user/show'];
        }
    },
    mounted() {
        this.$store.dispatch('user/show', this.$route.params.id)
    }
}
</script>
