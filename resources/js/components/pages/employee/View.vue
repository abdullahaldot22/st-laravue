<template>
    <div class="">test</div>
    {{ employee }}
</template>

<script>
export default {
    name: "View",
    computed : {
        employee : function (params) {
            return this.$store.getters['employee/show'];
        }
    },
    mounted() {
        this.$store.dispatch('employee/show', this.$route.params.id);
    }
}
</script>

<style scoped></style>
