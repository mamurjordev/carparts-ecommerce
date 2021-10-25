<template>
    <div id="root">
        <Navigation />
        <div class="relative md:ml-52 bg-gray-50 min-h-screen">
            <header-vue />
            <hero />

            <div class="px-4 mx-auto w-full -m-24">
                <main class="flex-grow">
                    <slot />
                </main>
                <FooterVue />
            </div>
            <div class="h-screen"></div>
        </div>
    </div>
</template>

<script>
import Navigation from "@/Components/Admin/Navigation";
import HeaderVue from "@/Components/Admin/Header";
import Hero from "@/Components/Admin/Hero";
import FooterVue from "@/Components/Admin/Footer";
export default {
    components: {
        Navigation,
        HeaderVue,
        Hero,
        FooterVue
    },
    methods: {
        /* Function for dropdowns */
        // openDropdown(event, dropdownID) {
        //     let element = event.target;
        //     while (element.nodeName !== "A") {
        //         element = element.parentNode;
        //     }
        //     Popper.createPopper(element, document.getElementById(dropdownID), {
        //         placement: "bottom-start"
        //     });
        //     document.getElementById(dropdownID).classList.toggle("hidden");
        //     document.getElementById(dropdownID).classList.toggle("block");
        // }
    }
};
</script>
