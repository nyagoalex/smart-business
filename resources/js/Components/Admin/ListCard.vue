<template>
    <Link :href="route('admin.products.show', product.id)" class="block group">
        <div class="flex items-center p-3 sm:px-6 group-hover:bg-gray-50">
            <div class="flex items-center">
                <div
                    class="flex-shrink-0 rounded-full bg-primary-50 p-1 sm:p-2 group-hover:bg-white"
                >
                    <BriefcaseIcon class="h-6 w-6 text-gray-400" />
                </div>
                <div
                    class="flex-1 px-2 sm:px-4 grid grid-cols-2 md:grid-cols-4 gap-8"
                >
                    <div class="">
                        <p
                            class="text-xs sm:text-sm font-medium text-primary-700 truncate group-hover:text-primary-900"
                        >
                            {{ product.name }}
                        </p>
                        <p
                            class="mt-1 flex items-center text-xxs sm:text-xs text-gray-500"
                        >
                            <span class="truncate"
                                >Since May 22, 2022 12:00 AM</span
                            >
                        </p>
                    </div>
                    <div
                        class="text-gray-600 sm:text-sm text-xs flex items-center"
                    >
                        USD {{ $filters.money(product.price) }}
                    </div>

                    <div
                        class="hidden md:block text-gray-400 truncate sm:text-sm text-xs flex items-center"
                    >
                        White | Brown | Black
                    </div>
                    <div
                        class="hidden md:block text-gray-400 truncate sm:text-sm text-xs flex items-center"
                    >
                        {{ product.description }}
                    </div>
                </div>
            </div>
            <div class="ml-auto">
                <ChevronRightIcon
                    class="h-5 w-5 text-gray-400"
                    aria-hidden="true"
                />
            </div>
        </div>
    </Link>
</template>

<script>
import { ChevronRightIcon } from '@heroicons/vue/24/solid'
import { BanknotesIcon, BriefcaseIcon } from '@heroicons/vue/24/outline'
import { Link } from '@inertiajs/inertia-vue3'

export default {
    name: 'UsersListCard',
    components: {
        ChevronRightIcon,
        BanknotesIcon,
        Link,
        BriefcaseIcon,
    },

    props: {
        product: {
            type: Object,
            required: true,
        },
    },

    setup() {
        return {}
    },
}
</script>
