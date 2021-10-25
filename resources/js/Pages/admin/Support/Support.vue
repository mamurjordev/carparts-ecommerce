<template>
    <AdminLayout>
        <div
            class="relative min-w-0 break-words w-full mb-6 shadow-lg rounded bg-white overflow-hidden"
        >
            <section class="pb-5 px-5">
                <div class="capitalize font-semibold text-xl py-5">
                    Support-Tickets
                    <div
                        class="text-sm font-normal text-gray-600 space-x-2 mt-2"
                    >
                        <span class="inline-block"
                            >Ticket von diesem Kontakt</span
                        >
                        <span class="inline-block"
                            ><i class="fas fa-circle mr-2"></i
                            >emrah19830418@gmail.com</span
                        >
                        <span class="inline-block"
                            ><i class="fas fa-circle mr-2"></i
                            >carparts-point.at</span
                        >
                    </div>
                </div>
                <table class="table-auto w-full">
                    <thead class="text-left text-sm">
                        <th class="font-normal">Status</th>
                        <th class="font-normal pl-5">Fahrkarte</th>
                    </thead>
                    <tbody>
                        <tr class="border-t border-b border-gray-200 h-20">
                            <td>
                                <div
                                    class="bg-red-200 rounded text-center capitalize w-48"
                                >
                                    Öffnen
                                </div>
                            </td>
                            <td class="text-gray-700 pl-5">
                                <div class="font-semibold">
                                    <span class="text-gray-500 mr-4">#701</span
                                    >This is a ticket title
                                </div>
                                <div class="text-sm text-gray-600 space-x-2">
                                    <span class="inline-block"
                                        >emrah19830418@gmail.com</span
                                    >
                                    <span class="inline-block">
                                        <i class="fas fa-circle mr-2"></i>
                                        Hergestellt in 19 Jul, 2020</span
                                    >
                                    <span class="inline-block">
                                        <i class="fas fa-circle mr-2"></i>Letzte
                                        Aktivität 2 days ago</span
                                    >
                                </div>
                            </td>
                        </tr>
                        <tr class="border-t border-b border-gray-200 h-20">
                            <td>
                                <div
                                    class="bg-red-200 rounded text-center capitalize w-48"
                                >
                                    Öffnen
                                </div>
                            </td>
                            <td class="text-gray-700 pl-5">
                                <div class="font-semibold">
                                    <span class="text-gray-500 mr-4">#701</span
                                    >This is a ticket title
                                </div>
                                <div class="text-sm text-gray-600 space-x-2">
                                    <span class="inline-block"
                                        >emrah19830418@gmail.com</span
                                    >
                                    <span class="inline-block">
                                        <i class="fas fa-circle mr-2"></i>
                                        Hergestellt in 19 Jul, 2020</span
                                    >
                                    <span class="inline-block">
                                        <i class="fas fa-circle mr-2"></i>Letzte
                                        Aktivität 2 days ago</span
                                    >
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </section>
        </div>
    </AdminLayout>
</template>

<script>
import AdminLayout from "@/Layouts/AdminLayout";
export default {
    components: {
        AdminLayout
    }
};
</script>
