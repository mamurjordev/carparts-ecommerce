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
                        <h5 class="font-bold text-gray-800">
                            SEITENEINSTELLUNGEN
                        </h5>
                        <!-- navs -->
                        <div class="text-sm">
                            <div
                                class="flex flex-col text-green-600 font-medium space-y-4 mt-6"
                            >
                                <div
                                    @click="component = 'SiteSettings'"
                                    :class="
                                        component == 'SiteSettings'
                                            ? 'bg-green-100 border-2 border-green-400'
                                            : ''
                                    "
                                    class="cursor-pointer hover:bg-green-100 border-2 border-gray-100 hover:border-green-400 w-full px-2 py-1"
                                >
                                    SEITENEINSTELLUNGEN
                                </div>
                            </div>
                            <div
                                class="flex flex-col text-green-600 font-medium space-y-4 mt-6"
                            >
                                <div
                                    @click="component = 'SiteInformation'"
                                    :class="
                                        component == 'SiteInformation'
                                            ? 'bg-green-100 border-2 border-green-400'
                                            : ''
                                    "
                                    class="cursor-pointer hover:bg-green-100 border-2 border-gray-100 hover:border-green-400 px-2 py-1 w-full"
                                >
                                    INFORMATION
                                </div>
                            </div>
                            <div
                                class="flex flex-col text-green-600 font-medium space-y-4 mt-6"
                            >
                                <div
                                    @click="component = 'Socials'"
                                    :class="
                                        component == 'Socials'
                                            ? 'bg-green-100 border-2 border-green-400'
                                            : ''
                                    "
                                    class="cursor-pointer hover:bg-green-100 border-2 border-gray-100 hover:border-green-400 px-2 py-1 w-full"
                                >
                                    SOZIALE
                                </div>
                            </div>
                            <div
                                class="flex flex-col text-green-600 font-medium space-y-4 mt-6"
                            >
                                <div
                                    @click="component = 'suppliers'"
                                    :class="
                                        component == 'suppliers'
                                            ? 'bg-green-100 border-2 border-green-400'
                                            : ''
                                    "
                                    class="cursor-pointer hover:bg-green-100 border-2 border-gray-100 hover:border-green-400 px-2 py-1 w-full"
                                >
                                    Lieferanten
                                </div>
                            </div>
                            <div
                                class="flex flex-col text-green-600 font-medium space-y-4 mt-6"
                            >
                                <div
                                    @click="component = 'Invoice'"
                                    :class="
                                        component == 'Invoice'
                                            ? 'bg-green-100 border-2 border-green-400'
                                            : ''
                                    "
                                    class="cursor-pointer hover:bg-green-100 border-2 border-gray-100 hover:border-green-400 px-2 py-1 w-full"
                                >
                                    Fakturierung
                                </div>
                            </div>
                            <div
                                class="flex flex-col text-green-600 font-medium space-y-4 mt-6"
                            >
                                <div
                                    @click="component = 'BankAccount'"
                                    :class="
                                        component == 'BankAccount'
                                            ? 'bg-green-100 border-2 border-green-400'
                                            : ''
                                    "
                                    class="cursor-pointer hover:bg-green-100 border-2 border-gray-100 hover:border-green-400 px-2 py-1 w-full"
                                >
                                    Bankkonto
                                </div>
                            </div>
                            <div
                                class="flex flex-col text-green-600 font-medium space-y-4 mt-6"
                            >
                                <div
                                    @click="component = 'Seo'"
                                    :class="
                                        component == 'Seo'
                                            ? 'bg-green-100 border-2 border-green-400'
                                            : ''
                                    "
                                    class="cursor-pointer hover:bg-green-100 border-2 border-gray-100 hover:border-green-400 px-2 py-1 w-full"
                                >
                                    SEO
                                </div>
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
import SiteSettings from "@/Components/Admin/Settings/SiteSettings";
import Socials from "@/Components/Admin/Settings/Socials";
import SiteInformation from "@/Components/Admin/Settings/SiteInformation";
import Suppliers from "@/Components/Admin/Settings/Suppliers";
import Invoice from "@/Components/Admin/Settings/Invoice";
import BankAccount from "@/Components/Admin/Settings/BankAccount";
import Seo from "@/Components/Admin/Settings/Seo";
export default {
    components: {
        adminLayout,
        SiteSettings,
        Socials,
        SiteInformation,
        Suppliers,
        Invoice,
        BankAccount,
        Seo
    },
    data() {
        return {
            component: "SiteSettings"
        };
    }
};
</script>
