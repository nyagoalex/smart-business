<template>
    <TransitionRoot as="template" :show="open">
        <Dialog
            as="div"
            static
            class="fixed z-10 inset-0 overflow-y-auto"
            @close="open = false"
            :open="open"
        >
            <div
                class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0"
            >
                <TransitionChild
                    as="template"
                    enter="ease-out duration-300"
                    enter-from="opacity-0"
                    enter-to="opacity-100"
                    leave="ease-in duration-200"
                    leave-from="opacity-100"
                    leave-to="opacity-0"
                >
                    <DialogOverlay
                        class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"
                    />
                </TransitionChild>

                <!-- This element is to trick the browser into centering the modal contents. -->
                <span
                    class="hidden sm:inline-block sm:align-middle sm:h-screen"
                    aria-hidden="true"
                    >&#8203;</span
                >
                <TransitionChild
                    as="template"
                    enter="ease-out duration-300"
                    enter-from="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    enter-to="opacity-100 translate-y-0 sm:scale-100"
                    leave="ease-in duration-200"
                    leave-from="opacity-100 translate-y-0 sm:scale-100"
                    leave-to="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                >
                    <div
                        class="inline-block text-left align-bottom bg-white shadow-xl transform transition-all sm:my-8 sm:align-middle max-w-lg w-full rounded-lg"
                    >
                        <div
                            class="bg-secondary-800 py-3 px-4 text-sm sm:text-base text-white uppercase rounded-t-lg flex justify-between"
                        >
                            <h2 class="opacity-75 font-medium">Add image</h2>
                            <XMarkIcon
                                class="h-5 w-5 cursor-pointer"
                                aria-hidden="true"
                                @click="open = false"
                            />
                        </div>
                        <div class="space-y-4 sm:pb-8 px-3 sm:px-8">
                            <dl
                                class="grid grid-cols-1 md:gap-x-6 md:gap-y-1 pb-6 py-2"
                            >
                                <base-input
                                    v-model="form.name"
                                    :error="form.errors.name"
                                    class="w-full"
                                    label="Name"
                                />
                                <base-input
                                    v-model="form.src"
                                    :error="form.errors.src"
                                    class="w-full"
                                    label="Source LInk"
                                    type="url"
                                />
                                <base-input
                                    v-model="form.alt"
                                    :error="form.errors.alt"
                                    class="w-full"
                                    label="Alternative"
                                    type="text"
                                />
                            </dl>
                        </div>
                        <div
                            class="bg-gray-50 space-x-4 px-4 py-3 sm:px-6 flex justify-end rounded-b-lg border-t border-gray-200 border-dashed mt-4"
                        >
                            <base-button
                                sm
                                @click="open = false"
                                classes="px-4 py-2"
                                >Cancel
                            </base-button>
                            <base-button
                                classes="px-4 py-2"
                                sm
                                secondary
                                @click="submit"
                                >Submit
                            </base-button>
                        </div>
                    </div>
                </TransitionChild>
            </div>
        </Dialog>
    </TransitionRoot>
</template>

<script>
import { XMarkIcon } from '@heroicons/vue/24/solid'
import {
    Dialog,
    DialogOverlay,
    TransitionChild,
    TransitionRoot,
} from '@headlessui/vue'

import { ref } from 'vue'

import BaseInput from '@components/Form/BaseInput'
import SelectInput from '@components/Form/SelectInput'
import BaseButton from '@components/Buttons/BaseButton'
import { useForm } from '@inertiajs/inertia-vue3'

export default {
    components: {
        Dialog,
        DialogOverlay,
        TransitionChild,
        TransitionRoot,
        BaseInput,
        SelectInput,
        BaseButton,
        XMarkIcon,
    },
    props: {
        product: {
            type: Object,
            required: true,
        },
    },
    methods: {
        showModal() {
            this.open = true
        },
    },
    setup(props) {
        const form = useForm({
            alt: null,
            src: null,
            name: null,
        })

        const open = ref(false)

        function submit() {
            form.post(route('admin.products.images.store', props.product.id), {
                onSuccess: () => {
                    open.value = false
                    form.reset()
                },
            })
        }

        return {
            form,
            open,
            submit,
        }
    },
}
</script>
