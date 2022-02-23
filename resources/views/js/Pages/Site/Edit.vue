<template>
    <app-layout title="Edit Site">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Edit Site
            </h2>
        </template>

        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                    <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                        
                        <form @submit.prevent="submit">
                            <div>
                                <jet-label for="dns" value="DNS" />
                                <jet-input id="dns" type="text" class="mt-1 block w-full" v-model="form.dns" autofocus autocomplete="dns" />
                                <div v-if="errors.dns" class="font-bold text-red-600"> {{ errors.dns }} </div>
                            </div>

                            <div class="flex items-center justify-end mt-4">
                                <Link :href="route('sites.index')" class="inline-flex items-center px-4 py-2 bg-gray-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-400 active:bg-gray-600 focus:outline-none focus:border-gray-600 focus:ring focus:ring-gray-300 disabled:opacity-25 transition ml-4" type="button">
                                    Cancel
                                </Link> 
                                <jet-button class="ml-4">
                                    Save
                                </jet-button>
                            </div>
                        </form>

                    </div>

                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
    import { defineComponent } from 'vue'
    import AppLayout from '@/Layouts/AppLayout.vue'
    import { useForm } from '@inertiajs/inertia-vue3'
    import JetLabel from '@/Jetstream/Label.vue'
    import JetInput from '@/Jetstream/Input.vue'
    import JetButton from '@/Jetstream/Button.vue'

    export default defineComponent({
        components: {
            AppLayout,
            JetLabel,
            JetInput,
            JetButton,
        },
        props: {
            item: Object,
            errors: Object,
        },
        setup (props) {
            const form = useForm({
                dns: props.item.dns
            })

            function submit() {
                this.$inertia.post('/sites/'+props.item.id, {
                    _method: 'put',
                    dns: this.form.dns
                })
            }

            return { form, submit }
        }
    })
</script>
