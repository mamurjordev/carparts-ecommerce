<template>
    <div class="col-12 col-lg-9 mt-4 mt-lg-0">
        <div class="dashboard">
            <div class="dashboard__profile card profile-card">
                <div class="card-body profile-card__body">
                    <div class="profile-card__avatar">
                        <img src="images/avatars/avatar-4.jpg" alt="" />
                    </div>
                    <div class="profile-card__name">
                        {{ user.name }}
                    </div>
                    <div class="profile-card__email">
                        {{ user.email }}
                    </div>
                    <div class="profile-card__edit">
                        <inertia-link href="" class="btn btn-secondary btn-sm"
                            >Profil bearbeiten</inertia-link
                        >
                    </div>
                </div>
            </div>
            <div
                class="dashboard__address card address-card address-card--featured"
            >
                <div class="address-card__badge tag-badge tag-badge--theme">
                    Default
                </div>
                <div class="address-card__body">
                    <div class="address-card__name">
                        {{ user.name }}
                    </div>
                    <div class="address-card__row">
                        {{ info.street }}<br />
                        {{ info.post_code }}, {{ info.city }}, {{ info.state
                        }}<br />
                        {{ info.country }}
                    </div>
                    <div class="address-card__row">
                        <div class="address-card__row-title">
                            Telefonnummer
                        </div>
                        <div class="address-card__row-content">
                            {{ info.phone }}
                        </div>
                    </div>
                    <div class="address-card__row">
                        <div class="address-card__row-title">
                            E-Mail-Addresse
                        </div>
                        <div class="address-card__row-content">
                            {{ user.email }}
                        </div>
                    </div>
                    <div class="address-card__footer">
                        <a href="">Adresse bearbeiten</a>
                    </div>
                </div>
            </div>
            <div class="dashboard__orders card">
                <div class="card-header">
                    <h5>Recent Orders</h5>
                </div>
                <div class="card-divider"></div>
                <div class="card-table">
                    <div class="table-responsive-sm">
                        <table>
                            <thead>
                                <tr>
                                    <th>Order</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <a href="account-order-details.html"
                                            >#8132</a
                                        >
                                    </td>
                                    <td>02 April, 2019</td>
                                    <td>Pending</td>
                                    <td>
                                        $2,719.00 for 5 item(s)
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href="account-order-details.html"
                                            >#7592</a
                                        >
                                    </td>
                                    <td>28 March, 2019</td>
                                    <td>Pending</td>
                                    <td>
                                        $374.00 for 3 item(s)
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href="account-order-details.html"
                                            >#7192</a
                                        >
                                    </td>
                                    <td>15 March, 2019</td>
                                    <td>Shipped</td>
                                    <td>
                                        $791.00 for 4 item(s)
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    computed: {
        user() {
            return this.$page.props.auth.user;
        }
    },
    data() {
        return {
            info: null
        };
    },
    async mounted() {
        await this.$http
            .get("/api/v1/me/info")
            .then(Response => (this.info = Response.data))
            .catch(error => console.log(error.response));
    }
};
</script>
