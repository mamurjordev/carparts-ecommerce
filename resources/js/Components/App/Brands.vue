<template>
    <div class="block block-brands block-brands--layout--columns-8-full">
        <div class="container">
            <ul class="block-brands__list">
                <li
                    v-for="(brand, index) in brands"
                    :key="index"
                    class="block-brands__item"
                >
                    <inertia-link
                        :href="'/brands/' + brand.manuId"
                        class="block-brands__item-link"
                    >
                        <img
                            :src="'/media/img.brands/' + brand.manuId + '.png'"
                            alt=""
                        />
                        <span class="block-brands__item-name">{{
                            brand.manuName
                        }}</span>
                    </inertia-link>
                </li>
            </ul>
            <div class="text-center codeaz_show_all">
                <inertia-link href="/brands">
                    Alle marken anzeigen
                </inertia-link>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ["brands"]
};
</script>

<style scoped>
.block-brands__item-link img {
    -webkit-filter: grayscale(0);
    filter: grayscale(0);
    opacity: 1;
}
.block-brands__item a {
    background-color: #eeeeee;
    margin: 5px;
}
.codeaz_show_all a {
    background-color: #eeeeee;
    border-radius: 0px 0px 5px 5px;
    padding: 5px 15px;
}
.codeaz_show_all a:hover {
    text-decoration: underline;
}
</style>
