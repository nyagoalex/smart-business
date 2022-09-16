<template>
    <div>
        <nav
            class="max-w-3xl mx-auto md:space-x-5 lg:max-w-7xl mt-6 sm:mt-8 mb-4"
        >
            <div class="w-full">
                <div class="sm:block">
                    <div class="border-b border-gray-200">
                        <nav
                            class="-mb-px flex space-x-4 sm:space-x-8"
                            aria-label="Tabs"
                        >
                            <button
                                v-for="tab in tabs"
                                :key="tab.name"
                                @click="selpage = tab.page"
                                :class="[
                                    selpage == tab.page
                                        ? 'border-primary-600 text-primary-600'
                                        : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300',
                                    'group inline-flex items-center py-2 sm:py-4 px-1 border-b-2 font-medium text-xs sm:text-sm',
                                ]"
                                :aria-current="
                                    selpage == tab.page ? 'page' : undefined
                                "
                            >
                                <component
                                    :is="tab.icon"
                                    :class="[
                                        selpage == tab.page
                                            ? 'text-primary-600'
                                            : 'text-gray-300 group-hover:text-gray-500',
                                        '-ml-0.5 mr-1 sm:mr-2 h-4 w-4 sm:h-5 sm:w-5',
                                    ]"
                                    aria-hidden="true"
                                />
                                <span>{{ tab.name }}</span>
                            </button>
                        </nav>
                    </div>
                </div>
            </div>
        </nav>
        <ProductDetails v-if="selpage === 'details'" :product="product" />
        <ProductFeatures v-if="selpage === 'features'" :product="product" />
        <ProductImages v-if="selpage === 'images'" :product="product" />
    </div>
</template>

<script>
import { PhotoIcon, BeakerIcon, CreditCardIcon } from '@heroicons/vue/24/solid'
import ProductDetails from '@components/Admin/ProductDetails'
import ProductImages from '@components/Admin/ProductImages'
import ProductFeatures from '@components/Admin/ProductFeatures'
import { ref } from 'vue'

const tabs = [
    {
        name: 'Details',
        page: 'details',
        icon: BeakerIcon,
    },
    {
        name: 'Features',
        page: 'features',
        icon: CreditCardIcon,
    },
    {
        name: 'Images',
        page: 'images',
        icon: PhotoIcon,
    },
]
export default {
    name: 'UserTabMenu',

    props: {
        product: {
            type: Object,
            required: true,
        },
    },
    components: {
        ProductDetails,
        ProductImages,
        ProductFeatures,
    },

    setup() {
        const selpage = ref(tabs[0].page)
        return {
            tabs,
            selpage,
        }
    },
}
</script>
