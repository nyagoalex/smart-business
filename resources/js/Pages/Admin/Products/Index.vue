<template>
    <main class="py-2 sm:py-8">
        <div class="sm:px-6 lg:px-0 mt-2">
            <div class="flex justify-between items-center pb-2 px-2">
                <div class="text-lg leading-6">
                    <span class="text-gray-600 font-medium">Products </span>
                </div>
                <base-button
                    light
                    sm
                    class="flex"
                    @click="$refs.addproduct.showModal()"
                >
                    <PlusIcon class="h-4 w-4 mr-2" aria-hidden="true" />New
                    Product</base-button
                >
            </div>
            <div
                class="bg-white overflow-hidden sm:rounded-md border border-gray-200 shadow-sm"
            >
                <div
                    class="px-6 py-4 bg-gray-50 grid grid-cols-3 border-b border-gray-200"
                >
                    <div class="">
                        <div class="relative z-0 w-full group">
                            <input
                                type="email"
                                name="email"
                                id="email"
                                class="block py-2.5 pl-8 pr-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-indigo-600 peer"
                                placeholder=" "
                                v-model="search"
                            />
                            <div
                                class="absolute inset-y-0 left-0 pl-1 flex items-center pointer-events-none"
                            >
                                <MagnifyingGlassIcon
                                    aria-hidden="true"
                                    class="h-5 w-5 text-gray-400"
                                />
                            </div>
                            <label
                                for="email"
                                class="peer-placeholder-shown:pl-8 peer-focus:pl-0 peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-indigo-800 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6"
                                >Search</label
                            >
                        </div>
                    </div>
                </div>
                <div class="divide-y divide-gray-100">
                    <ListCard
                        v-for="product in products.data"
                        :key="product.id"
                        :product="product"
                    />
                </div>
            </div>
        </div>
        <Pagination :paginator="products" class="py-2" />
    </main>

    <AddProduct ref="addproduct" />
</template>

<script>
import BaseButton from '@components/Buttons/BaseButton'
import ListCard from '@components/Admin/ListCard'
import Pagination from '@components/Pagination'
import {
    PlusIcon,
    MagnifyingGlassIcon,
    CheckCircleIcon,
} from '@heroicons/vue/24/solid'
import AddProduct from '@pages/Admin/Products/Create'
import SelectInput from '@components/Form/SelectInput'
import { computed, reactive, ref, watch } from 'vue'

import { throttle } from 'lodash/function'
import { Inertia } from '@inertiajs/inertia'
import {
    RadioGroup,
    RadioGroupDescription,
    RadioGroupLabel,
    RadioGroupOption,
} from '@headlessui/vue'

export default {
    name: 'Index',
    components: {
        BaseButton,
        ListCard,
        PlusIcon,
        MagnifyingGlassIcon,
        RadioGroup,
        RadioGroupDescription,
        RadioGroupLabel,
        RadioGroupOption,
        AddProduct,
        SelectInput,
        CheckCircleIcon,
        Pagination,
    },
    props: {
        products: {
            type: Array,
        },
        filters: {
            type: Object,
            required: true,
        },
    },
    setup(props) {
        const filters = reactive({
            page: 1,
            range: null,
            category: null,
        })
        const search = ref(props.filters.search || '')

        watch(
            search,
            throttle((value) => {
                Inertia.get(
                    route('admin.products.index'),
                    { search: value },
                    { preserveState: true }
                )
            }, 500)
        )

        return {
            filters,
            search,
        }
    },
}
</script>
