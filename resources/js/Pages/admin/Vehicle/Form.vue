<template>
    <admin-layout>
        <div class="w-full px-4">
            <div
                class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-gray-100 border-0"
            >
                <div class="rounded-t bg-white mb-0 px-6 py-6">
                    <div class="text-center flex justify-between">
                        <h6 class="text-gray-700 text-xl font-bold">
                            Fahrzeugform
                        </h6>
                        <inertia-link
                            class="bg-green-500 text-white active:bg-pink-600 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-150"
                            as="button"
                            :href="$route('admin.vehicles.index')"
                        >
                            Fahrzeuglisten
                        </inertia-link>
                    </div>
                </div>
                <div class="flex-auto px-4 lg:px-10 py-10 pt-0 mt-10">
                    <form @submit.prevent="submit">
                        <div class="flex flex-wrap">
                            <div class="relative w-full mb-3 px-4">
                                <label
                                    class="block uppercase text-gray-600 text-xs font-bold mb-2"
                                    htmlFor="grid-password"
                                >
                                    Hersteller
                                </label>
                                <select
                                    class="border-0 px-3 py-3 placeholder-gray-300 text-gray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring-0 w-full ease-linear transition-all duration-150"
                                    v-model="form.manuId"
                                >
                                    <option value="" disabled
                                        >Markennamen auswählen</option
                                    >
                                    <option
                                        v-for="(brand, index) in brands"
                                        :key="index"
                                        :value="brand.manuId"
                                        >{{ brand.manuName }}</option
                                    >
                                </select>
                            </div>
                            <div class="relative w-full mb-3 px-4">
                                <label
                                    class="block uppercase text-gray-600 text-xs font-bold mb-2"
                                    htmlFor="grid-password"
                                >
                                    Modell
                                </label>
                                <select
                                    class="border-0 px-3 py-3 placeholder-gray-300 text-gray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring-0 w-full ease-linear transition-all duration-150"
                                    v-model="form.modelId"
                                >
                                    <option value="" disabled
                                        >Modellnamen auswählen</option
                                    >
                                    <option
                                        v-for="(model, index) in models"
                                        :key="index"
                                        :value="model.modelId"
                                        >{{ model.modelname }}</option
                                    >
                                </select>
                            </div>
                            <div class="relative w-full mb-3 px-4">
                                <label
                                    class="block uppercase text-gray-600 text-xs font-bold mb-2"
                                    htmlFor="grid-password"
                                >
                                    Modelltyp
                                </label>
                                <input
                                    type="text"
                                    class="border-0 px-3 py-3 placeholder-gray-300 text-gray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring-0 w-full ease-linear transition-all duration-150"
                                    v-model="form.typeName"
                                />
                            </div>
                            <div class="relative w-full mb-3 px-4">
                                <label
                                    class="block uppercase text-gray-600 text-xs font-bold mb-2"
                                    htmlFor="grid-password"
                                >
                                    Baujahr ab
                                </label>
                                <input
                                    type="text"
                                    class="border-0 px-3 py-3 placeholder-gray-300 text-gray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring-0 w-full ease-linear transition-all duration-150"
                                    v-model="form.yearOfConstrFrom"
                                />
                            </div>
                            <div class="relative w-full mb-3 px-4">
                                <label
                                    class="block uppercase text-gray-600 text-xs font-bold mb-2"
                                    htmlFor="grid-password"
                                >
                                    Baujahr bis
                                </label>
                                <input
                                    type="text"
                                    class="border-0 px-3 py-3 placeholder-gray-300 text-gray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring-0 w-full ease-linear transition-all duration-150"
                                    v-model="form.yearOfConstrTo"
                                />
                            </div>
                            <div class="relative w-full mb-3 px-4">
                                <label
                                    class="block uppercase text-gray-600 text-xs font-bold mb-2"
                                    htmlFor="grid-password"
                                >
                                    ccm tech
                                </label>
                                <input
                                    type="text"
                                    class="border-0 px-3 py-3 placeholder-gray-300 text-gray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring-0 w-full ease-linear transition-all duration-150"
                                    v-model="form.ccmTech"
                                />
                            </div>
                            <div class="relative w-full mb-3 px-4">
                                <label
                                    class="block uppercase text-gray-600 text-xs font-bold mb-2"
                                    htmlFor="grid-password"
                                >
                                    Bauart
                                </label>
                                <input
                                    type="text"
                                    class="border-0 px-3 py-3 placeholder-gray-300 text-gray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring-0 w-full ease-linear transition-all duration-150"
                                    v-model="form.constructionType"
                                />
                            </div>
                            <div class="relative w-full mb-3 px-4">
                                <label
                                    class="block uppercase text-gray-600 text-xs font-bold mb-2"
                                    htmlFor="grid-password"
                                >
                                    Zylinder
                                </label>
                                <input
                                    type="text"
                                    class="border-0 px-3 py-3 placeholder-gray-300 text-gray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring-0 w-full ease-linear transition-all duration-150"
                                    v-model="form.cylinder"
                                />
                            </div>
                            <div class="relative w-full mb-3 px-4">
                                <label
                                    class="block uppercase text-gray-600 text-xs font-bold mb-2"
                                    htmlFor="grid-password"
                                >
                                    Hubraum ccm
                                </label>
                                <input
                                    type="text"
                                    class="border-0 px-3 py-3 placeholder-gray-300 text-gray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring-0 w-full ease-linear transition-all duration-150"
                                    v-model="form.cylinderCapacityCcm"
                                />
                            </div>
                            <div class="relative w-full mb-3 px-4">
                                <label
                                    class="block uppercase text-gray-600 text-xs font-bold mb-2"
                                    htmlFor="grid-password"
                                >
                                    Zylinderinhalt (Liter)
                                </label>
                                <input
                                    type="text"
                                    class="border-0 px-3 py-3 placeholder-gray-300 text-gray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring-0 w-full ease-linear transition-all duration-150"
                                    v-model="form.cylinderCapacityLiter"
                                />
                            </div>
                            <div class="relative w-full mb-3 px-4">
                                <label
                                    class="block uppercase text-gray-600 text-xs font-bold mb-2"
                                    htmlFor="grid-password"
                                >
                                    Treibstoffart
                                </label>
                                <input
                                    type="text"
                                    class="border-0 px-3 py-3 placeholder-gray-300 text-gray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring-0 w-full ease-linear transition-all duration-150"
                                    v-model="form.fuelType"
                                />
                            </div>
                            <div class="relative w-full mb-3 px-4">
                                <label
                                    class="block uppercase text-gray-600 text-xs font-bold mb-2"
                                    htmlFor="grid-password"
                                >
                                    Kraftstofftyp Prozess
                                </label>
                                <input
                                    type="text"
                                    class="border-0 px-3 py-3 placeholder-gray-300 text-gray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring-0 w-full ease-linear transition-all duration-150"
                                    v-model="form.fuelTypeProcess"
                                />
                            </div>
                            <div class="relative w-full mb-3 px-4">
                                <label
                                    class="block uppercase text-gray-600 text-xs font-bold mb-2"
                                    htmlFor="grid-password"
                                >
                                    impulsiver Typ
                                </label>
                                <input
                                    type="text"
                                    class="border-0 px-3 py-3 placeholder-gray-300 text-gray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring-0 w-full ease-linear transition-all duration-150"
                                    v-model="form.impulsionType"
                                />
                            </div>
                            <div class="relative w-full mb-3 px-4">
                                <label
                                    class="block uppercase text-gray-600 text-xs font-bold mb-2"
                                    htmlFor="grid-password"
                                >
                                    Motorentyp
                                </label>
                                <input
                                    type="text"
                                    class="border-0 px-3 py-3 placeholder-gray-300 text-gray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring-0 w-full ease-linear transition-all duration-150"
                                    v-model="form.motorType"
                                />
                            </div>
                            <div class="relative w-full mb-3 px-4">
                                <label
                                    class="block uppercase text-gray-600 text-xs font-bold mb-2"
                                    htmlFor="grid-password"
                                >
                                    Leistung PS von
                                </label>
                                <input
                                    type="text"
                                    class="border-0 px-3 py-3 placeholder-gray-300 text-gray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring-0 w-full ease-linear transition-all duration-150"
                                    v-model="form.powerHpFrom"
                                />
                            </div>
                            <div class="relative w-full mb-3 px-4">
                                <label
                                    class="block uppercase text-gray-600 text-xs font-bold mb-2"
                                    htmlFor="grid-password"
                                >
                                    Leistung PS zu
                                </label>
                                <input
                                    type="text"
                                    class="border-0 px-3 py-3 placeholder-gray-300 text-gray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring-0 w-full ease-linear transition-all duration-150"
                                    v-model="form.powerHpTo"
                                />
                            </div>
                            <div class="relative w-full mb-3 px-4">
                                <label
                                    class="block uppercase text-gray-600 text-xs font-bold mb-2"
                                    htmlFor="grid-password"
                                >
                                    Leistung kW von
                                </label>
                                <input
                                    type="text"
                                    class="border-0 px-3 py-3 placeholder-gray-300 text-gray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring-0 w-full ease-linear transition-all duration-150"
                                    v-model="form.powerKwFrom"
                                />
                            </div>
                            <div class="relative w-full mb-3 px-4">
                                <label
                                    class="block uppercase text-gray-600 text-xs font-bold mb-2"
                                    htmlFor="grid-password"
                                >
                                    Leistung kW zu
                                </label>
                                <input
                                    type="text"
                                    class="border-0 px-3 py-3 placeholder-gray-300 text-gray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring-0 w-full ease-linear transition-all duration-150"
                                    v-model="form.powerKwTo"
                                />
                            </div>
                            <div class="relative w-full mb-3 px-4">
                                <label
                                    class="block uppercase text-gray-600 text-xs font-bold mb-2"
                                    htmlFor="grid-password"
                                >
                                    Ventile
                                </label>
                                <input
                                    type="text"
                                    class="border-0 px-3 py-3 placeholder-gray-300 text-gray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring-0 w-full ease-linear transition-all duration-150"
                                    v-model="form.valves"
                                />
                            </div>
                            <div class="relative w-full mb-3 px-4">
                                <label
                                    class="block uppercase text-gray-600 text-xs font-bold mb-2"
                                    htmlFor="grid-password"
                                >
                                    Bremssystem
                                </label>
                                <input
                                    type="text"
                                    class="border-0 px-3 py-3 placeholder-gray-300 text-gray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring-0 w-full ease-linear transition-all duration-150"
                                    v-model="form.brakeSystem"
                                />
                            </div>
                        </div>
                        <button
                            class="bg-green-600 px-10 py-2 text-white font-semibold mx-4 hover:shadow-xl"
                            type="submit"
                        >
                            einreichen
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </admin-layout>
</template>

<script>
import adminLayout from "@/Layouts/AdminLayout";
export default {
    props: ["brands", "models", "vehicle", "errors"],
    components: {
        adminLayout
    },
    data() {
        return {
            form: {
                _method: "post",
                manuId: "",
                manuName: "",
                modelId: "",
                modelName: "",
                typeName: "",
                yearOfConstrTo: "",
                yearOfConstrFrom: "",
                ccmTech: "",
                carId: "",
                constructionType: "",
                cylinder: "",
                cylinderCapacityCcm: "",
                cylinderCapacityLiter: "",
                fuelType: "",
                fuelTypeProcess: "",
                impulsionType: "",
                motorType: "",
                powerHpFrom: "",
                powerHpTo: "",
                powerKwFrom: "",
                powerKwTo: "",
                valves: "",
                brakeSystem: ""
            }
        };
    },
    computed: {
        success() {
            return this.$page.props.flash.success;
        }
    },
    methods: {
        submit() {
            if (this.category) {
                this.$inertia.post(
                    "/admin/category/" + this.category.assemblyGroupNodeId,
                    this.form
                );
            } else {
                this.$inertia.post("/admin/category", this.form);
            }
        }
    },
    created() {
        if (this.vehicle) {
            this.form._method = "put";
            this.form.manuId = this.vehicle.manuId;
            this.form.manuName = this.vehicle.manuName;
            this.form.modelId = this.vehicle.modelId;
            this.form.modelName = this.vehicle.modelName;
            this.form.typeName = this.vehicle.typeName;
            this.form.yearOfConstrTo = this.vehicle.yearOfConstrTo;
            this.form.yearOfConstrFrom = this.vehicle.yearOfConstrFrom;
            this.form.ccmTech = this.vehicle.ccmTech;
            this.form.carId = this.vehicle.carId;
            this.form.constructionType = this.vehicle.constructionType;
            this.form.cylinder = this.vehicle.cylinder;
            this.form.cylinderCapacityCcm = this.vehicle.cylinderCapacityCcm;
            this.form.cylinderCapacityLiter = this.vehicle.cylinderCapacityLiter;
            this.form.fuelType = this.vehicle.fuelType;
            this.form.fuelTypeProcess = this.vehicle.fuelTypeProcess;
            this.form.impulsionType = this.vehicle.impulsionType;
            this.form.motorType = this.vehicle.motorType;
            this.form.powerHpFrom = this.vehicle.powerHpFrom;
            this.form.powerHpTo = this.vehicle.powerHpTo;
            this.form.powerKwFrom = this.vehicle.powerKwFrom;
            this.form.powerKwTo = this.vehicle.powerKwTo;
            this.form.valves = this.vehicle.valves;
            this.form.brakeSystem = this.vehicle.brakeSystem;
        }
    }
};
</script>
