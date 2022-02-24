<template>
    <div>
        <form @submit.prevent="$emit('submitted')">
            <div class="px-4 py-5 sm:p-6 bg-white shadow"
                :class="hasActions ? 'sm:rounded-t-md' : 'sm:rounded-md'">
                <slot name="form"></slot>
            </div>

            <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6 shadow sm:rounded-b-md" v-if="hasActions">
                <slot name="actions"></slot>
            </div>
        </form>
    </div>
</template>

<script>
    import { defineComponent } from 'vue'

    export default defineComponent({
        emits: ['submitted'],

        computed: {
            hasActions() {
                return !! this.$slots.actions
            }
        }
    })
</script>
