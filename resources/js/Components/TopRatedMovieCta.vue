<script setup>
import Rating from "@/Components/Rating.vue";

defineProps({
    movie: Object,
});
</script>

<template>
    <div
        class="shadow-2xl mx-auto text-center md:py-12 border-b-2 border-slate-700 py-1"
        :style="
            movie.backdrop_path != ''
                ? {
                      'background-image':
                          'linear-gradient(rgba(0,0,0,0.83), rgba(0,0,0,0.83)),url(' +
                          movie.secure_base_url +
                          'original' +
                          movie.backdrop_path +
                          ')',
                      'background-size': '100% auto',
                      'background-repeat': 'no-repeat',
                      'background-position': 'top center',
                  }
                : {}
        "
    >
        <!-- Popular Movie Details -->
        <div class="max-w-7xl mx-auto">
            <div class="flex sm:flex-row flex-col mt-2 sm:mt-0">
                <div class="basis-1/4 px-2">
                    <img
                        v-bind:src="
                            movie.base_url + '/w780' + movie.poster_path
                        "
                        class="rounded-lg w-64 block mx-auto"
                        v-if="movie.poster_path"
                    />
                </div>
                <div class="basis-3/4 px-4 text-left sm:pt-4">
                    <span
                        class="text-xs inline-block py-2 px-3 leading-none text-center whitespace-nowrap align-baseline font-bold bg-yellow-400 text-black rounded-full mt-4 md:mt-0"
                        >Popular</span
                    >
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

                    <h4 class="font-extrabold mt-7 text-white">Overview</h4>
                    <p class="text-white text-md mt-2">{{ movie.overview }}</p>

                    <Rating
                        class="mt-5 mb-6 md:mb-0"
                        v-bind:rating="movie.stars"
                        v-bind:average="movie.vote_average"
                    />
                </div>
            </div>
        </div>
    </div>
</template>
