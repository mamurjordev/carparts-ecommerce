<template>
    <main>
        <section class="relative w-full h-full py-40 min-h-screen">
            <div
                class="absolute top-0 w-full h-full bg-gray-800 bg-full bg-no-repeat"
                style="background-image: url(/assets/img/register_bg_2.png)"
            ></div>
            <div class="container mx-auto px-4 h-full">
                <div
                    class="flex content-center items-center justify-center h-full"
                >
                    <div class="w-full lg:w-4/12 px-4">
                        <div
                            class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-gray-200 border-0"
                        >
                            <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
                                <div
                                    class="text-gray-400 text-center mb-3 font-bold"
                                >
                                    <small>Anmelden</small>
                                </div>
                                <form @submit.prevent="submit">
                                    <div class="relative w-full mb-3">
                                        <label
                                            class="block uppercase text-gray-600 text-xs font-bold mb-2"
                                            for="grid-password"
                                            >Email</label
                                        ><input
                                            type="email"
                                            class="border-0 px-3 py-3 placeholder-gray-300 text-gray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                            placeholder="Email"
                                            v-model="form.email"
                                        />
                                    </div>
                                    <div class="relative w-full mb-3">
                                        <label
                                            class="block uppercase text-gray-600 text-xs font-bold mb-2"
                                            for="grid-password"
                                            >Passwort</label
                                        ><input
                                            type="password"
                                            class="border-0 px-3 py-3 placeholder-gray-300 text-gray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                            placeholder="Passwort"
                                            v-model="form.password"
                                        />
                                    </div>
                                    <div class="text-center mt-6">
                                        <button
                                            class="bg-gray-800 text-white active:bg-gray-600 text-sm font-bold uppercase px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 w-full ease-linear transition-all duration-150"
                                            type="submit"
                                        >
                                            Anmelden
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="absolute w-full bottom-0 bg-gray-800 pb-6">
                <div class="container mx-auto px-4">
                    <hr class="mb-6 border-b-1 border-gray-600" />
                    <div
                        class="flex flex-wrap items-center md:justify-between justify-center"
                    >
                        <div class="w-full md:w-4/12 px-4">
                            <div
                                class="text-sm text-white font-semibold py-1 text-center md:text-left"
                            >
                                Urheberrechte © 2021
                                <a
                                    href="#!"
                                    class="text-white hover:text-gray-300 text-sm font-semibold py-1"
                                    >Car Parts</a
                                >
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </section>
    </main>
</template>

<script>
export default {
    data() {
        return {
            form: {
                email: "",
                password: "",
                remember: false
            },
            process: false
        };
    },
    computed: {
        errors() {
            return this.$page.props.errors;
        }
    },
    methods: {
        submit() {
            this.$inertia.visit("/admin/login", {
                method: "post",
                data: this.form,
                onStart: visit => {
                    this.process = true;
                },
                onProgress: progress => {
                    this.process = true;
                },
                onFinish: visit => {
                    this.process = false;
                }
            });
        }
    }
};
</script>
