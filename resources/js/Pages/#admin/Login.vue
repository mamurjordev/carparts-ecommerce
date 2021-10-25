<template>
    <body class="g-sidenav-show bg-white">
        <div class="container position-sticky z-index-sticky top-0">
            <div class="row">
                <div class="col-12">
                    <!-- Navbar -->
                    <nav
                        class="navbar navbar-expand-lg  blur blur-rounded top-0  z-index-3 shadow position-absolute my-3 py-2 start-0 end-0 mx-4"
                    >
                        <div class="container-fluid">
                            <inertia-link
                                class="navbar-brand font-weight-bolder ms-lg-0 ms-3 "
                                href="/admin"
                            >
                                Car Parts Dashboard
                            </inertia-link>
                            <button
                                class="navbar-toggler shadow-none ms-2"
                                type="button"
                                data-bs-toggle="collapse"
                                data-bs-target="#navigation"
                                aria-controls="navigation"
                                aria-expanded="false"
                                aria-label="Toggle navigation"
                            >
                                <span class="navbar-toggler-icon mt-2">
                                    <span
                                        class="navbar-toggler-bar bar1"
                                    ></span>
                                    <span
                                        class="navbar-toggler-bar bar2"
                                    ></span>
                                    <span
                                        class="navbar-toggler-bar bar3"
                                    ></span>
                                </span>
                            </button>
                            <div
                                class="collapse navbar-collapse"
                                id="navigation"
                            >
                                <ul class="navbar-nav mx-auto">
                                    <li class="nav-item">
                                        <inertia-link
                                            class="nav-link d-flex align-items-center me-2 active"
                                            aria-current="page"
                                            href="/admin"
                                        >
                                            <i
                                                class="fa fa-chart-pie opacity-6 text-dark me-1"
                                            ></i>
                                            Dashboard
                                        </inertia-link>
                                    </li>
                                    <!-- <li class="nav-item">
                                        <a
                                            class="nav-link me-2"
                                            href="../pages/profile.html"
                                        >
                                            <i
                                                class="fa fa-user opacity-6 text-dark me-1"
                                            ></i>
                                            Profile
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a
                                            class="nav-link me-2"
                                            href="../pages/sign-up.html"
                                        >
                                            <i
                                                class="fas fa-user-circle opacity-6 text-dark me-1"
                                            ></i>
                                            Sign Up
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a
                                            class="nav-link me-2"
                                            href="../pages/sign-in.html"
                                        >
                                            <i
                                                class="fas fa-key opacity-6 text-dark me-1"
                                            ></i>
                                            Sign In
                                        </a>
                                    </li> -->
                                </ul>
                            </div>
                        </div>
                    </nav>
                    <!-- End Navbar -->
                </div>
            </div>
        </div>
        <section>
            <div class="page-header section-height-75">
                <div class="container">
                    <div class="row">
                        <div
                            class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto"
                        >
                            <div class="card card-plain mt-8">
                                <div
                                    class="card-header pb-0 text-left bg-transparent"
                                >
                                    <h3
                                        class="font-weight-bolder text-info text-gradient"
                                    >
                                        Welcome back
                                    </h3>
                                    <p class="mb-0">
                                        Enter your email and password to sign in
                                    </p>
                                </div>
                                <div class="card-body">
                                    <form
                                        @submit.prevent="submit"
                                        role="form text-left"
                                    >
                                        <label>Email</label>
                                        <div class="mb-3">
                                            <input
                                                type="email"
                                                class="form-control"
                                                placeholder="Email"
                                                aria-label="Email"
                                                aria-describedby="email-addon"
                                                v-model="form.email"
                                            />
                                        </div>
                                        <label>Password</label>
                                        <div class="mb-3">
                                            <input
                                                type="password"
                                                class="form-control"
                                                placeholder="Password"
                                                aria-label="Password"
                                                aria-describedby="password-addon"
                                                v-model="form.password"
                                            />
                                        </div>
                                        <div class="form-check form-switch">
                                            <input
                                                class="form-check-input"
                                                type="checkbox"
                                                id="rememberMe"
                                                checked=""
                                                v-model="form.remember"
                                            />
                                            <label
                                                class="form-check-label"
                                                for="rememberMe"
                                                >Remember me</label
                                            >
                                        </div>
                                        <p v-if="errors" class="text-danger">
                                            Email or password didn't match
                                        </p>
                                        <div class="text-center">
                                            <button
                                                type="submit"
                                                class="btn bg-gradient-info w-100 mt-4 mb-0"
                                                :disabled="process"
                                            >
                                                Sign in
                                            </button>
                                        </div>
                                    </form>
                                </div>
                                <!-- <div
                                    class="card-footer text-center pt-0 px-lg-2 px-1"
                                >
                                    <p class="mb-4 text-sm mx-auto">
                                        Don't have an account?
                                        <a
                                            href="javascript:;"
                                            class="text-info text-gradient font-weight-bold"
                                            >Sign up</a
                                        >
                                    </p>
                                </div> -->
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div
                                class="oblique position-absolute top-0 h-100 d-md-block d-none me-n8"
                            >
                                <div
                                    class="oblique-image bg-cover position-absolute fixed-top ms-auto h-100 z-index-0 ms-n6"
                                    style="background-image:url('../assets/img/curved-images/curved6.jpg')"
                                ></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </body>
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
