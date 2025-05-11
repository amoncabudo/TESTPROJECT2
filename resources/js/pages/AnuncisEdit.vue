<template>
    <div class="container mx-auto p-4">
        <h1 class="text-xl font-bold mb-4">Editar Ciudad</h1>

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
                    <input type="time" id="time" v-model="form.time" class="w-full border p-2 rounded">
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
import { defineProps, onMounted, ref } from 'vue';

const props = defineProps({
    anuncis: {
        type: Object,
        required: true
    },
    categories: {
        type: Array,
        required: true
    }
});


const form = useForm({
    titol: '',
    descripcio: '',
    time: '',
    email: '',
    date: '',
    categoria_id: '',
    _method: 'put'
});

onMounted(() => {
    if (props.anuncis) {
        form.titol = props.anuncis.titol;
        form.descripcio = props.anuncis.descripcio;
        form.categoria_id = props.anuncis.categoria_id; 
        form.email = props.anuncis.email;
        form.time = props.anuncis.time;
        form.date = props.anuncis.date;
    }
});

function submit() {
    form.post(route('anuncis.update', props.anuncis.id), {
        onSuccess: () => {
            console.log('Ciudad actualizada correctamente');
        },
        onError: (errors) => {
            console.error('Errores:', errors);
        }
    });
}
</script>