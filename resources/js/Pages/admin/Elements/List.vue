<template>
    <admin-layout>
        <div class="flex flex-wrap mt-4">
            <div class="w-full mb-12">
                <div
                    class="relative grid grid-cols-12 min-w-0 break-words w-full mb-6 shadow-lg rounded bg-white overflow-hidden"
                >
                    <div
                        class="col-span-12 md:col-span-2 py-5 bg-gray-100 px-4"
                    >
                        <div class="font-bold text-gray-800">SITE-ELEMENTE</div>
                        <!-- navs -->
                        <div
                            class="flex flex-col text-green-600 font-medium space-y-4 mt-6"
                        >
                            <inertia-link
                                href=""
                                class="hidden hover:bg-green-100 border-2 border-gray-100 hover:border-green-400 w-max px-2 py-1"
                                >Kollektionen</inertia-link
                            >
                            <div
                                @click="component = 'HomePage'"
                                :class="
                                    component == 'HomePage'
                                        ? 'bg-green-100 border-2 border-green-400'
                                        : ''
                                "
                                class="cursor-pointer hover:bg-green-100 border-2 border-gray-100 hover:border-green-400 w-max px-2 py-1"
                            >
                                Startseite
                            </div>
                            <div
                                :class="
                                    component == 'SiteHeader'
                                        ? 'bg-green-100 border-2 border-green-400'
                                        : ''
                                "
                                class="hidden cursor-pointer hover:bg-green-100 border-2 border-gray-100 hover:border-green-400 w-max px-2 py-1"
                            >
                                Site-Header
                            </div>
                            <div
                                @click="component = 'SiteFooter'"
                                :class="
                                    component == 'SiteFooter'
                                        ? 'bg-green-100 border-2 border-green-400'
                                        : ''
                                "
                                class="cursor-pointer hover:bg-green-100 border-2 border-gray-100 hover:border-green-400 w-max px-2 py-1"
                            >
                                Site-Fußzeile
                            </div>
                        </div>
                    </div>
                    <div class="col-span-12 md:col-span-10 p-5">
                        <component :is="component" />
                    </div>
                </div>
            </div>
        </div>
    </admin-layout>
</template>

<script>
import adminLayout from "@/Layouts/AdminLayout";
import SiteFooter from "@/Components/Admin/Elements/SiteFooter";
import HomePage from "@/Components/Admin/Elements/HomePage";
export default {
    components: {
        adminLayout,
        SiteFooter,
        HomePage
    },
    data() {
        return {
            component: "HomePage"
        };
    }
};
</script>
