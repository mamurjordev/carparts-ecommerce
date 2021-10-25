<template>
    <div class="block-split__item block-split__item-sidebar col-auto">
        <div class="sidebar sidebar--offcanvas--mobile">
            <div class="sidebar__backdrop"></div>
            <div class="sidebar__body">
                <div class="sidebar__header">
                    <div class="sidebar__title">
                        Filters
                    </div>
                    <button class="sidebar__close" type="button">
                        <svg width="12" height="12">
                            <path
                                d="M10.8,10.8L10.8,10.8c-0.4,0.4-1,0.4-1.4,0L6,7.4l-3.4,3.4c-0.4,0.4-1,0.4-1.4,0l0,0c-0.4-0.4-0.4-1,0-1.4L4.6,6L1.2,2.6
	c-0.4-0.4-0.4-1,0-1.4l0,0c0.4-0.4,1-0.4,1.4,0L6,4.6l3.4-3.4c0.4-0.4,1-0.4,1.4,0l0,0c0.4,0.4,0.4,1,0,1.4L7.4,6l3.4,3.4
	C11.2,9.8,11.2,10.4,10.8,10.8z"
                            />
                        </svg>
                    </button>
                </div>
                <div class="sidebar__content">
                    <div
                        class="widget widget-filters widget-filters--offcanvas--mobile"
                        data-collapse
                        data-collapse-opened-class="filter--opened"
                    >
                        <div class="widget__header widget-filters__header">
                            <!-- <h4>Filters</h4> -->
                        </div>
                        <div class="widget-filters__list">
                            <div class="widget-filters__item">
                                <div
                                    class="filter filter--opened"
                                    data-collapse-item
                                >
                                    <button
                                        type="button"
                                        class="filter__title"
                                        data-collapse-trigger
                                    >
                                        Kategorien
                                        <span class="filter__arrow"
                                            ><svg width="12px" height="7px">
                                                <path
                                                    d="M0.286,0.273 L0.286,0.273 C-0.070,0.629 -0.075,1.204 0.276,1.565 L5.516,6.993 L10.757,1.565 C11.108,1.204 11.103,0.629 10.747,0.273 L10.747,0.273 C10.385,-0.089 9.796,-0.086 9.437,0.279 L5.516,4.296 L1.596,0.279 C1.237,-0.086 0.648,-0.089 0.286,0.273 Z"
                                                /></svg
                                        ></span>
                                    </button>
                                    <div
                                        class="filter__body"
                                        data-collapse-content
                                    >
                                        <div class="filter__container">
                                            <div class="filter-categories">
                                                <ul
                                                    class="filter-categories__list"
                                                >
                                                    <li
                                                        v-for="(category,
                                                        index) in categories"
                                                        :key="index"
                                                        class="filter-categories__item filter-categories__item--parent"
                                                    >
                                                        <span
                                                            class="filter-categories__arrow"
                                                            ><svg
                                                                width="6"
                                                                height="9"
                                                            >
                                                                <path
                                                                    d="M5.7,8.7L5.7,8.7c-0.4,0.4-0.9,0.4-1.3,0L0,4.5l4.4-4.2c0.4-0.4,0.9-0.3,1.3,0l0,0c0.4,0.4,0.4,1,0,1.3l-3,2.9l3,2.9
	C6.1,7.8,6.1,8.4,5.7,8.7z"
                                                                />
                                                            </svg>
                                                        </span>
                                                        <inertia-link
                                                            :href="
                                                                '/car/' +
                                                                    vehicle.carId +
                                                                    '/subcategories/' +
                                                                    category.assemblyGroupNodeId
                                                            "
                                                            >{{
                                                                category.assemblyGroupName
                                                            }}</inertia-link
                                                        >
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    props: ["categories", "vehicle"]
};
</script>

<style scoped>
.filter-categories__item a {
    word-break: break-word;
}
</style>
