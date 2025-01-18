<template>
    <div class="page relative">
        <nav class="box w-full h-14 bg-[#acacac] flex items-center justify-around">
            <div class="pi">
                <div class="logo">LOGO</div>
            </div>
            <div class="pii">
                <ul class="links top flex">
                    <li>
                        <router-link active-class="mark" to="/">Home</router-link>
                    </li>
                    <li>
                        <router-link active-class="mark" to="/about">About</router-link>
                    </li>
                    <li>
                        <router-link active-class="mark" to="/user">User</router-link>
                    </li>
                    <li>
                        <router-link active-class="mark" to="/employee">Employee</router-link>
                    </li>
                    <li>
                        <router-link active-class="mark" to="/stuff">Stuff</router-link>
                    </li>
                </ul>
            </div>
            <div class="piii">
                <div class="">bar</div>
            </div>
        </nav>

        <br>
        <router-view></router-view>
        <div class="pb-20"></div>
        <footer class="w-full pt-5 pb-3 bg-[#929292] flex items-center justify-around">
            <div class="pi">LOGO</div>
            <div class="pii">
                <div class="mb-3">Links</div>
                <ul class="links flex flex-col">
                    <li class="mb-1">
                        <router-link active-class="mark" to="/">Home</router-link>
                    </li>
                    <li class="mb-1">
                        <router-link active-class="mark" to="/about">About</router-link>
                    </li>
                    <li class="mb-1">
                        <router-link active-class="mark" to="/user">User</router-link>
                    </li>
                    <li class="mb-1">
                        <router-link active-class="mark" to="/employee">Employee</router-link>
                    </li>
                    <li class="mb-1">
                        <router-link active-class="mark" to="/stuff">Stuff</router-link>
                    </li>
                </ul>
            </div>
            <div class="piii">Contact US</div>
        </footer>
    </div>
</template>

<script>
export default {
    name: "Frontend",
}
</script>

<style scoped>
.links.top li {
    text-align: center;
}
.links li{
    width: 120px;
}
.mark{
    font-weight: 600;
}
</style>
