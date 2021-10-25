<template>
    <admin-layout>
        <div
            v-if="success"
            class="alert alert-success alert-dismissible fade show"
            role="alert"
        >
            <span class="alert-icon"><i class="ni ni-like-2"></i></span>
            <span class="alert-text"
                ><strong>Success!</strong> {{ success }}!</span
            >
            <button
                type="button"
                class="btn-close"
                data-bs-dismiss="alert"
                aria-label="Close"
            >
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form @submit.prevent="submit">
            <div class="form-group">
                <label for="storeName" class="form-control-label"
                    >Category name</label
                >
                <input
                    class="form-control"
                    type="text"
                    v-model="form.assemblyGroupName"
                    id="storeName"
                />
                <div v-if="errors.assemblyGroupName" class="text-danger">
                    {{ errors.assemblyGroupName }}
                </div>
            </div>
            <div class="form-group">
                <label class="form-control-label">Parent category</label>
                <select
                    v-model="form.parentNodeId"
                    class="form-select"
                    aria-label="Default select example"
                >
                    <option selected value="">Select parent category</option>
                    <option
                        v-for="(category, index) in categories"
                        :key="index"
                        :value="category.assemblyGroupNodeId"
                        >{{ category.assemblyGroupName }}</option
                    >
                </select>
            </div>
            <!-- <div class="form-group">
                <label class="form-control-label">Select language</label>
                <select
                    v-model="form.lang"
                    class="form-select"
                    aria-label="Default select example"
                >
                    <option selected value="">Select language</option>
                    <option
                        v-for="(language, index) in languages"
                        :key="index"
                        :value="language.languageCode"
                        >{{ language.languageName }}</option
                    >
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
            </div> -->
            <button type="submit" class="btn btn-primary">
                Submit
            </button>
        </form>
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
