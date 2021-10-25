<template>
    <div class="">
        <h5 class="uppercase font-bold text-lg mb-5">Kontaktinformation</h5>
        <div
            v-if="success"
            class="text-green-600 bg-green-100 px-5 rounded border border-green-400 mb-5 py-2"
        >
            {{ success }}
        </div>
        <form v-if="response" @submit.prevent="submit" class="space-y-6">
            <h5 class="font-semibold py-1 border-b border-gray-200">KONTAKT</h5>
            <div class="flex flex-col">
                <label class="font-semibold">Telefon</label>
                <input
                    type="tel"
                    v-model="form.phone"
                    placeholder="Ihr Firmentelefon"
                    class="mt-3 border border-gray-300 py-2 rounded shadow focus:ring-0 focus:border-gray-300"
                />
                <p v-if="errors.phone" class="text-red-500 text-sm">
                    {{ errors.phone[0] }}
                </p>
            </div>
            <div class="flex flex-col">
                <label class="font-semibold uppercase">Email</label>
                <input
                    type="email"
                    v-model="form.email"
                    placeholder="Ihre Firmen-E-Mail"
                    class="mt-3 border border-gray-300 py-2 rounded shadow focus:ring-0 focus:border-gray-300"
                />
                <p v-if="errors.email" class="text-red-500 text-sm">
                    {{ errors.email[0] }}
                </p>
            </div>
            <div class="flex flex-col">
                <label class="font-semibold uppercase">Ort</label>
                <textarea
                    v-model="form.location"
                    placeholder="Ihr Firmenstandort"
                    class="mt-3 border border-gray-300 py-2 rounded shadow focus:ring-0 focus:border-gray-300"
                ></textarea>
                <p v-if="errors.location" class="text-red-500 text-sm">
                    {{ errors.location[0] }}
                </p>
            </div>
            <div class="flex flex-col">
                <label class="font-semibold uppercase">Arbeitszeit</label>
                <input
                    type="text"
                    v-model="form.working_hours"
                    placeholder="Offene Dauer Ihres Unternehmens"
                    class="mt-3 border border-gray-300 py-2 rounded shadow focus:ring-0 focus:border-gray-300"
                />
                <p v-if="errors.working_hours" class="text-red-500 text-sm">
                    {{ errors.working_hours[0] }}
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
                phone: "",
                email: "",
                location: "",
                working_hours: ""
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
                .post("/api/v1/setting/information", this.form)
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
            .get("/api/v1/setting/information")
            .then(response => (this.response = response.data));

        this.form.phone = this.response.phone;
        this.form.email = this.response.email;
        this.form.location = this.response.location;
        this.form.working_hours = this.response.working_hours;
    }
};
</script>
