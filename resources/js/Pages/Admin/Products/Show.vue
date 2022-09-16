<template>
    <div class="sm:mt-6 mt-3 sm:space-y-6 space-y-3">
        <inertia-link
            :href="route('admin.products.index')"
            class="text-xs text-primary-500 font-medium flex cursor-pointer hover:text-primary-800"
        >
            <ArrowLongLeftIcon class="w-4 fill-current mr-1" /> Back to products
        </inertia-link>
        <Summary :product="product" />
        <ProductTabMenu :product="product" />
    </div>
</template>

<script>
import {
    XMarkIcon,
    ScaleIcon,
    TrashIcon,
    PencilIcon,
    ArrowLongLeftIcon,
    UserIcon,
} from '@heroicons/vue/24/solid'
import BaseInput from '@components/Form/BaseInput'
import SelectInput from '@components/Form/SelectInput'
import BaseButton from '@components/Buttons/BaseButton'
import Summary from '@components/Admin/Summary'
import ProductTabMenu from '@components/Admin/ProductTabMenu'

export default {
    components: {
        BaseInput,
        SelectInput,
        BaseButton,
        XMarkIcon,
        ScaleIcon,
        TrashIcon,
        PencilIcon,
        ArrowLongLeftIcon,
        UserIcon,
        Summary,
        ProductTabMenu,
    },
    props: {
        product: {
            type: Object,
            required: true,
        },
    },
}
</script>
