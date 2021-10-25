<template>
    <div class="header__indicators">
        <div class="indicator">
            <a href="wishlist.html" class="indicator__button">
                <span class="indicator__icon">
                    <svg width="32" height="32">
                        <path
                            d="M23,4c3.9,0,7,3.1,7,7c0,6.3-11.4,15.9-14,16.9C13.4,26.9,2,17.3,2,11c0-3.9,3.1-7,7-7c2.1,0,4.1,1,5.4,2.6l1.6,2l1.6-2
 C18.9,5,20.9,4,23,4 M23,2c-2.8,0-5.4,1.3-7,3.4C14.4,3.3,11.8,2,9,2c-5,0-9,4-9,9c0,8,14,19,16,19s16-11,16-19C32,6,28,2,23,2L23,2
 z"
                        />
                    </svg>
                </span>
            </a>
        </div>

        <div class="indicator indicator--trigger--click">
            <a href="" class="indicator__button">
                <span class="indicator__icon">
                    <svg width="32" height="32">
                        <path
                            d="M16,18C9.4,18,4,23.4,4,30H2c0-6.2,4-11.5,9.6-13.3C9.4,15.3,8,12.8,8,10c0-4.4,3.6-8,8-8s8,3.6,8,8c0,2.8-1.5,5.3-3.6,6.7
 C26,18.5,30,23.8,30,30h-2C28,23.4,22.6,18,16,18z M22,10c0-3.3-2.7-6-6-6s-6,2.7-6,6s2.7,6,6,6S22,13.3,22,10z"
                        />
                    </svg>
                </span>
                <span class="indicator__title"
                    >Hallo, {{ user ? user.name : "Log in" }}</span
                >
                <span class="indicator__value">Mein Konto</span>
            </a>

            <div class="indicator__content">
                <div class="account-menu">
                    <header-login-form v-if="!user" />
                    <header-user-menu v-else />
                </div>
            </div>
        </div>

        <addToCart />
    </div>
</template>

<script>
import HeaderLoginForm from "@/Components/App/Header/HeaderLoginForm";
import HeaderUserMenu from "@/Components/App/Header/HeaderUserMenu";
import addToCart from "@/Components/App/Cart/addToCart";
export default {
    components: {
        HeaderLoginForm,
        HeaderUserMenu,
        addToCart
    },
    computed: {
        user() {
            return this.$page.props.auth.user;
        }
    },
    mounted() {
        $(function() {
            $(".indicator--trigger--click .indicator__button").on(
                "click",
                function(event) {
                    event.preventDefault();

                    const dropdown = $(this).closest(".indicator");

                    if (dropdown.is(".indicator--open")) {
                        dropdown.removeClass("indicator--open");
                    } else {
                        dropdown.addClass("indicator--open");
                    }
                }
            );

            $(document).on("click", function(event) {
                $(".indicator")
                    .not($(event.target).closest(".indicator"))
                    .removeClass("indicator--open");
            });
        });
    }
};
</script>
