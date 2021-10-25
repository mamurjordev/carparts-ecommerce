<template>
    <div class="h-screen">
        <div class="font-bold text-xl">Startseitenelement</div>
        <!-- Brands -->
        <div class="mt-12 flex flex-col">
            <div class="">Marken zu zeigen</div>
            <div class="mt-4 gap-1 flex flex-wrap text-sm">
                <div
                    v-for="(brand, index) in form.brands"
                    :key="index"
                    class="bg-green-300 px-3 py-1 rounded font-medium"
                >
                    {{ brand.name }}
                </div>
            </div>
            <multi-select
                class="z-50 mt-6"
                v-model="form.brands"
                :options="options"
                :btnLabel="btnLabel"
                search
                :searchPlaceholder="Suche"
                :selectOptions="brands"
            />
        </div>

        <button
            @click="submit"
            class="bg-green-600 text-white font-bold px-3 rounded py-1 mt-10"
        >
            AKTUALISIEREN
        </button>
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
            btnLabel: values =>
                `Wählen Sie die anzuzeigenden Marken aus (${values.length})`,
            name: "first group",
            form: {
                brands: []
            },
            filters: [
                {
                    nameAll: "Select all",
                    nameNotAll: "Deselect all",
                    func() {
                        return true;
                    }
                }
            ],
            brands: [],
            options: {
                multi: true,
                cssSelected: option =>
                    option.selected
                        ? { "background-color": "#5764c6", color: "#fff" }
                        : ""
            }
        };
    },
    async mounted() {
        await this.$http
            .get("/api/v1/brands")
            .then(response => (this.brands = response.data));
    },
    methods: {
        submit() {
            console.log(this.form.brands);
        }
    }
};
</script>
