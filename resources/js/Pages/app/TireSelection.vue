<template>
    <app-layout>
        <bread-crumb :breads="breads" />
        <div class="">
            <div class="bg_tire_selection container">
                <h5 class="text-center">REIFEN SHOP</h5>
                <div class="tire_selection_section">
                    <div class="tire_selection_body">
                        <form action="">
                            <!-- Tire types -->
                            <select>
                                <option value=""></option>
                            </select>
                            <img src="/media/site/select_tire.png" alt="" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
import BreadCrumb from "@/Components/App/BreadCrumb";

export default {
    props: ["parts"],
    data() {
        return {
            breads: {
                bread: {
                    0: {
                        url: "",
                        label: "BMW"
                    },
                    1: {
                        url: "",
                        label: "1ER"
                    },
                    2: {
                        url: "",
                        label: "1 HATCHBACK (E87)"
                    }
                },
                current: "single product"
            }
        };
    },

    components: {
        AppLayout,
        BreadCrumb
    }
};
</script>

<style>
.tire_selection_section {
    background-image: url("/media/site/select_block_car1.png");
    background-repeat: no-repeat;
    background-size: cover;
    height: 400px;
    width: 100%;
}
.tire_selection_body {
    border: 2px solid #006847;
    max-width: 485px;
    margin: auto;
}
</style>
