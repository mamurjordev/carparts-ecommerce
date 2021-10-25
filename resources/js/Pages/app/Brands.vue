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
                                        >Brands</inertia-link
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
                                    Teile nach Fahrzeug
                                </h1>

                                <span class="header_subtitle"
                                    >Wählen Sie die Fahrzeugmarke, für die Sie
                                    Teile suchen</span
                                >
                            </div>
                        </div>
                        <!-- Brands -->
                        <section>
                            <div
                                v-for="(getBrand, index) in getBrands"
                                :key="index"
                                class="row border-bottom py-2"
                            >
                                <div class="col-lg-4 pt-2 font-weight-bold">
                                    {{ index }}
                                </div>
                                <div class="col-lg-8">
                                    <div class="row">
                                        <inertia-link
                                            class="col-6 col-lg-4 models"
                                            v-for="brand in getBrand"
                                            :key="brand.id"
                                            :href="'/brands/' + brand.manuId"
                                        >
                                            {{ brand.manuName }}
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
            <div class="block-space block-space--layout--before-footer"></div>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
export default {
    props: ["brands"],
    components: {
        AppLayout
    },
    data() {
        return {};
    },
    computed: {
        getBrands() {
            var data = this.brands;
            var letters = [
                "A",
                "B",
                "C",
                "D",
                "E",
                "F",
                "G",
                "H",
                "I",
                "J",
                "K",
                "L",
                "M",
                "N",
                "O",
                "P",
                "Q",
                "R",
                "S",
                "T",
                "U",
                "V",
                "W",
                "X",
                "Y",
                "Z"
            ];
            var final = {};
            letters.forEach(element => {
                var values = data
                    .map(obj => {
                        return obj;
                    })
                    .filter((item, index, arr) => {
                        return item.manuName.slice(0, 1) == element;
                        //   return arr.indexOf(item.split(" ")[0]) === Element;
                    });

                final[element] = values;
            });
            return final;
        }
    },
    methods: {
        dataFormat(data, dis) {
            if (data) {
                var year = data.toString(10).substring(0, 4);
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
.models {
    color: #006847;
    cursor: pointer;
}

.models button {
    background-color: transparent;
    color: #006847;
}

.models button:focus {
    border: none;
    box-shadow: none;
}
.models:hover {
    background-color: #006847;
    color: white !important ;
}
.models:hover button {
    color: white !important ;
}
.text-sm {
    font-size: 12px;
}
</style>
