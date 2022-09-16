<template>
    <div class="bg-white px-4 py-3 sm:py-5 sm:px-6 shadow sm:rounded-lg pb-12">
        <div class="px-4 sm:px-6 flex justify-between items-center">
            <dt class="text-sm font-medium text-gray-500">Photos</dt>

            <div class="sm:space-x-4 space-x-2">
                <BaseButton
                    xs
                    class="inline-flex"
                    @click="$refs.addimage.showModal()"
                >
                    <PlusIcon class="w-4 fill-current mr-1" />
                    Add image
                </BaseButton>
            </div>
        </div>
        <dd class="mt-3 text-sm text-gray-900">
            <ul
                role="list"
                class="border border-gray-200 rounded-md divide-y divide-gray-200"
            >
                <li
                    v-for="image in product.images"
                    class="pl-3 pr-4 py-3 flex items-center justify-between text-sm"
                >
                    <div class="w-0 flex-1 flex items-center">
                        <PaperClipIcon
                            class="flex-shrink-0 h-5 w-5 text-gray-400"
                            aria-hidden="true"
                        />
                        <span class="ml-2 flex-1 w-0 truncate">
                            {{ image.src }}
                        </span>
                    </div>
                    <div class="ml-4 flex-shrink-0">
                        <a
                            target="_blank"
                            :href="image.src"
                            class="font-medium text-indigo-600 hover:text-indigo-500"
                        >
                            View
                        </a>
                    </div>
                </li>
            </ul>
        </dd>
    </div>
    <AddImage ref="addimage" :product="product" />
</template>

<script>
import { PlusIcon, PaperClipIcon } from '@heroicons/vue/24/solid'

import BaseInput from '@components/Form/BaseInput'
import BaseButton from '@components/Buttons/BaseButton'
import { useForm } from '@inertiajs/inertia-vue3'
import AddImage from '@components/Admin/AddImage'

export default {
    name: 'UserDetails',
    components: {
        BaseButton,
        PlusIcon,
        BaseInput,
        PaperClipIcon,
        AddImage,
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
