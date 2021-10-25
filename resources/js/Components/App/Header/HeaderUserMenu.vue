<template>
    <section>
        <div class="account-menu__divider"></div>
        <a href="" class="account-menu__user">
            <div class="account-menu__user-avatar">
                <img src="images/avatars/avatar-4.jpg" alt="" />
            </div>
            <div class="account-menu__user-info">
                <div class="account-menu__user-name">{{ user.name }}</div>
                <div class="account-menu__user-email">
                    {{ user.email }}
                </div>
            </div>
        </a>
        <div class="account-menu__divider"></div>
        <ul class="account-menu__links">
            <li>
                <inertia-link href="/profile/dashboard">Dashboard</inertia-link>
            </li>
            <li>
                <inertia-link href="account-profile.html"
                    >Edit Profile</inertia-link
                >
            </li>
            <li>
                <inertia-link href="account-orders.html"
                    >Order History</inertia-link
                >
            </li>
            <li>
                <inertia-link href="account-addresses.html"
                    >Addresses</inertia-link
                >
            </li>
        </ul>
        <div class="account-menu__divider"></div>
        <ul class="account-menu__links">
            <li><inertia-link href="/logout">Logout</inertia-link></li>
        </ul>
    </section>
</template>

<script>
export default {
    computed: {
        user() {
            return this.$page.props.auth.user;
        }
    }
};
</script>
