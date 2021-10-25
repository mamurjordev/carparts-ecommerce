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
                    >The online store name</label
                >
                <input
                    class="form-control"
                    type="text"
                    v-model="form.store_name"
                    id="storeName"
                />
            </div>
            <div class="form-group">
                <label for="slogan" class="form-control-label"
                    >Subtitle/slogan</label
                >
                <input
                    class="form-control"
                    type="search"
                    v-model="form.slogan"
                    id="slogan"
                />
            </div>
            <div class="form-group">
                <label for="storeLabel" class="form-control-label"
                    >The online store label</label
                >
                <input
                    class="form-control"
                    type="email"
                    v-model="form.store_label"
                    id="storeLabel"
                />
            </div>
            <div class="form-group">
                <label for="headlineMainPage" class="form-control-label"
                    >Headline H1 of the main page</label
                >
                <input
                    class="form-control"
                    type="url"
                    v-model="form.headlineMainPage"
                    id="headlineMainPage"
                />
            </div>
            <button type="submit" class="btn btn-primary">
                Submit
            </button>
        </form>
    </admin-layout>
</template>

<script>
import adminLayout from "@/Layouts/AdminLayout";
export default {
    props: ["seo"],
    components: {
        adminLayout
    },
    data() {
        return {
            form: {
                store_name: "",
                slogan: "",
                store_label: "",
                headlineMainPage: ""
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
            this.$inertia.post("/admin/setting/seo", this.form);
        }
    },
    created() {
        if (this.seo) {
            this.form.store_name = this.seo.store_name;
            this.form.slogan = this.seo.slogan;
            this.form.store_label = this.seo.store_label;
            this.form.headlineMainPag = this.seo.headlineMainPag;
        }
    }
};
</script>
