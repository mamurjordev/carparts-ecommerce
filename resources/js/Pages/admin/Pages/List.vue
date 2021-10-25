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
                                class="relative flex justify-between w-full px-4 max-w-full flex-grow flex-1"
                            >
                                <h3
                                    class="font-semibold text-lg text-blueGray-700"
                                >
                                    Seitenlisten
                                </h3>
                                <inertia-link
                                    as="button"
                                    :href="route('admin.pages.create')"
                                    class="bg-green-700 text-white font-bold px-3 rounded"
                                    >Erstellen</inertia-link
                                >
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
                                        Name
                                    </th>
                                    <th
                                        class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100"
                                    >
                                        Titel
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
                                    v-for="(page, index) in pages.data"
                                    :key="index"
                                >
                                    <th
                                        class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left flex items-center"
                                    >
                                        {{ page.name }}
                                    </th>
                                    <td
                                        class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"
                                    >
                                        {{ page.title }}
                                    </td>
                                    <td
                                        class="flex justify-end space-x-5 border-t-0 px-6 align-middle border-l-0 border-r-0 whitespace-nowrap p-4 text-right"
                                    >
                                        <inertia-link
                                            :href="
                                                '/admin/pages/' +
                                                    page.id +
                                                    '/edit'
                                            "
                                            class="text-blue-800"
                                        >
                                            <i class="fas fa-edit"></i>
                                        </inertia-link>
                                        <button
                                            v-if="page.deletable"
                                            class="text-red-700"
                                        >
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <Pagination
                        :from="pages.from"
                        :to="pages.to"
                        :total="pages.total"
                        :links="pages.links"
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
    props: ["pages"],
    components: {
        adminLayout,
        Pagination
    },
    data() {
        return {};
    },
    methods: {}
};
</script>
