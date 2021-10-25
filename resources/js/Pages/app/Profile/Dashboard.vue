<template>
    <app-layout>
        <div class="block-space block-space--layout--after-header"></div>
        <div class="block">
            <div class="container container--max--xl">
                <div class="row">
                    <sidebar />
                    <component :is="component" />
                </div>
            </div>
        </div>
        <div class="block-space block-space--layout--before-footer"></div>
    </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
import Sidebar from "@/Components/App/profile/Sidebar";
import Dashboard from "@/Components/App/Dashboard/Dashboard";
export default {
    components: {
        AppLayout,
        Sidebar,
        Dashboard
    },
    data() {
        return {
            component: "Dashboard"
        };
    }
};
</script>
