<template>
    <div class="col-12 col-lg-6 col-xl-5 mt-4 mt-lg-0">
        <div class="card mb-0">
            <div class="card-body card-body--padding--2">
                <h3 class="card-title">Your Order</h3>
                <table class="checkout__totals">
                    <thead class="checkout__totals-header">
                        <tr>
                            <th>Product</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody class="checkout__totals-products">
                        <tr>
                            <td>
                                Glossy Gray 19" Aluminium Wheel AR-19 × 2
                            </td>
                            <td>$1398.00</td>
                        </tr>
                        <tr>
                            <td>
                                Brandix Brake Kit BDX-750Z370-S × 1
                            </td>
                            <td>$849.00</td>
                        </tr>
                        <tr>
                            <td>
                                Twin Exhaust Pipe From Brandix Z54 × 3
                            </td>
                            <td>$3630.00</td>
                        </tr>
                    </tbody>
                    <tbody class="checkout__totals-subtotals">
                        <tr>
                            <th>Subtotal</th>
                            <td>$5877.00</td>
                        </tr>
                        <tr>
                            <th>Store Credit</th>
                            <td>$-20.00</td>
                        </tr>
                        <tr>
                            <th>Shipping</th>
                            <td>$25.00</td>
                        </tr>
                    </tbody>
                    <tfoot class="checkout__totals-footer">
                        <tr>
                            <th>Total</th>
                            <td>$5882.00</td>
                        </tr>
                    </tfoot>
                </table>
                <div class="checkout__payment-methods payment-methods">
                    <ul class="payment-methods__list">
                        <li class="payment-methods__item">
                            <label class="payment-methods__item-header">
                                <span
                                    class="payment-methods__item-radio input-radio"
                                >
                                    <span class="input-radio__body">
                                        <input
                                            class="input-radio__input"
                                            name="checkout_payment_method"
                                            type="radio"
                                            checked
                                        />
                                        <span
                                            class="input-radio__circle"
                                        ></span>
                                    </span>
                                </span>
                                <span class="payment-methods__item-title"
                                    >Stipe</span
                                >
                            </label>

                            <div class="payment-methods__item-container">
                                <div
                                    class="payment-methods__item-details text-muted"
                                >
                                    Pay via PayPal; you can pay with your credit
                                    card if you don’t have a PayPal account.
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="checkout__agree form-group">
                    <div class="form-check">
                        <span class="input-check form-check-input">
                            <span class="input-check__body">
                                <input
                                    class="input-check__input"
                                    type="checkbox"
                                    id="checkout-terms"
                                />
                                <span class="input-check__box"></span>
                                <span class="input-check__icon"
                                    ><svg width="9px" height="7px">
                                        <path
                                            d="M9,1.395L3.46,7L0,3.5L1.383,2.095L3.46,4.2L7.617,0L9,1.395Z"
                                        />
                                    </svg>
                                </span>
                            </span>
                        </span>
                        <label class="form-check-label" for="checkout-terms">
                            I have read and agree to the website
                            <a target="_blank" href="terms.html"
                                >terms and conditions</a
                            >
                        </label>
                    </div>
                </div>
                <button
                    @click="checkoutStripe()"
                    type="submit"
                    class="btn btn-primary btn-xl btn-block"
                    :disabled="paymentProcessing"
                >
                    Place Order
                </button>
            </div>
        </div>
    </div>
</template>

<script>
import { loadStripe } from "@stripe/stripe-js";
export default {
    data() {
        return {
            stripe: {},
            cardElement: {},
            paymentProcessing: false
        };
    },
    methods: {
        placeOrder() {
            this.$inertia.visit("/order-success");
        },
        async checkoutStripe(id) {
            this.processing = true;

            var values = {
                packageId: 2
            };

            try {
                var data = await this.$http.post(
                    "/api/v1/transaction",
                    values,
                    {
                        "Content-type": "application/json",
                        Accept: "application/json"
                    }
                );
                // .then(error => console.log(error));

                console.log(data.data.id);
                var stripeSession = data.data.id;
                const stripe = await loadStripe(
                    "pk_test_51IuGJeSBLyifUJR0vZdP0rVegoN0rCSvpBVPOECPYM9bATujfrqwyk2I7vk2WlUcdtdfVMCD53aQ37HM8DT6FhA700ojqoII6j"
                );
                stripe.redirectToCheckout({ sessionId: stripeSession });
            } catch (error) {
                console.error(error);
            }
        }
    }
};
</script>
