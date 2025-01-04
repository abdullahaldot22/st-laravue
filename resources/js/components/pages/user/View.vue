<template>
    <div class="">test</div>
    {{ user }}
</template>

<script>
export default {
    name: "View",
    computed : {
        user : function (params) {
            return this.$store.getters['user/show'];
        }
    },
    mounted() {
        this.$store.dispatch('user/show', this.$route.params.id);
    }
}
</script>

<style scoped></style>
