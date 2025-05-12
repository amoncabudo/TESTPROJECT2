<template>
    <NavBar />

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-xl font-medium text-gray-800">Llista d'Anuncis</h1>
            <button @click="CreateAnunci"
                class="bg-indigo-600 hover:bg-indigo-700 text-white py-2 px-4 rounded-md text-sm transition-colors">
                Crear Anunci
            </button>
        </div>

        <div class="mb-6 flex flex-col sm:flex-row gap-4 sm:items-center">
            <div class="w-full sm:flex-1">
                <input type="text" v-model="search" placeholder="Buscar por nombre"
                    class="w-full text-base px-4 py-2 border border-gray-200 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                    aria-label="Buscador" />
            </div>

            <div class="w-full sm:w-auto">
                <label for="regionSelect" class="sr-only">Filtrar por categorias</label>
                <select id="regionSelect" v-model="selectedCategories"
                    class="w-full sm:w-48 px-4 py-2 bg-white text-black border border-gray-200 rounded-md shadow-sm focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500">
                    <option value="">Todas las categorias</option>
                    <option v-for="categoria in props.categories" :key="categoria.id" :value="categoria.id"
                        class="text-black">
                        {{ categoria.nom }}
                    </option>
                </select>
            </div>
        </div>

        <div class="overflow-x-auto bg-white rounded-lg shadow">
            <table class="min-w-full divide-y divide-gray-200">
                <thead>
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Nombre</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Acciones</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <tr v-for="anunci in anuncis" :key="anunci.id" class="hover:bg-gray-50">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                            {{ anunci.titol }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                            <div class="flex space-x-3">
                                <Link :href="route('anuncis.show', anunci.id)"
                                    class="text-green-800 hover:text-indigo-900">
                                Ver
                                </Link>
                                <Link :href="route('anuncis.edit', anunci.id)"
                                    class="text-blue-600 hover:text-blue-900">
                                Editar
                                </Link>
                                <button @click="DeleteAnunci(anunci.id)" class="text-red-600 hover:text-red-900">
                                    Eliminar
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <Cookies />

</template>

<script setup>
import { Head, Link, router } from '@inertiajs/vue3';
import { ref, defineProps, watch } from 'vue';
import NavBar from '@/components/NavBar.vue';
import axios from 'axios';
import Cookies from "@/components/Cookies.vue";

const props = defineProps({
    anuncis: Array,
    categories: Array,
    filters: Object
});

console.log('Categories:', props.categories);

const search = ref(props.filters?.search || '');
const selectedCategories = ref(props.filters?.categoria || '');

watch([search, selectedCategories], () => {
    fetchAnuncis();
});

const fetchAnuncis = () => {
    console.log('Cercan amb:', {
        search: search.value,
        categoria: selectedCategories.value,
    });

    router.get(route('anuncis.index'), {
        search: search.value,
        categoria: selectedCategories.value,
    }, {
        preserveState: true,
        preserveScroll: true,
        replace: true,
    });
};

const CreateAnunci = () => {
    router.visit(route('anuncis.create'));
};

const DeleteAnunci = async (anuncis_id) => {
    if (confirm('Estas segur?')) {
        try {
            const response = await axios.delete(route('anuncis.destroy', anuncis_id));
            if (response.data.success) {
                router.reload();
            }
        } catch (error) {
            console.error('Error al eliminar:', error);
            alert('Error al eliminar el anuncio');
        }
    }
};
</script>