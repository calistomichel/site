<template>
    <app-layout title="Show Site">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Show Site
            </h2>
        </template>

        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <card-template>
                <template #card>
                    <table class="min-w-full text-center">
                        <tbody>
                            <tr class="border-b">
                                <th class="border-r bg-gray-50 text-sm font-medium text-gray-900 px-6 py-4">
                                    DNS
                                </th>
                                <td class="text-sm font-light text-gray-900 px-6 py-4">
                                    {{ site.dns }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </template>
                <template #actions>
                    <button-secondary :href="route('sites.index')">
                        Cancel
                    </button-secondary>
                </template>
            </card-template>
            
            <jet-section-border />

            <index-template>
                <template #actions>
                    <button-primary :href="route('sliders.create', site)">
                        New Slider
                    </button-primary>
                </template>
                <template #content>
                    <!-- <table class="min-w-full text-center">
                        <thead class="border-b bg-gray-50">
                            <tr>
                                <th class="text-sm font-medium text-gray-900 px-6 py-4">
                                    Title
                                </th>
                                <th class="text-sm font-medium text-gray-900 px-6 py-4">
                                    Content
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
                            <tr class="bg-white border-b" v-for="publication in publications" :key="publication.id">
                                <td class="text-sm font-light text-gray-900 px-6 py-4">
                                    {{ publication.title }}
                                </td>
                                <td class="text-sm font-light text-gray-900 px-6 py-4">
                                    {{ publication.content }}
                                </td>
                                <td class="text-sm font-light text-gray-900 px-6 py-4">
                                    <link-default :href="route('publications.show', [site, publication])">
                                        <icon-show />
                                    </link-default>
                                </td>
                                <td class="text-sm font-light text-gray-900 px-6 py-4">
                                    <link-default :href="route('publications.edit', [site, publication])">
                                        <icon-edit />
                                    </link-default>
                                </td>
                                <td class="text-sm font-light text-gray-900 px-6 py-4">
                                    <link-default @click="confirmDeletion(publication)" as="button">
                                        <icon-destroy />
                                    </link-default>
                                </td>
                            </tr>
                        </tbody>
                    </table> -->
                </template>
            </index-template>

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
                                <th class="text-sm font-medium text-gray-900 px-6 py-4">
                                    Title
                                </th>
                                <th class="text-sm font-medium text-gray-900 px-6 py-4">
                                    Content
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
                            <tr class="bg-white border-b" v-for="publication in publications" :key="publication.id">
                                <td class="text-sm font-light text-gray-900 px-6 py-4">
                                    {{ publication.title }}
                                </td>
                                <td class="text-sm font-light text-gray-900 px-6 py-4">
                                    {{ publication.content }}
                                </td>
                                <td class="text-sm font-light text-gray-900 px-6 py-4">
                                    <link-default :href="route('publications.show', [site, publication])">
                                        <icon-show />
                                    </link-default>
                                </td>
                                <td class="text-sm font-light text-gray-900 px-6 py-4">
                                    <link-default :href="route('publications.edit', [site, publication])">
                                        <icon-edit />
                                    </link-default>
                                </td>
                                <td class="text-sm font-light text-gray-900 px-6 py-4">
                                    <link-default @click="confirmDeletion(publication)" as="button">
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
                Delete Publication
            </template>

            <template #content>
                Are you sure you want to delete this publication? Once the site is removed, it will be removed permanently.
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
    import CardTemplate from '@/MichelCalisto/CardTemplate.vue'
    import IndexTemplate from '@/MichelCalisto/IndexTemplate.vue'
    import ButtonPrimary from '@/MichelCalisto/ButtonPrimary.vue'
    import ButtonSecondary from '@/MichelCalisto/ButtonSecondary.vue'
    import LinkDefault from '@/MichelCalisto/LinkDefault.vue'
    import IconShow from '@/MichelCalisto/IconShow.vue'
    import IconEdit from '@/MichelCalisto/IconEdit.vue'
    import IconDestroy from '@/MichelCalisto/IconDestroy.vue'
    import JetSectionBorder from '@/Jetstream/SectionBorder.vue'
    import JetDialogModal from '@/Jetstream/DialogModal.vue'
    import JetDangerButton from '@/Jetstream/DangerButton.vue'
    import JetSecondaryButton from '@/Jetstream/SecondaryButton.vue'

    export default defineComponent({
        components: {
            AppLayout,
            CardTemplate,
            IndexTemplate,
            ButtonPrimary,
            ButtonSecondary,
            LinkDefault,
            IconShow,
            IconEdit,
            IconDestroy,
            JetSectionBorder,
            JetDialogModal,
            JetDangerButton,
            JetSecondaryButton,
        },
        props: {
            site: Object,
            sliders: Object,
            publications: Object,
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
                    this.$inertia.delete(this.route('publications.destroy', [this.site, this.id]), {
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
