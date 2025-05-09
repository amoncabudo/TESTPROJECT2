<script setup>
import { Link } from '@inertiajs/vue3';
import { ref } from 'vue';

const showingNavigationDropdown = ref(false);
</script>

<template>
    <div class=" bg-white">
        <!-- Navigation -->
        <nav class="w-full z-50 bg-white shadow-md ">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center h-16">
                    <!-- Logo Section -->
                    <div class="flex items-center">
                        <Link href="/" class="flex items-center space-x-2">
                            <img class="h-16 w-16 object-cover rounded" :src="`/storage/LOGO.png`" alt="Logo">
                            <span class="text-2xl font-extrabold bg-gradient-to-r from-blue-800 to-indigo-800 bg-clip-text text-transparent">
                                <span class="text-blue-800">TESTPROJECT</span>
                            </span>
                        </Link>
                    </div>

                    <!-- Links Section --->
                    <div class="hidden sm:flex space-x-20">
                        <Link href="/" class="text-gray-600  hover:text-blue-500 transition-colors">
                        Inici
                        </Link>
                        <!-- Productes -->
                        <Link href="/anuncis" class="text-gray-600  hover:text-blue-500 transition-colors">
                        Anuncis
                        </Link>
                    </div>
                    <div class="hidden sm:flex items-center space-x-6">
                        <Link href="/settings" class="text-gray-600  hover:text-blue-500 transition-colors">
                            Zona usuari
                        </Link>
                        <Link href="/login" class="text-gray-600  hover:text-blue-500 transition-colors">
                            Iniciar sessió
                        </Link>
                        <Link href="/register" class="text-gray-600  hover:text-blue-500 transition-colors">
                            Registra't
                        </Link>
                    </div>
            
                    <!-- Hamburger -->
                    <div class="-me-2 flex items-center sm:hidden">
                        <button aria-label="button definition" @click="showingNavigationDropdown = !showingNavigationDropdown" class="inline-flex items-center justify-center rounded-md p-2 text-gray-400 transition duration-150 ease-in-out hover:bg-gray-100 hover:text-gray-500 focus:bg-gray-100 focus:text-gray-500 focus:outline-none dark:text-gray-500 dark:hover:bg-gray-900 dark:hover:text-gray-400 dark:focus:bg-gray-900 dark:focus:text-gray-400">
                            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                <path :class="{ hidden: showingNavigationDropdown, 'inline-flex': !showingNavigationDropdown }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                <path :class="{ hidden: !showingNavigationDropdown, 'inline-flex': showingNavigationDropdown }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Responsive Navigation Menu -->
            <div :class="{ block: showingNavigationDropdown, hidden: !showingNavigationDropdown }" class="sm:hidden">
                <div class="space-y-1 pb-3 pt-2">
                    <Link href="/anuncis" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100  ">Anuncis</Link>
                    <Link href="/settings" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100  ">Zona d'usuari</Link>
                    <Link href="/login" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100  ">Inicia Sessió</Link>
                    <Link href="/register" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Registrar-se</Link>
                </div>
            </div>
        </nav>

        <!-- Page Content -->
        <main>
            <!-- Content of the page -->
            <slot />
        </main>
    </div>
</template>
