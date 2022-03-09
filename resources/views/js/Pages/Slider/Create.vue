<template>
    <app-layout title="Create Slider">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Create Slider
            </h2>
        </template>

        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <form-template @submitted="create">
                <template #form>
                    <div>
                        <jet-label for="name" value="Name" />
                        <jet-input id="name" type="text" class="block w-full mt-1" v-model="form.name" autofocus autocomplete="name" />
                        <jet-input-error :message="form.errors.name" class="mt-2" />
                    </div>
                    <div>
                        <jet-label for="file" value="File" />
                        <jet-input id="file" type="file" class="block w-full mt-1" @input="form.image_file = $event.target.files[0]" @change="imagePreview" />
                        <jet-input-error :message="form.errors.image_file" class="mt-2" />
                    </div>
                    <img v-if="url_preview" :src="url_preview" class="w-full mt-4" />
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
        },
        data() {
            return {
                form: this.$inertia.form({
                    name: '',
                    image_file: '',
                }),
                url_preview: null,
            }
        },
        methods: {
            create() {
                this.form.post(route('sliders.store', this.site), {
                    errorBag: 'create',
                    preserveScroll: true
                });
            },
            imagePreview(e) {
                const file = e.target.files[0];
                this.url_preview = URL.createObjectURL(file);
            },
        }
    })
</script>
