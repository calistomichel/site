<template>
    <app-layout title="Sites">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Sites
                <!-- {{ __("images") }} -->
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                    <div class="p-6 sm:px-20 bg-white border-b border-gray-200">

                        <!-- <Link v-if="total < 5" :href="route('images.create')" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition" type="button">
                            {{ __("new_image") }}
                        </Link>
                        <p v-else class="text-gray-500">* Éxito!, has alcanzado el límite de 5 imágenes en tu carrusel de inicio, para añadir una nueva imagen debes reemplazar las ya existentes.</p> -->

                        <table class="min-w-full text-center mt-8">
                            <thead class="border-b bg-gray-50">
                                <tr>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4">
                                        DNS
                                    </th>
                                    <!-- <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4">
                                        {{ __("edit") }}
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4">
                                        {{ __("delete") }}
                                    </th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="bg-white border-b" v-for="item in items" :key="item.id">
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        {{ item.dns }}
                                    </td>
                                    <!-- <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        <Link :href="route('images.edit', image.id)" type="button">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                        </Link>
                                    </td>
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        <Link method="delete" as="button" :href="route('images.destroy', image.id)" type="button">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-red-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </Link>
                                    </td> -->
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
    import { defineComponent } from 'vue'
    import AppLayout from '@/Layouts/AppLayout.vue'
    import JetButton from '@/Jetstream/Button.vue'

    export default defineComponent({
        components: {
            AppLayout,
            JetButton,
        },
        props: {
            items: Array,
            count: Number
        },
    })
</script>
