<template>
    <admin-layout>
        <div class="flex flex-wrap mt-4">
            <div class="w-full mb-12">
                <div
                    class="relative min-w-0 break-words w-full mb-6 shadow-lg rounded bg-white overflow-hidden"
                >
                    <!-- Chart -->
                    <LineVue />
                </div>
            </div>
        </div>
    </admin-layout>
</template>

<script>
import adminLayout from "@/Layouts/AdminLayout";
import LineVue from "@/Components/Admin/Charts/Line";
export default {
    components: {
        adminLayout,
        LineVue
    },
    data() {
        return {
            line: {}
        };
    }
};
</script>
