<template>
    <div class="space-y-6 lg:col-start-1 lg:col-span-2">
        <div class="bg-white shadow sm:rounded-lg pb-12">
            <div
                class="px-4 py-3 sm:py-5 sm:px-6 flex justify-between items-center"
            >
                <div class="flex items-center sm:space-x-5 space-x-2">
                    <h1 class="text-base sm:text-xl font-medium text-gray-600">
                        Update product details
                    </h1>
                </div>

                <div class="sm:space-x-4 space-x-2">
                    <BaseButton xs class="inline-flex" @click="submit">
                        <PencilIcon class="w-4 fill-current mr-1" />
                        Update product
                    </BaseButton>
                </div>
            </div>

            <div class="border-t border-gray-200 px-4 py-5 sm:px-6">
                <dl
                    class="grid grid-cols-1 gap-x-4 sm:gap-y-3 sm:grid-cols-2 md:grid-cols-2"
                >
                    <base-input
                        v-model="form.name"
                        :error="form.errors.name"
                        class="w-full"
                        label="Name"
                        placeholder=""
                    />
                    <base-input
                        v-model="form.price"
                        :error="form.errors.price"
                        class="w-full"
                        label="Price"
                        placeholder=""
                        type="number"
                    />
                    <base-input
                        v-model="form.description"
                        :error="form.errors.description"
                        class="w-full sm:col-span-2"
                        label="Description"
                        placeholder=""
                    />
                </dl>
            </div>
        </div>
    </div>
</template>

<script>
import { PencilIcon } from '@heroicons/vue/24/solid'

import BaseInput from '@components/Form/BaseInput'
import BaseButton from '@components/Buttons/BaseButton'
import { useForm } from '@inertiajs/inertia-vue3'

export default {
    name: 'UserDetails',
    components: {
        BaseButton,
        PencilIcon,
        BaseInput,
    },
    props: {
        product: {
            type: Object,
            required: true,
        },
    },
    setup(props) {
        const form = useForm({
            name: props.product.name,
            price: props.product.price,
            description: props.product.description,
        })

        function submit() {
            form.patch(route('admin.products.update', props.product.id), {})
        }

        return {
            form,
            submit,
        }
    },
}
</script>

<style scoped></style>
