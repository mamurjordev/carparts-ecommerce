<template>
    <app-layout>
        <div class="site__body">
            <Breadcrumb :bread="breads" />
            <div class="block">
                <div class="container container--max--lg">
                    <div class="card contacts">
                        <div class="contacts__map">
                            <iframe
                                :src="
                                    'https://maps.google.com/maps?q=' +
                                        page.info.location +
                                        '&amp;t=&amp;z=20&amp;ie=UTF8&amp;iwloc=&amp;output=embed'
                                "
                                frameborder="0"
                                scrolling="no"
                                marginheight="0"
                                marginwidth="0"
                            ></iframe>
                        </div>
                        <div class="card-body card-body--padding--2">
                            <div class="row">
                                <div class="col-12 col-lg-6 pb-4 pb-lg-0">
                                    <div class="mr-1">
                                        <h4
                                            class="contact-us__header card-title"
                                        >
                                            Unsere Adresse
                                        </h4>
                                        <div class="contact-us__address">
                                            <p>
                                                {{ page.info.location }}<br />
                                                Email: {{ page.info.email
                                                }}<br />
                                                Telefonnummer:
                                                {{ page.info.phone }}
                                            </p>
                                            <p>
                                                <strong>Öffnungszeiten</strong
                                                ><br />
                                                {{ page.info.working_hours }}
                                            </p>
                                            <p>
                                                <strong>Comment</strong><br />
                                                Lorem ipsum dolor sit amet,
                                                consectetur adipiscing elit.
                                                Curabitur suscipit suscipit mi,
                                                non tempor nulla finibus eget.
                                                Lorem ipsum dolor sit amet,
                                                consectetur adipiscing elit.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <div class="ml-1">
                                        <h4
                                            class="contact-us__header card-title"
                                        >
                                            Hinterlassen Sie uns eine Nachricht
                                        </h4>
                                        <form>
                                            <div class="form-row">
                                                <div
                                                    class="form-group col-md-6"
                                                >
                                                    <label for="form-name"
                                                        >Dein Name</label
                                                    >
                                                    <input
                                                        type="text"
                                                        id="form-name"
                                                        class="form-control"
                                                        placeholder="Dein Name"
                                                    />
                                                </div>
                                                <div
                                                    class="form-group col-md-6"
                                                >
                                                    <label for="form-email"
                                                        >Email</label
                                                    >
                                                    <input
                                                        type="email"
                                                        id="form-email"
                                                        class="form-control"
                                                        placeholder="E-Mail-Addresse"
                                                    />
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="form-subject"
                                                    >Gegenstand</label
                                                >
                                                <input
                                                    type="text"
                                                    id="form-subject"
                                                    class="form-control"
                                                    placeholder="Gegenstand"
                                                />
                                            </div>
                                            <div class="form-group">
                                                <label for="form-message"
                                                    >Botschaft</label
                                                >
                                                <textarea
                                                    id="form-message"
                                                    class="form-control"
                                                    rows="4"
                                                ></textarea>
                                            </div>
                                            <button
                                                type="submit"
                                                class="btn btn-primary"
                                            >
                                                Nachricht senden
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="block-space block-space--layout--before-footer"></div>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
import Breadcrumb from "@/Components/App/BreadCrumb";
export default {
    props: ["page"],
    components: {
        Breadcrumb,
        AppLayout
    },
    data() {
        return {
            breads: {
                label: "",
                url: ""
            }
        };
    }
};
</script>
