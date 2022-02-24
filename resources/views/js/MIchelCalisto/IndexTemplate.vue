<template>
    <div>
        <div class="items-center px-4 py-3 bg-gray-50 text-left sm:px-6 shadow sm:rounded-t-md" v-if="hasActions">
            <slot name="actions"></slot>
        </div>

        <div class="px-4 py-5 sm:p-6 bg-white shadow"
            :class="hasActions ? 'sm:rounded-b-md' : 'sm:rounded-md'">
            <slot name="content"></slot>
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