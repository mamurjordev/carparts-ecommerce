<template>
    <div class="block-split__item block-split__item-sidebar col-auto mt-5">
        <div class="sidebar sidebar--offcanvas--mobile">
            <div class="sidebar__backdrop"></div>
            <div class="sidebar__body">
                <div class="sidebar__header">
                    <div class="sidebar__title">Filters</div>
                    <button class="sidebar__close" type="button"><svg width="12" height="12">
                            <path d="M10.8,10.8L10.8,10.8c-0.4,0.4-1,0.4-1.4,0L6,7.4l-3.4,3.4c-0.4,0.4-1,0.4-1.4,0l0,0c-0.4-0.4-0.4-1,0-1.4L4.6,6L1.2,2.6
c-0.4-0.4-0.4-1,0-1.4l0,0c0.4-0.4,1-0.4,1.4,0L6,4.6l3.4-3.4c0.4-0.4,1-0.4,1.4,0l0,0c0.4,0.4,0.4,1,0,1.4L7.4,6l3.4,3.4
C11.2,9.8,11.2,10.4,10.8,10.8z" />
                        </svg>
                    </button>
                </div>
                <div class="sidebar__content">
                    <form @submit.prevent="search" class="block-finder__form" id="block-finder__form">
                        <div
                        class="block-finder__form-control block-finder__form-control--select"
                        >
                        <select name="brand" aria-label="Vehicle Make" v-model="manuId">
                            <option value="">Select Brand</option>
                            <option
                            v-for="brand in brands"
                            :key="brand.manuId"
                            :value="brand.manuId"
                            @click="getModels(brand.manuId)"
                            >
                            {{ brand.manuName }}
                            </option>
                        </select>
                        </div>
                        <div
                        class="block-finder__form-control block-finder__form-control--select"
                        >
                        <select name="model" aria-label="Vehicle Model" disabled>
                            <option value="none">Select Model</option>
                            <option
                            v-for="(model, index) in models"
                            :key="index"
                            :value="model.modId"
                            @click="getMotors(model.modId)"
                            >
                            {{
                                model.modelName +
                                " (" +
                                dataFormat(model.yearOfConstrFrom) +
                                " - " +
                                dataFormat(model.yearOfConstrTo) +
                                ")"
                            }}
                            </option>
                        </select>
                        </div>
                        <div
                        class="block-finder__form-control block-finder__form-control--select"
                        >
                        <select name="engine" aria-label="Vehicle Engine" disabled>
                            <option value="none">Select Engine</option>
                            <option v-for="(motor, index) in motors" :key="index">
                            {{ motor.cylinderCapacityLiter }} {{ motor.motorType }} ({{
                                motor.powerHpTo +
                                " - " +
                                motor.powerHpFrom +
                                " HP, " +
                                motor.powerKwFrom +
                                " kw"
                            }})
                            </option>
                        </select>
                        </div>
                        <button
                        class="block-finder__form-control block-finder__form-control--button"
                        type="submit"
                        >
                        Search
                        </button>
                    </form>
                    <div class="card widget widget-products d-none d-lg-block">
                        <div class="widget__header">
                            <h4>Latest Products</h4>
                        </div>
                        <div class="widget-products__list">
                            <div class="widget-products__item">
                                <div class="widget-products__image image image--type--product">
                                    <a href="product-full.html" class="image__body">
                                        <img class="image__tag" src="images/products/product-1-64x64.jpg" alt="">
                                    </a>
                                </div>
                                <div class="widget-products__info">
                                    <div class="widget-products__name">
                                        <a href="product-full.html">Brandix Spark Plug Kit ASR-400</a>
                                    </div>
                                    <div class="widget-products__prices">
                                        <div class="widget-products__price widget-products__price--current">$19.00</div>
                                    </div>
                                </div>
                            </div>
                            <div class="widget-products__item">
                                <div class="widget-products__image image image--type--product">
                                    <a href="product-full.html" class="image__body">
                                        <img class="image__tag" src="images/products/product-2-64x64.jpg" alt="">
                                    </a>
                                </div>
                                <div class="widget-products__info">
                                    <div class="widget-products__name">
                                        <a href="product-full.html">Brandix Brake Kit BDX-750Z370-S</a>
                                    </div>
                                    <div class="widget-products__prices">
                                        <div class="widget-products__price widget-products__price--current">$224.00</div>
                                    </div>
                                </div>
                            </div>
                            <div class="widget-products__item">
                                <div class="widget-products__image image image--type--product">
                                    <a href="product-full.html" class="image__body">
                                        <img class="image__tag" src="images/products/product-3-64x64.jpg" alt="">
                                    </a>
                                </div>
                                <div class="widget-products__info">
                                    <div class="widget-products__name">
                                        <a href="product-full.html">Left Headlight Of Brandix Z54</a>
                                    </div>
                                    <div class="widget-products__prices">
                                        <div class="widget-products__price widget-products__price--new">$349.00</div>
                                        <div class="widget-products__price widget-products__price--old">$415.00</div>
                                    </div>
                                </div>
                            </div>
                            <div class="widget-products__item">
                                <div class="widget-products__image image image--type--product">
                                    <a href="product-full.html" class="image__body">
                                        <img class="image__tag" src="images/products/product-4-64x64.jpg" alt="">
                                    </a>
                                </div>
                                <div class="widget-products__info">
                                    <div class="widget-products__name">
                                        <a href="product-full.html">Glossy Gray 19" Aluminium Wheel AR-19</a>
                                    </div>
                                    <div class="widget-products__prices">
                                        <div class="widget-products__price widget-products__price--current">$589.00</div>
                                    </div>
                                </div>
                            </div>
                            <div class="widget-products__item">
                                <div class="widget-products__image image image--type--product">
                                    <a href="product-full.html" class="image__body">
                                        <img class="image__tag" src="images/products/product-5-64x64.jpg" alt="">
                                    </a>
                                </div>
                                <div class="widget-products__info">
                                    <div class="widget-products__name">
                                        <a href="product-full.html">Twin Exhaust Pipe From Brandix Z54</a>
                                    </div>
                                    <div class="widget-products__prices">
                                        <div class="widget-products__price widget-products__price--current">$749.00</div>
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
