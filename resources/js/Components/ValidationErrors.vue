<script setup>
import { computed } from "vue";
import { usePage } from "@inertiajs/inertia-vue3";

const errors = computed(() => usePage().props.value.errors);

const hasErrors = computed(() => Object.keys(errors.value).length > 0);
</script>

<template>
    <div v-if="hasErrors">
        <div
            class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4"
            role="alert"
        >
            <p class="font-bold">Error</p>
            <!-- <p>Something not ideal might be happening.</p> -->
            <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                <li v-for="(error, key) in errors" :key="key">{{ error }}</li>
            </ul>
        </div>
    </div>
</template>
