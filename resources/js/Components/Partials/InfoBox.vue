<template>
    <Link :href="link"
       :class="['container-boxed flex items-center hover:-translate-y-1 gap-4 rounded-lg bg-white p-6 transition duration-300', link ? 'with-link ': 'link-disabled']">
                                <span class="flex size-12 shrink-0 items-center justify-center rounded-full sm:size-16"
                                      style="background: var(--color)" v-html="svg">
                                </span>

        <span class="pt-3 sm:pt-5 w-full">
            <h2 class="text-xl font-semibold text-black text-white">{{ title }}</h2>
            <p class="mt-2 mb-2 text-sm/relaxed"> {{ desc }} </p>
        </span>

        <svg
            class="size-6 shrink-0 self-center "
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 24 24"
            stroke-width="1.5"
            style="stroke:var(--color)"
        >
            <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75"
            />
        </svg>
    </Link>
</template>

<script setup>
import {Link}          from '@inertiajs/vue3';
defineProps({
    link : {type: String, default: ''},
    svg  : {type: String, default: ''},
    title: {type: String, default: ''},
    desc : {type: String, default: ''},
});
</script>

<style scoped>

</style>
