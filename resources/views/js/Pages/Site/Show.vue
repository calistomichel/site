<template>
    <app-layout title="Show Site">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Show Site
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
                                        DNS
                                    </th>
                                    <td class="text-sm font-light text-gray-900 px-6 py-4 whitespace-nowrap">
                                        {{ site.dns }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </template>
                </card-template>
                
                <jet-section-border />

                <index-template>
                    <template #actions>
                        <button-primary :href="route('publications.create', site)">
                            New Publication
                        </button-primary>
                    </template>
                    <template #content>
                        <table class="min-w-full text-center">
                            <thead class="border-b bg-gray-50">
                                <tr>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4">
                                        Title
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4">
                                        Content
                                    </th>
                                    <!-- <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4">
                                        Show
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4">
                                        Edit
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4">
                                        Delete
                                    </th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="bg-white border-b" v-for="publication in publications" :key="publication.id">
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        {{ publication.title }}
                                    </td>
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        {{ publication.content }}
                                    </td>
                                    <!-- <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        <link-default :href="route('sites.show', item.id)">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                        </link-default>
                                    </td>
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        <link-default :href="route('sites.edit', item.id)">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                        </link-default>
                                    </td>
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        <link-default @click="confirmDeletion(item.id)" as="button">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-red-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </link-default>
                                    </td> -->
                                </tr>
                            </tbody>
                        </table>
                    </template>
                </index-template>

            </div>
        </div>
    </app-layout>
</template>

<script>
    import { defineComponent } from 'vue'
    import AppLayout from '@/Layouts/AppLayout.vue'
    import CardTemplate from '@/MichelCalisto/CardTemplate.vue'
    import JetSectionBorder from '@/Jetstream/SectionBorder.vue'
    import IndexTemplate from '@/MichelCalisto/IndexTemplate.vue'
    import ButtonPrimary from '@/MichelCalisto/ButtonPrimary.vue'
    // import FormTemplate from '@/MichelCalisto/FormTemplate.vue'
    // import ButtonSecondary from '@/MichelCalisto/ButtonSecondary.vue'
    // import JetLabel from '@/Jetstream/Label.vue'
    // import JetInput from '@/Jetstream/Input.vue'
    // import JetInputError from '@/Jetstream/InputError.vue'
    // import JetButton from '@/Jetstream/Button.vue'

    export default defineComponent({
        components: {
            AppLayout,
            CardTemplate,
            JetSectionBorder,
            IndexTemplate,
            ButtonPrimary,
            // FormTemplate,
            // ButtonSecondary,
            // JetLabel,
            // JetInput,
            // JetInputError,
            // JetButton,
        },
        props: {
            site: Object,
            sliders: Object,
            publications: Object,
        },
        data() {
            // return {
            //     form: this.$inertia.form({
            //         _method: 'PUT',
            //         dns: this.item.dns,
            //     })
            // }
        },
        methods: {
            // update() {
            //     this.form.post(route('sites.update', this.item.id), {
            //         errorBag: 'update',
            //         preserveScroll: true,
            //     });
            // }
        }
    })
</script>
