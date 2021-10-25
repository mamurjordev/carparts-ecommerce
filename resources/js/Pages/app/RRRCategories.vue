<template>
    <app-layout>
        <bread-crumb :bread="bread" />

        <div class="block block-split">
            <div class="container">
                <div class="block-split__row row no-gutters">
                    <div
                        class="block-split__item block-split__item-content col-auto"
                    >
                        <category-lists :parts="parts" />

                        <div
                            class="block-space block-space--layout--divider-nl"
                        ></div>

                        <!-- <div class="container">
                            <div class="section-header">
                                <div class="section-header__body">
                                    <h2 class="section-header__title">
                                        Best Selling Products
                                    </h2>
                                    <div class="section-header__spring"></div>
                                    <div class="section-header__divider"></div>
                                </div>
                            </div>
                            <product-filter />

                            <parts-catalog />
                        </div>

                        <div
                            class="block-space block-space--layout--divider-nl"
                        ></div>
                        <brands /> -->
                    </div>
                </div>
                <div
                    class="block-space block-space--layout--before-footer"
                ></div>
            </div>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
import BreadCrumb from "@/Components/App/BreadCrumb";
import CategoryLists from "@/Components/App/CategoryLists";
import PartsCatalog from "@/Components/App/PartsCatalog";
import ProductFilter from "@/Components/App/ProductFilter";
import ProductCatalog from "@/Components/App/ProductCatalog";
import Pagination from "@/Components/App/Pagination";
import Brands from "@/Components/App/Brands";

export default {
    props: ["parts", "vehicles"],
    data() {
        return {
            bread: {
                breads: {
                    0: {
                        url: "",
                        label: this.vehicles.manuName
                    },
                    1: {
                        url: "",
                        label: this.vehicles.modelName
                    }
                },
                current: ""
            }
        };
    },

    components: {
        AppLayout,
        BreadCrumb,
        CategoryLists,
        PartsCatalog,
        ProductFilter,
        Pagination,
        ProductCatalog,
        Brands
    },
    computed() {
        this.breads[0].label = this.vehicles.manuName;
        this.breads[1].label = this.vehicles.modelName;
    }
};
</script>
