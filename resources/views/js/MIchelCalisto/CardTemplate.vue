<template>
    <div>
        <div class="px-4 py-5 sm:p-6 bg-white shadow"
                        :class="hasActions ? 'sm:rounded-t-md' : 'sm:rounded-md'">
            <slot name="card"></slot>
        </div>

        <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6 shadow sm:rounded-b-md" v-if="hasActions">
            <slot name="actions"></slot>
        </div>
    </div>
</template>

<script>
    import { defineComponent } from 'vue'

    export default defineComponent({
        computed: {
            hasActions() {
                return !! this.$slots.actions
            }
        }
    })
</script>
