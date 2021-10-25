<template>
    <div class="" style="min-height: 60vh">
        <div class="font-bold text-xl pb-5 border-b-2 border-gray-600 mb-5">
            <div class="">SITE-FUSSER</div>
        </div>
        <div
            v-if="success"
            class="text-green-800 bg-green-200 border border-green-600 rounded px-5 py-1 mb-2"
        >
            {{ success }}
        </div>
        <form @submit.prevent="submit" class="space-y-6">
            <div class="">
                <label class="font-semibold">Seiten zum Anzeigen</label>
                <multi-select
                    class="w-full mt-3"
                    v-model="form.pages"
                    :options="select.options"
                    :btnLabel="select.btnLabel"
                    search
                    searchPlaceholder="Suchseite"
                    :selectOptions="pages"
                />
            </div>
            <div class="w-full text-center pt-10">
                <button
                    type="submit"
                    class="bg-green-600 text-white px-12 py-2 font-medium"
                >
                    AKTUALISIEREN
                </button>
            </div>
        </form>
    </div>
</template>

<script>
import vueMultiSelect from "vue-multi-select";
import "vue-multi-select/dist/lib/vue-multi-select.css";
export default {
    components: {
        multiSelect: vueMultiSelect
    },
    data() {
        return {
            form: {
                pages: []
            },
            success: null,
            pages: [],
            select: {
                btnLabel: values => `Seiten auswählen (${values.length})`,
                options: {
                    multi: true,
                    cssSelected: option =>
                        option.selected
                            ? { "background-color": "#5764c6", color: "#fff" }
                            : ""
                }
            }
        };
    },
    async mounted() {
        await this.$http
            .get("/api/v1/pages")
            .then(response => (this.pages = response.data));
        await this.$http
            .get("/api/v1/elements/sitefooter")
            .then(response => (this.form.pages = response.data))
            .catch(error => console.error(error));
    },
    methods: {
        async submit() {
            var _this = this;
            await this.$http
                .post("/api/v1/elements/sitefooter", this.form)
                .then(response => (this.success = response.data));

            setTimeout(function() {
                _this.success = false;
            }, 3000);
        }
    }
};
</script>

<style>
button.btn-select {
    width: 100% !important;
    padding: 10px 0 !important;
}
.buttonLabel span {
    font-size: 20px !important;
}
</style>
