<script setup>
import { Head, Link } from "@inertiajs/inertia-vue3";
import BreezeGuestLayout from "@/Layouts/Guest.vue";
import BreezeLabel from "@/Components/Label.vue";

defineProps({
    movie: Object,
    laravelVersion: String,
    phpVersion: String,
});
</script>

<template>
    <Head
        v-bind:title="movie.original_title + '(' + movie.release_year + ')'"
    />

    <BreezeGuestLayout
        v-bind:laravel-version="laravelVersion"
        v-bind:php-version="phpVersion"
        v-bind:background-image="
            movie.base_url + 'original' + movie.backdrop_path
        "
    >
        <div>
            <Link
                class="inline-flex items-center px-2 py-1 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray transition ease-in-out duration-150"
                href="/"
            >
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="h-6 w-6"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    stroke-width="2"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M11 15l-3-3m0 0l3-3m-3 3h8M3 12a9 9 0 1118 0 9 9 0 01-18 0z"
                    />
                </svg>
                <span class="ml-2">Back</span>
            </Link>
        </div>

        <!-- Movie Details -->
        <div class="flex flex-row mt-3">
            <div class="basis-1/4 text-right">
                <img
                    v-bind:src="movie.base_url + '/w780' + movie.poster_path"
                    style="max-width: 350px"
                    class="rounded-lg"
                    v-if="movie.poster_path"
                />
            </div>
            <div class="basis-3/4 px-3">
                <h2 class="my-1 text-white font-bold text-2xl">
                    {{ movie.original_title }} ({{ movie.release_year }})
                </h2>
                <h4 class="text-white text-sm">
                    Release Date: {{ movie.release_date }} <br />
                    Runtime: {{ movie.runtime }}
                </h4>

                <h3
                    class="text-white text-lg font-medium mt-4 italic border-l-2 border-emerald-400 pl-2"
                >
                    {{ movie.tagline }}
                </h3>

                <h4 class="font-extrabold mt-6 text-white">Overview</h4>
                <p class="text-white text-md mt-2">{{ movie.overview }}</p>
            </div>
        </div>
        <h2 class="text-white font-extrabold text-xl mt-4">Cast</h2>

        <div class="flex flex-row flex-wrap mt-2 overflow-auto">
            <div
                v-for="(cast, key) in movie.cast"
                :key="key"
                class="bg-slate-700 rounded-md flex-initial basis-1/5 m-2"
            >
                <img
                    v-bind:src="movie.base_url + 'original' + cast.profile_path"
                    class="rounded-tr-md rounded-tl-md"
                    v-if="cast.profile_path"
                />
                <div class="p-2">
                    <h2 class="text-white text-md font-bold">
                        {{ cast.name }}
                    </h2>
                    <h2 class="text-white text-sm font-medium">
                        {{ cast.character }}
                    </h2>
                </div>
            </div>
        </div>
    </BreezeGuestLayout>
</template>
