<template>
    <app-layout>
        <div
            class="block-space block-space--layout--spaceship-ledge-height"
        ></div>
        <div class="block">
            <div class="container">
                <div class="document">
                    <div class="document__header">
                        <h1 class="document__title">{{ page.title }}</h1>
                        <div class="document__subtitle">
                            Diese Vereinbarung wurde zuletzt geändert am
                            {{ page.updated_at | moment("DD MMM YYYY") }}.
                        </div>
                    </div>
                    <div class="document__content card">
                        <div class="typography" v-html="page.content"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="block-space block-space--layout--before-footer"></div>
    </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
export default {
    props: ["page"],
    data() {
        return {
            bread: {
                current: "single product"
            }
        };
    },

    components: {
        AppLayout
    }
};
</script>
