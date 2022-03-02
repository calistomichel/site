<template>
    <app-layout title="Index Sites">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Sites
            </h2>
        </template>

        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                
                <index-template>
                    <template #actions>
                        <button-primary :href="route('sites.create')">
                            New Site
                        </button-primary>
                    </template>
                    <template #content>
                        <table class="min-w-full text-center">
                            <thead class="border-b bg-gray-50">
                                <tr>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4">
                                        DNS
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4">
                                        Show
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4">
                                        Edit
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4">
                                        Delete
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="bg-white border-b" v-for="site in sites" :key="site.id">
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        {{ site.dns }}
                                    </td>
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        <link-default :href="route('sites.show', site)">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                        </link-default>
                                    </td>
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        <link-default :href="route('sites.edit', site)">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                        </link-default>
                                    </td>
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        <link-default @click="confirmDeletion(site)" as="button">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-red-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </link-default>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </template>
                </index-template>

            </div>
        </div>

        <jet-dialog-modal :show="confirmingDeletion" @close="closeModal">
            <template #title>
                Delete Site
            </template>

            <template #content>
                Are you sure you want to delete this site? Once the site is removed, it will be removed permanently.
            </template>

            <template #footer>
                <jet-secondary-button @click="closeModal">
                    Cancel
                </jet-secondary-button>
                <jet-danger-button class="ml-2" @click="destroy">
                    Delete
                </jet-danger-button>
            </template>
        </jet-dialog-modal>
    </app-layout>
</template>

<script>
    import { defineComponent } from 'vue'
    import AppLayout from '@/Layouts/AppLayout.vue'
    import IndexTemplate from '@/MichelCalisto/IndexTemplate.vue'
    import ButtonPrimary from '@/MichelCalisto/ButtonPrimary.vue'
    import LinkDefault from '@/MichelCalisto/LinkDefault.vue'
    import JetDialogModal from '@/Jetstream/DialogModal.vue'
    import JetDangerButton from '@/Jetstream/DangerButton.vue'
    import JetSecondaryButton from '@/Jetstream/SecondaryButton.vue'

    export default defineComponent({
        components: {
            AppLayout,
            IndexTemplate,
            ButtonPrimary,
            LinkDefault,
            JetDialogModal,
            JetDangerButton,
            JetSecondaryButton,
        },
        props: {
            sites: Array,
            total: Number,
        },
        data() {
            return {
                confirmingDeletion: false,
                id: null,
            }
        },
        methods: {
            confirmDeletion(id) {
                this.confirmingDeletion = true;
                this.id = id;
            },
            destroy() {
                if (this.id !== null) {
                    this.$inertia.delete(this.route('sites.destroy', this.id), {
                        onSuccess: () => this.closeModal(),
                    })
                }
            },
            closeModal() {
                this.confirmingDeletion = false;
                this.id = null;
            },
        }
    })
</script>