<template>
    <app-layout>
        <hero-section :brands="brands" />
        <div class="block-space block-space--layout--divider-nl"></div>
        <brands :brands="featureBrands" />
        <div class="block-space block-space--layout--divider-nl"></div>
        <feature-products />
        <div class="block-space block-space--layout--divider-nl"></div>
        <DealZone />
        <div class="block-space block-space--layout--divider-sm"></div>
        <!-- <product-catalog /> -->
        <!-- <div class="block-space block-space--layout--divider-sm"></div> -->
        <!-- <product-catalog /> -->
        <!-- <div class="block-space block-space--layout--divider-sm"></div> -->
        <!-- <product-catalog /> -->

        <!-- <div class="block-space block-space--layout--divider-nl"></div> -->
        <!-- <banners /> -->
        <!-- <div class="block-space block-space--layout--divider-nl"></div> -->
        <!-- <new-arrivals /> -->
        <!-- <div class="block-space block-space--layout--divider-nl"></div> -->
        <!-- <latest-news /> -->
        <!-- <div
            class="block-space block-space--layout--divider-nl d-xl-block d-none"
        ></div> -->
        <!-- <product-catalog2 /> -->
        <div class="contacts__map">
            <iframe
                :src="
                    'https://maps.google.com/maps?q=' +
                        'Pottenstein' +
                        '&amp;t=&amp;z=20&amp;ie=UTF8&amp;iwloc=&amp;output=embed'
                "
                frameborder="0"
                scrolling="no"
                marginheight="0"
                marginwidth="0"
            ></iframe>
        </div>

        <div class="block-space block-space--layout--before-footer"></div>
    </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
import HeroSection from "@/Components/App/HeroSection";
import Brands from "../../Components/App/Brands.vue";
import FeatureProducts from "@/Components/App/FeatureProducts";
import DealZone from "@/Components/App/DealZone";
// import ProductCatalog from "@/Components/App/ProductCatalog";
// import Banners from "@/Components/App/Banners";
// import NewArrivals from "@/Components/App/NewArrivals";
// import LatestNews from "@/Components/App/LatestNews";
// import ProductCatalog2 from "@/Components/App/ProductCatalog2";
export default {
    props: ["brands", "featureBrands"],
    components: {
        AppLayout,
        HeroSection,
        Brands,
        FeatureProducts,
        DealZone
        // ProductCatalog,
        // Banners,
        // NewArrivals,
        // LatestNews,
        // ProductCatalog2,
    }
};
</script>
