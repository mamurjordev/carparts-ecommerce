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
                                        >{{ brand.manuName }}</inertia-link
                                    >
                                </li>
                                <li
                                    class="breadcrumb__item breadcrumb__item--current breadcrumb__item--last"
                                    aria-current="page"
                                >
                                    <span class="breadcrumb__item-link"
                                        >Fahrzeugmodell</span
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
                                    {{ brand.manuName }}
                                </h1>

                                <span class="header_subtitle"
                                    >Wählen Sie Ihr Fahrzeugmodell und die
                                    Motorisierung.</span
                                >
                            </div>
                            <img
                                :src="
                                    '/media/img.brands/' + brand.manuId + '.png'
                                "
                                alt=""
                            />
                        </div>
                        <!-- Models -->
                        <section>
                            <div
                                v-for="(getModel, index) in getModels"
                                :key="index"
                                class="row border-bottom py-2"
                            >
                                <div class="col-lg-4 pt-2 font-weight-bold">
                                    {{ index }}
                                </div>
                                <div class="col-lg-8">
                                    <div class="row">
                                        <div
                                            class="col-lg-6 models dropdown"
                                            v-for="model in getModel"
                                            :key="model.id"
                                        >
                                            <button
                                                @click="
                                                    getMotors(model.modelId)
                                                "
                                                class="btn btn-secondary py-2 w-100 text-left  font-weight-bold"
                                                type="button"
                                                id="dropdownMenuButton"
                                                data-toggle="dropdown"
                                                aria-haspopup="true"
                                                aria-expanded="true"
                                            >
                                                {{ model.modelname }}
                                                <span class="text-sm">{{
                                                    " -- " +
                                                        dataFormat(
                                                            model.yearOfConstrFrom
                                                        ) +
                                                        dataFormat(
                                                            model.yearOfConstrTo,
                                                            true
                                                        )
                                                }}</span>
                                            </button>

                                            <div
                                                class="dropdown-menu px-3"
                                                aria-labelledby="dropdownMenuLink"
                                            >
                                                <h5 class="border-bottom pb-1">
                                                    Motorisierung auswählen
                                                </h5>
                                                <div v-if="motors" class="">
                                                    <inertia-link
                                                        v-for="(motor,
                                                        index) in motors"
                                                        :key="index"
                                                        :href="
                                                            '/categories/' +
                                                                motor.carId
                                                        "
                                                        class="row py-1 motors border-bottom"
                                                    >
                                                        <div
                                                            class="col-4 motor_name font-weight-bold"
                                                        >
                                                            {{ motor.typeName }}
                                                        </div>
                                                        <div class="col-4">
                                                            {{ motor.fuelType }}
                                                        </div>
                                                        <div class="col-4">
                                                            {{
                                                                motor.powerHpFrom +
                                                                    " HP / " +
                                                                    motor.powerKwFrom +
                                                                    " KW"
                                                            }}
                                                        </div>
                                                    </inertia-link>
                                                </div>
                                                <div v-else class="text-center">
                                                    <div
                                                        class="spinner-border text-success"
                                                        role="status"
                                                    >
                                                        <span class="sr-only"
                                                            >Loading...</span
                                                        >
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
    props: ["brand", "models"],
    components: {
        AppLayout
    },
    data() {
        return {
            motors: null,
            processing: {
                motors: false
            }
        };
    },
    computed: {
        getModels() {
            var data = this.models;
            var keys = [];
            data.forEach(Element => {
                keys.push(Element.modelname.split(" ")[0]);
            });

            // get unique keys

            var final = {};
            const uniques = keys
                .map(obj => {
                    return obj;
                })
                .filter((item, index, arr) => {
                    return arr.indexOf(item) === index;
                });
            uniques.forEach(element => {
                final[element] = null;
            });

            uniques.forEach(element => {
                var values = data
                    .map(obj => {
                        return obj;
                    })
                    .filter((item, index, arr) => {
                        return item.modelname.split(" ")[0] == element;
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
        },
        async getMotors(modelId) {
            this.motors = null;
            this.processing.motors = true;
            this.$http
                .get(
                    "/api/v1/vehicle-details/" +
                        this.brand.manuId +
                        "/" +
                        modelId
                )
                .then(
                    response => (
                        (this.motors = response.data),
                        (this.processing.motors = false)
                    )
                );
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
.motors .motor_name {
    color: #006847;
}
.motors:hover,
.motors:hover .motor_name {
    background-color: #006847;
    color: white;
}
.dropdown-menu {
    min-width: max-content;
}
</style>
