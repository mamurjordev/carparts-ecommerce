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
                            <div class="categories-list__item-name">Reifen</div>
                        </inertia-link>
                    </li>
                    <li class="categories-list__divider"></li>
                    <li class="categories-list__item position-relative">
                        <div
                            @click="showSubs = !showSubs"
                            class="webootrix__cursor-pointer"
                        >
                            <div class="image image--type--category">
                                <div class="image__body">
                                    <img
                                        class="image__tag"
                                        src="/media/img.sections/200x200/10435.png"
                                        alt=""
                                    />
                                </div>
                            </div>
                            <div class="categories-list__item-name">
                                Öle & Flüssigkeiten
                            </div>
                        </div>
                        <div
                            v-if="showSubs"
                            class="webootrix__indicator position-absolute"
                        ></div>
                        <ul
                            v-if="showSubs"
                            class="position-absolute codeaz__subcategory__Dropdown"
                        >
                            <li class="webootrix__subcategory">
                                <inertia-link href="" class="webootrix__link">
                                    <img
                                        src="
                                            /media/img.sections/55x55/12094.png
                                        "
                                        class="w-10"
                                    />
                                    <div class="webootrix__subcategory__text">
                                        Motoröl
                                    </div>
                                </inertia-link>
                            </li>
                            <li class="webootrix__subcategory">
                                <inertia-link href="" class="webootrix__link">
                                    <img
                                        src="
                                            /media/img.sections/55x55/12305.png
                                        "
                                        class="w-10"
                                    />
                                    <div class="webootrix__subcategory__text">
                                        Frostschutzmittel
                                    </div>
                                </inertia-link>
                            </li>
                            <li class="webootrix__subcategory">
                                <inertia-link href="" class="webootrix__link">
                                    <img
                                        src="
                                            /media/img.sections/55x55/12308.png
                                        "
                                        class="w-10"
                                    />
                                    <div class="webootrix__subcategory__text">
                                        Bremsflüssigkeit
                                    </div>
                                </inertia-link>
                            </li>
                            <li class="webootrix__subcategory">
                                <inertia-link href="" class="webootrix__link">
                                    <img
                                        src="
                                            /media/img.sections/55x55/11915.png
                                        "
                                        class="w-10"
                                    />
                                    <div class="webootrix__subcategory__text">
                                        Getriebeöl und Verteilergetriebeöl
                                    </div>
                                </inertia-link>
                            </li>
                            <li class="webootrix__subcategory">
                                <inertia-link href="" class="webootrix__link">
                                    <img
                                        src="
                                            /media/img.sections/55x55/12093.png
                                        "
                                        class="w-10"
                                    />
                                    <div class="webootrix__subcategory__text">
                                        Automatikgetriebeöl
                                    </div>
                                </inertia-link>
                            </li>
                            <li class="webootrix__subcategory">
                                <inertia-link href="" class="webootrix__link">
                                    <img
                                        src="
                                            /media/img.sections/55x55/15167.png
                                        "
                                        class="w-10"
                                    />
                                    <div class="webootrix__subcategory__text">
                                        Scheibenwischwasser
                                    </div>
                                </inertia-link>
                            </li>
                            <li class="webootrix__subcategory">
                                <inertia-link href="" class="webootrix__link">
                                    <img
                                        src="
                                            /media/img.sections/55x55/15078.png
                                        "
                                        class="w-10"
                                    />
                                    <div class="webootrix__subcategory__text">
                                        Reinigung Ruß- / Partikelfilter
                                    </div>
                                </inertia-link>
                            </li>
                        </ul>
                    </li>
                    <li class="categories-list__divider"></li>
                    <li class="categories-list__item">
                        <inertia-link href="/parts/">
                            <div class="image image--type--category">
                                <div class="image__body">
                                    <img
                                        class="image__tag"
                                        src="/media/img.sections/200x200/10106.png"
                                        alt=""
                                    />
                                </div>
                            </div>
                            <div class="categories-list__item-name">
                                Bremsanlage
                            </div>
                        </inertia-link>
                    </li>
                    <li class="categories-list__divider"></li>
                    <li class="categories-list__item">
                        <inertia-link href="">
                            <div class="image image--type--category">
                                <div class="image__body">
                                    <img
                                        class="image__tag"
                                        src="/media/img.sections/200x200/10105.png"
                                        alt=""
                                    />
                                </div>
                            </div>
                            <div class="categories-list__item-name">Filter</div>
                        </inertia-link>
                    </li>
                    <li class="categories-list__divider"></li>
                    <li class="categories-list__item">
                        <inertia-link href="">
                            <div class="image image--type--category">
                                <div class="image__body">
                                    <img
                                        class="image__tag"
                                        src="/media/img.sections/200x200/10102.png"
                                        alt=""
                                    />
                                </div>
                            </div>
                            <div class="categories-list__item-name">Motor</div>
                        </inertia-link>
                    </li>
                    <li class="categories-list__divider"></li>
                    <li class="categories-list__item">
                        <inertia-link href="">
                            <div class="image image--type--category">
                                <div class="image__body">
                                    <img
                                        class="image__tag"
                                        src="/media/img.sections/200x200/10118.png"
                                        alt=""
                                    />
                                </div>
                            </div>
                            <div class="categories-list__item-name">
                                Scheibenreinigung
                            </div>
                        </inertia-link>
                    </li>
                    <li class="categories-list__divider"></li>
                    <li class="categories-list__item">
                        <inertia-link href="">
                            <div class="image image--type--category">
                                <div class="image__body">
                                    <img
                                        class="image__tag"
                                        src="/media/img.sections/200x200/10108.png"
                                        alt=""
                                    />
                                </div>
                            </div>
                            <div class="categories-list__item-name">
                                Zündanlage & Glühanlage
                            </div>
                        </inertia-link>
                    </li>
                    <li class="categories-list__divider"></li>
                    <li class="categories-list__item">
                        <inertia-link href="">
                            <div class="image image--type--category">
                                <div class="image__body">
                                    <img
                                        class="image__tag"
                                        src="/media/img.sections/200x200/10113.png"
                                        alt=""
                                    />
                                </div>
                            </div>
                            <div class="categories-list__item-name">
                                Radaufhängung & Lenker
                            </div>
                        </inertia-link>
                    </li>
                    <li class="categories-list__divider"></li>
                    <li class="categories-list__item">
                        <inertia-link href="">
                            <div class="image image--type--category">
                                <div class="image__body">
                                    <img
                                        class="image__tag"
                                        src="/media/img.sections/200x200/10110.png"
                                        alt=""
                                    />
                                </div>
                            </div>
                            <div class="categories-list__item-name">
                                Elektrik
                            </div>
                        </inertia-link>
                    </li>
                    <li class="categories-list__divider"></li>
                    <li class="categories-list__item">
                        <inertia-link href="">
                            <div class="image image--type--category">
                                <div class="image__body">
                                    <img
                                        class="image__tag"
                                        src="/media/img.sections/200x200/10111.png"
                                        alt=""
                                    />
                                </div>
                            </div>
                            <div class="categories-list__item-name">
                                Federung / Dämpfung
                            </div>
                        </inertia-link>
                    </li>
                    <li class="categories-list__divider"></li>
                    <li class="categories-list__item">
                        <inertia-link href="">
                            <div class="image image--type--category">
                                <div class="image__body">
                                    <img
                                        class="image__tag"
                                        src="/media/img.sections/200x200/10116.png"
                                        alt=""
                                    />
                                </div>
                            </div>
                            <div class="categories-list__item-name">
                                Riemen, Ketten, Rollen
                            </div>
                        </inertia-link>
                    </li>
                    <li class="categories-list__divider"></li>
                    <li class="categories-list__item">
                        <inertia-link href="">
                            <div class="image image--type--category">
                                <div class="image__body">
                                    <img
                                        class="image__tag"
                                        src="/media/img.sections/200x200/10107.png"
                                        alt=""
                                    />
                                </div>
                            </div>
                            <div class="categories-list__item-name">
                                Motorkühlung
                            </div>
                        </inertia-link>
                    </li>
                    <li class="categories-list__divider"></li>
                    <li class="categories-list__item">
                        <inertia-link href="">
                            <div class="image image--type--category">
                                <div class="image__body">
                                    <img
                                        class="image__tag"
                                        src="/media/img.sections/200x200/10101.png"
                                        alt=""
                                    />
                                </div>
                            </div>
                            <div class="categories-list__item-name">
                                Karosserie
                            </div>
                        </inertia-link>
                    </li>
                    <li class="categories-list__divider"></li>
                    <li class="categories-list__item">
                        <inertia-link href="">
                            <div class="image image--type--category">
                                <div class="image__body">
                                    <img
                                        class="image__tag"
                                        src="/media/img.sections/200x200/10341.png"
                                        alt=""
                                    />
                                </div>
                            </div>
                            <div class="categories-list__item-name">
                                Heizung / Lüftung
                            </div>
                        </inertia-link>
                    </li>
                    <li class="categories-list__divider"></li>
                    <li class="categories-list__item">
                        <inertia-link href="">
                            <div class="image image--type--category">
                                <div class="image__body">
                                    <img
                                        class="image__tag"
                                        src="/media/img.sections/200x200/10314.png"
                                        alt=""
                                    />
                                </div>
                            </div>
                            <div class="categories-list__item-name">
                                Dichtungen und Dichtringe
                            </div>
                        </inertia-link>
                    </li>
                    <li class="categories-list__divider"></li>
                    <li class="categories-list__item">
                        <inertia-link href="">
                            <div class="image image--type--category">
                                <div class="image__body">
                                    <img
                                        class="image__tag"
                                        src="/media/img.sections/200x200/10104.png"
                                        alt=""
                                    />
                                </div>
                            </div>
                            <div class="categories-list__item-name">
                                Auspuffanlage
                            </div>
                        </inertia-link>
                    </li>
                    <li class="categories-list__divider"></li>
                    <li class="categories-list__item">
                        <inertia-link href="">
                            <div class="image image--type--category">
                                <div class="image__body">
                                    <img
                                        class="image__tag"
                                        src="/media/img.sections/200x200/10441.png"
                                        alt=""
                                    />
                                </div>
                            </div>
                            <div class="categories-list__item-name">
                                Innenraum & Komfort
                            </div>
                        </inertia-link>
                    </li>
                    <li class="categories-list__divider"></li>
                    <li class="categories-list__item">
                        <inertia-link href="">
                            <div class="image image--type--category">
                                <div class="image__body">
                                    <img
                                        class="image__tag"
                                        src="/media/img.sections/200x200/10354.png"
                                        alt=""
                                    />
                                </div>
                            </div>
                            <div class="categories-list__item-name">
                                Kraftstoffsystem
                            </div>
                        </inertia-link>
                    </li>
                    <li class="categories-list__divider"></li>
                    <li class="categories-list__item">
                        <inertia-link href="">
                            <div class="image image--type--category">
                                <div class="image__body">
                                    <img
                                        class="image__tag"
                                        src="/media/img.sections/200x200/10112.png"
                                        alt=""
                                    />
                                </div>
                            </div>
                            <div class="categories-list__item-name">
                                Lenkung
                            </div>
                        </inertia-link>
                    </li>
                    <li class="categories-list__divider"></li>
                    <li class="categories-list__item">
                        <inertia-link href="">
                            <div class="image image--type--category">
                                <div class="image__body">
                                    <img
                                        class="image__tag"
                                        src="/media/img.sections/200x200/10150.png"
                                        alt=""
                                    />
                                </div>
                            </div>
                            <div class="categories-list__item-name">
                                Kupplung
                            </div>
                        </inertia-link>
                    </li>
                    <li class="categories-list__divider"></li>
                    <li class="categories-list__item">
                        <inertia-link href="">
                            <div class="image image--type--category">
                                <div class="image__body">
                                    <img
                                        class="image__tag"
                                        src="/media/img.sections/200x200/10114.png"
                                        alt=""
                                    />
                                </div>
                            </div>
                            <div class="categories-list__item-name">
                                Antriebswellen & Gelenke
                            </div>
                        </inertia-link>
                    </li>
                    <li class="categories-list__divider"></li>
                    <li class="categories-list__item">
                        <inertia-link href="">
                            <div class="image image--type--category">
                                <div class="image__body">
                                    <img
                                        class="image__tag"
                                        src="/media/img.sections/200x200/10115.png"
                                        alt=""
                                    />
                                </div>
                            </div>
                            <div class="categories-list__item-name">
                                Anhängerkupplung
                            </div>
                        </inertia-link>
                    </li>
                    <li class="categories-list__divider"></li>
                    <li class="categories-list__item">
                        <inertia-link href="">
                            <div class="image image--type--category">
                                <div class="image__body">
                                    <img
                                        class="image__tag"
                                        src="/media/img.sections/200x200/10338.png"
                                        alt=""
                                    />
                                </div>
                            </div>
                            <div class="categories-list__item-name">
                                Getriebe
                            </div>
                        </inertia-link>
                    </li>
                    <li class="categories-list__divider"></li>
                    <li class="categories-list__item">
                        <inertia-link href="">
                            <div class="image image--type--category">
                                <div class="image__body">
                                    <img
                                        class="image__tag"
                                        src="/media/img.sections/200x200/10343.png"
                                        alt=""
                                    />
                                </div>
                            </div>
                            <div class="categories-list__item-name">
                                Klimaanlage
                            </div>
                        </inertia-link>
                    </li>
                    <li class="categories-list__divider"></li>
                    <li class="categories-list__item">
                        <inertia-link href="">
                            <div class="image image--type--category">
                                <div class="image__body">
                                    <img
                                        class="image__tag"
                                        src="/media/img.sections/200x200/10785.png"
                                        alt=""
                                    />
                                </div>
                            </div>
                            <div class="categories-list__item-name">
                                Lager
                            </div>
                        </inertia-link>
                    </li>
                    <li class="categories-list__divider"></li>
                    <li class="categories-list__item">
                        <inertia-link href="">
                            <div class="image image--type--category">
                                <div class="image__body">
                                    <img
                                        class="image__tag"
                                        src="/media/img.sections/200x200/10500.png"
                                        alt=""
                                    />
                                </div>
                            </div>
                            <div class="categories-list__item-name">
                                Kardanwellen & Differential
                            </div>
                        </inertia-link>
                    </li>
                    <li class="categories-list__divider"></li>
                    <li class="categories-list__item">
                        <inertia-link href="">
                            <div class="image image--type--category">
                                <div class="image__body">
                                    <img
                                        class="image__tag"
                                        src="/media/img.sections/200x200/10439.png"
                                        alt=""
                                    />
                                </div>
                            </div>
                            <div class="categories-list__item-name">
                                Steuergeräte, Sensoren, Relais
                            </div>
                        </inertia-link>
                    </li>
                    <li class="categories-list__divider"></li>
                    <li class="categories-list__item">
                        <inertia-link href="">
                            <div class="image image--type--category">
                                <div class="image__body">
                                    <img
                                        class="image__tag"
                                        src="/media/img.sections/200x200/33000.png"
                                        alt=""
                                    />
                                </div>
                            </div>
                            <div class="categories-list__item-name">
                                Autozubehör
                            </div>
                        </inertia-link>
                    </li>
                    <li class="categories-list__divider"></li>
                    <li class="categories-list__item">
                        <inertia-link href="">
                            <div class="image image--type--category">
                                <div class="image__body">
                                    <img
                                        class="image__tag"
                                        src="/media/img.sections/200x200/15001.png"
                                        alt=""
                                    />
                                </div>
                            </div>
                            <div class="categories-list__item-name">
                                Reparatursätze
                            </div>
                        </inertia-link>
                    </li>
                    <li class="categories-list__divider"></li>
                    <li class="categories-list__item">
                        <inertia-link href="">
                            <div class="image image--type--category">
                                <div class="image__body">
                                    <img
                                        class="image__tag"
                                        src="/media/img.sections/200x200/36000.png"
                                        alt=""
                                    />
                                </div>
                            </div>
                            <div class="categories-list__item-name">
                                Werkzeuge & Werkstattausrüstung
                            </div>
                        </inertia-link>
                    </li>
                    <li class="categories-list__divider"></li>
                    <li class="categories-list__item">
                        <inertia-link href="">
                            <div class="image image--type--category">
                                <div class="image__body">
                                    <img
                                        class="image__tag"
                                        src="/media/img.sections/200x200/15000.png"
                                        alt=""
                                    />
                                </div>
                            </div>
                            <div class="categories-list__item-name">
                                Rohre und Schläuche
                            </div>
                        </inertia-link>
                    </li>
                    <li class="categories-list__divider"></li>
                    <li class="categories-list__item">
                        <inertia-link href="">
                            <div class="image image--type--category">
                                <div class="image__body">
                                    <img
                                        class="image__tag"
                                        src="/media/img.sections/200x200/30000.png"
                                        alt=""
                                    />
                                </div>
                            </div>
                            <div class="categories-list__item-name">
                                Autopflege
                            </div>
                        </inertia-link>
                    </li>
                    <li class="categories-list__divider"></li>
                    <li class="categories-list__item">
                        <inertia-link href="">
                            <div class="image image--type--category">
                                <div class="image__body">
                                    <img
                                        class="image__tag"
                                        src="/media/img.sections/200x200/74849.png"
                                        alt=""
                                    />
                                </div>
                            </div>
                            <div class="categories-list__item-name">
                                Befestigungsmaterial
                            </div>
                        </inertia-link>
                    </li>
                    <li class="categories-list__divider"></li>
                    <li class="categories-list__item">
                        <inertia-link href="">
                            <div class="image image--type--category">
                                <div class="image__body">
                                    <img
                                        class="image__tag"
                                        src="/media/img.sections/200x200/74832.png"
                                        alt=""
                                    />
                                </div>
                            </div>
                            <div class="categories-list__item-name">
                                Beleuchtung
                            </div>
                        </inertia-link>
                    </li>
                    <li class="categories-list__divider"></li>
                    <li class="categories-list__item">
                        <inertia-link href="">
                            <div class="image image--type--category">
                                <div class="image__body">
                                    <img
                                        class="image__tag"
                                        src="/media/img.sections/200x200/74857.png"
                                        alt=""
                                    />
                                </div>
                            </div>
                            <div class="categories-list__item-name">
                                Tuning
                            </div>
                        </inertia-link>
                    </li>
                    <li class="categories-list__divider"></li>
                    <li class="categories-list__divider"></li>
                </ul>
            </div>
        </div>
    </section>
</template>

<script>
export default {
    props: ["categories"],
    data: function() {
        return {
            showSubs: false
        };
    },
    methods: {}
};
</script>

<style>
.codeaz__subcategory__Dropdown {
    z-index: 9;
    background-color: #fff;
    border: 1px solid goldenrod;
    -moz-column-count: 4;
    -moz-column-gap: 20px;
    -webkit-column-count: 4;
    -webkit-column-gap: 20px;
    column-count: 5;
    column-gap: 10px;
    list-style: none;
    left: -15px;
    padding: 15px 25px;
    top: 200px;
    box-shadow: 1px 1px 6px gray;
}
</style>
