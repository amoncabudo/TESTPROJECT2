<template>
    <div class="container mx-auto p-4">
        <h1 class="text-xl font-bold mb-4">Crear Ciudad</h1>
        <div class="bg-white p-4 border rounded">
            <form @submit.prevent="submit">
                <div class="mb-3">
                    <label for="titol" class="block mb-1">Nombre:</label>
                    <input type="text" id="titol" v-model="form.titol" class="w-full border p-2 rounded" required />
                </div>

                <div class="mb-3">
                    <label for="descripcio" class="block mb-1">Descripción:</label>
                    <input type="text" id="descripcio" v-model="form.descripcio" class="w-full border p-2 rounded"
                        required />
                </div>

                <div class="mb-3">
                    <label for="email" class="block mb-1">Descripción:</label>
                    <input type="email" id="email" v-model="form.email" class="w-full border p-2 rounded"
                        required />
                </div>
                <div class="mb-3">
                    <label for="time" class="block mb-1">Hora:</label>
                    <input type="time" id="time" v-model="form.time" class="w-full border p-2 rounded"
                        required />
                </div>
                <div class="mb-3">
                    <label for="date" class="block mb-1">data:</label>
                    <input type="date" id="date" v-model="form.date" class="w-full border p-2 rounded"
                        required />
                </div>
             
                <div class="mb-3">
                    <label for="region" class="block mb-1">Categorias:</label>
                    <select id="region" v-model="form.categoria_id" class="w-full border p-2 rounded" required>
                        <option value="">Selecciona una categoria</option>
                        <option v-for="categorias in categories" :key="categorias.id" :value="categorias.id">
                            {{ categorias.nom }}
                        </option>
                    </select>
                </div>

                <div class="flex justify-between mt-4">
                    <Link :href="route('anuncis.index')" class="bg-gray-300 px-3 py-1 rounded">
                        Cancelar
                    </Link>
                    <button type="submit" class="bg-green-500 hover:bg-green-700 text-black px-3 py-1 rounded">
                        Guardar
                    </button>
                </div>
            </form>
        </div>
    </div>
</template>

<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';
import { ref, defineProps } from 'vue';

const props = defineProps({
    categories: Array,
});

const form = useForm({
    titol: '',
    descripcio: '',
    time: '',
    email: '',
    date: '',
    categoria_id: '',
});

function submit() {
    form.post(route('anuncis.store'));
}
</script>