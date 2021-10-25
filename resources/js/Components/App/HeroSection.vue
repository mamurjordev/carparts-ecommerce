<template>
    <div class="block-finder block">
        <div class="decor block-finder__decor decor--type--bottom">
            <div class="decor__body">
                <div class="decor__start"></div>
                <div class="decor__end"></div>
                <div class="decor__center"></div>
            </div>
        </div>
        <div
            class="block-finder__image"
            style="background-image: url('/images/sell-my-car-for-parts.jpg')"
        ></div>
        <div class="block-finder__body container container--max--xl">
            <form @submit.prevent="search" class="block-finder__form">
                <div
                    class="block-finder__form-control block-finder__form-control--select"
                >
                    <select
                        name="brand"
                        aria-label="Vehicle Make"
                        v-model="manuId"
                        @change="getModels()"
                    >
                        <option value="" disabled>Marke auswählen</option>
                        <option
                            v-for="brand in brands"
                            :key="brand.manuId"
                            :value="brand.manuId"
                        >
                            {{ brand.manuName }}
                        </option>
                    </select>
                </div>
                <div
                    class="position-relative block-finder__form-control block-finder__form-control--select"
                >
                    <div
                        v-if="processing.model"
                        class="loader position-absolute top-0"
                    ></div>
                    <select
                        name="model"
                        aria-label="Vehicle Model"
                        v-model="modelId"
                        @change="getMotors()"
                        disabled
                    >
                        <option value="none" disabled>Modell auswählen</option>
                        <optgroup
                            v-for="(modls, index) in sortedModels"
                            :key="index"
                        >
                            <option
                                value=""
                                disabled
                                class="font-weight-bold"
                                >{{ index }}</option
                            >
                            <option
                                v-for="(model, index) in modls"
                                :key="index"
                                :value="model.modelId"
                                class="ml-2 py-2"
                            >
                                {{
                                    model.modelName +
                                        " (" +
                                        dataFormat(model.yearOfConstrFrom) +
                                        dataFormat(model.yearOfConstrTo, true) +
                                        ")"
                                }}
                            </option>
                        </optgroup>
                    </select>
                </div>
                <div
                    class="position-relative block-finder__form-control block-finder__form-control--select"
                >
                    <div
                        v-if="processing.motors"
                        class="loader position-absolute top-0"
                    ></div>
                    <select
                        name="engine"
                        aria-label="Vehicle Engine"
                        disabled
                        v-model="carID"
                    >
                        <option value="none" disabled>Engine auswählen</option>
                        <option
                            v-for="(motor, index) in motors"
                            :key="index"
                            :value="motor.carId"
                        >
                            {{ motor.typeName }}
                            {{ motor.fuelType }} ({{
                                power(motor.powerHpTo, motor.powerHpFrom) +
                                    " PS, " +
                                    motor.powerKwFrom +
                                    " kw"
                            }})
                        </option>
                    </select>
                </div>
                <button
                    :class="
                        processing.search
                            ? 'mamurjor_button_disable'
                            : 'block-finder__form-control--button'
                    "
                    class="block-finder__form-control "
                    type="submit"
                    :disabled="processing.search"
                >
                    <div
                        v-if="processing.search"
                        class="spinner-border text-primary mr-2"
                        role="status"
                    >
                        <span class="sr-only">Loading...</span>
                    </div>
                    Suche
                </button>
            </form>
        </div>
    </div>
</template>

<script>
export default {
    props: ["brands"],
    data: function() {
        return {
            manuId: "",
            modelId: null,
            models: null,
            motors: null,
            carID: null,
            processing: {
                search: false,
                model: false,
                motors: false
            }
        };
    },
    methods: {
        power(a, b) {
            if (a == b) {
                return a;
            } else {
                return a + " - " + b;
            }
        },
        dataFormat(data, dis) {
            if (data) {
                var year = data.toString(10).substring(0, 4);
                var month = data.toString(10).substring(4, 6);
                var dis = dis ? " - " : "";
                return dis + month + ", " + year;
            } else {
                return "";
            }
        },
        async getModels() {
            this.models = this.motors = null;
            this.processing.search = false;
            this.processing.model = true;
            this.$http
                .get("/api/v1/models/" + this.manuId)
                .then(
                    response => (
                        (this.models = response.data),
                        (this.processing.model = false)
                    )
                );
        },
        async getMotors() {
            this.motors = null;
            this.processing.search = false;
            this.processing.motors = true;
            this.$http
                .get(
                    "/api/v1/vehicle-details/" +
                        this.manuId +
                        "/" +
                        this.modelId
                )
                .then(
                    response => (
                        (this.motors = response.data),
                        (this.processing.motors = false)
                    )
                );
        },
        async search() {
            this.processing.search = true;
            if (this.carID) {
                this.$inertia.get("/categories/" + this.carID);
            }
        }
    },
    mounted() {
        $(function() {
            $(".block-finder__form-control--select select").on(
                "change",
                function() {
                    const item = $(this).closest(
                        ".block-finder__form-control--select"
                    );

                    if ($(this).val() !== "none") {
                        item.find(
                            "~ .block-finder__form-control--select:eq(0) select"
                        )
                            .prop("disabled", false)
                            .val("none");
                        item.find(
                            "~ .block-finder__form-control--select:gt(0) select"
                        )
                            .prop("disabled", true)
                            .val("none");
                    } else {
                        item.find(
                            "~ .block-finder__form-control--select select"
                        )
                            .prop("disabled", true)
                            .val("none");
                    }

                    item.find(
                        "~ .block-finder__form-control--select select"
                    ).trigger("change.select2");
                }
            );
        });
    },
    computed: {
        check() {
            if (this.models) {
                this.models.filter(i => {
                    let duplicate = this.models.filter(x => {
                        return x.modelName === i.modelName;
                    });
                    // Return if has duplicate
                    return duplicate.length > 1;
                });
            }
        },
        sortedModels() {
            if (this.models) {
                var data = this.models;
                var keys = [];
                data.forEach(Element => {
                    keys.push(Element.modelName.split(" ")[0]);
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
                            return item.modelName.split(" ")[0] == element;
                            //   return arr.indexOf(item.split(" ")[0]) === Element;
                        });
                    final[element] = values;
                });

                return final;
            }
        }
    }
};
</script>
