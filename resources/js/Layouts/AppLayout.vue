<template>
    <section class="d-flex flex-column min-vh-100">
        <!-- <inertia-head>
            <title>Car Parts</title>
            <meta name="description" content="Your page description" />
        </inertia-head> -->
        <site-mobile-header />
        <site-header />
        <div class="site__body">
            <slot />
        </div>
        <site-footer />
        <mobile-menu />
        <add-vehicle-modal />
        <vehicle-picker-modal />
        <photo-swipe />
    </section>
</template>
<script>
import SiteMobileHeader from "@/Components/App/Header/SiteMobileHeader";
import SiteHeader from "@/Components/App/SiteHeader";
import SiteFooter from "@/Components/App/SiteFooter";
import MobileMenu from "@/Components/App/MobileMenu";
import AddVehicleModal from "@/Components/App/AddVehicleModal";
import VehiclePickerModal from "@/Components/App/VehiclePickerModal";
import PhotoSwipe from "@/Components/App/PhotoSwipe";
export default {
    components: {
        SiteMobileHeader,
        SiteHeader,
        SiteFooter,
        MobileMenu,
        AddVehicleModal,
        VehiclePickerModal,
        PhotoSwipe
    }
};
</script>
