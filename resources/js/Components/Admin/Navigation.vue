<template>
    <nav
        class="md:left-0 md:block md:fixed md:top-0 md:bottom-0 md:overflow-y-auto md:flex-row md:flex-nowrap md:overflow-hidden shadow-xl bg-gray-900 text-white flex flex-wrap items-center justify-between relative md:w-52 z-10 py-4 px-6"
    >
        <div
            class="md:flex-col md:items-stretch md:min-h-full md:flex-nowrap px-0 flex flex-wrap items-center justify-between w-full mx-auto"
        >
            <button
                class="cursor-pointer md:hidden px-3 py-1 text-xl leading-none bg-transparent rounded border border-solid border-transparent"
                type="button"
                @click="toggleNavbar('example-collapse-sidebar')"
            >
                <i class="fas fa-bars"></i>
            </button>
            <inertia-link
                class="md:block text-left md:pb-2 text-gray-100 mr-0 inline-block whitespace-nowrap text-sm uppercase font-bold p-4 px-0"
                href="/admin"
            >
                Car Parts
            </inertia-link>
            <ul class="md:hidden items-center flex flex-wrap list-none">
                <li class="inline-block relative">
                    <a
                        class="block py-1 px-3"
                        href="#pablo"
                        onclick="openDropdown(event,'notification-dropdown')"
                        ><i class="fas fa-bell"></i
                    ></a>
                    <div
                        class="hidden bg-white text-base z-50 float-left py-2 list-none text-left rounded shadow-lg min-w-48"
                        id="notification-dropdown"
                    >
                        <a
                            href="#pablo"
                            class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-gray-700"
                            >Action</a
                        ><a
                            href="#pablo"
                            class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-gray-700"
                            >Another action</a
                        ><a
                            href="#pablo"
                            class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-gray-700"
                            >Something else here</a
                        >
                        <div
                            class="h-0 my-2 border border-solid border-gray-100"
                        ></div>
                        <a
                            href="#pablo"
                            class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-gray-700"
                            >Seprated link</a
                        >
                    </div>
                </li>
            </ul>
            <div
                class="md:flex md:flex-col md:items-stretch md:opacity-100 md:relative md:mt-4 md:shadow-none shadow absolute top-0 left-0 right-0 z-40 overflow-y-auto overflow-x-hidden h-auto items-center flex-1 rounded hidden"
                id="example-collapse-sidebar"
            >
                <div
                    class="md:min-w-full md:hidden block pb-4 mb-4 border-b border-solid border-gray-200"
                >
                    <div class="flex flex-wrap">
                        <div class="w-6/12">
                            <a
                                class="md:block text-left md:pb-2 text-gray-600 mr-0 inline-block whitespace-nowrap text-sm uppercase font-bold p-4 px-0"
                                href="../../index.html"
                            >
                                Car Parts
                            </a>
                        </div>
                        <div class="w-6/12 flex justify-end">
                            <button
                                type="button"
                                class="cursor-pointer text-black opacity-50 md:hidden px-3 py-1 text-xl leading-none bg-transparent rounded border border-solid border-transparent"
                                @click="
                                    toggleNavbar('example-collapse-sidebar')
                                "
                            >
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <!-- Divider -->
                <hr class="my-4 md:min-w-full" />
                <!-- Navigation -->

                <ul
                    class="md:flex-col md:min-w-full text-gray-700 md:text-white flex flex-col list-none"
                >
                    <li class="items-center">
                        <inertia-link
                            href="/admin"
                            class="text-xs uppercase py-3 font-bold block text-green-500 hover:text-green-600"
                        >
                            <i class="fas fa-tv mr-2 text-sm opacity-75"></i>
                            Instrumententafel
                        </inertia-link>
                    </li>
                    <li class="items-center">
                        <inertia-link
                            href="/admin/orders"
                            class="text-xs uppercase py-3 font-bold block hover:text-blue-300"
                        >
                            <i class="fas fa-shopping-cart mr-2 text-sm"></i>
                            bestellungen
                        </inertia-link>
                    </li>
                    <li class="items-center">
                        <inertia-link
                            href="/admin/users"
                            class="text-xs uppercase py-3 font-bold block hover:text-blue-300"
                        >
                            <i class="fas fa-user-friends mr-2 text-sm"></i>
                            Kunden
                        </inertia-link>
                    </li>
                    <li class="items-center">
                        <inertia-link
                            href="/admin/products"
                            class="text-xs uppercase py-3 font-bold block hover:text-blue-300"
                        >
                            <i class="fas fa-boxes mr-2 text-sm"></i>
                            Produkte
                        </inertia-link>
                    </li>
                    <li class="items-center hidden">
                        <inertia-link
                            href="/admin/vehicles"
                            class="text-xs uppercase py-3 font-bold block hover:text-blue-300"
                        >
                            <i class="fas fa-car mr-2 text-sm"></i>
                            Fahrzeuge
                        </inertia-link>
                    </li>
                    <li class="items-center">
                        <inertia-link
                            href="/admin/category"
                            class="text-xs uppercase py-3 font-bold block hover:text-blue-300"
                        >
                            <i class="fas fa-network-wired mr-2 text-sm"></i>
                            Kategorien
                        </inertia-link>
                    </li>
                    <li class="items-center">
                        <inertia-link
                            href="/admin/newsletter"
                            class="text-xs uppercase py-3 font-bold block hover:text-blue-300"
                        >
                            <i class="far fa-newspaper mr-2 text-sm"></i>
                            Newsletter
                        </inertia-link>
                    </li>
                    <li class="items-center">
                        <inertia-link
                            href="/admin/elements"
                            class="text-xs uppercase py-3 font-bold block hover:text-blue-300"
                        >
                            <i class="fab fa-elementor mr-2 text-sm"></i>
                            Elemente
                        </inertia-link>
                    </li>
                    <li class="items-center">
                        <inertia-link
                            href="/admin/statistics"
                            class="text-xs uppercase py-3 font-bold block hover:text-blue-300"
                        >
                            <i class="fas fa-chart-line mr-2 text-sm"></i>
                            Statistiken
                        </inertia-link>
                    </li>
                    <li class="items-center">
                        <inertia-link
                            href="/admin/pages"
                            class="text-xs uppercase py-3 font-bold block hover:text-blue-300"
                        >
                            <i class="far fa-file-alt mr-2 text-sm"></i>
                            Seiten
                        </inertia-link>
                    </li>
                    <li class="items-center">
                        <inertia-link
                            href="/admin/settings"
                            class="text-xs uppercase py-3 font-bold block hover:text-blue-300"
                        >
                            <i class="fas fa-tools mr-2 text-sm"></i>
                            die Einstellungen
                        </inertia-link>
                    </li>
                    <li class="items-center hidden">
                        <inertia-link
                            href="/admin/dev/support"
                            class="text-xs uppercase py-3 font-bold block hover:text-blue-300"
                        >
                            <i class="far fa-handshake mr-2 text-sm"></i>
                            Unterstützung
                        </inertia-link>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</template>

<script>
export default {
    methods: {
        /* Sidebar - Side navigation menu on mobile/responsive mode */
        toggleNavbar(collapseID) {
            document.getElementById(collapseID).classList.toggle("hidden");
            document.getElementById(collapseID).classList.toggle("bg-white");
            document.getElementById(collapseID).classList.toggle("m-2");
            document.getElementById(collapseID).classList.toggle("py-3");
            document.getElementById(collapseID).classList.toggle("px-6");
        }
    }
};
</script>
