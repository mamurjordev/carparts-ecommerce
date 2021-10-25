<template>
    <div class="">
        <side-bar />
        <main class="main-content mt-1 border-radius-lg">
            <nav-bar />
            <div class="container-fluid py-4">
                <info-card />
                <div class="mt-5">
                    <slot />
                </div>
                <footer-vue />
            </div>
        </main>
    </div>
</template>

<script>
import sideBar from "@/Components/Admin/Sidebar";
import navBar from "@/Components/Admin/NavBar";
import infoCard from "@/Components/Admin/infoCard";
import footerVue from "@/Components/Admin/Footer";
export default {
    components: {
        sideBar,
        navBar,
        infoCard,
        footerVue
    }
};
</script>
