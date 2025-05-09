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


        <div class="mb-6 flex items-center space-x-4">
            <input type="text" v-model="search" placeholder="Buscar por nombre"
                class="flex-grow text-base px-6 py-3 border border-gray-200 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                aria-label="Buscador" />

            <label for="regionSelect" class="sr-only">Filtrar por categorias</label>
            <select id="regionSelect" v-model="selectedCategories"
                class="w-48 px-4 py-2 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 border border-gray-200 rounded-md shadow-sm focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500">
                <option value="">Todas las categorias</option>
                <option v-for="categoria in categoriasList" :key="categoria.id" :value="categoria.id">
                    {{ categoria.titol }}
                </option>
            </select>
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
                    <tr v-for="anunci in anunciosFiltrados" :key="anunci.id" class="hover:bg-gray-50">
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
                                <button @click="DeleteAnunci(anunci.id)"
                                    class="text-red-600 hover:text-red-900">
                                    Eliminar
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script setup>
import { Head, Link, router } from '@inertiajs/vue3';
import { ref, defineProps, computed } from 'vue';
import NavBar from '@/components/NavBar.vue';
import axios from 'axios';

const props = defineProps({
    anuncis: Array,
    categories: Array
});

const search = ref('');
const selectedCategories = ref('');

// Modificamos para usar el id de la categoría en lugar del título
const categoriasList = computed(() => {
    return props.categories || [];
});

// Actualizamos el filtrado de anuncios
const anunciosFiltrados = computed(() =>
    props.anuncis.filter(anunci => {
        const matchesSearch = anunci.titol.toLowerCase().includes(search.value.toLowerCase());
        const matchesCategories = !selectedCategories.value || 
            anunci.categoria_id === selectedCategories.value;
        return matchesSearch && matchesCategories;
    })
);

const CreateAnunci = () => {
    router.visit(route('anuncis.create'));
};

const DeleteAnunci = async (anuncis_id) => {
    if (confirm('Estas segur de que vols eliminar aquest anunci?')) {
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
}
</script>