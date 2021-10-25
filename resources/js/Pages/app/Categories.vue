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
                                        href=""
                                        class="breadcrumb__item-link"
                                        >Autoteile</inertia-link
                                    >
                                </li>
                                <li
                                    class="breadcrumb__title-safe-area"
                                    role="presentation"
                                ></li>
                            </ol>
                        </nav>
                        <!-- Header -->
                        <div
                            class="d-flex justify-content-between border-bottom mb-5"
                        >
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

                            <img
                                :src="
                                    '/media/img.brands/' +
                                        vehicle.manuId +
                                        '.png'
                                "
                                alt=""
                            />
                        </div>
                        <!-- Brands -->
                        <section>
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="row">
                                        <inertia-link
                                            class="col-lg-6 models border-bottom py-2"
                                            v-for="(category,
                                            index) in categories"
                                            :key="index"
                                            :href="
                                                '/car/' +
                                                    vehicle.carId +
                                                    '/subcategories/' +
                                                    category.assemblyGroupNodeId
                                            "
                                        >
                                            {{ category.assemblyGroupName }}
                                        </inertia-link>
                                    </div>
                                </div>
                                <div
                                    class="col-lg-4 pt-2 codeaz_vehicle_details"
                                >
                                    <h5 class="border-bottom  mb-3">
                                        Fahrzeuginformationen
                                    </h5>
                                    <div class="">
                                        Marke —
                                        <span>{{ vehicle.manuName }}</span>
                                    </div>
                                    <div class="">
                                        Modell —
                                        <span>{{ vehicle.modelName }}</span>
                                    </div>
                                    <div class="">
                                        Typ —
                                        <span>{{ vehicle.typeName }}</span>
                                    </div>
                                    <div class="">
                                        Bauart —
                                        <span>{{
                                            vehicle.constructionType
                                        }}</span>
                                    </div>
                                    <div class="">
                                        Motortyp —
                                        <span>{{ vehicle.motorType }}</span>
                                    </div>
                                    <div class="">
                                        Baujahr —
                                        <span>{{
                                            "von " +
                                                dateFormat(
                                                    vehicle.yearOfConstrFrom
                                                )
                                        }}</span>
                                    </div>
                                    <div class="">
                                        Antriebsart —
                                        <span>{{ vehicle.impulsionType }}</span>
                                    </div>
                                    <div class="">
                                        Leistung —
                                        <span>{{
                                            vehicle.powerHpTo +
                                                " HP / " +
                                                vehicle.powerKwTo +
                                                " KW"
                                        }}</span>
                                    </div>
                                    <div class="">
                                        Zylinderkapazität —
                                        <span>{{
                                            vehicle.cylinderCapacityCcm + " ccm"
                                        }}</span>
                                    </div>
                                    <div class="">
                                        Zylinderanzahl —
                                        <span>{{ vehicle.cylinder }}</span>
                                    </div>
                                    <div class="">
                                        Ccm Tech —
                                        <span>{{ vehicle.ccmTech }}</span>
                                    </div>
                                    <div class="">
                                        Brennstoffart —
                                        <span>{{ vehicle.fuelType }}</span>
                                    </div>
                                    <div class="">
                                        Verfahren der Brennstoffart —
                                        <span>{{
                                            vehicle.fuelTypeProcess
                                        }}</span>
                                    </div>
                                    <div class="">
                                        Anzahl der Ventile pro Zylinder —
                                        <span>{{ vehicle.valves }}</span>
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
            <div class="block-space block-space--layout--before-footer"></div>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
export default {
    props: ["categories", "vehicle"],
    components: {
        AppLayout
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
.models {
    font-weight: 600;
}
.models:hover {
    background-color: #006847;
    color: white !important ;
}
.models:hover button {
    color: white !important ;
}
.codeaz_vehicle_details {
    font-size: 14px;
}
.codeaz_vehicle_details span {
    font-weight: 600;
}
</style>
