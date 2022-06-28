<script setup>
import Nav from "@/Components/Nav.vue";

defineProps({
    laravelVersion: String,
    phpVersion: String,
    backgroundImage: String,
    canLogin: Boolean,
    canRegister: Boolean,
    apiKey: Boolean,
});
</script>

<template>
    <!-- Missing API Key message -->
    <div
        v-if="!apiKey"
        class="min-h-screen flex flex-col sm:justify-center items-center pt-3 sm:pt-0"
    >
        <div class="mb-4 mt-3 font-medium text-sm text-red-600">
            <div
                class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4"
                role="alert"
            >
                <p class="font-bold">Missing API Key</p>
                <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                    Please modify the .env file and place one (API_KEY=)
                </ul>
            </div>
        </div>
    </div>

    <div v-else>
        <Nav />
        <div
            class="min-h-screen flex flex-col sm:justify-center items-center pt-3 sm:pt-0 bg-slate-900"
        >
            <div
                class="w-full sm:max-w-sm lg:max-w-3xl mt-6 px-6 py-4 mx-3 bg-white dark:bg-slate-800 shadow-md overflow-hidden sm:rounded-lg"
                :style="
                    !backgroundImage
                        ? {}
                        : {
                              'background-image':
                                  'linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)),url(' +
                                  backgroundImage +
                                  ')',
                              'background-size': '100%',
                              'background-repeat': 'no-repeat',
                          }
                "
            >
                <slot />
            </div>

            <span class="text-slate-400 text-xs my-4">
                Laravel v.{{ laravelVersion }} | PHP v.{{ phpVersion }} | By
                Alexander Phaiboon
            </span>
        </div>
    </div>
</template>
