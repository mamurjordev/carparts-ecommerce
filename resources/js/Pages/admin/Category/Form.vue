<template>
    <admin-layout>
        <div class="w-full px-4">
            <div
                class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-gray-100 border-0"
            >
                <div class="rounded-t bg-white mb-0 px-6 py-6">
                    <div class="text-center flex justify-between">
                        <h6 class="text-gray-700 text-xl font-bold">
                            Kategorie
                        </h6>
                        <inertia-link
                            class="bg-green-500 text-white active:bg-pink-600 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-150"
                            as="button"
                            :href="$route('admin.category.index')"
                        >
                            Kategorielisten
                        </inertia-link>
                    </div>
                </div>
                <div class="flex-auto px-4 lg:px-10 py-10 pt-0 mt-10">
                    <form @submit.prevent="submit">
                        <div class="flex flex-wrap">
                            <div class="w-full px-4">
                                <div class="relative w-full mb-3">
                                    <label
                                        class="block uppercase text-gray-600 text-xs font-bold mb-2"
                                        htmlFor="grid-password"
                                    >
                                        Kategoriename
                                    </label>
                                    <input
                                        type="text"
                                        class="border-0 px-3 py-3 placeholder-gray-300 text-gray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring-0 w-full ease-linear transition-all duration-150"
                                        v-model="form.assemblyGroupName"
                                    />
                                </div>
                            </div>
                            <div class="w-full px-4">
                                <div class="relative w-full mb-3">
                                    <label
                                        class="block uppercase text-gray-600 text-xs font-bold mb-2"
                                        htmlFor="grid-password"
                                    >
                                        Eltern-Kategorie
                                    </label>
                                    <select
                                        class="border-0 px-3 py-3 placeholder-gray-300 text-gray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring-0 w-full ease-linear transition-all duration-150"
                                        v-model="form.parentNodeId"
                                    >
                                        <option
                                            v-for="(category,
                                            index) in categories"
                                            :key="index"
                                            :value="
                                                category.assemblyGroupNodeId
                                            "
                                            >{{
                                                category.assemblyGroupName
                                            }}</option
                                        >
                                    </select>
                                </div>
                            </div>
                        </div>
                        <button
                            class="bg-green-600 px-10 py-2 text-white font-semibold mx-4 hover:shadow-xl"
                            type="submit"
                        >
                            Einreichen
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </admin-layout>
</template>

<script>
import adminLayout from "@/Layouts/AdminLayout";
export default {
    props: ["category", "categories", "languages", "errors"],
    components: {
        adminLayout
    },
    data() {
        return {
            form: {
                _method: "post",
                assemblyGroupName: "",
                parentNodeId: "",
                lang: "de"
            }
        };
    },
    computed: {
        success() {
            return this.$page.props.flash.success;
        }
    },
    methods: {
        submit() {
            if (this.category) {
                this.$inertia.post(
                    "/admin/category/" + this.category.assemblyGroupNodeId,
                    this.form
                );
            } else {
                this.$inertia.post("/admin/category", this.form);
            }
        }
    },
    created() {
        if (this.category) {
            this.form._method = "put";
            this.form.assemblyGroupName = this.category.assemblyGroupName;
            this.form.parentNodeId = this.category.parentNodeId;
            this.form.lang = this.category.lang;
        }
    }
};
</script>
