<template>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
        <div class="mb-6">
            <h1 class="text-xl font-medium text-gray-800 text-center">
                Detalls del'anunci {{ anunci.titol }}
            </h1>
        </div>
        
        <div class="bg-white rounded-lg shadow overflow-hidden">
            <table class="min-w-full divide-y divide-gray-200">
                <thead>
                    <tr>
                        <th class="px-1 py-1 text-left text-xs font-small text-gray-500 uppercase tracking-wider">Titol</th>
                        <th class="px-1 py-1 text-left text-xs font-small text-gray-500 uppercase tracking-wider">Descripció</th>
                        <th class="px-1 py-1 text-left text-xs font-small text-gray-500 uppercase tracking-wider">Hora</th>
                        <th class="px-1 py-1 text-left text-xs font-small text-gray-500 uppercase tracking-wider">data</th>
                        <th class="px-1 py-1 text-left text-xs font-small text-gray-500 uppercase tracking-wider">email</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <tr class="hover:bg-gray-50">
                        <td class="px-1 py-1 whitespace-nowrap text-sm font-medium text-gray-900">{{ anunci.titol }}</td>
                        <td class="px-1 py-1 whitespace-nowrap text-sm text-gray-500">{{ anunci.descripcio }}</td>
                        <td class="px-1 py-1 whitespace-nowrap text-sm text-gray-500">{{ anunci.time }}</td>
                        <td class="px-1 py-1 whitespace-nowrap text-sm text-gray-500">{{ anunci.date }}</td>
                        <td class="px-1 py-1 whitespace-nowrap text-sm text-gray-500">{{ anunci.email }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        
        <div class="mt-8 flex justify-center">
            <Link :href="route('anuncis.index')" class="bg-gray-100 hover:bg-gray-200 text-gray-800 px-4 py-2 rounded-md text-sm transition-colors mr-3">
                Tornar a la llista
            </Link>
            <Link :href="route('anuncis.edit', anunci.id)" class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-md text-sm transition-colors">
                Editar l'anunci
            </Link>
        </div>
    </div>
</template>

<script setup>
import { Head, Link, router } from '@inertiajs/vue3';

const props = defineProps({
    anunci: Object,
});
</script>