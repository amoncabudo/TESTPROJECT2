<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';
import Cookies from "@/components/Cookies.vue";
import NavBar from '@/components/NavBar.vue';

</script>

<template>
    <NavBar />

    <Head title="Welcome">
        <link rel="preconnect" href="https://rsms.me/" />
        <link rel="stylesheet" href="https://rsms.me/inter/inter.css" />
    </Head>
    <div class="flex min-h-screen flex-col items-center bg-[#FDFDFC] p-6 text-[#1b1b18] lg:justify-center lg:p-8">
        <div class="duration-750 starting:opacity-0 flex w-full items-center justify-center opacity-100 transition-opacity lg:grow">
            <main class="flex w-full max-w-[335px] flex-col-reverse overflow-hidden rounded-lg lg:max-w-4xl lg:flex-row">
                <div class="container mx-auto px-4 text-center">
                    <h1 class="text-6xl font-bold text-black mb-8 ">Test Project</h1>
                    <p class="text-3xl text-black mb-8 max-w-2xl mx-auto d">
                        Pàgina web dedicada a mostrar anuncis del nostre test project.
                    </p>
                    <Link :href="route('anuncis.index')">    
                        <button class=" bg-green-800 text-white px-8 py-3 rounded-lg hover:bg-green-500 transition-all cursor-pointer">
                            <p href="/anuncis" class="">Accedeix a veure els anuncis</p>
                        </button>
                    </Link>
                </div>
            </main>
            <Cookies />
        </div>
        <div class="h-14.5 hidden lg:block"></div>
    </div>
</template>
