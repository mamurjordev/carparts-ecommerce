<template>
    <div
        class="product-gallery product-gallery--layout--product-full product__gallery"
        data-layout="product-full"
    >
        <div class="product-gallery__featured">
            <button type="button" class="product-gallery__zoom">
                <svg width="24" height="24">
                    <path
                        d="M15,18c-2,0-3.8-0.6-5.2-1.7c-1,1.3-2.1,2.8-3.5,4.6c-2.2,2.8-3.4,1.9-3.4,1.9s-0.6-0.3-1.1-0.7
	c-0.4-0.4-0.7-1-0.7-1s-0.9-1.2,1.9-3.3c1.8-1.4,3.3-2.5,4.6-3.5C6.6,12.8,6,11,6,9c0-5,4-9,9-9s9,4,9,9S20,18,15,18z M15,2
	c-3.9,0-7,3.1-7,7s3.1,7,7,7s7-3.1,7-7S18.9,2,15,2z M16,13h-2v-3h-3V8h3V5h2v3h3v2h-3V13z"
                    />
                </svg>
            </button>
            <div class="owl-carousel">
                <a
                    v-for="(image, index) in images"
                    :key="index"
                    class="image image--type--product"
                    :href="'/media/deletable/' + image"
                    target="_blank"
                    data-width="700"
                    data-height="700"
                >
                    <div class="image__body">
                        <img
                            class="image__tag"
                            :src="'/media/deletable/' + image"
                            alt=""
                        />
                    </div>
                </a>
            </div>
        </div>
        <div class="product-gallery__thumbnails">
            <div class="owl-carousel">
                <div
                    v-for="(image, index) in images"
                    :key="index"
                    class="product-gallery__thumbnails-item image image--type--product"
                >
                    <div class="image__body">
                        <img
                            class="image__tag"
                            :src="'/media/deletable/' + image"
                            alt=""
                        />
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            images: [
                "product-1-500x500.jpg",
                "product-2-500x500.jpg",
                "product-3-500x500.jpg",
                "product-4-500x500.jpg"
            ]
        };
    },
    mounted() {
        function isRTL() {
            return false;
        }
        const initProductGallery = function(element, layout) {
            layout = layout !== undefined ? layout : "standard";

            const options = {
                dots: false,
                margin: 10,
                rtl: isRTL()
            };
            const layoutOptions = {
                "product-sidebar": {
                    responsive: {
                        1400: { items: 8, margin: 10 },
                        1200: { items: 6, margin: 10 },
                        992: { items: 8, margin: 10 },
                        768: { items: 8, margin: 10 },
                        576: { items: 6, margin: 10 },
                        420: { items: 5, margin: 8 },
                        0: { items: 4, margin: 8 }
                    }
                },
                "product-full": {
                    responsive: {
                        1400: { items: 6, margin: 10 },
                        1200: { items: 5, margin: 8 },
                        992: { items: 7, margin: 10 },
                        768: { items: 5, margin: 8 },
                        576: { items: 6, margin: 8 },
                        420: { items: 5, margin: 8 },
                        0: { items: 4, margin: 8 }
                    }
                },
                quickview: {
                    responsive: {
                        992: { items: 5 },
                        520: { items: 6 },
                        440: { items: 5 },
                        340: { items: 4 },
                        0: { items: 3 }
                    }
                }
            };

            const gallery = $(element);

            const image = gallery.find(
                ".product-gallery__featured .owl-carousel"
            );
            const carousel = gallery.find(
                ".product-gallery__thumbnails .owl-carousel"
            );

            image
                .owlCarousel({ items: 1, dots: false, rtl: isRTL() })
                .on("changed.owl.carousel", syncPosition);

            carousel
                .on("initialized.owl.carousel", function() {
                    carousel
                        .find(".product-gallery__thumbnails-item")
                        .eq(0)
                        .addClass("product-gallery__thumbnails-item--active");
                })
                .owlCarousel($.extend({}, options, layoutOptions[layout]));

            carousel.on("click", ".owl-item", function(e) {
                e.preventDefault();

                image.data("owl.carousel").to($(this).index(), 300, true);
            });

            gallery.find(".product-gallery__zoom").on("click", function() {
                openPhotoSwipe(image.find(".owl-item.active").index());
            });

            image.on("click", ".owl-item > a", function(event) {
                event.preventDefault();

                openPhotoSwipe(
                    $(this)
                        .closest(".owl-item")
                        .index()
                );
            });

            function getIndexDependOnDir(index) {
                // we need to invert index id direction === 'rtl' because photoswipe do not support rtl
                if (isRTL()) {
                    return image.find(".owl-item img").length - 1 - index;
                }

                return index;
            }

            function openPhotoSwipe(index) {
                const photoSwipeImages = image
                    .find(".owl-item a")
                    .toArray()
                    .map(function(element) {
                        const img = $(element).find("img")[0];
                        const width =
                            $(element).data("width") || img.naturalWidth;
                        const height =
                            $(element).data("height") || img.naturalHeight;

                        return {
                            src: element.href,
                            msrc: element.href,
                            w: width,
                            h: height
                        };
                    });

                if (isRTL()) {
                    photoSwipeImages.reverse();
                }

                const photoSwipeOptions = {
                    getThumbBoundsFn: index => {
                        const imageElements = image
                            .find(".owl-item img")
                            .toArray();
                        const dirDependentIndex = getIndexDependOnDir(index);

                        if (!imageElements[dirDependentIndex]) {
                            return null;
                        }

                        const tag = imageElements[dirDependentIndex];
                        const width = tag.naturalWidth;
                        const height = tag.naturalHeight;
                        const rect = tag.getBoundingClientRect();
                        const ration = Math.min(
                            rect.width / width,
                            rect.height / height
                        );
                        const fitWidth = width * ration;
                        const fitHeight = height * ration;

                        return {
                            x:
                                rect.left +
                                (rect.width - fitWidth) / 2 +
                                window.pageXOffset,
                            y:
                                rect.top +
                                (rect.height - fitHeight) / 2 +
                                window.pageYOffset,
                            w: fitWidth
                        };
                    },
                    index: getIndexDependOnDir(index),
                    bgOpacity: 0.9,
                    history: false
                };

                const photoSwipeGallery = new PhotoSwipe(
                    $(".pswp")[0],
                    PhotoSwipeUI_Default,
                    photoSwipeImages,
                    photoSwipeOptions
                );

                photoSwipeGallery.listen("beforeChange", () => {
                    image
                        .data("owl.carousel")
                        .to(
                            getIndexDependOnDir(
                                photoSwipeGallery.getCurrentIndex()
                            ),
                            0,
                            true
                        );
                });

                photoSwipeGallery.init();
            }

            function syncPosition(el) {
                let current = el.item.index;

                carousel
                    .find(".product-gallery__thumbnails-item")
                    .removeClass("product-gallery__thumbnails-item--active")
                    .eq(current)
                    .addClass("product-gallery__thumbnails-item--active");
                const onscreen = carousel.find(".owl-item.active").length - 1;
                const start = carousel
                    .find(".owl-item.active")
                    .first()
                    .index();
                const end = carousel
                    .find(".owl-item.active")
                    .last()
                    .index();

                if (current > end) {
                    carousel.data("owl.carousel").to(current, 100, true);
                }
                if (current < start) {
                    carousel
                        .data("owl.carousel")
                        .to(current - onscreen, 100, true);
                }
            }
        };

        $(function() {
            $(".product").each(function() {
                const gallery = $(this).find(".product-gallery");

                if (gallery.length > 0) {
                    initProductGallery(gallery[0], gallery.data("layout"));
                }
            });
        });
    }
};
</script>
