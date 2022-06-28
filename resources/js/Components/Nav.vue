<!-- This example requires Tailwind CSS v2.0+ -->
<template>
    <Popover
        class="relative bg-white dark:bg-slate-800 border-b-2 border-slate-700"
    >
        <div class="max-w-7xl mx-auto px-4 sm:px-6">
            <div
                class="flex justify-between items-center py-6 md:justify-start md:space-x-10"
            >
                <div class="flex justify-start lg:w-0 lg:flex-1">
                    <Link href="/">
                        <BreezeApplicationLogo
                            class="h-10 w-10 fill-current text-emerald-600 mx-auto"
                        />
                    </Link>
                </div>
                <div class="-mr-2 -my-2 md:hidden">
                    <PopoverButton
                        class="bg-white dark:bg-slate-700 rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-100 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-emerald-500"
                    >
                        <span class="sr-only">Open menu</span>
                        <MenuIcon class="h-6 w-6" aria-hidden="true" />
                    </PopoverButton>
                </div>
                <PopoverGroup as="nav" class="hidden md:flex space-x-10">
                    <Popover class="relative" v-slot="{ open }">
                        <PopoverButton
                            :class="[
                                open ? 'text-gray-400' : 'text-gray-400',
                                'group bg-white dark:bg-slate-700 px-2 rounded-md inline-flex items-center text-base font-medium hover:text-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500',
                            ]"
                        >
                            <span>Movies</span>
                            <ChevronDownIcon
                                :class="[
                                    open ? 'text-gray-100' : 'text-gray-200',
                                    'ml-2 h-5 w-5 group-hover:text-gray-300',
                                ]"
                                aria-hidden="true"
                            />
                        </PopoverButton>

                        <transition
                            enter-active-class="transition ease-out duration-200"
                            enter-from-class="opacity-0 translate-y-1"
                            enter-to-class="opacity-100 translate-y-0"
                            leave-active-class="transition ease-in duration-150"
                            leave-from-class="opacity-100 translate-y-0"
                            leave-to-class="opacity-0 translate-y-1"
                        >
                            <PopoverPanel
                                class="absolute z-10 left-1/2 transform -translate-x-1/2 mt-3 px-2 w-screen max-w-md sm:px-0 border-2 border-slate-500 rounded-lg"
                            >
                                <div
                                    class="rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 overflow-hidden"
                                >
                                    <div
                                        class="relative grid gap-6 bg-white dark:bg-slate-700 px-5 py-6 sm:gap-8 sm:p-8"
                                    >
                                        <a
                                            v-for="item in movieLinks"
                                            :key="item.name"
                                            :href="item.href"
                                            class="-m-3 p-3 flex items-start rounded-lg hover:bg-slate-800"
                                        >
                                            <component
                                                :is="item.icon"
                                                class="flex-shrink-0 h-6 w-6 text-emerald-600"
                                                aria-hidden="true"
                                            />
                                            <div class="ml-4">
                                                <p
                                                    class="text-base font-medium text-gray-100"
                                                >
                                                    {{ item.name }}
                                                </p>
                                                <p
                                                    class="mt-1 text-sm text-gray-100"
                                                >
                                                    {{ item.description }}
                                                </p>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </PopoverPanel>
                        </transition>
                    </Popover>

                    <Popover class="relative" v-slot="{ open }">
                        <PopoverButton
                            :class="[
                                open ? 'text-gray-400' : 'text-gray-400',
                                'group bg-white dark:bg-slate-700 px-2 rounded-md inline-flex items-center text-base font-medium hover:text-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500',
                            ]"
                        >
                            <span>TV Shows</span>
                            <ChevronDownIcon
                                :class="[
                                    open ? 'text-gray-600' : 'text-gray-400',
                                    'ml-2 h-5 w-5 group-hover:text-gray-100',
                                ]"
                                aria-hidden="true"
                            />
                        </PopoverButton>

                        <transition
                            enter-active-class="transition ease-out duration-200"
                            enter-from-class="opacity-0 translate-y-1"
                            enter-to-class="opacity-100 translate-y-0"
                            leave-active-class="transition ease-in duration-150"
                            leave-from-class="opacity-100 translate-y-0"
                            leave-to-class="opacity-0 translate-y-1"
                        >
                            <PopoverPanel
                                class="absolute z-10 left-1/2 transform -translate-x-1/2 mt-3 px-2 w-screen max-w-md sm:px-0 border-2 border-slate-500 rounded-lg"
                            >
                                <div
                                    class="rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 overflow-hidden"
                                >
                                    <div
                                        class="relative grid gap-6 bg-white dark:bg-slate-700 px-5 py-6 sm:gap-8 sm:p-8"
                                    >
                                        <a
                                            v-for="item in tvLinks"
                                            :key="item.name"
                                            :href="item.href"
                                            class="-m-3 p-3 flex items-start rounded-lg hover:bg-slate-800"
                                        >
                                            <component
                                                :is="item.icon"
                                                class="flex-shrink-0 h-6 w-6 text-emerald-600"
                                                aria-hidden="true"
                                            />
                                            <div class="ml-4">
                                                <p
                                                    class="text-base font-medium text-gray-100"
                                                >
                                                    {{ item.name }}
                                                </p>
                                                <p
                                                    class="mt-1 text-sm text-gray-100"
                                                >
                                                    {{ item.description }}
                                                </p>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </PopoverPanel>
                        </transition>
                    </Popover>
                </PopoverGroup>
                <div
                    class="hidden md:flex items-center justify-end md:flex-1 lg:w-0"
                >
                    <a
                        href="#"
                        class="whitespace-nowrap text-base font-medium text-gray-100 hover:text-emerald-400"
                    >
                        Sign in
                    </a>
                    <a
                        href="#"
                        class="ml-8 whitespace-nowrap inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-emerald-600 hover:bg-emerald-700"
                    >
                        Sign up
                    </a>
                </div>
            </div>
        </div>

        <!-- Mobile Menu -->
        <transition
            enter-active-class="duration-200 ease-out"
            enter-from-class="opacity-0 scale-95"
            enter-to-class="opacity-100 scale-100"
            leave-active-class="duration-100 ease-in"
            leave-from-class="opacity-100 scale-100"
            leave-to-class="opacity-0 scale-95"
        >
            <PopoverPanel
                focus
                class="absolute top-0 inset-x-0 p-2 transition transform origin-top-right md:hidden z-50"
            >
                <div
                    class="rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 bg-white dark:bg-slate-900 divide-y-2 divide-gray-50/20"
                >
                    <div class="pt-5 pb-6 px-5">
                        <div class="flex items-center justify-between">
                            <div>
                                <Link href="/">
                                    <BreezeApplicationLogo
                                        class="h-8 w-8 fill-current text-emerald-600 mx-auto"
                                    />
                                </Link>
                            </div>
                            <div class="-mr-2">
                                <PopoverButton
                                    class="bg-white dark:bg-slate-700 rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-100 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-emerald-500"
                                >
                                    <span class="sr-only">Close menu</span>
                                    <XIcon class="h-6 w-6" aria-hidden="true" />
                                </PopoverButton>
                            </div>
                        </div>
                        <div class="mt-6">
                            <nav class="grid gap-y-8">
                                <a
                                    v-for="item in links"
                                    :key="item.name"
                                    :href="item.href"
                                    class="-m-3 p-3 flex items-center rounded-md hover:bg-gray-50"
                                >
                                    <component
                                        :is="item.icon"
                                        class="flex-shrink-0 h-6 w-6 text-emerald-600"
                                        aria-hidden="true"
                                    />
                                    <span
                                        class="ml-3 text-base font-medium text-gray-100"
                                    >
                                        {{ item.name }}
                                    </span>
                                </a>
                            </nav>
                        </div>
                    </div>
                    <div class="py-6 px-5 space-y-6">
                        <div>
                            <a
                                href="#"
                                class="w-full flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-emerald-600 hover:bg-emerald-700"
                            >
                                Sign up
                            </a>
                            <p
                                class="mt-6 text-center text-base font-medium text-gray-100"
                            >
                                Existing customer?
                                {{ " " }}
                                <a
                                    href="#"
                                    class="text-emerald-600 hover:text-emerald-500"
                                >
                                    Sign in
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
            </PopoverPanel>
        </transition>
    </Popover>
</template>

<script setup>
import {
    Popover,
    PopoverButton,
    PopoverGroup,
    PopoverPanel,
} from "@headlessui/vue";
import { ChartSquareBarIcon, MenuIcon, XIcon } from "@heroicons/vue/outline";
import { ChevronDownIcon, VideoCameraIcon } from "@heroicons/vue/solid";
import BreezeApplicationLogo from "@/Components/ApplicationLogo.vue";
import { Link } from "@inertiajs/inertia-vue3";

const links = [
    {
        name: "Movies",
        description: "Full database of movies categorized by rating.",
        href: "#",
        icon: VideoCameraIcon,
    },
    {
        name: "Trending Movies",
        description: "Movies that are gaining in popularity.",
        href: "#",
        icon: ChartSquareBarIcon,
    },
    {
        name: "TV Shows",
        description: "All TV shows categorized by rating.",
        href: "#",
        icon: VideoCameraIcon,
    },
    {
        name: "Trending TV Shows",
        description: "Popular TV Shows.",
        href: "#",
        icon: ChartSquareBarIcon,
    },
];

const movieLinks = [
    {
        name: "Movies",
        description: "Full database of movies categorized by rating.",
        href: "#",
        icon: VideoCameraIcon,
    },
    {
        name: "Trending Movies",
        description: "Movies that are gaining in popularity.",
        href: "#",
        icon: ChartSquareBarIcon,
    },
];

const tvLinks = [
    {
        name: "TV Shows",
        description: "All TV shows categorized by rating.",
        href: "#",
        icon: VideoCameraIcon,
    },
    {
        name: "Trending TV Shows",
        description: "Popular TV Shows.",
        href: "#",
        icon: ChartSquareBarIcon,
    },
];
</script>
