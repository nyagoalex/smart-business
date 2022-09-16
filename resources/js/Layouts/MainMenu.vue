<template>
    <div>
        <nav class="bg-white shadow-sm">
            <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex">
                        <div class="flex-shrink-0 flex items-center space-x-4">
                            <img
                                class="h-8 w-auto"
                                :src="asset('images/logo.svg')"
                                alt="Workflow"
                            />
                            <div class="text-xl font-bold text-gray-700">
                                Smart Business
                            </div>
                        </div>
                        <div
                            class="hidden sm:-my-px sm:ml-6 sm:flex sm:space-x-8"
                        >
                            <inertia-link
                                v-for="item in navigation"
                                :key="item.name"
                                :href="route(item.href)"
                                :class="[
                                    isActive(item.name)
                                        ? 'border-indigo-500 text-gray-900'
                                        : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300',
                                    'inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium',
                                ]"
                                :aria-current="
                                    isActive(item.name) ? 'page' : undefined
                                "
                                >{{ item.name }}
                            </inertia-link>
                        </div>
                    </div>
                    <div class="hidden sm:ml-6 sm:flex sm:items-center">
                        <button
                            type="button"
                            class="bg-white p-1 rounded-full text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                        >
                            <span class="sr-only">View notifications</span>
                            <BellIcon class="h-6 w-6" aria-hidden="true" />
                        </button>

                        <!-- Profile dropdown -->
                        <Menu as="div" class="ml-3 relative">
                            <div>
                                <MenuButton
                                    class="bg-white flex text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                >
                                    <span class="sr-only">Open user menu</span>
                                    <img
                                        class="h-8 w-8 rounded-full"
                                        :src="asset('images/awesomeness.jpeg')"
                                        alt=""
                                    />
                                </MenuButton>
                            </div>
                            <transition
                                enter-active-class="transition ease-out duration-200"
                                enter-from-class="transform opacity-0 scale-95"
                                enter-to-class="transform opacity-100 scale-100"
                                leave-active-class="transition ease-in duration-75"
                                leave-from-class="transform opacity-100 scale-100"
                                leave-to-class="transform opacity-0 scale-95"
                            >
                                <MenuItems
                                    class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none"
                                >
                                    <MenuItem
                                        v-for="item in userNavigation"
                                        :key="item.name"
                                        v-slot="{ active }"
                                    >
                                        <a
                                            :href="item.href"
                                            :class="[
                                                active ? 'bg-gray-100' : '',
                                                'block px-4 py-2 text-sm text-gray-700',
                                            ]"
                                            >{{ item.name }}</a
                                        >
                                    </MenuItem>
                                </MenuItems>
                            </transition>
                        </Menu>
                    </div>
                    <div class="-mr-2 flex items-center sm:hidden">
                        <!-- Mobile menu button -->
                        <button
                            @click="open = !open"
                            class="bg-white inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                        >
                            <span class="sr-only">Open main menu</span>
                            <Bars3Icon
                                v-if="!open"
                                class="block h-6 w-6"
                                aria-hidden="true"
                            />
                            <XMarkIcon
                                v-else
                                class="block h-6 w-6"
                                aria-hidden="true"
                            />
                        </button>
                    </div>

                    <nav
                        class="sm:hidden z-20 fixed bottom-0 inset-x-0 bg-white flex justify-between items-center font-mono h-14"
                    >
                        <inertia-link
                            v-for="item in smallScreenNavigation"
                            :key="item.name"
                            :href="route(item.href)"
                            :class="[
                                isActive(item.name)
                                    ? 'border-primary-500 text-primary-700'
                                    : 'border-transparent text-gray-900 ',
                                'w-full block px-3 h-full text-xxs border-t-2 text-center flex flex-col justify-center  transition duration-300',
                            ]"
                        >
                            <component
                                :is="item.icon"
                                class="w-5 h-5 mb-0.5 mx-auto stroke-current"
                                aria-hidden="true"
                            />

                            {{ item.name }}
                        </inertia-link>
                    </nav>
                </div>
            </div>
        </nav>

        <TransitionRoot as="template" :show="open" class="sm:hidden">
            <Dialog
                as="div"
                class="fixed inset-0 overflow-hidden"
                @close="open = false"
            >
                <div class="absolute inset-0 overflow-hidden">
                    <DialogOverlay class="absolute inset-0" />

                    <div
                        class="pointer-events-none fixed inset-y-0 right-0 flex max-w-full pl-10"
                    >
                        <TransitionChild
                            as="template"
                            enter="transform transition ease-in-out duration-500 sm:duration-700"
                            enter-from="translate-x-full"
                            enter-to="translate-x-0"
                            leave="transform transition ease-in-out duration-500 sm:duration-700"
                            leave-from="translate-x-0"
                            leave-to="translate-x-full"
                        >
                            <div class="pointer-events-auto w-screen max-w-md">
                                <div
                                    class="flex h-full flex-col overflow-y-scroll bg-white shadow-xl"
                                >
                                    <div
                                        class="bg-primary-600 py-6 px-4 sm:px-6"
                                    >
                                        <div
                                            class="flex items-center justify-between"
                                        >
                                            <DialogTitle
                                                class="text-lg font-medium text-white"
                                            >
                                                <div
                                                    class="flex items-center px-4"
                                                >
                                                    <div class="flex-shrink-0">
                                                        <img
                                                            class="h-10 w-10 rounded-full"
                                                            :src="
                                                                asset(
                                                                    'images/awesomeness.jpeg'
                                                                )
                                                            "
                                                            alt=""
                                                        />
                                                    </div>
                                                    <div class="ml-3">
                                                        <div
                                                            class="text-base font-medium text-white"
                                                        >
                                                            Alex Nyago
                                                        </div>
                                                        <div
                                                            class="text-sm font-medium text-primary-300"
                                                        >
                                                            nyagoalex@gmail.com
                                                        </div>
                                                    </div>
                                                </div>
                                            </DialogTitle>
                                            <div
                                                class="ml-3 flex h-7 items-center"
                                            >
                                                <button
                                                    type="button"
                                                    class="rounded-md bg-indigo-700 text-indigo-200 hover:text-white focus:outline-none focus:ring-2 focus:ring-white"
                                                    @click="open = false"
                                                >
                                                    <span class="sr-only"
                                                        >Close panel</span
                                                    >
                                                    <XMarkIcon
                                                        class="h-6 w-6"
                                                        aria-hidden="true"
                                                    />
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-1">
                                        <inertia-link
                                            as="a"
                                            href="logout"
                                            class="flex justify-between px-4 py-4 text-base font-medium text-primary-600 bg-primary-100"
                                        >
                                            <div>Sign out</div>
                                            <ArrowLeftOnRectangleIcon
                                                class="h-6 w-6"
                                                aria-hidden="true"
                                            />
                                        </inertia-link>
                                    </div>
                                </div>
                            </div>
                        </TransitionChild>
                    </div>
                </div>
            </Dialog>
        </TransitionRoot>
    </div>
</template>

<script>
import {
    Disclosure,
    DisclosureButton,
    DisclosurePanel,
    Menu,
    MenuButton,
    MenuItem,
    MenuItems,
    Popover,
    PopoverButton,
    PopoverPanel,
    Dialog,
    DialogOverlay,
    DialogTitle,
    TransitionChild,
    TransitionRoot,
} from '@headlessui/vue'
import {
    BellIcon,
    ChevronDownIcon,
    CogIcon,
    CircleStackIcon,
    CreditCardIcon,
    KeyIcon,
    BeakerIcon,
    Bars3Icon,
    TruckIcon,
    UsersIcon,
    RectangleGroupIcon,
    XMarkIcon,
    ScaleIcon,
    ArrowLeftOnRectangleIcon,
} from '@heroicons/vue/24/outline'
import { usePage } from '@inertiajs/inertia-vue3'
import { ref } from 'vue'

const navigation = [
    { name: 'Products', href: 'products.index' },
    { name: 'Admin', href: 'admin.products.index' },
]

const smallScreenNavigation = [
    { name: 'Products', href: 'products.index', icon: CreditCardIcon },
    { name: 'Admin', href: 'admin.products.index', icon: BeakerIcon },
]

const userNavigation = [
    { name: 'Notifications', href: '#' },
    { name: 'Your Profile', href: '#' },
    { name: 'Sign out', href: '#' },
]

export default {
    components: {
        Disclosure,
        DisclosureButton,
        DisclosurePanel,
        Menu,
        MenuButton,
        MenuItem,
        MenuItems,
        BellIcon,
        Bars3Icon,
        XMarkIcon,
        ChevronDownIcon,

        CogIcon,
        CircleStackIcon,
        CreditCardIcon,
        KeyIcon,
        BeakerIcon,
        TruckIcon,
        UsersIcon,

        Popover,
        PopoverButton,
        PopoverPanel,

        Dialog,
        DialogOverlay,
        DialogTitle,
        TransitionChild,
        TransitionRoot,
        ArrowLeftOnRectangleIcon,
    },
    setup() {
        const { component } = usePage()
        const open = ref(false)
        const isActive = (url) =>
            component.value.toLowerCase().startsWith(url.toLowerCase())

        return {
            navigation,
            userNavigation,
            isActive,
            smallScreenNavigation,
            open,
        }
    },
}
</script>
