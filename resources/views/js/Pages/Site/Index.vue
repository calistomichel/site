<template>
    <app-layout title="Index Sites">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Sites
            </h2>
        </template>

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
                                <th class="text-sm font-medium text-gray-900 px-6 py-4">
                                    DNS
                                </th>
                                <th class="text-sm font-medium text-gray-900 px-6 py-4">
                                    Show
                                </th>
                                <th class="text-sm font-medium text-gray-900 px-6 py-4">
                                    Edit
                                </th>
                                <th class="text-sm font-medium text-gray-900 px-6 py-4">
                                    Delete
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="bg-white border-b" v-for="site in sites" :key="site.id">
                                <td class="text-sm font-light text-gray-900 px-6 py-4">
                                    {{ site.dns }}
                                </td>
                                <td class="text-sm font-light text-gray-900 px-6 py-4">
                                    <link-default :href="route('sites.show', site)">
                                        <icon-show />
                                    </link-default>
                                </td>
                                <td class="text-sm font-light text-gray-900 px-6 py-4">
                                    <link-default :href="route('sites.edit', site)">
                                        <icon-edit />
                                    </link-default>
                                </td>
                                <td class="text-sm font-light text-gray-900 px-6 py-4">
                                    <link-default @click="confirmDeletion(site)" as="button">
                                        <icon-destroy />
                                    </link-default>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </template>
            </index-template>
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
    import IconShow from '@/MichelCalisto/IconShow.vue'
    import IconEdit from '@/MichelCalisto/IconEdit.vue'
    import IconDestroy from '@/MichelCalisto/IconDestroy.vue'
    import JetDialogModal from '@/Jetstream/DialogModal.vue'
    import JetDangerButton from '@/Jetstream/DangerButton.vue'
    import JetSecondaryButton from '@/Jetstream/SecondaryButton.vue'
    
    export default defineComponent({
        components: {
            AppLayout,
            IndexTemplate,
            ButtonPrimary,
            LinkDefault,
            IconShow,
            IconEdit,
            IconDestroy,
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