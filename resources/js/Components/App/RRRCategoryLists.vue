<template>
    <section>
        <div class="block">
            <div
                class="categories-list categories-list--layout--columns-7-full"
            >
                <ul class="categories-list__body">
                    <li class="categories-list__item">
                        <inertia-link href="/products">
                            <div class="image image--type--category">
                                <div class="image__body">
                                    <img
                                        class="image__tag"
                                        src="/media/img.sections/200x200/23208.png"
                                        alt=""
                                    />
                                </div>
                            </div>
                            <div class="categories-list__item-name">Tire</div>
                        </inertia-link>
                    </li>
                    <li class="categories-list__divider"></li>
                    <li
                        v-for="(part, index) in parts"
                        :key="index"
                        class="categories-list__item position-relative"
                    >
                        <div
                            @click="
                                getSubCategory(part.assemblyGroupNodeId, index)
                            "
                            class="webootrix__cursor-pointer"
                        >
                            <div class="image image--type--category">
                                <div class="image__body">
                                    <img
                                        class="image__tag"
                                        :src="
                                            '/media/img.sections/200x200/' +
                                                part.old_str_id +
                                                '.png'
                                        "
                                        alt=""
                                    />
                                </div>
                            </div>
                            <div class="categories-list__item-name">
                                {{ part.assemblyGroupName }}
                            </div>
                        </div>
                        <div
                            v-if="showSub == index"
                            class="webootrix__indicator position-absolute"
                        ></div>
                        <ul
                            v-if="showSub == index"
                            class="position-absolute webootrix__subcategory__Dropdown"
                        >
                            <li
                                v-for="(subCategory, index) in subCategories"
                                :key="index"
                                class="webootrix__subcategory"
                            >
                                <inertia-link href="" class="webootrix__link">
                                    <img
                                        :src="
                                            '/media/img.sections/55x55/' +
                                                subCategory.old_str_id +
                                                '.png'
                                        "
                                        alt=""
                                        class="w-10"
                                    />
                                    <div class="webootrix__subcategory__text">
                                        {{ subCategory.assemblyGroupName }}
                                    </div>
                                </inertia-link>
                            </li>
                        </ul>
                    </li>
                    <li class="categories-list__divider"></li>
                </ul>
            </div>
        </div>
    </section>
</template>

<script>
export default {
    props: ["parts"],
    data: function() {
        return {
            showSub: null,
            subCategories: null
        };
    },
    methods: {
        getSubCategory(section_id, index) {
            this.$http
                .get("/api/v1/subcategory/" + section_id)
                .then(response => (this.subCategories = response.data));
            this.showSub = index;
        }
    },
    mounted() {}
};
</script>
