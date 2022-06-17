<script setup>
import { Head, useForm } from "@inertiajs/inertia-vue3";
import BreezeGuestLayout from "@/Layouts/Guest.vue";
import BreezeInput from "@/Components/Input.vue";
import BreezeValidationErrors from "@/Components/ValidationErrors.vue";
import BreezeButton from "@/Components/Button.vue";

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
    error: String,
    apiKey: Boolean,
});

const form = useForm({
    search: "",
});

const submit = () => {
    form.post(route("movies.search"), {
        onFinish: () => form.reset("search"),
    });
};
</script>

<template>
    <Head title="Find a Movie" />

    <BreezeGuestLayout
        v-bind:laravel-version="laravelVersion"
        v-bind:php-version="phpVersion"
    >
        <div>
            <!-- Missing API Key message -->
            <div
                v-if="!apiKey"
                class="mb-4 mt-3 font-medium text-sm text-red-600"
            >
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

            <div v-else>
                <div
                    class="flex items-center bg-slate-500 text-white text-sm font-bold px-4 py-3 rounded-sm"
                    role="alert"
                >
                    <svg
                        class="fill-current w-4 h-4 mr-2"
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 20 20"
                    >
                        <path
                            d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"
                        />
                    </svg>
                    <p>
                        Find information on your favorite movies! Please enter a
                        movie name below.
                    </p>
                </div>

                <BreezeValidationErrors class="mb-4 mt-4" />
                <div
                    v-if="error"
                    class="mb-4 mt-4 font-medium text-sm text-red-600"
                >
                    <div
                        class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4"
                        role="alert"
                    >
                        <p class="font-bold text-lg">
                            Uh oh, something went wrong!
                        </p>
                        <ul
                            class="mt-3 list-disc list-inside text-sm text-red-600"
                        >
                            {{
                                error
                            }}
                        </ul>
                    </div>
                </div>

                <form @submit.prevent="submit" class="mt-4">
                    <div class="relative">
                        <BreezeInput
                            id="search"
                            type="text"
                            class="mt-1 block w-full"
                            v-model="form.search"
                            required
                            autofocus
                            autocomplete="search"
                            placeholder="Enter a movie name..."
                        />
                        <BreezeButton
                            class="absolute inset-y-0 right-0 flex"
                            :class="{ 'opacity-25': form.processing }"
                            :disabled="form.processing"
                            >Search</BreezeButton
                        >
                    </div>
                </form>
            </div>
        </div>
    </BreezeGuestLayout>
</template>
