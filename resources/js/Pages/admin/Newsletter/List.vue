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
                                    Liste der Newsletter-Abonnenten
                                </h3>
                                <div class="mt-5 flex">
                                    <inertia-link
                                        href="/admin/sendmail/newsletter"
                                        class="bg-green-600 text-gray-100 flex-grow text-center md:px-10 py-2 font-bold hover:shadow-xl"
                                    >
                                        Mail an alle schicken
                                    </inertia-link>
                                </div>
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
                                        Email
                                    </th>
                                    <th
                                        class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100"
                                    >
                                        Abonniert bei
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
                                    v-for="(content, index) in contents.data"
                                    :key="index"
                                >
                                    <th
                                        class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left flex items-center"
                                    >
                                        {{ content.email }}
                                    </th>
                                    <td
                                        class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"
                                    >
                                        {{
                                            content.created_at
                                                | moment("DD MMM YYYY")
                                        }}
                                    </td>
                                    <td
                                        class="relative border-t-0 px-6 align-middle border-l-0 border-r-0 whitespace-nowrap p-4 text-right"
                                    >
                                        <button
                                            @click="delet(content.id)"
                                            class="text-red-600  focus:ring-0 focus:outline-none"
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
                        :from="contents.from"
                        :to="contents.to"
                        :total="contents.total"
                        :links="contents.links"
                        :previous="contents.prev_page_url"
                        :next="contents.next_page_url"
                    />
                </div>
                <div class="mt-5 flex">
                    <inertia-link
                        href="/admin/sendmail/newsletter"
                        class="bg-green-600 text-gray-100 flex-grow text-center md:px-10 py-2 font-bold hover:shadow-xl"
                    >
                        Mail an alle schicken
                    </inertia-link>
                </div>
            </div>
        </div>
    </admin-layout>
</template>

<script>
import adminLayout from "@/Layouts/AdminLayout";
import Pagination from "@/Components/Admin/Pagination";
export default {
    props: ["contents"],
    components: {
        adminLayout,
        Pagination
    },
    data() {
        return {};
    },
    methods: {
        delet(id) {
            if (!confirm("Möchten Sie dies wirklich entfernen?")) return;
            this.$inertia.delete("/admin/newsletter/" + id + "/delete", {
                preserveScroll: page => Object.keys(page.props.errors).length
            });
        }
    }
};
</script>
