<template>
    <div>
        <button :type="type" v-if="as == 'button'">
            <slot></slot>
        </button>

        <Link :href="href" :type="type" v-else>
            <slot></slot>
        </Link>
    </div>
</template>

<script>
    import { defineComponent } from 'vue';
    import { Link } from '@inertiajs/inertia-vue3';

    export default defineComponent({
        components: {
            Link,
        },
        props: {
            type: {
                type: String,
                default: 'button',
            },
            href: {
                default: 'href',
            },
            as: {
                default: 'as',
            }
        }
    })
</script>
