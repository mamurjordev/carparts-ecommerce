<template>
    <div class="">
        <h5 class="uppercase font-bold text-lg mb-5">Fakturierung</h5>
        <div
            v-if="success"
            class="text-green-600 bg-green-100 px-5 rounded border border-green-400 mb-5 py-2"
        >
            {{ success }}
        </div>
        <form v-if="response" @submit.prevent="submit" class="space-y-6">
            <!-- vat -->
            <h5 class="font-semibold py-1 border-b border-gray-200 uppercase">
                Mehrwertsteuer
            </h5>
            <label for="vat" class="flex items-center py-1 cursor-pointer">
                <input
                    v-model="form.vat"
                    id="vat"
                    type="checkbox"
                    class="mr-2 cursor-pointer rounded"
                />
                keine Mehrwertsteuer
            </label>
            <div v-if="!form.vat" class="">
                <div class="flex flex-col">
                    <label class="font-medium">Null Mehrwertsteuer (%)</label>
                    <input
                        type="number"
                        v-model="form.zero_vat"
                        class="mt-1 border border-gray-300 py-2 rounded shadow focus:ring-0 focus:border-gray-300"
                    />
                    <p v-if="errors.zero_vat" class="text-red-500 text-sm">
                        {{ errors.zero_vat[0] }}
                    </p>
                </div>
                <div class="flex flex-col">
                    <label class="font-medium"
                        >ermäßigter Mehrwertsteuersatz (%)</label
                    >
                    <input
                        type="number"
                        v-model="form.zero_vat"
                        class="mt-1 border border-gray-300 py-2 rounded shadow focus:ring-0 focus:border-gray-300"
                    />
                    <p v-if="errors.reduced_vat" class="text-red-500 text-sm">
                        {{ errors.reduced_vat[0] }}
                    </p>
                </div>
                <div class="flex flex-col">
                    <label class="font-medium"
                        >Standard-Mehrwertsteuersatz (%)</label
                    >
                    <input
                        type="number"
                        v-model="form.standard_vat"
                        class="mt-1 border border-gray-300 py-2 rounded shadow focus:ring-0 focus:border-gray-300"
                    />
                    <p v-if="errors.standard_vat" class="text-red-500 text-sm">
                        {{ errors.standard_vat[0] }}
                    </p>
                </div>
            </div>
            <!-- invoice settings -->
            <!-- <h5 class="font-semibold py-1 border-b border-gray-200 uppercase">
                Rechnungseinstellungen
            </h5> -->
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
                <div :class="process ? 'block' : 'hidden'">UPDATING...</div>
                <div :class="process ? 'hidden' : 'block'">UPDATE</div>
            </button>
        </form>
    </div>
</template>

<script>
export default {
    data() {
        return {
            form: {
                vat: false,
                zero_vat: 0,
                reduced_vat: 0,
                standard_vat: 0
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
                .post("/api/v1/setting/invoice", this.form)
                .then(
                    response => (this.success = response.data),
                    (this.errors = [])
                )
                .catch(err => (this.errors = err.response.data.errors));
            this.process = false;
        }
    },
    async mounted() {
        await this.$http
            .get("/api/v1/setting/invoice")
            .then(response => (this.response = response.data));
        this.form.vat = this.response.vat;
        this.form.zero_vat = this.response.zero_vat;
        this.form.reduced_vat = this.response.reduced_vat;
        this.form.standard_vat = this.response.standard_vat;
    }
};
</script>
