<template>
    <div class="">
        <h5 class="uppercase font-bold text-lg mb-5">Kontoinformationen</h5>
        <div
            v-if="success"
            class="text-green-600 bg-green-100 px-5 rounded border border-green-400 mb-5 py-2"
        >
            {{ success }}
        </div>
        <form v-if="response" @submit.prevent="submit" class="space-y-6">
            <div class="flex flex-col">
                <label class="font-medium">Bank Name</label>
                <input
                    type="text"
                    v-model="form.bank_name"
                    class="mt-1 border border-gray-300 py-2 rounded shadow focus:ring-0 focus:border-gray-300"
                />
                <p v-if="errors.bank_name" class="text-red-500 text-sm">
                    {{ errors.bank_name[0] }}
                </p>
            </div>
            <div class="flex flex-col">
                <label class="font-medium">Ast</label>
                <input
                    type="text"
                    v-model="form.branch_name"
                    class="mt-1 border border-gray-300 py-2 rounded shadow focus:ring-0 focus:border-gray-300"
                />
                <p v-if="errors.branch_name" class="text-red-500 text-sm">
                    {{ errors.branch_name[0] }}
                </p>
            </div>
            <div class="flex flex-col">
                <label class="font-medium">Kontobezeichnung</label>
                <input
                    type="text"
                    v-model="form.account_name"
                    class="mt-1 border border-gray-300 py-2 rounded shadow focus:ring-0 focus:border-gray-300"
                />
                <p v-if="errors.account_name" class="text-red-500 text-sm">
                    {{ errors.account_name[0] }}
                </p>
            </div>
            <div class="flex flex-col">
                <label class="font-medium">Kontonummer</label>
                <input
                    type="text"
                    v-model="form.account_number"
                    class="mt-1 border border-gray-300 py-2 rounded shadow focus:ring-0 focus:border-gray-300"
                />
                <p v-if="errors.account_number" class="text-red-500 text-sm">
                    {{ errors.account_number[0] }}
                </p>
            </div>
            <div class="flex flex-col">
                <label class="font-medium">SWIFT-Code </label>
                <input
                    type="text"
                    v-model="form.swift_code"
                    class="mt-1 border border-gray-300 py-2 rounded shadow focus:ring-0 focus:border-gray-300"
                />
                <p v-if="errors.swift_code" class="text-red-500 text-sm">
                    {{ errors.swift_code[0] }}
                </p>
            </div>
            <div class="flex flex-col">
                <label class="font-medium">Branchencode </label>
                <input
                    type="text"
                    v-model="form.branch_code"
                    class="mt-1 border border-gray-300 py-2 rounded shadow focus:ring-0 focus:border-gray-300"
                />
                <p v-if="errors.branch_code" class="text-red-500 text-sm">
                    {{ errors.branch_code[0] }}
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
                bank_name: "",
                branch_name: "",
                account_name: "",
                account_number: "",
                swift_code: "",
                branch_code: ""
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
                .post("/api/v1/setting/bank-account", this.form)
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
            .get("/api/v1/setting/bank-account")
            .then(response => (this.response = response.data));

        this.form.bank_name = this.response.bank_name;
        this.form.branch_name = this.response.branch_name;
        this.form.account_name = this.response.account_name;
        this.form.account_number = this.response.account_number;
        this.form.swift_code = this.response.swift_code;
        this.form.branch_code = this.response.branch_code;
    }
};
</script>
