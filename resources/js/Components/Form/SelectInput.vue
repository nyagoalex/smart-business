<template>
    <div>
        <Listbox
            :model-value="modelValue"
            as="div"
            @update:modelValue="(e) => $emit('update:modelValue', e)"
            :multiple="multiple"
        >
            <ListboxLabel
                v-if="label"
                class="block text-sm font-medium text-gray-700 mt-4"
            >
                {{ label }}
            </ListboxLabel>
            <div class="mt-1 relative">
                <ListboxButton
                    :class="[error ? 'border-red-800' : 'border-gray-300']"
                    class="bg-white relative w-full border rounded-sm shadow-sm pl-3 pr-10 py-2 text-left cursor-default focus:outline-none focus:ring-1 focus:ring-primary-500 focus:border-primary-500 text-sm"
                >
                    <span v-if="selectedName" class="block truncate">
                        {{ selectedName }}
                    </span>
                    <span v-else class="block truncate text-gray-500"
                        >-select-
                    </span>
                    <span
                        class="absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none"
                    >
                        <ExclamationCircleIcon
                            v-if="error"
                            aria-hidden="true"
                            class="h-5 w-5 text-red-800"
                        />
                        <ChevronUpDownIcon
                            v-else
                            aria-hidden="true"
                            class="h-5 w-5 text-gray-400"
                        />
                    </span>
                </ListboxButton>

                <transition
                    leave-active-class="transition ease-in duration-100"
                    leave-from-class="opacity-100"
                    leave-to-class="opacity-0"
                >
                    <ListboxOptions
                        class="absolute z-10 mt-1 w-full bg-white shadow-lg max-h-60 rounded-sm py-1 text-base ring-1 ring-black ring-opacity-5 overflow-auto focus:outline-none text-sm"
                    >
                        <ListboxOption
                            v-for="option in options"
                            :key="option.id"
                            v-slot="{ active, selected }"
                            :value="option.id"
                            as="template"
                            class="z-20"
                        >
                            <li
                                :class="[
                                    active
                                        ? 'text-white bg-primary-600'
                                        : 'text-gray-900',
                                    'cursor-default select-none relative py-2 pl-3 pr-9',
                                ]"
                            >
                                <span
                                    :class="[
                                        selected
                                            ? 'font-semibold'
                                            : 'font-normal',
                                        'block truncate capitalize',
                                    ]"
                                >
                                    {{ option.name }}
                                </span>

                                <span
                                    v-if="selected"
                                    :class="[
                                        active
                                            ? 'text-white'
                                            : 'text-primary-800',
                                        'absolute inset-y-0 right-0 flex items-center pr-4',
                                    ]"
                                >
                                    <CheckIcon
                                        aria-hidden="true"
                                        class="h-5 w-5"
                                    />
                                </span>
                            </li>
                        </ListboxOption>
                    </ListboxOptions>
                </transition>
            </div>
        </Listbox>
        <div v-if="error" class="mt-1 text-xs sm:text-sm text-red-700">
            {{ error }}
        </div>
    </div>
</template>

<script>
import {
    Listbox,
    ListboxButton,
    ListboxLabel,
    ListboxOption,
    ListboxOptions,
} from '@headlessui/vue'
import {
    CheckIcon,
    ExclamationCircleIcon,
    ChevronUpDownIcon,
} from '@heroicons/vue/24/solid'

export default {
    components: {
        Listbox,
        ListboxButton,
        ListboxLabel,
        ListboxOption,
        ListboxOptions,
        CheckIcon,
        ChevronUpDownIcon,
        ExclamationCircleIcon,
    },

    emits: ['update:modelValue'],

    computed: {
        selectedName() {
            if (!this.multiple) {
                return this.options.find((e) => e.id === this.modelValue)?.name
            }

            return this.options
                .filter((e) => this.modelValue.some((v) => v === e.id))
                .map((item) => item.name)
                .join(', ')
        },
    },

    props: {
        modelValue: {
            type: [String, Number, Object],
            default: null,
            required: false,
        },
        options: {
            type: Array,
            required: true,
        },
        label: {
            type: String,
            default: null,
        },
        error: {
            type: String,
            default: null,
        },
        multiple: {
            type: Boolean,
            default: false,
        },
    },
}
</script>
