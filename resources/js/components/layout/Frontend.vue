<template>
    <div class="page relative">
        <nav class="box w-full h-14 bg-[#acacac] flex items-center justify-around">
            <div class="pi">
                <div class="logo">LOGO</div>
            </div>
            <div class="pii">
                <ul class="links flex">
                    <li>
                        <router-link active-class="mark" to="/">Home</router-link>
                    </li>
                    <li>
                        <router-link active-class="mark" to="/about">About</router-link>
                    </li>
                    <li>
                        <router-link active-class="mark" to="/employee">Employee</router-link>
                    </li>
                </ul>
            </div>
            <div class="piii">
                <div class="">bar</div>
            </div>
        </nav>

        <br>
        <router-view></router-view>
        <div class="pb-40"></div>
        <footer class="fixed bottom-0 left-0 w-full h-40 bg-[#929292] flex items-center justify-around">
            <div class="pi">One</div>
            <div class="pii">Two</div>
            <div class="piii">Three</div>
        </footer>
    </div>
</template>

<script>
export default {
    name: "Frontend",
}
</script>

<style scoped>
.links li{
    width: 80px;
}
.mark{
    font-weight: 600;
}
</style>
