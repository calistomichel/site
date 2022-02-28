<template>
    <app-layout title="Index Sliders">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Sliders
            </h2>
        </template>

        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                
                <index-template>
                    <template #actions>
                        <button-primary :href="route('sliders.create')">
                            New Slider
                        </button-primary>
                    </template>
                    <template #content>
                        <table class="min-w-full text-center">
                            <thead class="border-b bg-gray-50">
                                <tr>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4">
                                        Name
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
                                <tr class="bg-white border-b" v-for="item in items" :key="item.id">
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        {{ item.name }}
                                    </td>
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        <link-default :href="route('sliders.edit', item.id)">
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
                Delete Slider
            </template>

            <template #content>
                ¿Estás seguro de que deseas eliminar esta imagen? Una vez que se elimine esta imagen, se eliminará permanentemente.
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
            items: Array,
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
                    this.$inertia.delete(this.route('sliders.destroy', this.id), {
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