<template>
    <app-layout title="Create Site">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Create Site
            </h2>
        </template>

        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">

                <form-template @submitted="create">
                    <template #form>
                        <div>
                            <jet-label for="dns" value="DNS" />
                            <jet-input id="dns" type="text" class="block w-full mt-1" v-model="form.dns" autofocus autocomplete="dns" />
                            <jet-input-error :message="form.errors.dns" class="mt-2" />
                        </div>
                    </template>
                    <template #actions>
                        <button-secondary :href="route('sites.index')">
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
    import JetLabel from '@/Jetstream/Label.vue'
    import JetInput from '@/Jetstream/Input.vue'
    import JetInputError from '@/Jetstream/InputError.vue'
    import JetButton from '@/Jetstream/Button.vue'

    export default defineComponent({
        components: {
            AppLayout,
            FormTemplate,
            ButtonSecondary,
            JetLabel,
            JetInput,
            JetInputError,
            JetButton,
        },
        data() {
            return {
                form: this.$inertia.form({
                    dns: '',
                })
            }
        },
        methods: {
            create() {
                this.form.post(route('sites.store'), {
                    errorBag: 'create',
                    preserveScroll: true
                });
            }
        }
    })
</script>
