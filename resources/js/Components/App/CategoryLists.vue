<template>
    <section>
        <div class="block">
            <div
                class="categories-list categories-list--layout--columns-7-full"
            >
                <ul
                    class="categories-list__body nav nav-tabs"
                    id="myTab"
                    role="tablist"
                >
                    <li
                        class="categories-list__item nav-item"
                        role="presentation"
                    >
                        <inertia-link href="/reifen">
                            <div class="image image--type--category">
                                <div class="image__body">
                                    <img
                                        class="image__tag"
                                        src="/media/img.sections/200x200/23208.png"
                                        alt=""
                                    />
                                </div>
                            </div>
                            <div class="categories-list__item-name">Reifen</div>
                        </inertia-link>
                    </li>
                    <li class="categories-list__divider"></li>
                    <li
                        v-for="(category, index) in categories"
                        :key="index"
                        class="categories-list__item position-relative dropdown"
                    >
                        <button
                            class="webootrix__cursor-pointer"
                            type="button"
                            id="dropdownMenuButton"
                            data-toggle="dropdown"
                            aria-haspopup="true"
                            aria-expanded="false"
                            @click="
                                getSubCategory(category.assemblyGroupNodeId)
                            "
                        >
                            <div class="image image--type--category">
                                <div class="image__body">
                                    <img
                                        class="image__tag"
                                        :src="
                                            '/media/img.sections/200x200/' +
                                                category.image +
                                                '.png'
                                        "
                                        alt=""
                                    />
                                </div>
                            </div>
                            <div class="categories-list__item-name">
                                {{ category.assemblyGroupName }}
                            </div>
                        </button>
                        <div class="dropdown-menu mamurjor_sub_category">
                            <div class="dropdown-item" v-if="subCategories">
                                <div class="row container mx-auto">
                                    <div
                                        v-for="(subCategory,
                                        index) in subCategories"
                                        :key="index"
                                        class="col-md-6 col-lg-4 col-xl-3 my-2"
                                    >
                                        <inertia-link href="/products">
                                            <img
                                                :src="
                                                    '/media/img.sections/200x200/' +
                                                        subCategory.old_str_id +
                                                        '.png'
                                                "
                                                class="sub_image"
                                            />
                                            {{ subCategory.assemblyGroupName }}
                                        </inertia-link>
                                    </div>
                                </div>
                            </div>

                            <div
                                v-else-if="processing.subCategories"
                                class="text-center"
                            >
                                <div
                                    class="spinner-border text-primary"
                                    role="status"
                                >
                                    <span class="sr-only">Loading...</span>
                                </div>
                            </div>

                            <div class="" v-else>
                                No category
                            </div>
                        </div>
                    </li>
                    <li class="categories-list__divider"></li>
                    <li class="categories-list__divider"></li>
                </ul>
            </div>
        </div>
    </section>
</template>

<script>
import Button from "../../Jetstream/Button.vue";
export default {
    props: ["categories"],
    components: { Button },
    data: function() {
        return {
            showSubs: false,
            subCategories: null,
            processing: {
                subCategories: false
            }
        };
    },
    methods: {
        getSubCategory(id) {
            this.subCategories = null;
            this.processing.subCategories = true;
            this.$http
                .get("/api/v1/subcategory/" + id)
                .then(
                    response => (
                        (this.subCategories = response.data),
                        (this.processing.subCategories = false)
                    )
                );
        }
    }
};
</script>

<style>
.mamurjor_sub_category {
    width: max-content;
    min-width: 100vw;
    padding: 10px 15px;
}
button#dropdownMenuButton {
    width: 100%;
    height: 100%;
    border: none;
    background-color: white;
}
.sub_image {
    width: 30px;
    height: auto;
}
.categories-list__item-name {
    word-wrap: break-word;
}
</style>
