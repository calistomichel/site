<template>
    <app-layout title="Edit Publication">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Edit Publication
            </h2>
        </template>

        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                
                <form-template @submitted="update">
                    <template #form>
                        <div>
                            <jet-label for="title" value="Title" />
                            <jet-input id="title" type="text" class="block w-full mt-1" v-model="form.title" autofocus autocomplete="title" />
                            <jet-input-error :message="form.errors.title" class="mt-2" />
                        </div>
                        <div>
                            <jet-label for="content" value="Content" />
                            <textarea id="content" type="textarea" class="mt-1 block w-full h-40" v-model="form.content" autocomplete="content" />
                            <jet-input-error :message="form.errors.content" class="mt-2" />
                        </div>
                    </template>
                    <template #actions>
                        <button-secondary :href="route('sites.show', site)">
                            Cancel
                        </button-secondary>
                        <jet-button class="ml-4">
                            Save
                        </jet-button>
                    </template>
                </form-template>
                
            </div>
        </div>
    </app-layout>
</template>

<script>
    import { defineComponent } from 'vue'
    import AppLayout from '@/Layouts/AppLayout.vue'
    import FormTemplate from '@/MichelCalisto/FormTemplate.vue'
    import ButtonSecondary from '@/MichelCalisto/ButtonSecondary.vue'
    import Textarea from '@/MichelCalisto/Textarea.vue'
    import JetLabel from '@/Jetstream/Label.vue'
    import JetInput from '@/Jetstream/Input.vue'
    import JetInputError from '@/Jetstream/InputError.vue'
    import JetButton from '@/Jetstream/Button.vue'

    export default defineComponent({
        components: {
            AppLayout,
            FormTemplate,
            ButtonSecondary,
            Textarea,
            JetLabel,
            JetInput,
            JetInputError,
            JetButton,
        },
        props: {
            site: Object,
            publication: Object,
        },
        data() {
            return {
                form: this.$inertia.form({
                    _method: 'PUT',
                    title: this.publication.title,
                    content: this.publication.content,
                })
            }
        },
        methods: {
            update() {
                this.form.post(route('publications.update', [this.site, this.publication]), {
                    errorBag: 'update',
                    preserveScroll: true,
                });
            }
        }
    })
</script>
