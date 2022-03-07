<template>
    <app-layout title="Show Publication">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Show Publication
            </h2>
        </template>

        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                
                <card-template>
                    <template #card>
                        <table class="min-w-full text-center">
                            <tbody>
                                <tr class="border-b">
                                    <th class="border-r bg-gray-50 text-sm font-medium text-gray-900 px-6 py-4">
                                        Title
                                    </th>
                                    <td class="text-sm font-light text-gray-900 px-6 py-4">
                                        {{ publication.title }}
                                    </td>
                                </tr>
                                <tr class="border-b">
                                    <th class="border-r bg-gray-50 text-sm font-medium text-gray-900 px-6 py-4">
                                        Content
                                    </th>
                                    <td class="text-sm font-light text-gray-900 px-6 py-4">
                                        {{ publication.content }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </template>
                    <template #actions>
                        <button-secondary :href="route('sites.show', site)">
                            Cancel
                        </button-secondary>
                    </template>
                </card-template>
                
            </div>
        </div>
    </app-layout>
</template>

<script>
    import { defineComponent } from 'vue'
    import AppLayout from '@/Layouts/AppLayout.vue'
    import CardTemplate from '@/MichelCalisto/CardTemplate.vue'
    import ButtonSecondary from '@/MichelCalisto/ButtonSecondary.vue'

    export default defineComponent({
        components: {
            AppLayout,
            CardTemplate,
            ButtonSecondary,
        },
        props: {
            publication: Object,
            site: Object,
        }
    })
</script>
