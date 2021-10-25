<template>
    <div class="mobile-menu">
        <div class="mobile-menu__backdrop"></div>
        <div class="mobile-menu__body">
            <button class="mobile-menu__close" type="button">
                <svg width="12" height="12">
                    <path
                        d="M10.8,10.8L10.8,10.8c-0.4,0.4-1,0.4-1.4,0L6,7.4l-3.4,3.4c-0.4,0.4-1,0.4-1.4,0l0,0c-0.4-0.4-0.4-1,0-1.4L4.6,6L1.2,2.6
 c-0.4-0.4-0.4-1,0-1.4l0,0c0.4-0.4,1-0.4,1.4,0L6,4.6l3.4-3.4c0.4-0.4,1-0.4,1.4,0l0,0c0.4,0.4,0.4,1,0,1.4L7.4,6l3.4,3.4
 C11.2,9.8,11.2,10.4,10.8,10.8z"
                    />
                </svg>
            </button>
            <div class="mobile-menu__panel">
                <div class="mobile-menu__panel-header">
                    <div class="mobile-menu__panel-title">Speisekarte</div>
                </div>
                <div class="mobile-menu__panel-body">
                    <div class="mobile-menu__divider"></div>
                    <div class="mobile-menu__indicators">
                        <a
                            class="mobile-menu__indicator"
                            href="account-dashboard.html"
                        >
                            <span class="mobile-menu__indicator-icon">
                                <svg width="20" height="20">
                                    <path
                                        d="M20,20h-2c0-4.4-3.6-8-8-8s-8,3.6-8,8H0c0-4.2,2.6-7.8,6.3-9.3C4.9,9.6,4,7.9,4,6c0-3.3,2.7-6,6-6s6,2.7,6,6
 c0,1.9-0.9,3.6-2.3,4.7C17.4,12.2,20,15.8,20,20z M14,6c0-2.2-1.8-4-4-4S6,3.8,6,6s1.8,4,4,4S14,8.2,14,6z"
                                    />
                                </svg>
                            </span>
                            <span class="mobile-menu__indicator-title"
                                >Konto</span
                            >
                        </a>
                        <a class="mobile-menu__indicator" href="cart.html">
                            <span class="mobile-menu__indicator-icon">
                                <svg width="20" height="20">
                                    <circle cx="7" cy="17" r="2" />
                                    <circle cx="15" cy="17" r="2" />
                                    <path
                                        d="M20,4.4V5l-1.8,6.3c-0.1,0.4-0.5,0.7-1,0.7H6.7c-0.4,0-0.8-0.3-1-0.7L3.3,3.9C3.1,3.3,2.6,3,2.1,3H0.4C0.2,3,0,2.8,0,2.6
 V1.4C0,1.2,0.2,1,0.4,1h2.5c1,0,1.8,0.6,2.1,1.6L5.1,3l2.3,6.8c0,0.1,0.2,0.2,0.3,0.2h8.6c0.1,0,0.3-0.1,0.3-0.2l1.3-4.4
 C17.9,5.2,17.7,5,17.5,5H9.4C9.2,5,9,4.8,9,4.6V3.4C9,3.2,9.2,3,9.4,3h9.2C19.4,3,20,3.6,20,4.4z"
                                    />
                                </svg>
                                <span class="mobile-menu__indicator-counter"
                                    >3</span
                                >
                            </span>
                            <span class="mobile-menu__indicator-title"
                                >Einkaufswagen</span
                            >
                        </a>
                    </div>
                    <div class="mobile-menu__divider"></div>
                    <ul class="mobile-menu__links">
                        <li data-mobile-menu-item>
                            <inertia-link href="/" class="">
                                Zuhause
                            </inertia-link>
                        </li>
                    </ul>
                    <div class="mobile-menu__spring"></div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    mounted() {
        $(function() {
            const body = $("body");
            const mobileMenu = $(".mobile-menu");
            const mobileMenuBody = mobileMenu.children(".mobile-menu__body");

            if (mobileMenu.length) {
                const open = function() {
                    const bodyWidth = body.width();
                    body.css("overflow", "hidden");
                    body.css("paddingRight", body.width() - bodyWidth + "px");

                    mobileMenu.addClass("mobile-menu--open");
                };
                const close = function() {
                    body.css("overflow", "auto");
                    body.css("paddingRight", "");

                    mobileMenu.removeClass("mobile-menu--open");
                };

                $(".mobile-header__menu-button").on("click", function() {
                    open();
                });
                $(".mobile-menu__backdrop, .mobile-menu__close").on(
                    "click",
                    function() {
                        close();
                    }
                );
            }

            const panelsStack = [];
            let currentPanel = mobileMenuBody.children(".mobile-menu__panel");

            mobileMenu.on("click", "[data-mobile-menu-trigger]", function(
                event
            ) {
                const trigger = $(this);
                const item = trigger.closest("[data-mobile-menu-item]");
                let panel = item.data("panel");

                if (!panel) {
                    panel = item
                        .children("[data-mobile-menu-panel]")
                        .children(".mobile-menu__panel");

                    if (panel.length) {
                        mobileMenuBody.append(panel);
                        item.data("panel", panel);
                        panel.width(); // force reflow
                    }
                }

                if (panel && panel.length) {
                    event.preventDefault();

                    panelsStack.push(currentPanel);
                    currentPanel.addClass("mobile-menu__panel--hide");

                    panel.removeClass("mobile-menu__panel--hidden");
                    currentPanel = panel;
                }
            });
            mobileMenu.on("click", ".mobile-menu__panel-back", function() {
                currentPanel.addClass("mobile-menu__panel--hidden");
                currentPanel = panelsStack.pop();
                currentPanel.removeClass("mobile-menu__panel--hide");
            });
        });
    }
};
</script>

<style scoped>
.mobile-menu__indicators {
    justify-content: space-evenly;
}
</style>
