<template>
    <admin-layout>
        <div class="w-full px-4">
            <div
                class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-gray-100 border-0"
            >
                <div class="rounded-t bg-white mb-0 px-6 py-6">
                    <div class="text-center flex justify-between">
                        <h6 class="text-gray-700 text-xl font-bold">
                            Edit Page
                        </h6>
                        <inertia-link
                            class="bg-green-500 text-white active:bg-pink-600 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-150"
                            as="button"
                            :href="$route('admin.pages.index')"
                        >
                            Page lists
                        </inertia-link>
                    </div>
                </div>
                <div
                    v-if="success"
                    class="mt-5 mx-10 bg-green-300 px-5 rounded py-2"
                >
                    {{ success }}
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
                                        Name
                                    </label>
                                    <input
                                        :disabled="name == 0"
                                        type="text"
                                        class="border-0 disabled:cursor-not-allowed px-3 py-3 placeholder-gray-300 text-gray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring-0 w-full ease-linear transition-all duration-150"
                                        v-model="form.name"
                                    />
                                    <p v-if="errors.name" class="text-red-700">
                                        *{{ errors.name }}
                                    </p>
                                </div>
                            </div>
                            <div class="w-full px-4">
                                <div class="relative w-full mb-3">
                                    <label
                                        class="block uppercase text-gray-600 text-xs font-bold mb-2"
                                        htmlFor="grid-password"
                                    >
                                        Title
                                    </label>
                                    <input
                                        type="text"
                                        class="border-0 px-3 py-3 placeholder-gray-300 text-gray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring-0 w-full ease-linear transition-all duration-150"
                                        v-model="form.title"
                                    />
                                    <p v-if="errors.title" class="text-red-700">
                                        *{{ errors.title }}
                                    </p>
                                </div>
                            </div>
                            <div class="w-full px-4">
                                <div class="relative w-full mb-3">
                                    <label
                                        class="block uppercase text-gray-600 text-xs font-bold mb-2"
                                        htmlFor="grid-password"
                                    >
                                        Image
                                    </label>
                                    <input
                                        type="file"
                                        class="border-0 px-3 py-3 placeholder-gray-300 text-gray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring-0 w-full ease-linear transition-all duration-150"
                                        @change="image"
                                    />
                                </div>
                            </div>
                            <div class="w-full px-4">
                                <div class="relative w-full mb-3">
                                    <label
                                        class="block uppercase text-gray-600 text-xs font-bold mb-2"
                                        htmlFor="grid-password"
                                    >
                                        Content
                                    </label>
                                    <vue-editor
                                        class="px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:shadow-outline w-full ease-linear transition-all duration-150"
                                        v-model="form.content"
                                        :editorToolbar="customToolbar"
                                    ></vue-editor>
                                    <p
                                        v-if="errors.content"
                                        class="text-red-700"
                                    >
                                        *{{ errors.content }}
                                    </p>
                                </div>
                            </div>
                            <div class="w-full px-4">
                                <div class="relative w-full mb-3">
                                    <label
                                        class="block uppercase text-gray-600 text-xs font-bold mb-2"
                                        htmlFor="grid-password"
                                    >
                                        Status
                                    </label>
                                    <select
                                        v-model="form.status"
                                        class="border-0 px-3 py-3 placeholder-gray-300 text-gray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring-0 w-full ease-linear transition-all duration-150"
                                    >
                                        <option value="publish">Publish</option>
                                        <option value="pending">Pending</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <button
                            class="bg-green-600 px-10 py-2 text-white font-semibold mt-10 mx-4 hover:shadow-xl"
                            type="submit"
                        >
                            Submit
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </admin-layout>
</template>

<script>
import adminLayout from "@/Layouts/AdminLayout";
import { VueEditor } from "vue2-editor";
export default {
    props: ["page", "errors"],
    components: {
        adminLayout,
        VueEditor
    },
    data() {
        return {
            form: {
                _method: "post",
                name: "",
                title: "",
                image: null,
                content: "",
                status: "publish"
            },
            name: 1,
            customToolbar: [
                [{ header: [1, 2, 3, 4, 5, 6, false] }],
                [{ size: ["small", false, "large", "huge"] }],
                [{ header: 1 }, { header: 2 }],
                ["bold", "italic", "underline", "strike"],
                [
                    { align: "" },
                    { align: "center" },
                    { align: "right" },
                    { align: "justify" }
                ],
                [{ font: [] }],
                ["blockquote", "code-block"],
                [{ list: "ordered" }, { list: "bullet" }, { list: "check" }],
                [{ indent: "-1" }, { indent: "+1" }],
                [{ color: [] }, { background: [] }],
                [{ direction: "rtl" }]
            ]
        };
    },
    computed: {
        success() {
            return this.$page.props.flash.success;
        }
    },
    methods: {
        submit() {
            if (this.page) {
                this.$inertia.post("/admin/pages/" + this.page.id, this.form);
            } else {
                this.$inertia.post("/admin/pages", this.form);
            }
        },
        image(e) {
            this.form.image = e.target.files[0];
        }
    },
    created() {
        if (this.page) {
            this.form._method = "put";
            this.form.name = this.page.name;
            this.form.title = this.page.title;
            this.form.content = this.page.content;
            this.form.status = this.page.status;
            this.name = this.page.deletable;
            this.form.status = this.page.status;
        }
    }
};
</script>
