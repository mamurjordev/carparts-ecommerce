<template>
    <app-layout>
        <bread-crumb :bread="bread" />

        <div class="block-split">
            <div class="container">
                <div class="block-split__row row no-gutters">
                    <div
                        class="block-split__item block-split__item-content col-auto"
                    >
                        <div class="product product--layout--full">
                            <div class="product__body">
                                <div
                                    class="product__card product__card--one"
                                ></div>
                                <div
                                    class="product__card product__card--two"
                                ></div>
                                <single-product-gallery />
                                <ProductHeader />
                                <ProductMain />
                                <single-product-info />
                                <single-product-description-tabs />
                            </div>
                        </div>
                        <div
                            class="block-space block-space--layout--divider-nl"
                        ></div>
                        <related-products />
                    </div>
                </div>
            </div>
        </div>
        <div class="block-space block-space--layout--before-footer"></div>
    </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
import BreadCrumb from "@/Components/App/BreadCrumb";
import SingleProductGallery from "@/Components/App/SingleProductGallery";
import ProductHeader from "@/Components/App/ProductHeader";
import ProductMain from "@/Components/App/ProductMain";
import SingleProductInfo from "@/Components/App/SingleProductInfo";
import SingleProductDescriptionTabs from "@/Components/App/SingleProductDescriptionTabs";
import RelatedProducts from "@/Components/App/RelatedProducts";
export default {
    data() {
        return {
            bread: {
                current: ""
            }
        };
    },

    components: {
        AppLayout,
        BreadCrumb,
        SingleProductGallery,
        ProductHeader,
        ProductMain,
        SingleProductInfo,
        SingleProductDescriptionTabs,
        RelatedProducts
    }
};
</script>
