<template>
    <app-layout>
        <div class="site__body">
            <div
                class="block-header block-header--has-breadcrumb block-header--has-title"
            >
                <div class="container">
                    <div class="block-header__body">
                        <nav
                            class="breadcrumb block-header__breadcrumb"
                            aria-label="breadcrumb"
                        >
                            <ol class="breadcrumb__list">
                                <li
                                    class="breadcrumb__spaceship-safe-area"
                                    role="presentation"
                                ></li>
                                <li
                                    class="breadcrumb__item breadcrumb__item--parent breadcrumb__item--first"
                                >
                                    <inertia-link
                                        href="/"
                                        class="breadcrumb__item-link"
                                        >Startseite</inertia-link
                                    >
                                </li>
                                <li
                                    class="breadcrumb__item breadcrumb__item--parent breadcrumb__item--middle"
                                >
                                    <inertia-link
                                        href="#!"
                                        class="breadcrumb__item-link"
                                        >Autoteile</inertia-link
                                    >
                                </li>
                                <li
                                    class="breadcrumb__item breadcrumb__item--parent breadcrumb__item--middle"
                                >
                                    <inertia-link
                                        :href="'/categories/' + vehicle.carId"
                                        class="breadcrumb__item-link"
                                        >{{
                                            parent.assemblyGroupName
                                        }}</inertia-link
                                    >
                                </li>
                                <li
                                    class="breadcrumb__title-safe-area"
                                    role="presentation"
                                ></li>
                            </ol>
                        </nav>
                        <!-- Header -->
                        <div class="border-bottom mb-5">
                            <div class="">
                                <h1 class="block-header__title">
                                    Autoteile

                                    <span class="codeaz_header_subtitle"
                                        >für
                                        {{
                                            vehicle.manuName +
                                                " " +
                                                vehicle.modelName +
                                                " " +
                                                vehicle.typeName +
                                                " " +
                                                vehicle.powerKwTo +
                                                " KW"
                                        }}</span
                                    >
                                </h1>
                            </div>
                        </div>
                        <!-- Brands -->
                        <section>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="row codeaz_sub__categories">
                                        <inertia-link
                                            class="col-lg-3  py-2"
                                            v-for="(category,
                                            index) in subCategories"
                                            :key="index"
                                            :href="
                                                '/car/' +
                                                    vehicle.carId +
                                                    '/subcategories/' +
                                                    category.assemblyGroupNodeId
                                            "
                                        >
                                            <div class="codeaz_sub__category">
                                                {{ category.assemblyGroupName }}
                                            </div>
                                        </inertia-link>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
            <div class="checkout block">
                <div class="container container--max--xl">
                    <!--  -->
                </div>
            </div>

            <!-- Parts -->
            <div
                class="block-header block-header--has-breadcrumb block-header--has-title"
            >
                <div class="container">
                    <div class="block-header__body">
                        <h1 class="block-header__title mt-2 mb-3">
                            {{ parent.assemblyGroupName }}
                        </h1>
                    </div>
                </div>
            </div>
            <div class="block-split block-split--has-sidebar">
                <div class="container">
                    <div class="block-split__row row no-gutters">
                        <product-filter-2
                            :categories="categories"
                            :vehicle="vehicle"
                        />
                        <div
                            class="block-split__item block-split__item-content col-auto"
                        >
                            <div class="block">
                                <div class="products-view">
                                    <div
                                        class="products-view__list products-list products-list--grid--4"
                                        data-layout="list"
                                        data-with-features="false"
                                    >
                                        <div class="products-list__head">
                                            <div
                                                class="products-list__column products-list__column--image"
                                            >
                                                Image
                                            </div>
                                            <div
                                                class="products-list__column products-list__column--meta"
                                            >
                                                SKU
                                            </div>
                                            <div
                                                class="products-list__column products-list__column--product"
                                            >
                                                Product
                                            </div>
                                            <div
                                                class="products-list__column products-list__column--rating"
                                            >
                                                Rating
                                            </div>
                                            <div
                                                class="products-list__column products-list__column--price"
                                            >
                                                Price
                                            </div>
                                        </div>
                                        <div class="products-list__content">
                                            <product-list />
                                        </div>
                                    </div>
                                    <div class="products-view__pagination">
                                        <nav
                                            aria-label="Page navigation example"
                                        >
                                            <ul class="pagination">
                                                <li class="page-item disabled">
                                                    <a
                                                        class="page-link page-link--with-arrow"
                                                        href=""
                                                        aria-label="Previous"
                                                    >
                                                        <span
                                                            class="page-link__arrow page-link__arrow--left"
                                                            aria-hidden="true"
                                                            ><svg
                                                                width="7"
                                                                height="11"
                                                            >
                                                                <path
                                                                    d="M6.7,0.3L6.7,0.3c-0.4-0.4-0.9-0.4-1.3,0L0,5.5l5.4,5.2c0.4,0.4,0.9,0.3,1.3,0l0,0c0.4-0.4,0.4-1,0-1.3l-4-3.9l4-3.9C7.1,1.2,7.1,0.6,6.7,0.3z"
                                                                />
                                                            </svg>
                                                        </span>
                                                    </a>
                                                </li>
                                                <li class="page-item">
                                                    <a
                                                        class="page-link"
                                                        href="#"
                                                        >1</a
                                                    >
                                                </li>
                                                <li
                                                    class="page-item active"
                                                    aria-current="page"
                                                >
                                                    <span class="page-link">
                                                        2
                                                        <span class="sr-only"
                                                            >(current)</span
                                                        >
                                                    </span>
                                                </li>
                                                <li class="page-item">
                                                    <a
                                                        class="page-link"
                                                        href="#"
                                                        >3</a
                                                    >
                                                </li>
                                                <li class="page-item">
                                                    <a
                                                        class="page-link"
                                                        href="#"
                                                        >4</a
                                                    >
                                                </li>
                                                <li
                                                    class="page-item page-item--dots"
                                                >
                                                    <div
                                                        class="pagination__dots"
                                                    ></div>
                                                </li>
                                                <li class="page-item">
                                                    <a
                                                        class="page-link"
                                                        href="#"
                                                        >9</a
                                                    >
                                                </li>
                                                <li class="page-item">
                                                    <a
                                                        class="page-link page-link--with-arrow"
                                                        href=""
                                                        aria-label="Next"
                                                    >
                                                        <span
                                                            class="page-link__arrow page-link__arrow--right"
                                                            aria-hidden="true"
                                                            ><svg
                                                                width="7"
                                                                height="11"
                                                            >
                                                                <path
                                                                    d="M0.3,10.7L0.3,10.7c0.4,0.4,0.9,0.4,1.3,0L7,5.5L1.6,0.3C1.2-0.1,0.7,0,0.3,0.3l0,0c-0.4,0.4-0.4,1,0,1.3l4,3.9l-4,3.9
	C-0.1,9.8-0.1,10.4,0.3,10.7z"
                                                                />
                                                            </svg>
                                                        </span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </nav>
                                        <div
                                            class="products-view__pagination-legend"
                                        >
                                            Showing 6 of 98 products
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div
                        class="block-space block-space--layout--before-footer"
                    ></div>
                </div>
            </div>

            <div class="block-space block-space--layout--before-footer"></div>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
import productList from "@/Components/App/ProductList.vue";
import ProductFilter2 from "@/Components/App/ProductFilter2";
export default {
    props: ["categories", "subCategories", "vehicle", "parent"],
    components: {
        AppLayout,
        productList,
        ProductFilter2
    },
    data() {
        return {};
    },
    methods: {
        dateFormat(date, dis) {
            if (date) {
                var year = date.toString(10).substring(0, 4);
                var dis = dis ? " - " : "";
                return dis + year;
            } else {
                return "";
            }
        }
    }
};
</script>

<style scoped>
.block-header__title {
    padding: 0;
}
.codeaz_header_subtitle {
    font-size: 18px;
    font-weight: 500;
    color: #666666;
}
.codeaz_sub__category {
    background-color: rgb(226, 226, 226);
    padding: 5px 0;
    text-align: center;
}
.codeaz_sub__category:hover {
    text-decoration: underline;
}
.codeaz_vehicle_details {
    font-size: 14px;
}
.codeaz_vehicle_details span {
    font-weight: 600;
}
</style>
