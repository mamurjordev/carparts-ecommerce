<template>
    <div class="block block-sale">
        <div class="block-sale__content">
            <div class="block-sale__header">
                <div class="block-sale__title">Beachtung! Dealzone</div>
                <div class="block-sale__subtitle">
                    Beeile dich! Rabatte bis zu 70%
                </div>
                <div class="block-sale__timer">
                    <div class="timer">
                        <div class="timer__part">
                            <div
                                class="timer__part-value timer__part-value--days"
                            >
                                02
                            </div>
                            <div class="timer__part-label">Tage</div>
                        </div>
                        <div class="timer__dots"></div>
                        <div class="timer__part">
                            <div
                                class="timer__part-value timer__part-value--hours"
                            >
                                23
                            </div>
                            <div class="timer__part-label">Hrs</div>
                        </div>
                        <div class="timer__dots"></div>
                        <div class="timer__part">
                            <div
                                class="timer__part-value timer__part-value--minutes"
                            >
                                07
                            </div>
                            <div class="timer__part-label">Mins</div>
                        </div>
                        <div class="timer__dots"></div>
                        <div class="timer__part">
                            <div
                                class="timer__part-value timer__part-value--seconds"
                            >
                                54
                            </div>
                            <div class="timer__part-label">Secs</div>
                        </div>
                    </div>
                </div>
                <div class="block-sale__controls">
                    <div
                        class="arrow block-sale__arrow block-sale__arrow--prev arrow--prev"
                    >
                        <button class="arrow__button" type="button">
                            <svg width="7" height="11">
                                <path
                                    d="M6.7,0.3L6.7,0.3c-0.4-0.4-0.9-0.4-1.3,0L0,5.5l5.4,5.2c0.4,0.4,0.9,0.3,1.3,0l0,0c0.4-0.4,0.4-1,0-1.3l-4-3.9l4-3.9C7.1,1.2,7.1,0.6,6.7,0.3z"
                                />
                            </svg>
                        </button>
                    </div>
                    <div class="block-sale__link">
                        <a href="">Alle verfügbaren Angebote anzeigen</a>
                    </div>
                    <div
                        class="arrow block-sale__arrow block-sale__arrow--next arrow--next"
                    >
                        <button class="arrow__button" type="button">
                            <svg width="7" height="11">
                                <path
                                    d="M0.3,10.7L0.3,10.7c0.4,0.4,0.9,0.4,1.3,0L7,5.5L1.6,0.3C1.2-0.1,0.7,0,0.3,0.3l0,0c-0.4,0.4-0.4,1,0,1.3l4,3.9l-4,3.9
	C-0.1,9.8-0.1,10.4,0.3,10.7z"
                                />
                            </svg>
                        </button>
                    </div>
                    <div
                        class="decor block-sale__header-decor decor--type--center"
                    >
                        <div class="decor__body">
                            <div class="decor__start"></div>
                            <div class="decor__end"></div>
                            <div class="decor__center"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="block-sale__body">
                <div class="decor block-sale__body-decor decor--type--bottom">
                    <div class="decor__body">
                        <div class="decor__start"></div>
                        <div class="decor__end"></div>
                        <div class="decor__center"></div>
                    </div>
                </div>
                <div
                    class="block-sale__image"
                    style="background-image: url('/media/site/background/dealbg.jpg')"
                ></div>
                <div class="container">
                    <div class="block-sale__carousel">
                        <div class="owl-carousel">
                            <div
                                v-for="(item, index) in items"
                                :key="index"
                                class="block-sale__item"
                            >
                                <div class="product-card">
                                    <div class="product-card__actions-list">
                                        <button
                                            class="product-card__action product-card__action--quickview"
                                            type="button"
                                            aria-label="Quick view"
                                        >
                                            <svg width="16" height="16">
                                                <path
                                                    d="M14,15h-4v-2h3v-3h2v4C15,14.6,14.6,15,14,15z M13,3h-3V1h4c0.6,0,1,0.4,1,1v4h-2V3z M6,3H3v3H1V2c0-0.6,0.4-1,1-1h4V3z
	 M3,13h3v2H2c-0.6,0-1-0.4-1-1v-4h2V13z"
                                                />
                                            </svg>
                                        </button>
                                        <button
                                            class="product-card__action product-card__action--wishlist"
                                            type="button"
                                            aria-label="Add to wish list"
                                        >
                                            <svg width="16" height="16">
                                                <path
                                                    d="M13.9,8.4l-5.4,5.4c-0.3,0.3-0.7,0.3-1,0L2.1,8.4c-1.5-1.5-1.5-3.8,0-5.3C2.8,2.4,3.8,2,4.8,2s1.9,0.4,2.6,1.1L8,3.7
	l0.6-0.6C9.3,2.4,10.3,2,11.3,2c1,0,1.9,0.4,2.6,1.1C15.4,4.6,15.4,6.9,13.9,8.4z"
                                                />
                                            </svg>
                                        </button>
                                        <button
                                            class="product-card__action product-card__action--compare"
                                            type="button"
                                            aria-label="Add to compare"
                                        >
                                            <svg width="16" height="16">
                                                <path
                                                    d="M9,15H7c-0.6,0-1-0.4-1-1V2c0-0.6,0.4-1,1-1h2c0.6,0,1,0.4,1,1v12C10,14.6,9.6,15,9,15z"
                                                />
                                                <path
                                                    d="M1,9h2c0.6,0,1,0.4,1,1v4c0,0.6-0.4,1-1,1H1c-0.6,0-1-0.4-1-1v-4C0,9.4,0.4,9,1,9z"
                                                />
                                                <path
                                                    d="M15,5h-2c-0.6,0-1,0.4-1,1v8c0,0.6,0.4,1,1,1h2c0.6,0,1-0.4,1-1V6C16,5.4,15.6,5,15,5z"
                                                />
                                            </svg>
                                        </button>
                                    </div>
                                    <div class="product-card__image">
                                        <div class="image image--type--product">
                                            <inertia-link
                                                href="/single-product"
                                                class="image__body"
                                            >
                                                <img
                                                    class="image__tag"
                                                    src="/media/deletable/spark.jpg"
                                                    alt=""
                                                />
                                            </inertia-link>
                                        </div>
                                        <div
                                            class="status-badge status-badge--style--success product-card__fit status-badge--has-icon status-badge--has-text"
                                        >
                                            <div class="status-badge__body">
                                                <div class="status-badge__icon">
                                                    <svg width="13" height="13">
                                                        <path
                                                            d="M12,4.4L5.5,11L1,6.5l1.4-1.4l3.1,3.1L10.6,3L12,4.4z"
                                                        />
                                                    </svg>
                                                </div>
                                                <div class="status-badge__text">
                                                    Teil Fit für 2011 Ford Focus
                                                    S
                                                </div>
                                                <div
                                                    class="status-badge__tooltip"
                                                    tabindex="0"
                                                    data-toggle="tooltip"
                                                    title="Part&#x20;Fit&#x20;for&#x20;2011&#x20;Ford&#x20;Focus&#x20;S"
                                                ></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-card__info">
                                        <div class="product-card__meta">
                                            <span
                                                class="product-card__meta-title"
                                                >SKU:</span
                                            >
                                            140-10440-B
                                        </div>
                                        <div class="product-card__name">
                                            <div>
                                                <div
                                                    class="product-card__badges"
                                                >
                                                    <div
                                                        class="tag-badge tag-badge--sale"
                                                    >
                                                        Verkauf
                                                    </div>
                                                    <div
                                                        class="tag-badge tag-badge--new"
                                                    >
                                                        Neu
                                                    </div>
                                                </div>
                                                <a href="product-full.html"
                                                    >Brandix Spark Plug Kit
                                                    ASR-400</a
                                                >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-card__footer">
                                        <div class="product-card__prices">
                                            <div
                                                class="product-card__price product-card__price--current"
                                            >
                                                €19.00
                                            </div>
                                        </div>
                                        <button
                                            class="product-card__addtocart-icon"
                                            type="button"
                                            aria-label="Add to cart"
                                        >
                                            <svg width="20" height="20">
                                                <circle cx="7" cy="17" r="2" />
                                                <circle cx="15" cy="17" r="2" />
                                                <path
                                                    d="M20,4.4V5l-1.8,6.3c-0.1,0.4-0.5,0.7-1,0.7H6.7c-0.4,0-0.8-0.3-1-0.7L3.3,3.9C3.1,3.3,2.6,3,2.1,3H0.4C0.2,3,0,2.8,0,2.6
	V1.4C0,1.2,0.2,1,0.4,1h2.5c1,0,1.8,0.6,2.1,1.6L5.1,3l2.3,6.8c0,0.1,0.2,0.2,0.3,0.2h8.6c0.1,0,0.3-0.1,0.3-0.2l1.3-4.4
	C17.9,5.2,17.7,5,17.5,5H9.4C9.2,5,9,4.8,9,4.6V3.4C9,3.2,9.2,3,9.4,3h9.2C19.4,3,20,3.6,20,4.4z"
                                                />
                                            </svg>
                                        </button>
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
    data() {
        return {
            items: [1, 2, 3, 4, 5, 6, 7]
        };
    },
    mounted() {
        $(".block-sale").each(function() {
            const owlCarousel = $(this).find(".owl-carousel");

            owlCarousel.owlCarousel({
                items: 5,
                dots: true,
                margin: 24,
                loop: true,
                responsive: {
                    1400: { items: 5 },
                    1200: { items: 4 },
                    992: { items: 4, margin: 16 },
                    768: { items: 3, margin: 16 },
                    576: { items: 2, margin: 16 },
                    460: { items: 2, margin: 16 },
                    0: { items: 1 }
                }
            });

            $(this)
                .find(".block-sale__arrow--prev")
                .on("click", function() {
                    owlCarousel.trigger("prev.owl.carousel", [500]);
                });
            $(this)
                .find(".block-sale__arrow--next")
                .on("click", function() {
                    owlCarousel.trigger("next.owl.carousel", [500]);
                });
        });
        $(".block-sale__timer").each(function() {
            const timer = $(this);
            const MINUTE = 60;
            const HOUR = MINUTE * 60;
            const DAY = HOUR * 24;

            let left = DAY * 3;

            const format = function(number) {
                let result = number.toFixed();

                if (result.length === 1) {
                    result = "0" + result;
                }

                return result;
            };

            const updateTimer = function() {
                left -= 1;

                if (left < 0) {
                    left = 0;

                    clearInterval(interval);
                }

                const leftDays = Math.floor(left / DAY);
                const leftHours = Math.floor((left - leftDays * DAY) / HOUR);
                const leftMinutes = Math.floor(
                    (left - leftDays * DAY - leftHours * HOUR) / MINUTE
                );
                const leftSeconds =
                    left -
                    leftDays * DAY -
                    leftHours * HOUR -
                    leftMinutes * MINUTE;

                timer.find(".timer__part-value--days").text(format(leftDays));
                timer.find(".timer__part-value--hours").text(format(leftHours));
                timer
                    .find(".timer__part-value--minutes")
                    .text(format(leftMinutes));
                timer
                    .find(".timer__part-value--seconds")
                    .text(format(leftSeconds));
            };

            const interval = setInterval(updateTimer, 1000);

            updateTimer();
        });
    }
};
</script>
