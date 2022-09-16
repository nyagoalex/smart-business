<template>
    <div>
        <label
            v-if="label"
            :for="id"
            class="mt-4 block text-sm font-medium text-gray-700"
            >{{ label }}
            <span v-if="optional" class="text-xs font-normal opacity-70"
                >(optional)</span
            ></label
        >
        <div class="mt-1 relative rounded-sm shadow-sm">
            <div
                v-if="units"
                class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none"
            >
                <span class="text-gray-500 sm:text-sm">
                    {{ units }}
                </span>
            </div>
            <div
                v-if="$slots.icon"
                class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none"
            >
                <slot name="icon"></slot>
            </div>
            <input
                :id="id"
                ref="input"
                v-bind="$attrs"
                :class="[
                    errorClasses,
                    classes,
                    units || $slots.icon ? 'pl-12' : '',
                    disabled ? 'bg-gray-100 cursor-not-allowed' : '',
                ]"
                :disabled="disabled"
                :type="type"
                :value="modelValue"
                autocomplete="off"
                class="shadow-sm block w-full sm:text-sm rounded-sm"
                @input="(e) => $emit('update:modelValue', e.target.value)"
            />
            <div
                v-if="error"
                class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none"
            >
                <ExclamationCircleIcon
                    aria-hidden="true"
                    class="h-5 w-5 text-red-800"
                />
            </div>
        </div>
        <div v-if="error" class="mt-1 text-sm text-red-700">
            {{ error }}
        </div>
    </div>
</template>

<script>
import { computed } from 'vue'
import { inputClasses } from '@utilities/form'
import { ExclamationCircleIcon } from '@heroicons/vue/24/solid'

export default {
    name: 'BaseInput',

    emits: ['update:modelValue'],

    setup(props) {
        const errorClasses = computed(() => inputClasses(props.error))
        return {
            errorClasses,
        }
    },
    components: {
        ExclamationCircleIcon,
    },

    props: {
        modelValue: {
            type: [String, Number, null],
            default: null,
            required: false,
        },
        id: {
            type: String,
            default: () => `text-input-${Date.now()}`,
        },
        units: {
            type: String,
            default: null,
        },
        classes: {
            type: String,
            default: null,
        },
        type: {
            type: String,
            required: false,
            default: 'text',
        },
        label: {
            type: String,
            default: '',
            required: false,
        },
        error: {
            type: String,
            default: null,
        },
        disabled: {
            type: Boolean,
            default: false,
        },
        optional: {
            type: Boolean,
            default: false,
        },
    },
}
</script>
