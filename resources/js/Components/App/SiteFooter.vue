<template>
    <footer v-if="data" class="site__footer">
        <div class="site-footer">
            <div class="decor site-footer__decor decor--type--bottom">
                <div class="decor__body">
                    <div class="decor__start"></div>
                    <div class="decor__end"></div>
                    <div class="decor__center"></div>
                </div>
            </div>
            <div class="site-footer__widgets">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-xl-4">
                            <div class="site-footer__widget footer-contacts">
                                <h5 class="footer-contacts__title">
                                    Kontaktiere uns
                                </h5>
                                <div class="footer-contacts__text">
                                    {{ data.contact_us_footer }}
                                </div>
                                <address
                                    v-if="data"
                                    class="footer-contacts__contacts"
                                >
                                    <dl>
                                        <dt>Telefonnummer</dt>
                                        <dd>{{ data.phone }}</dd>
                                    </dl>
                                    <dl>
                                        <dt>E-Mail Addresse</dt>
                                        <dd>{{ data.email }}</dd>
                                    </dl>
                                    <dl>
                                        <dt>Unsere Position</dt>
                                        <dd>
                                            {{ data.location }}
                                        </dd>
                                    </dl>
                                    <dl>
                                        <dt>Arbeitszeit</dt>
                                        <dd>{{ data.working_hours }}</dd>
                                    </dl>
                                </address>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-xl-4">
                            <div class="site-footer__widget footer-links">
                                <h5 class="footer-links__title">
                                    Nützliche Links
                                </h5>
                                <ul v-if="data" class="footer-links__list row">
                                    <li
                                        v-for="(footerLink,
                                        index) in JSON.parse(data.footer_links)"
                                        :key="index"
                                        class="footer-links__item col-6"
                                    >
                                        <inertia-link
                                            :href="'/page/' + footerLink.slug"
                                            class="footer-links__link"
                                            >{{ footerLink.name }}</inertia-link
                                        >
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-xl-4">
                            <div class="site-footer__widget footer-newsletter">
                                <h5 class="footer-newsletter__title">
                                    Newsletter
                                </h5>
                                <div class="footer-newsletter__text">
                                    Geben Sie unten Ihre E-Mail-Adresse ein, um
                                    unseren Newsletter zu abonnieren und über
                                    Rabatte und Sonderangebote auf dem Laufenden
                                    zu bleiben.
                                </div>
                                <p v-if="newsletter" class="text-success">
                                    Danke für die Newsletter-Anmeldung
                                </p>
                                <form
                                    @submit.prevent="addEmail"
                                    class="footer-newsletter__form"
                                >
                                    <label
                                        class="sr-only"
                                        for="footer-newsletter-address"
                                        >E-Mail-Addresse</label
                                    >
                                    <input
                                        type="text"
                                        class="footer-newsletter__form-input"
                                        id="footer-newsletter-address"
                                        placeholder="E-Mail-Addresse..."
                                        v-model="form.email"
                                    />
                                    <button
                                        v-if="process.newsletter"
                                        disabled="disabled"
                                        class="footer-newsletter__form-button"
                                    >
                                        Abonnieren...
                                    </button>
                                    <button
                                        v-else
                                        type="submit"
                                        class="footer-newsletter__form-button"
                                    >
                                        Abonnieren
                                    </button>
                                </form>
                                <div
                                    class="footer-newsletter__text footer-newsletter__text--social"
                                >
                                    Folgen Sie uns in sozialen Netzwerken
                                </div>
                                <div
                                    class="footer-newsletter__social-links social-links"
                                >
                                    <ul class="social-links__list">
                                        <li
                                            @click="socialOpen(data.facebook)"
                                            class="social-links__item social-links__item--facebook"
                                        >
                                            <a
                                                :href="social(data.facebook)"
                                                target="_blank"
                                                ><i
                                                    class="fab fa-facebook-f"
                                                ></i
                                            ></a>
                                        </li>
                                        <li
                                            @click="socialOpen(data.twitter)"
                                            class="social-links__item social-links__item--twitter"
                                        >
                                            <a
                                                :href="social(data.twitter)"
                                                target="_blank"
                                                ><i class="fab fa-twitter"></i
                                            ></a>
                                        </li>
                                        <li
                                            @click="socialOpen(data.youtube)"
                                            class="social-links__item social-links__item--youtube"
                                        >
                                            <a
                                                :href="social(data.youtube)"
                                                target="_blank"
                                                ><i class="fab fa-youtube"></i
                                            ></a>
                                        </li>
                                        <li
                                            @click="socialOpen(data.instagram)"
                                            class="social-links__item social-links__item--instagram"
                                        >
                                            <a
                                                :href="social(data.instagram)"
                                                target="_blank"
                                                ><i class="fab fa-instagram"></i
                                            ></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="site-footer__bottom">
                <div class="container">
                    <div class="site-footer__bottom-row">
                        <div class="site-footer__copyright">
                            {{ data.copyright }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</template>

<script>
import Button from "../../Jetstream/Button.vue";
export default {
    components: { Button },
    data() {
        return {
            data: null,
            form: {
                email: ""
            },
            newsletter: false,
            process: {
                newsletter: false
            }
        };
    },
    async mounted() {
        await this.$http
            .get("/api/v1/front/elements/sitefooter")
            .then(response => (this.data = response.data));
    },
    methods: {
        socialOpen(link) {
            if (link) {
                window.open(link, "_blank");
            }
        },
        social(link) {
            return link ? link : "#!";
        },
        async addEmail() {
            var _this = this;
            if (this.form.email != "") {
                this.process.newsletter = true;
                await this.$http
                    .post("/api/v1/newsletter/add", this.form)
                    .then(response => console.log(response.data))
                    .catch(error => console.log(error.response));
                this.newsletter = true;
                this.process.newsletter = false;
                setTimeout(function() {
                    _this.newsletter = false;
                }, 3000);
            }
        }
    }
};
</script>
