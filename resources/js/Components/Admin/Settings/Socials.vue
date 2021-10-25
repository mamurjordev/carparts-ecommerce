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
                <label class="font-semibold">Facebook</label>
                <input
                    type="text"
                    v-model="form.facebook"
                    placeholder="dein Facebook-Link"
                    class="mt-3 border border-gray-300 py-2 rounded shadow focus:ring-0 focus:border-gray-300"
                />
            </div>
            <div class="flex flex-col">
                <label class="font-semibold uppercase">Twitter</label>
                <input
                    type="text"
                    v-model="form.twitter"
                    placeholder="dein Twitter-Link"
                    class="mt-3 border border-gray-300 py-2 rounded shadow focus:ring-0 focus:border-gray-300"
                />
            </div>
            <div class="flex flex-col">
                <label class="font-semibold uppercase">Youtube</label>
                <input
                    type="text"
                    v-model="form.youtube"
                    placeholder="dein Youtube-Link"
                    class="mt-3 border border-gray-300 py-2 rounded shadow cursor-pointer focus:ring-0 focus:border-gray-300"
                />
            </div>
            <div class="flex flex-col">
                <label class="font-semibold uppercase">Instagram</label>
                <input
                    type="text"
                    v-model="form.instagram"
                    placeholder="dein Instagram-Link"
                    class="mt-3 border border-gray-300 py-2 rounded shadow cursor-pointer focus:ring-0 focus:border-gray-300"
                />
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
                facebook: "",
                twitter: "",
                youtube: "",
                instagram: ""
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
            data.append("facebook", this.form.facebook);
            data.append("twitter", this.form.twitter);
            data.append("youtube", this.form.youtube);
            data.append("instagram", this.form.instagram);
            await this.$http
                .post("/api/v1/setting/socials", data)
                .then(response => (this.success = response.data));
            this.process = false;
            window.scrollTo(0, 0);
        }
    },
    async mounted() {
        await this.$http
            .get("/api/v1/setting/socials")
            .then(response => (this.response = response.data));

        this.form.facebook = this.response[0].value;
        this.form.twitter = this.response[1].value;
        this.form.youtube = this.response[2].value;
        this.form.instagram = this.response[3].value;
    }
};
</script>
