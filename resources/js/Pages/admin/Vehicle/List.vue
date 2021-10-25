<template>
    <admin-layout>
        <div class="flex flex-wrap mt-4">
            <div class="w-full mb-12 px-4">
                <div
                    class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded bg-white"
                >
                    <div class="rounded-t mb-0 px-4 py-3 border-0">
                        <div class="flex flex-wrap items-center">
                            <div
                                class="relative w-full px-4 max-w-full flex-grow flex-1"
                            >
                                <h3
                                    class="font-semibold text-lg text-blueGray-700"
                                >
                                    Fahrzeuglisten
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="block w-full overflow-x-auto">
                        <!-- Projects table -->
                        <table
                            class="items-center w-full bg-transparent border-collapse"
                        >
                            <thead>
                                <tr>
                                    <th
                                        class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100"
                                    >
                                        Hersteller
                                    </th>
                                    <th
                                        class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100"
                                    >
                                        Modellname
                                    </th>
                                    <th
                                        class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-right bg-blueGray-50 text-blueGray-500 border-blueGray-100"
                                    >
                                        Aktion
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr
                                    v-for="(vehicle, index) in vehicles.data"
                                    :key="index"
                                >
                                    <th
                                        class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left flex items-center"
                                    >
                                        {{ vehicle.manuName }}
                                    </th>
                                    <td
                                        class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"
                                    >
                                        {{
                                            vehicle.modelName +
                                                " " +
                                                vehicle.typeName
                                        }}
                                    </td>
                                    <td
                                        class="relative border-t-0 px-6 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4 text-right"
                                    >
                                        <inertia-link
                                            :href="
                                                $route(
                                                    'admin.vehicles.edit',
                                                    vehicle.carId
                                                )
                                            "
                                            class=""
                                        >
                                            <i class="fas fa-edit"></i>
                                        </inertia-link>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- Pagination -->
                    <Pagination
                        :from="vehicles.from"
                        :to="vehicles.to"
                        :total="vehicles.total"
                        :links="vehicles.links"
                        :previous="vehicles.prev_page_url"
                        :next="vehicles.next_page_url"
                    />
                </div>
            </div>
        </div>
    </admin-layout>
</template>

<script>
import adminLayout from "@/Layouts/AdminLayout";
import Pagination from "@/Components/Admin/Pagination";
export default {
    props: ["vehicles"],
    components: {
        adminLayout,
        Pagination
    }
};
</script>
