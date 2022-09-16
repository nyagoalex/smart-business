<template>
    <button
        v-bind="$attrs"
        :disabled="disabled"
        :class="[size, color, isActive]"
        class="text-center border font-medium rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-offset-2 flex items-center"
    >
        <slot />
    </button>
</template>

<script>
import { computed } from 'vue'

export default {
    name: 'BaseButton',

    props: {
        disabled: {
            type: Boolean,
            default: false,
        },
        sm: {
            type: Boolean,
            default: false,
        },
        xs: {
            type: Boolean,
            default: false,
        },
        md: {
            type: Boolean,
            default: false,
        },
        lg: {
            type: Boolean,
            default: false,
        },
        primary: {
            type: Boolean,
            default: false,
        },
        secondary: {
            type: Boolean,
            default: false,
        },
        danger: {
            type: Boolean,
            default: false,
        },
        outline: {
            type: Boolean,
            default: false,
        },
        light: {
            type: Boolean,
            default: false,
        },
    },

    setup(props) {
        const color = computed(() => {
            if (props.light) {
                return 'text-primary-700 bg-primary-100 hover:bg-primary-200 focus:ring-primary-500 '
            }
            if (props.secondary) {
                return 'text-white bg-gradient-to-tr from-secondary-500 to-secondary-600 hover:shadow-md focus:ring-secondary-600 '
            }
            if (props.primary) {
                return 'text-white bg-gradient-to-tr from-primary-500 to-primary-600 hover:shadow-md focus:ring-primary-600 '
            }
            if (props.outline) {
                return 'text-primary-700 bg-white hover:shadow-md focus:ring-primary-600 border-primary-600 hover:text-white hover:bg-primary-600'
            }
            if (props.danger) {
                return 'text-white bg-gradient-to-tr from-red-600 to-red-500 hover:bg-red-700 focus:ring-red-500 '
            }
            return 'text-gray-700 bg-white hover:bg-gray-50 border-gray-300 focus:ring-gray-500 '
        })

        const size = computed(() => {
            if (props.xs)
                return 'px-1.5 py-0.5 text-xxs sm:px-2.5 sm:py-1 sm:text-xs'
            if (props.sm) return 'px-3 py-1.5 text-sm leading-4'
            if (props.md) return 'px-4 py-2 text-base'
            if (props.lg) return 'px-6 py-3 text-base'
            return 'px-4 py-2 text-sm'
        })

        const isActive = computed(() => {
            if (props.disabled) return 'opacity-50 cursor-wait'
            return ''
        })

        return {
            size,
            color,
            isActive,
        }
    },
}
</script>
