<template>
    <admin-layout>
        <div class="row">
            <div class="col-12">
                <div class="card mb-4 shadow">
                    <div class="card-header ps-2 pb-0">
                        <h6>Newsletter List</h6>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase font-weight-bolde ps-2" style="font-size: 13px"
                                        >
                                            Newsletter Name
                                        </th>
                                        <th
                                            class="text-uppercase font-weight-bolde px-2" style="font-size: 13px"
                                        >
                                            Edit
                                        </th>
                                        <th class="text-uppercase font-weight-bolde ps-2" style="font-size: 13px"
                                        >
                                            Newsletter
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-dark">
                                            news letter name
                                        </td>
                                        <td>
                                            <a href="javascript:;" class="text-black font-weight-bold text-xs">
                                                <i class="fa fa-pencil-alt fa-sm"></i>
                                                Edit
                                            </a>
                                        </td>
                                        <td>
                                            news <div class="d-flex justify-between-center">
                                                <a href="javascript:;" class="text-light bg-danger me-2 p-2 rounded-circle"><i class="fa fa-minus fa-sm"></i> </a>

                                                <a href="javascript:;" class="text-light bg-success p-2 rounded-circle"><i class="fas fa-plus fa-sm"></i> </a>
                                            </div>
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
    components: {
        adminLayout
    }
};
</script>
