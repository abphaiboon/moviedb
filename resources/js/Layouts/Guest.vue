<script setup>
import Nav from "@/Components/Nav.vue";

defineProps({
    laravelVersion: String,
    phpVersion: String,
    backgroundImage: String,
    canLogin: Boolean,
    canRegister: Boolean,
});
</script>

<template>
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
</template>
