<template>
    <!-- This example requires Tailwind CSS v2.0+ -->
    <div
        class="bg-white px-4 py-3 flex items-center justify-between border-t border-gray-200 sm:px-6"
    >
        <div class="flex-1 flex justify-between sm:hidden">
            <inertia-link
                :href="previous ? previous : ''"
                class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50"
            >
                Bisherige
            </inertia-link>
            <inertia-link
                :href="next ? next : ''"
                class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50"
            >
                Nächster
            </inertia-link>
        </div>
        <div
            class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between"
        >
            <div class="hidden">
                <p class="text-sm text-gray-700">
                    Zeigen
                    <span class="font-medium">{{ from }}</span>
                    zu
                    <span class="font-medium">{{ to }}</span>
                    von
                    <span class="font-medium">{{ total }}</span>
                    Ergebnisse
                </p>
            </div>
            <div>
                <nav
                    class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px"
                    aria-label="Pagination"
                >
                    <!-- Current: "z-10 bg-indigo-50 border-indigo-500 text-indigo-600", Default: "bg-white border-gray-300 text-gray-500 hover:bg-gray-50" -->
                    <div class="" v-for="(link, index) in links" :key="index">
                        <inertia-link
                            as="button"
                            :class="
                                link.active
                                    ? 'z-10 bg-indigo-50 border-indigo-500 text-indigo-600'
                                    : 'bg-white border-gray-300 text-gray-500 hover:bg-gray-50'
                            "
                            :href="link.url ? link.url : ''"
                            :disabled="!link.url ? true : false"
                            aria-current="page"
                            class="relative inline-flex items-center px-4 py-2 border text-sm font-medium"
                            v-html="label(link.label)"
                        >
                        </inertia-link>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ["from", "to", "total", "links", "previous", "next"],
    methods: {
        label(label) {
            if (label == "&laquo; Previous") {
                return "Bisherige";
            } else if (label == "Next &raquo;") {
                return "Nächster";
            } else {
                return label;
            }
        }
    }
};
</script>
