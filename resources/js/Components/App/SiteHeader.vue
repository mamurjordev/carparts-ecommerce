<template>
    <header v-if="data" class="site__header">
        <div class="header">
            <div class="header__megamenu-area megamenu-area"></div>
            <div class="header__topbar-start-bg"></div>
            <header-top-start :data="data" />
            <div class="header__topbar-end-bg"></div>
            <header-top-end />
            <header-navbar />
            <div class="header__logo">
                <inertia-link href="/" class="logo">
                    <div class="logo__slogan">
                        {{ data.slogan }}
                    </div>
                    <div class="logo__image">
                        <!-- logo -->
                        <inertia-link href="/">
                            <img
                                src="/media/site/logo.png"
                                alt=""
                                class="logo"
                            />
                        </inertia-link>
                        <!-- logo / end -->
                    </div>
                </inertia-link>
            </div>
            <header-search />
            <header-indicators />
        </div>
    </header>
</template>

<script>
import HeaderTopStart from "@/Components/App/Header/HeaderTopStart";
import HeaderTopEnd from "@/Components/App/Header/HeaderTopEnd";
import HeaderNavbar from "@/Components/App/Header/HeaderNavbar";
import HeaderSearch from "@/Components/App/Header/HeaderSearch";
import HeaderIndicators from "@/Components/App/Header/HeaderIndicators";
export default {
    components: {
        HeaderTopStart,
        HeaderTopEnd,
        HeaderNavbar,
        HeaderSearch,
        HeaderIndicators
    },
    data() {
        return {
            data: null
        };
    },
    async mounted() {
        await this.$http
            .get("/api/v1/front/elements/siteheader")
            .then(response => (this.data = response.data));
    }
};
</script>
