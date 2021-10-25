<template>
    <app-layout>
        <div class="block-space block-space--layout--after-header"></div>
        <div class="block">
            <div class="container container--max--lg">
                <div class="row">
                    <div class="col-md-6 d-flex">
                        <div
                            class="card flex-grow-1 mb-md-0 mr-0 mr-lg-3 ml-0 ml-lg-4"
                        >
                            <div class="card-body card-body--padding--2">
                                <h3 class="card-title">Anmeldung</h3>
                                <form @submit.prevent="submit">
                                    <div class="form-group">
                                        <label for="signin-email"
                                            >E-Mail-Addresse</label
                                        >
                                        <input
                                            id="signin-email"
                                            type="email"
                                            class="form-control"
                                            placeholder="customer@example.com"
                                            v-model="form.email"
                                        />
                                    </div>
                                    <div class="form-group">
                                        <label for="signin-password"
                                            >Passwort</label
                                        >
                                        <input
                                            id="signin-password"
                                            type="password"
                                            class="form-control"
                                            placeholder="Passwort"
                                            v-model="form.password"
                                        />
                                        <small class="form-text text-muted">
                                            <a href="">Passwort vergessen?</a>
                                        </small>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <span
                                                class="input-check form-check-input"
                                            >
                                                <span class="input-check__body">
                                                    <input
                                                        v-model="form.remember"
                                                        class="input-check__input"
                                                        type="checkbox"
                                                        id="signin-remember"
                                                    />
                                                    <span
                                                        class="input-check__box"
                                                    ></span>
                                                    <span
                                                        class="input-check__icon"
                                                        ><svg
                                                            width="9px"
                                                            height="7px"
                                                        >
                                                            <path
                                                                d="M9,1.395L3.46,7L0,3.5L1.383,2.095L3.46,4.2L7.617,0L9,1.395Z"
                                                            />
                                                        </svg>
                                                    </span>
                                                </span>
                                            </span>
                                            <label
                                                class="form-check-label"
                                                for="signin-remember"
                                                >Mich erinnern</label
                                            >
                                        </div>
                                    </div>
                                    <div class="form-group mb-0">
                                        <button
                                            type="submit"
                                            class="btn btn-primary mt-3"
                                        >
                                            Anmeldung
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 d-flex mt-4 mt-md-0">
                        <div
                            class="card flex-grow-1 mb-0 ml-0 ml-lg-3 mr-0 mr-lg-4"
                        >
                            <div class="card-body card-body--padding--2">
                                <h3 class="card-title">Registrieren</h3>
                                <form @submit.prevent="register">
                                    <div class="form-group">
                                        <label for="signup-email"
                                            >E-Mail-Addresse</label
                                        >
                                        <input
                                            id="signup-email"
                                            type="email"
                                            class="form-control"
                                            placeholder="customer@example.com"
                                            v-model="form.email"
                                        />
                                    </div>
                                    <div class="form-group">
                                        <label for="signup-password"
                                            >Passwort</label
                                        >
                                        <input
                                            id="signup-password"
                                            type="password"
                                            class="form-control"
                                            placeholder="Passwort"
                                            v-model="form.password"
                                        />
                                    </div>
                                    <div class="form-group">
                                        <label for="signup-confirm"
                                            >Wiederhole das Passwort</label
                                        >
                                        <input
                                            id="signup-confirm"
                                            type="password"
                                            class="form-control"
                                            placeholder="Passwort"
                                            v-model="form.password_confirmation"
                                        />
                                    </div>
                                    <div class="form-group mb-0">
                                        <button
                                            type="submit"
                                            class="btn btn-primary mt-3"
                                        >
                                            Registrieren
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="block-space block-space--layout--before-footer"></div>
    </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";

export default {
    components: {
        AppLayout
    },

    props: {
        canResetPassword: Boolean,
        status: String
    },

    data() {
        return {
            form: this.$inertia.form({
                remember: false,
                name: "",
                email: "",
                password: "",
                password_confirmation: "",
                terms: false
            })
        };
    },

    methods: {
        submit() {
            this.form
                .transform(data => ({
                    ...data,
                    remember: this.form.remember ? "on" : ""
                }))
                .post(this.route("login"), {
                    onFinish: () => this.form.reset("password")
                });
        },
        register() {
            this.form.post(this.route("register"), {
                onFinish: () =>
                    this.form.reset("password", "password_confirmation")
            });
        }
    }
};
</script>
