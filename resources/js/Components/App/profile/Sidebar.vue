<template>
    <div class="col-12 col-lg-3 d-flex">
        <div class="account-nav flex-grow-1">
            <h4 class="account-nav__title">Navigation</h4>
            <ul class="account-nav__list">
                <li class="account-nav__item  account-nav__item--active ">
                    <inertia-link href="/profile/dashboard"
                        >Dashboard</inertia-link
                    >
                </li>
                <li class="account-nav__item ">
                    <inertia-link href="/profile/edit"
                        >Edit Profile</inertia-link
                    >
                </li>
                <li class="account-nav__item ">
                    <a href="account-orders.html">Order History</a>
                </li>
                <li class="account-nav__item ">
                    <a href="account-order-details.html">Order Details</a>
                </li>
                <li class="account-nav__item ">
                    <a href="account-addresses.html">Addresses</a>
                </li>
                <li class="account-nav__item ">
                    <a href="account-edit-address.html">Edit Address</a>
                </li>
                <li class="account-nav__item ">
                    <a href="account-password.html">Password</a>
                </li>
                <li class="account-nav__divider" role="presentation"></li>
                <li class="account-nav__item ">
                    <a href="account-login.html">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
export default {
    computed: {
        user() {
            // return this.
        }
    }
};
</script>
