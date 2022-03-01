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
                        <div>
                            <h1>{{ item.dns }}</h1>
                            <!-- <jet-label for="dns" value="DNS" />
                            <jet-input id="dns" type="text" class="block w-full mt-1" v-model="form.dns" autofocus autocomplete="dns" />
                            <jet-input-error :message="form.errors.dns" class="mt-2" /> -->
                        </div>
                    </template>
                    <!-- <template #actions>
                        <button-secondary :href="route('sites.index')">
                            Cancel
                        </button-secondary>
                        <jet-button class="ml-4">
                            Save
                        </jet-button>
                    </template> -->
                </card-template>
                
                <jet-section-border />

                <card-template>
                    <template #card>
                        <div>
                            <h1>{{ item.dns }}</h1>
                            <!-- <jet-label for="dns" value="DNS" />
                            <jet-input id="dns" type="text" class="block w-full mt-1" v-model="form.dns" autofocus autocomplete="dns" />
                            <jet-input-error :message="form.errors.dns" class="mt-2" /> -->
                        </div>
                    </template>
                    <!-- <template #actions>
                        <button-secondary :href="route('sites.index')">
                            Cancel
                        </button-secondary>
                        <jet-button class="ml-4">
                            Save
                        </jet-button>
                    </template> -->
                </card-template>

            </div>
        </div>
    </app-layout>
</template>

<script>
    import { defineComponent } from 'vue'
    import AppLayout from '@/Layouts/AppLayout.vue'
    import CardTemplate from '@/MichelCalisto/CardTemplate.vue'
    // import FormTemplate from '@/MichelCalisto/FormTemplate.vue'
    // import ButtonSecondary from '@/MichelCalisto/ButtonSecondary.vue'
    // import JetLabel from '@/Jetstream/Label.vue'
    // import JetInput from '@/Jetstream/Input.vue'
    // import JetInputError from '@/Jetstream/InputError.vue'
    // import JetButton from '@/Jetstream/Button.vue'
    import JetSectionBorder from '@/Jetstream/SectionBorder.vue'

    export default defineComponent({
        components: {
            AppLayout,
            CardTemplate,
            // FormTemplate,
            // ButtonSecondary,
            // JetLabel,
            // JetInput,
            // JetInputError,
            // JetButton,
            JetSectionBorder,
        },
        props: {
            item: Object,
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
