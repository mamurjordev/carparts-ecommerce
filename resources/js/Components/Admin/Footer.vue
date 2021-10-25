<template>
    <footer class="block py-4">
        <div class="container mx-auto px-4">
            <hr class="mb-4 border-b-1 border-gray-200" />
            <div
                class="flex flex-wrap items-center md:justify-between justify-center"
            >
                <div class="w-full md:w-4/12 px-4">
                    <div
                        class="text-sm text-gray-500 font-semibold py-1 text-center md:text-left"
                    >
                        Urheberrechte ©
                        {{ year }}
                        <a
                            href="#!"
                            class="text-gray-500 hover:text-gray-700 text-sm font-semibold py-1"
                        >
                            Car Parts
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</template>

<script>
export default {
    computed: {
        year() {
            return new Date().getFullYear();
        }
    }
};
</script>
