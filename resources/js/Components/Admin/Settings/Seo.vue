<template>
    <div class="">
        <h5 class="uppercase font-bold text-lg mb-5">SEO</h5>
        <div
            v-if="success"
            class="text-green-600 bg-green-100 px-5 rounded border border-green-400 mb-5 py-2"
        >
            {{ success }}
        </div>
        <form v-if="response" @submit.prevent="submit" class="space-y-6">
            <!-- vat -->
            <h5 class="font-semibold py-1 border-b border-gray-200 uppercase">
                ROBOTS.TXT
            </h5>
            <label
                for="vat"
                class="flex items-center py-1 cursor-pointer text-sm"
            >
                <input
                    id="vat"
                    type="checkbox"
                    class="mr-2 cursor-pointer rounded"
                    v-model="form.sitemap"
                />
                Sitemap: http://carparts-point.at/sitemap.xml
            </label>
            <div>
                <h5 class="font-semibold text-sm">
                    Standard robots.txt inhalt
                </h5>
                <p class="text-sm">
                    User-agent: * <br />
                    Disallow: /admin/ <br />
                    Allow: /
                </p>
            </div>
            <div class="flex flex-col">
                <label class="font-medium">Zusätzliche robots.txt inhalt</label>
                <textarea
                    v-model="form.robot_text"
                    class="mt-1 border border-gray-300 py-2 rounded shadow focus:ring-0 focus:border-gray-300"
                ></textarea>
                <p v-if="errors.robot_text" class="text-red-500 text-sm">
                    {{ errors.robot_text[0] }}
                </p>
            </div>
            <h5 class="uppercase font-bold text-lg mb-5">
                Name und Beschreibung des Online-Shops
            </h5>
            <div class="flex flex-col">
                <label class="font-medium">Name des Online Shops</label>
                <input
                    type="text"
                    v-model="form.site_title"
                    class="mt-1 border border-gray-300 py-2 rounded shadow focus:ring-0 focus:border-gray-300"
                />
                <p v-if="errors.site_title" class="text-red-500 text-sm">
                    {{ errors.site_title[0] }}
                </p>
            </div>
            <div class="flex flex-col">
                <label class="font-medium">Untertitel/Slogan</label>
                <input
                    type="text"
                    v-model="form.slogan"
                    class="mt-1 border border-gray-300 py-2 rounded shadow focus:ring-0 focus:border-gray-300"
                />
                <p v-if="errors.slogan" class="text-red-500 text-sm">
                    {{ errors.slogan[0] }}
                </p>
            </div>
            <div class="flex flex-col">
                <label class="font-medium">Etikett speichern</label>
                <input
                    type="text"
                    v-model="form.store_label"
                    class="mt-1 border border-gray-300 py-2 rounded shadow focus:ring-0 focus:border-gray-300"
                />
                <p v-if="errors.store_label" class="text-red-500 text-sm">
                    {{ errors.store_label[0] }}
                </p>
            </div>
            <div class="flex flex-col">
                <label class="font-medium">Titel der Hauptseite</label>
                <input
                    type="text"
                    v-model="form.main_page_title"
                    class="mt-1 border border-gray-300 py-2 rounded shadow focus:ring-0 focus:border-gray-300"
                />
                <p v-if="errors.main_page_title" class="text-red-500 text-sm">
                    {{ errors.main_page_title[0] }}
                </p>
            </div>
            <button
                :disabled="process"
                type="submit"
                class="bg-green-600 px-10 h-10 text-white mt-5 font-semibold hover:bg-green-700 hover:text-gray-50 transition flex justify-between items-center"
            >
                <img
                    src="/media/site/spinner.svg"
                    alt=""
                    :class="process ? '' : 'hidden'"
                    class="w-10"
                />
                <div :class="process ? 'block' : 'hidden'">
                    AKTUALISIERUNG...
                </div>
                <div :class="process ? 'hidden' : 'block'">AKTUALISIEREN</div>
            </button>
        </form>
    </div>
</template>

<script>
export default {
    data() {
        return {
            form: {
                sitemap: "",
                robot_text: "",
                site_title: "",
                slogan: "",
                store_label: "",
                main_page_title: ""
            },
            response: null,
            success: null,
            process: false,
            errors: []
        };
    },
    watch: {
        form: {
            handler: function() {
                this.success = false;
            },
            deep: true
        }
    },
    methods: {
        async submit() {
            this.process = true;
            await this.$http
                .post("/api/v1/setting/seo", this.form)
                .then(
                    response => (this.success = response.data),
                    (this.errors = [])
                )
                .catch(err => (this.errors = err.response.data.errors));
            this.process = false;
            window.scrollTo(0, 0);
        }
    },
    async mounted() {
        await this.$http
            .get("/api/v1/setting/seo")
            .then(response => (this.response = response.data));
        this.form.sitemap = this.response.sitemap;
        this.form.robot_text = this.response.robot_text;
        this.form.site_title = this.response.site_title;
        this.form.slogan = this.response.slogan;
        this.form.store_label = this.response.store_label;
        this.form.main_page_title = this.response.main_page_title;
    }
};
</script>
