<template>
    <div class="space-y-2">
        <h5 class="font-bold text-lg mb-3 px-3">Lieferanten</h5>
        <div
            class="grid grid-cols-3 place-items-stretch border border-gray-300 rounded py-2 px-5"
        >
            <div class="">Autopartner</div>
            <inertia-link href="" class="text-green-700"
                >Einstellungen und Statistiken</inertia-link
            >
            <label
                for="toggleB"
                class="flex items-center cursor-pointer text-gray-600 justify-self-end"
            >
                Aktiviert
                <div class="ml-2 relative">
                    <input
                        type="checkbox"
                        id="toggleB"
                        class="sr-only"
                        checked
                    />
                    <div class="block bg-gray-600 w-10 h-6 rounded-full"></div>
                    <div
                        class="dot absolute left-1 top-1 bg-white w-4 h-4 rounded-full transition"
                    ></div>
                </div>
            </label>
        </div>
        <div
            class="grid grid-cols-3 place-items-stretch border border-gray-300 rounded py-2 px-5"
        >
            <div class="">Febest</div>
            <inertia-link href="" class="text-green-700"
                >Einstellungen und Statistiken</inertia-link
            >
            <label
                for="toggleB"
                class="flex items-center cursor-pointer text-gray-600 justify-self-end"
            >
                Aktiviert
                <div class="ml-2 relative">
                    <input
                        type="checkbox"
                        id="toggleB"
                        class="sr-only"
                        checked
                    />
                    <div class="block bg-gray-600 w-10 h-6 rounded-full"></div>
                    <div
                        class="dot absolute left-1 top-1 bg-white w-4 h-4 rounded-full transition"
                    ></div>
                </div>
            </label>
        </div>
        <div
            class="grid grid-cols-3 place-items-stretch border border-gray-300 rounded py-2 px-5"
        >
            <div class="">Mistrol</div>
            <inertia-link href="" class="text-green-700"
                >Einstellungen und Statistiken</inertia-link
            >
            <label
                for="toggleB"
                class="flex items-center cursor-pointer text-gray-600 justify-self-end"
            >
                Aktiviert
                <div class="ml-2 relative">
                    <input
                        type="checkbox"
                        id="toggleB"
                        class="sr-only"
                        checked
                    />
                    <div class="block bg-gray-600 w-10 h-6 rounded-full"></div>
                    <div
                        class="dot absolute left-1 top-1 bg-white w-4 h-4 rounded-full transition"
                    ></div>
                </div>
            </label>
        </div>
        <div
            class="grid grid-cols-3 place-items-stretch border border-gray-300 rounded py-2 px-5"
        >
            <div class="">Motoprofil</div>
            <inertia-link href="#!" class="text-green-700"
                >Einstellungen und Statistiken</inertia-link
            >
            <label
                for="toggleB"
                class="flex items-center cursor-pointer text-gray-600 justify-self-end"
            >
                Aktiviert
                <div class="ml-2 relative">
                    <input
                        type="checkbox"
                        id="toggleB"
                        class="sr-only"
                        checked
                    />
                    <div class="block bg-gray-600 w-10 h-6 rounded-full"></div>
                    <div
                        class="dot absolute left-1 top-1 bg-white w-4 h-4 rounded-full transition"
                    ></div>
                </div>
            </label>
        </div>
    </div>
</template>

<style>
/* Toggle B */
input:checked ~ .dot {
    transform: translateX(100%);
    background-color: #48bb78;
}
</style>
