<template>

    <div class="block-header block-header--has-breadcrumb">
        <div class="container">
            <div class="block-header__body mt-10">
                <nav class="breadcrumb block-header__breadcrumb" aria-label="breadcrumb">
                    <ol class="breadcrumb__list">
                        <!-- <li class="breadcrumb__spaceship-safe-area" role="presentation"></li> -->
                        <li class="breadcrumb__item breadcrumb__item--parent breadcrumb__item--first">
                            <inertia-link href="/" class="breadcrumb__item-link">Startseite</inertia-link>
                        </li>
                        <li v-for="(b, index) in bread.breads" :key="index" class="breadcrumb__item breadcrumb__item--parent">
                            <inertia-link :href="b.url" class="breadcrumb__item-link">{{ b.label }}</inertia-link>
                        </li>
                        <li class="breadcrumb__item breadcrumb__item--current breadcrumb__item--last" aria-current="page">
                            <span class="breadcrumb__item-link">{{ bread.current }}</span>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

</template>

<script>
export default {
    props: ['bread']
}
</script>
