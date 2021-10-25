<template>
    <div class="">
        <div
            v-if="success"
            class="text-green-600 bg-green-100 px-5 rounded border border-green-400 mb-5 py-2"
        >
            {{ success }}
        </div>
        <form v-if="response" @submit.prevent="submit" class="space-y-6">
            <div class="flex flex-col">
                <label class="font-semibold">LOGO</label>
                <input
                    type="file"
                    @change="main_logo"
                    class="mt-3 border border-gray-300 p-1 rounded shadow cursor-pointer"
                />
            </div>
            <div class="flex flex-col">
                <label class="font-semibold uppercase">Seitentitel</label>
                <input
                    type="text"
                    v-model="form.site_title"
                    placeholder="Ihr Seitentitel"
                    class="mt-3 border border-gray-300 py-2 rounded shadow cursor-pointer focus:ring-0 focus:border-gray-300"
                />
            </div>
            <div class="flex flex-col">
                <label class="font-semibold uppercase">Website-Slogan</label>
                <input
                    type="text"
                    v-model="form.slogan"
                    placeholder="Ihr Website-Slogan"
                    class="mt-3 border border-gray-300 py-2 rounded shadow cursor-pointer focus:ring-0 focus:border-gray-300"
                />
            </div>
            <div class="flex flex-col">
                <label class="font-semibold uppercase">Urheberrechte</label>
                <input
                    type="text"
                    v-model="form.copyright"
                    placeholder="Fußzeile Copyright"
                    class="mt-3 border border-gray-300 py-2 rounded shadow cursor-pointer focus:ring-0 focus:border-gray-300"
                />
            </div>
            <div class="flex flex-col">
                <label class="font-semibold uppercase"
                    >Kontakttext (Fußzeile)</label
                >
                <textarea v-model="form.contact_us_footer" rows="10"></textarea>
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
                main_logo: null,
                site_title: "",
                slogan: "",
                copyright: "",
                contact_us_footer: ""
            },
            response: null,
            success: null,
            process: false
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
            var data = new FormData();
            data.append("main_logo", this.form.main_logo);
            data.append("site_title", this.form.site_title);
            data.append("slogan", this.form.slogan);
            data.append("copyright", this.form.copyright);
            data.append("contact_us_footer", this.form.contact_us_footer);

            await this.$http
                .post("/api/v1/setting/site_setting", data)
                .then(response => (this.success = response.data));
            this.process = false;
            window.scrollTo(0, 0);
        },
        main_logo(e) {
            this.form.main_logo = e.target.files[0];
        }
    },
    async mounted() {
        await this.$http
            .get("/api/v1/setting/site_setting")
            .then(response => (this.response = response.data));

        this.form.site_title = this.response[1].value;
        this.form.slogan = this.response[2].value;
        this.form.copyright = this.response[3].value;
        this.form.contact_us_footer = this.response[4].value;
    }
};
</script>
