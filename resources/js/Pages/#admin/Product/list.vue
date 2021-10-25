<template>
    <admin-layout>
        <div class="row">
            <div class="col-12">
                <div class="card mb-4 shadow">
                    <div class="card-header ps-2 pb-0">
                        <h6>Products List</h6>
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
                                            Product Name
                                        </th>
                                        <th
                                            class="text-uppercase font-weight-bolde px-2"
                                            style="font-size: 13px"
                                        >
                                            Product Quantity
                                        </th>
                                        <th
                                            class="text-uppercase font-weight-bolde px-2"
                                            style="font-size: 13px"
                                        >
                                            Price
                                        </th>
                                        <th
                                            class="text-uppercase font-weight-bolde ps-2"
                                            style="font-size: 13px"
                                        >
                                            Edit
                                        </th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
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
    components: {
        adminLayout
    }
};
</script>
