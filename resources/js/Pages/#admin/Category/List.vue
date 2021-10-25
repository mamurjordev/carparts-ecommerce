<template>
    <admin-layout>
        <div class="row">
            <div class="col-12">
                <div class="card mb-4 shadow">
                    <div
                        class="card-header ps-2 pb-0 d-flex justify-content-between"
                    >
                        <h6>Category List</h6>
                        <inertia-link
                            href="/admin/category/create"
                            class="btn btn-primary"
                            ><i class="fas fa-plus"></i> Create</inertia-link
                        >
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
                                            Category Name
                                        </th>
                                        <th
                                            class="text-uppercase font-weight-bolde px-2"
                                            style="font-size: 13px"
                                        >
                                            Parent Category
                                        </th>
                                        <th
                                            class="text-uppercase font-weight-bolde px-2"
                                            style="font-size: 13px"
                                        >
                                            Products
                                        </th>
                                        <th
                                            class="text-uppercase font-weight-bolde ps-2"
                                            style="font-size: 13px"
                                        >
                                            Edit
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr
                                        v-for="(category,
                                        index) in categories.data"
                                        :key="index"
                                    >
                                        <td class="text-dark">
                                            {{ category.categoryName }}
                                        </td>
                                        <td
                                            class="text-black font-weight-bold text-xs"
                                        >
                                            {{ category.parentName }}
                                        </td>
                                        <td
                                            class="text-black font-weight-bold text-xs"
                                        >
                                            0 products
                                        </td>
                                        <td>
                                            <inertia-link
                                                :href="
                                                    '/admin/category/' +
                                                        category.assemblyGroupNodeId +
                                                        '/edit'
                                                "
                                                class="text-black font-weight-bold text-xs"
                                            >
                                                <i
                                                    class="fa fa-pencil-alt fa-sm"
                                                ></i>
                                                Edit
                                            </inertia-link>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- pagination -->
            <nav aria-label="...">
                <ul class="pagination">
                    <li
                        v-for="(link, index) in categories.links"
                        :key="index"
                        :class="[
                            link.active ? 'active' : '  ',
                            link.url == null ? 'disabled' : ''
                        ]"
                        class="page-item"
                    >
                        <inertia-link
                            class="page-link"
                            :href="link.url ? link.url : '#!'"
                            v-html="link.label"
                        ></inertia-link>
                    </li>
                </ul>
            </nav>
        </div>
    </admin-layout>
</template>

<script>
import adminLayout from "@/Layouts/AdminLayout";
export default {
    props: ["categories"],
    components: {
        adminLayout
    }
};
</script>
