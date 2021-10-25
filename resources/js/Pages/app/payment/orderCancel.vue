<template>
    <app-layout>
        <div class="site__body">
            <div
                class="block-space block-space--layout--spaceship-ledge-height"
            ></div>
            <div class="block order-success">
                <div class="container">
                    <div class="order-success__body">
                        <div class="order-success__header">
                            <div class="order-success__icon">
                                <svg
                                    height="100pt"
                                    viewBox="0 0 512 512"
                                    width="512pt"
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="#b71616"
                                >
                                    <path
                                        d="m256 512c-141.160156 0-256-114.839844-256-256s114.839844-256 256-256 256 114.839844 256 256-114.839844 256-256 256zm0-475.429688c-120.992188 0-219.429688 98.4375-219.429688 219.429688s98.4375 219.429688 219.429688 219.429688 219.429688-98.4375 219.429688-219.429688-98.4375-219.429688-219.429688-219.429688zm0 0"
                                    />
                                    <path
                                        d="m347.429688 365.714844c-4.679688 0-9.359376-1.785156-12.929688-5.359375l-182.855469-182.855469c-7.144531-7.144531-7.144531-18.714844 0-25.855469 7.140625-7.140625 18.714844-7.144531 25.855469 0l182.855469 182.855469c7.144531 7.144531 7.144531 18.714844 0 25.855469-3.570313 3.574219-8.246094 5.359375-12.925781 5.359375zm0 0"
                                    />
                                    <path
                                        d="m164.570312 365.714844c-4.679687 0-9.355468-1.785156-12.925781-5.359375-7.144531-7.140625-7.144531-18.714844 0-25.855469l182.855469-182.855469c7.144531-7.144531 18.714844-7.144531 25.855469 0 7.140625 7.140625 7.144531 18.714844 0 25.855469l-182.855469 182.855469c-3.570312 3.574219-8.25 5.359375-12.929688 5.359375zm0 0"
                                    />
                                </svg>
                            </div>
                            <h1 class="order-success__title">Ops!</h1>
                            <div class="order-success__subtitle">
                                Your order has been Canceled
                            </div>
                            <div class="order-success__actions">
                                <inertia-link
                                    href="/"
                                    class="btn btn-sm btn-secondary"
                                    >Go To Homepage</inertia-link
                                >
                            </div>
                        </div>
                        <div class="card order-success__meta">
                            <ul class="order-success__meta-list">
                                <li class="order-success__meta-item">
                                    <span class="order-success__meta-title"
                                        >Order number:</span
                                    >
                                    <span class="order-success__meta-value"
                                        >#9478</span
                                    >
                                </li>
                                <li class="order-success__meta-item">
                                    <span class="order-success__meta-title"
                                        >Created At:</span
                                    >
                                    <span class="order-success__meta-value"
                                        >Oct 19, 2020</span
                                    >
                                </li>
                                <li class="order-success__meta-item">
                                    <span class="order-success__meta-title"
                                        >Total:</span
                                    >
                                    <span class="order-success__meta-value"
                                        >$1596.00</span
                                    >
                                </li>
                                <li class="order-success__meta-item">
                                    <span class="order-success__meta-title"
                                        >Payment Method:</span
                                    >
                                    <span class="order-success__meta-value"
                                        >Stripe</span
                                    >
                                </li>
                            </ul>
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
export default {
    components: {
        AppLayout
    }
};
</script>
