<template>
    <div class="overflow-hidden">
        <div class="mt-4">
            <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between">
                    <div class="text-2xl leading-6 font-medium text-gray-600">
                        Products
                    </div>
                </div>

                <ul
                    role="list"
                    class="mt-2 -mx-px grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3"
                >
                    <ListCard
                        v-for="product in products.data"
                        :key="product.id"
                        :product="product"
                    />
                </ul>
            </div>
        </div>
    </div>
    <Pagination :paginator="products" class="py-2" />
</template>

<script>
import BaseButton from '@components/Buttons/BaseButton'
import ListCard from '@components/Products/ListCard'
import Pagination from '@components/Pagination'

export default {
    name: 'Index',
    components: {
        BaseButton,
        ListCard,
        Pagination,
    },
    props: {
        products: {
            type: Array,
        },
    },
    setup() {
        return {}
    },
}
</script>
