<template>
    <inertia-link
        :href="route('products.show', product.id)"
        class="group relative p-4 sm:p-6 bg-white rounded-lg shadow"
    >
        <div class="w-full">
            <div
                class="group-hover:opacity-75 flex justify-center items-center h-48"
            >
                <img
                    :src="product.oldest_image.src"
                    :alt="product.oldest_image.alt"
                    class="w-full h-full object-center object-cover rounded-lg"
                />
            </div>
        </div>
        <div class="pt-5 pb-2 text-center">
            <h3 class="text-sm font-medium text-gray-900">
                <a :href="product.href">
                    <span aria-hidden="true" class="absolute inset-0" />
                    {{ product.name }}
                </a>
            </h3>
            <div class="mt-3 flex flex-col items-center">
                <p class="sr-only">{{ product.rating }} out of 5 stars</p>
                <div class="flex items-center">
                    <StarIcon
                        v-for="rating in [0, 1, 2, 3, 4]"
                        :key="rating"
                        :class="[
                            product.rating > rating
                                ? 'text-yellow-400'
                                : 'text-gray-200',
                            'flex-shrink-0 h-5 w-5',
                        ]"
                        aria-hidden="true"
                    />
                </div>
                <p class="mt-1 text-sm text-gray-500">
                    {{ Math.floor(Math.random() * 200) + 10 }} reviews
                </p>
            </div>
            <p class="mt-4 text-base font-medium text-gray-900">
                ${{ product.price }}
            </p>
        </div>
    </inertia-link>
</template>

<script>
import { StarIcon } from '@heroicons/vue/24/solid'
import { BriefcaseIcon } from '@heroicons/vue/24/outline'
import { Link } from '@inertiajs/inertia-vue3'

export default {
    name: 'UsersListCard',
    props: {
        product: {
            type: Object,
            required: true,
        },
    },
    components: {
        BriefcaseIcon,
        Link,
        StarIcon,
    },

    setup() {
        return {}
    },
}
</script>
