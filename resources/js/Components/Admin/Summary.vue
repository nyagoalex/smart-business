<template>
    <div
        class="shadow rounded-md max-w-3xl lg:max-w-7xl px-2 py-4 bg-white space-y-3"
    >
        <div
            class="mx-auto md:flex md:items-center bg-white px-4 md:justify-between md:space-x-5"
        >
            <div class="flex items-center sm:space-x-5 space-x-2">
                <div class="flex-shrink-0 rounded-full bg-gray-400 p-1 sm:p-2">
                    <BriefcaseIcon class="h-5 w-5 sm:h-8 sm:w-8 text-white" />
                </div>
                <div>
                    <h1
                        class="text-sm sm:text-2xl font-bold text-gray-900 flex"
                    >
                        {{ product.name }}
                        <div class="sm:hidden ml-2">
                            <span
                                class="inline-flex items-center px-1.5 rounded-full text-xxs font-medium bg-green-100 text-green-800"
                            >
                                Published
                            </span>
                        </div>
                    </h1>

                    <p
                        class="text-xxs sm:text-sm sm:font-medium text-gray-500 flex items-center space-x-2"
                    >
                        <span>Black</span>
                        <span class="rounded-full bg-gray-400 w-1 h-1" />
                        <span class="text-gray-500"
                            >Added on
                            <time>18th September, 2022</time>
                        </span>
                    </p>
                </div>
            </div>
            <div class="hidden sm:block">
                <span
                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800"
                >
                    published
                </span>
            </div>
        </div>
        <div
            class="grid grid-cols-3 text-gray-500 border-t border-gray-50 pt-4"
        >
            <div
                class="px-4 border-r border-gray-100 flex flex-col sm:flex-row items-center text-center sm:space-x-4"
            >
                <CreditCardIcon
                    class="w-5 h-5 sm:w-9 sm:h-9 text-secondary-500 rounded-full bg-secondary-100 p-1 sm:p-1.5"
                />
                <div
                    class="text-xxs sm:text-base flex flex-col-reverse sm:flex-row justify-center items-center text-center"
                >
                    <div class="pr-1">Price:</div>
                    <span class="font-medium text-sm sm:text-base"
                        >${{ product.price }}</span
                    >
                </div>
            </div>
            <div
                class="px-4 border-r border-gray-100 flex flex-col sm:flex-row items-center sm:space-x-4"
            >
                <ScaleIcon
                    class="w-5 h-5 sm:w-9 sm:h-9 text-blue-500 rounded-full bg-blue-100 p-1 sm:p-1.5"
                />
                <div
                    class="text-xxs sm:text-base flex flex-col-reverse sm:flex-row justify-center items-center text-center"
                >
                    <div class="pr-1">In stock:</div>
                    <span class="font-medium text-sm sm:text-base">3,000</span>
                </div>
            </div>
            <div
                class="px-4 flex flex-col sm:flex-row items-center sm:space-x-4"
            >
                <ChevronDoubleUpIcon
                    class="w-5 h-5 sm:w-9 sm:h-9 text-primary-500 rounded-full bg-primary-100 p-1 sm:p-1.5"
                />

                <div
                    class="text-xxs sm:text-base flex flex-col-reverse sm:flex-row justify-center items-center text-center"
                >
                    <div class="pr-1">Sold:</div>
                    <span class="font-medium text-sm sm:text-base">5,780</span>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import {
    CreditCardIcon,
    ScaleIcon,
    BriefcaseIcon,
    ChevronDoubleUpIcon,
} from '@heroicons/vue/24/solid'
export default {
    name: 'Summary',
    components: {
        CreditCardIcon,
        ScaleIcon,
        BriefcaseIcon,
        ChevronDoubleUpIcon,
    },
    props: {
        product: {
            type: Object,
            required: true,
        },
    },
}
</script>

<style scoped></style>
