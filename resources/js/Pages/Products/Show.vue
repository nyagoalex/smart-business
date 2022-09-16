<template>
    <div>
        <!-- Mobile menu -->
        <TransitionRoot as="template" :show="open">
            <Dialog
                as="div"
                class="fixed inset-0 flex z-40 lg:hidden"
                @close="open = false"
            >
                <TransitionChild
                    as="template"
                    enter="transition-opacity ease-linear duration-300"
                    enter-from="opacity-0"
                    enter-to="opacity-100"
                    leave="transition-opacity ease-linear duration-300"
                    leave-from="opacity-100"
                    leave-to="opacity-0"
                >
                    <DialogOverlay
                        class="fixed inset-0 bg-black bg-opacity-25"
                    />
                </TransitionChild>

                <TransitionChild
                    as="template"
                    enter="transition ease-in-out duration-300 transform"
                    enter-from="-translate-x-full"
                    enter-to="translate-x-0"
                    leave="transition ease-in-out duration-300 transform"
                    leave-from="translate-x-0"
                    leave-to="-translate-x-full"
                >
                    <div
                        class="relative max-w-xs w-full bg-white shadow-xl pb-12 flex flex-col overflow-y-auto"
                    >
                        <div class="px-4 pt-5 pb-2 flex">
                            <button
                                type="button"
                                class="-m-2 p-2 rounded-md inline-flex items-center justify-center text-gray-400"
                                @click="open = false"
                            >
                                <span class="sr-only">Close menu</span>
                                <XMarkIcon class="h-6 w-6" aria-hidden="true" />
                            </button>
                        </div>

                        <!-- Links -->
                        <TabGroup as="div" class="mt-2">
                            <div class="border-b border-gray-200">
                                <TabList class="-mb-px flex px-4 space-x-8">
                                    <Tab
                                        as="template"
                                        v-for="category in navigation.categories"
                                        :key="category.name"
                                        v-slot="{ selected }"
                                    >
                                        <button
                                            :class="[
                                                selected
                                                    ? 'text-indigo-600 border-indigo-600'
                                                    : 'text-gray-900 border-transparent',
                                                'flex-1 whitespace-nowrap py-4 px-1 border-b-2 text-base font-medium',
                                            ]"
                                        >
                                            {{ category.name }}
                                        </button>
                                    </Tab>
                                </TabList>
                            </div>
                            <TabPanels as="template">
                                <TabPanel
                                    v-for="category in navigation.categories"
                                    :key="category.name"
                                    class="pt-10 pb-8 px-4 space-y-10"
                                >
                                    <div class="space-y-4">
                                        <div
                                            v-for="(
                                                item, itemIdx
                                            ) in category.featured"
                                            :key="itemIdx"
                                            class="group relative aspect-w-1 aspect-h-1 rounded-md bg-gray-100 overflow-hidden"
                                        >
                                            <img
                                                :src="item.imageSrc"
                                                :alt="item.imageAlt"
                                                class="object-center object-cover group-hover:opacity-75"
                                            />
                                            <div
                                                class="flex flex-col justify-end"
                                            >
                                                <div
                                                    class="p-4 bg-white bg-opacity-60 text-base sm:text-sm"
                                                >
                                                    <a
                                                        :href="item.href"
                                                        class="font-medium text-gray-900"
                                                    >
                                                        <span
                                                            class="absolute inset-0"
                                                            aria-hidden="true"
                                                        />
                                                        {{ item.name }}
                                                    </a>
                                                    <p
                                                        aria-hidden="true"
                                                        class="mt-0.5 text-gray-700 sm:mt-1"
                                                    >
                                                        Shop now
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        v-for="(
                                            column, columnIdx
                                        ) in category.sections"
                                        :key="columnIdx"
                                        class="space-y-10"
                                    >
                                        <div
                                            v-for="section in column"
                                            :key="section.name"
                                        >
                                            <p
                                                :id="`${category.id}-${section.id}-heading-mobile`"
                                                class="font-medium text-gray-900"
                                            >
                                                {{ section.name }}
                                            </p>
                                            <ul
                                                role="list"
                                                :aria-labelledby="`${category.id}-${section.id}-heading-mobile`"
                                                class="mt-6 flex flex-col space-y-6"
                                            >
                                                <li
                                                    v-for="item in section.items"
                                                    :key="item.name"
                                                    class="flow-root"
                                                >
                                                    <a
                                                        :href="item.href"
                                                        class="-m-2 p-2 block text-gray-500"
                                                    >
                                                        {{ item.name }}
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </TabPanel>
                            </TabPanels>
                        </TabGroup>

                        <div
                            class="border-t border-gray-200 py-6 px-4 space-y-6"
                        >
                            <div
                                v-for="page in navigation.pages"
                                :key="page.name"
                                class="flow-root"
                            >
                                <a
                                    :href="page.href"
                                    class="-m-2 p-2 block font-medium text-gray-900"
                                    >{{ page.name }}</a
                                >
                            </div>
                        </div>

                        <div class="border-t border-gray-200 py-6 px-4">
                            <a href="#" class="-m-2 p-2 flex items-center">
                                <img
                                    src="https://tailwindui.com/img/flags/flag-canada.svg"
                                    alt=""
                                    class="w-5 h-auto block flex-shrink-0"
                                />
                                <span
                                    class="ml-3 block text-base font-medium text-gray-900"
                                >
                                    CAD
                                </span>
                                <span class="sr-only">, change currency</span>
                            </a>
                        </div>
                    </div>
                </TransitionChild>
            </Dialog>
        </TransitionRoot>

        <header class="pt-8 pb-4">
            <inertia-link
                :href="route('products.index')"
                class="text-sm text-primary-500 font-medium flex cursor-pointer hover:text-primary-800"
            >
                <ArrowLongLeftIcon class="w-4 fill-current mr-1" /> Back to
                products
            </inertia-link>
        </header>

        <main
            class="max-w-7xl mx-auto sm:pt-16 sm:px-6 lg:px-8 bg-white rounded-lg shadow-lg"
        >
            <div class="max-w-2xl mx-auto lg:max-w-none">
                <!-- Product -->
                <div class="lg:grid lg:grid-cols-2 lg:gap-x-8 lg:items-start">
                    <!-- Image gallery -->
                    <TabGroup as="div" class="flex flex-col-reverse">
                        <!-- Image selector -->
                        <div
                            class="hidden mt-6 w-full max-w-2xl mx-auto sm:block lg:max-w-none"
                        >
                            <TabList class="grid grid-cols-4 gap-6">
                                <Tab
                                    v-for="image in product.images"
                                    :key="image.id"
                                    class="relative h-24 bg-white rounded-md flex items-center justify-center text-sm font-medium uppercase text-gray-900 cursor-pointer hover:bg-gray-50 focus:outline-none focus:ring focus:ring-offset-4 focus:ring-opacity-50"
                                    v-slot="{ selected }"
                                >
                                    <span class="sr-only">
                                        {{ image.name }}
                                    </span>
                                    <span
                                        class="absolute inset-0 rounded-md overflow-hidden"
                                    >
                                        <img
                                            :src="image.src"
                                            alt=""
                                            class="w-full h-full object-center object-cover"
                                        />
                                    </span>
                                    <span
                                        :class="[
                                            selected
                                                ? 'ring-indigo-500'
                                                : 'ring-transparent',
                                            'absolute inset-0 rounded-md ring-2 ring-offset-2 pointer-events-none',
                                        ]"
                                        aria-hidden="true"
                                    />
                                </Tab>
                            </TabList>
                        </div>

                        <TabPanels class="w-full aspect-w-1 aspect-h-1">
                            <TabPanel
                                v-for="image in product.images"
                                :key="image.id"
                            >
                                <img
                                    :src="image.src"
                                    :alt="image.alt"
                                    class="w-full h-full object-center object-cover sm:rounded-lg"
                                />
                            </TabPanel>
                        </TabPanels>
                    </TabGroup>

                    <!-- Product info -->
                    <div class="mt-10 px-4 sm:px-0 sm:mt-16 lg:mt-0">
                        <h1
                            class="text-3xl font-extrabold tracking-tight text-gray-900"
                        >
                            {{ product.name }}
                        </h1>

                        <div class="mt-3">
                            <h2 class="sr-only">Product information</h2>
                            <p class="text-3xl text-gray-900">
                                ${{ product.price }}
                            </p>
                        </div>

                        <!-- Reviews -->
                        <div class="mt-3">
                            <h3 class="sr-only">Reviews</h3>
                            <div class="flex items-center">
                                <div class="flex items-center">
                                    <StarIcon
                                        v-for="rating in [0, 1, 2, 3, 4]"
                                        :key="rating"
                                        :class="[
                                            product.rating > rating
                                                ? 'text-indigo-500'
                                                : 'text-gray-300',
                                            'h-5 w-5 flex-shrink-0',
                                        ]"
                                        aria-hidden="true"
                                    />
                                </div>
                                <p class="sr-only">
                                    {{ product.rating }} out of 5 stars
                                </p>
                            </div>
                        </div>

                        <div class="mt-6">
                            <h3 class="sr-only">Description</h3>

                            <div
                                class="text-base text-gray-700 space-y-6"
                                v-html="product.description"
                            />
                        </div>

                        <form class="mt-6">
                            <!-- Colors -->
                            <div>
                                <h3 class="text-sm text-gray-600">Color</h3>

                                <RadioGroup
                                    v-model="selectedColor"
                                    class="mt-2"
                                >
                                    <RadioGroupLabel class="sr-only">
                                        Choose a color
                                    </RadioGroupLabel>
                                    <div class="flex items-center space-x-3">
                                        <RadioGroupOption
                                            as="template"
                                            v-for="color in colors"
                                            :key="color.name"
                                            :value="color"
                                            v-slot="{ active, checked }"
                                        >
                                            <div
                                                :class="[
                                                    color.selectedColor,
                                                    active && checked
                                                        ? 'ring ring-offset-1'
                                                        : '',
                                                    !active && checked
                                                        ? 'ring-2'
                                                        : '',
                                                    '-m-0.5 relative p-0.5 rounded-full flex items-center justify-center cursor-pointer focus:outline-none',
                                                ]"
                                            >
                                                <RadioGroupLabel
                                                    as="p"
                                                    class="sr-only"
                                                >
                                                    {{ color.name }}
                                                </RadioGroupLabel>
                                                <span
                                                    aria-hidden="true"
                                                    :class="[
                                                        color.bgColor,
                                                        'h-8 w-8 border border-black border-opacity-10 rounded-full',
                                                    ]"
                                                />
                                            </div>
                                        </RadioGroupOption>
                                    </div>
                                </RadioGroup>
                            </div>

                            <div class="mt-10 flex sm:flex-col1">
                                <button
                                    type="submit"
                                    class="max-w-xs flex-1 bg-indigo-600 border border-transparent rounded-md py-3 px-8 flex items-center justify-center text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-50 focus:ring-indigo-500 sm:w-full"
                                >
                                    Add to cart
                                </button>

                                <button
                                    type="button"
                                    class="ml-4 py-3 px-3 rounded-md flex items-center justify-center text-gray-400 hover:bg-gray-100 hover:text-gray-500"
                                >
                                    <HeartIcon
                                        class="h-6 w-6 flex-shrink-0"
                                        aria-hidden="true"
                                    />
                                    <span class="sr-only"
                                        >Add to favorites</span
                                    >
                                </button>
                            </div>
                        </form>

                        <section
                            aria-labelledby="details-heading"
                            class="mt-12"
                        >
                            <h2 id="details-heading" class="sr-only">
                                Additional details
                            </h2>

                            <div class="border-t divide-y divide-gray-200">
                                <Disclosure
                                    as="div"
                                    v-for="detail in product.details"
                                    :key="detail.name"
                                    v-slot="{ open }"
                                >
                                    <h3>
                                        <DisclosureButton
                                            class="group relative w-full py-6 flex justify-between items-center text-left"
                                        >
                                            <span
                                                :class="[
                                                    open
                                                        ? 'text-indigo-600'
                                                        : 'text-gray-900',
                                                    'text-sm font-medium',
                                                ]"
                                            >
                                                {{ detail.name }}
                                            </span>
                                            <span
                                                class="ml-6 flex items-center"
                                            >
                                                <PlusSmallIcon
                                                    v-if="!open"
                                                    class="block h-6 w-6 text-gray-400 group-hover:text-gray-500"
                                                    aria-hidden="true"
                                                />
                                                <MinusSmallIcon
                                                    v-else
                                                    class="block h-6 w-6 text-indigo-400 group-hover:text-indigo-500"
                                                    aria-hidden="true"
                                                />
                                            </span>
                                        </DisclosureButton>
                                    </h3>
                                    <DisclosurePanel
                                        as="div"
                                        class="pb-6 prose prose-sm"
                                    >
                                        <ul role="list">
                                            <li
                                                v-for="item in detail.items"
                                                :key="item"
                                            >
                                                {{ item }}
                                            </li>
                                        </ul>
                                    </DisclosurePanel>
                                </Disclosure>
                            </div>
                        </section>
                    </div>
                </div>

                <section
                    aria-labelledby="related-heading"
                    class="mt-10 border-t border-gray-200 py-16 px-4 sm:px-0"
                >
                    <h2
                        id="related-heading"
                        class="text-xl font-bold text-gray-900"
                    >
                        Customers also bought
                    </h2>

                    <div
                        class="mt-8 grid grid-cols-1 gap-y-12 sm:grid-cols-2 sm:gap-x-6 lg:grid-cols-4 xl:gap-x-8"
                    >
                        <div
                            v-for="product in relatedProducts"
                            :key="product.id"
                        >
                            <inertia-link
                                :href="route('admin.products.show', product)"
                            >
                                <div
                                    class="relative transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 duration-300"
                                >
                                    <div
                                        class="relative w-full h-72 rounded-lg overflow-hidden"
                                    >
                                        <img
                                            :src="product.oldest_image.src"
                                            :alt="product.oldest_image.alt"
                                            class="w-full h-full object-center object-cover"
                                        />
                                    </div>
                                    <div class="relative mt-4">
                                        <h3
                                            class="text-sm font-medium text-gray-900"
                                        >
                                            {{ product.name }}
                                        </h3>
                                        <p class="mt-1 text-sm text-gray-500">
                                            Black and white
                                        </p>
                                    </div>
                                    <div
                                        class="absolute top-0 inset-x-0 h-72 rounded-lg p-4 flex items-end justify-end overflow-hidden"
                                    >
                                        <div
                                            aria-hidden="true"
                                            class="absolute inset-x-0 bottom-0 h-36 bg-gradient-to-t from-black opacity-50"
                                        />
                                        <p
                                            class="relative text-lg font-semibold text-white"
                                        >
                                            ${{ product.price }}
                                        </p>
                                    </div>
                                </div>
                            </inertia-link>
                            <div class="mt-6">
                                <inertia-link
                                    :href="
                                        route('admin.products.show', product)
                                    "
                                    class="relative flex bg-gray-100 border border-transparent rounded-md py-2 px-8 items-center justify-center text-sm font-medium text-gray-900 hover:bg-gray-200"
                                    >Add to cart<span class="sr-only"
                                        >, {{ product.name }}</span
                                    ></inertia-link
                                >
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </main>
    </div>
</template>

<script>
import { ref } from 'vue'
import {
    Dialog,
    DialogOverlay,
    Disclosure,
    DisclosureButton,
    DisclosurePanel,
    Popover,
    PopoverButton,
    PopoverGroup,
    PopoverPanel,
    RadioGroup,
    RadioGroupLabel,
    RadioGroupOption,
    Tab,
    TabGroup,
    TabList,
    TabPanel,
    TabPanels,
    TransitionChild,
    TransitionRoot,
} from '@headlessui/vue'
import {
    HeartIcon,
    Bars3Icon,
    MinusSmallIcon,
    PlusSmallIcon,
    MagnifyingGlassIcon,
    ShoppingBagIcon,
    UserIcon,
    XMarkIcon,
    ArrowLongLeftIcon,
} from '@heroicons/vue/24/outline'
import { StarIcon } from '@heroicons/vue/24/solid'
const colors = [
    {
        name: 'Washed Black',
        bgColor: 'bg-gray-700',
        selectedColor: 'ring-gray-700',
    },
    {
        name: 'White',
        bgColor: 'bg-sky-700',
        selectedColor: 'ring-sky-700',
    },
    {
        name: 'Washed Gray',
        bgColor: 'bg-lime-700',
        selectedColor: 'ring-lime-700',
    },
]

export default {
    components: {
        Dialog,
        DialogOverlay,
        Disclosure,
        DisclosureButton,
        DisclosurePanel,
        Popover,
        PopoverButton,
        PopoverGroup,
        PopoverPanel,
        RadioGroup,
        RadioGroupLabel,
        RadioGroupOption,
        Tab,
        TabGroup,
        TabList,
        TabPanel,
        TabPanels,
        TransitionChild,
        TransitionRoot,
        HeartIcon,
        Bars3Icon,
        MinusSmallIcon,
        PlusSmallIcon,
        MagnifyingGlassIcon,
        ShoppingBagIcon,
        StarIcon,
        UserIcon,
        XMarkIcon,
        ArrowLongLeftIcon,
    },
    props: {
        product: {
            type: Object,
        },
        relatedProducts: {
            type: Array,
        },
    },
    setup() {
        const open = ref(false)
        const selectedColor = ref(colors[0])

        return {
            open,
            selectedColor,
            colors,
        }
    },
}
</script>
