<template>
    <form class="account-menu__form" @submit.prevent="submit">
        <div class="account-menu__form-title">Log In to Your Account</div>
        <div class="form-group">
            <label for="header-signin-email" class="sr-only"
                >Email address</label
            >
            <input
                v-model="form.email"
                id="header-signin-email"
                type="email"
                class="form-control form-control-sm"
                placeholder="Email address"
            />
        </div>
        <div class="form-group">
            <label for="header-signin-password" class="sr-only">Password</label>
            <div class="account-menu__form-forgot">
                <input
                    v-model="form.password"
                    id="header-signin-password"
                    type="password"
                    class="form-control form-control-sm"
                    placeholder="Password"
                />
                <a href="" class="account-menu__form-forgot-link">Forgot?</a>
            </div>
        </div>
        <div class="form-group account-menu__form-button">
            <button type="submit" class="btn btn-primary btn-sm">Login</button>
        </div>
        <div class="account-menu__form-link">
            <inertia-link href="/login">Create An Account</inertia-link>
        </div>
    </form>
</template>

<script>
export default {
    data() {
        return {
            form: {
                email: "",
                password: ""
            }
        };
    },
    methods: {
        submit() {
            this.$inertia.post("/login", this.form);
        }
    }
};
</script>
