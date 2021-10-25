<template>
    <div class="header__topbar-start">
        <div class="topbar topbar--spaceship-start">
            <div class="topbar__item-text d-none d-xxl-flex">
                Rufen Sie uns an: &nbsp;
                <a :href="'tel:' + data.phone" class="phone">{{
                    data.phone
                }}</a>
            </div>
            <!-- <div class="topbar__item-text">
                <a class="topbar__link" href="/about-us">About Us</a>
            </div> -->
            <div class="topbar__item-text">
                <inertia-link class="topbar__link" href="/page/contact-us"
                    >Kontakte</inertia-link
                >
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ["data"]
};
</script>

<style scoped>
.phone {
    color: white;
}
</style>
