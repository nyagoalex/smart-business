<template>
    <div class="space-y-6 lg:col-start-1 lg:col-span-2">
        <div class="bg-white shadow sm:rounded-lg pb-12">
            <div
                class="px-4 py-3 sm:py-5 sm:px-6 flex justify-between items-center"
            >
                <div class="flex items-center sm:space-x-5 space-x-2">
                    <h1 class="text-base sm:text-xl font-medium text-gray-700">
                        Product features
                    </h1>
                </div>
            </div>

            <div
                class="my-6 flex items-center justify-center rounded-md border-2 border-dashed border-gray-300 py-16 mx-6"
                v-if="!product.details"
            >
                <div class="text-center text-3xl font-medium text-gray-300">
                    No Product features added
                </div>
            </div>
            <div
                v-else
                class="border-t border-gray-200 px-4 py-5 sm:px-6 grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3"
            >
                <div
                    v-for="{ name, items } in product.details"
                    class="bg-white rounded-lg shadow overflow-hidden divide-y divide-gray-100"
                >
                    <div
                        class="flex flex-items justify-between px-4 py-2 sm:py-2 font-medium text-sm sm:text-base text-gray-600"
                    >
                        <div>{{ name }}</div>
                    </div>
                    <ul class="text-gray-500 text-sm font-medium py-4 px-4">
                        <li
                            v-for="(item, index) in items"
                            class="flex items-center justify-between rounded-md even:bg-gray-50 py-1.5 px-2 capitalize"
                        >
                            <div class="text-gray-500">
                                {{ index + 1 }}. {{ item }}
                            </div>
                        </li>
                    </ul>
                </div>
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

        return {
            form,
        }
    },
}
</script>

<style scoped></style>
