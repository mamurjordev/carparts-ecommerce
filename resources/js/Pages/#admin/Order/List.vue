<template>
    <admin-layout>
        <div class="row">
            <div class="col-12">
                <div class="card mb-4 shadow">
                    <div class="card-header ps-2 pb-0">
                        <h6>Orders List</h6>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table mb-0">
                                <thead>
                                    <tr>
                                        <th
                                            class="text-uppercase font-weight-bolde ps-2"
                                            style="font-size: 13px"
                                        >
                                            SL No
                                        </th>
                                        <th
                                            class="text-uppercase font-weight-bolde px-2"
                                            style="font-size: 13px"
                                        >
                                            Invoice No
                                        </th>
                                        <th
                                            class="text-uppercase font-weight-bolde px-2"
                                            style="font-size: 13px"
                                        >
                                            Customer Name
                                        </th>
                                        <th
                                            class="text-uppercase font-weight-bolde ps-2"
                                            style="font-size: 13px"
                                        >
                                            Email
                                        </th>
                                        <th
                                            class="text-uppercase font-weight-bolde ps-2"
                                            style="font-size: 13px"
                                        >
                                            Order Date
                                        </th>
                                        <th
                                            class="text-uppercase font-weight-bolde ps-2"
                                            style="font-size: 13px"
                                        >
                                            Payment Method
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr
                                        v-for="(order, index) in orders.data"
                                        :key="index"
                                    >
                                        <td>
                                            01
                                        </td>
                                        <td>
                                            In-0545d
                                        </td>
                                        <td>
                                            Carparts
                                        </td>
                                        <td>
                                            10.00 $
                                        </td>
                                        <td>
                                            Paypal
                                        </td>
                                        <td>
                                            Fedax
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- pagination -->
            <div class=""></div>
        </div>
    </admin-layout>
</template>

<script>
import adminLayout from "@/Layouts/AdminLayout";
export default {
    props: ["orders"],
    components: {
        adminLayout
    }
};
</script>
