<template>
    <div class="min-h-full bg-gray-100">
        <MainMenu />
        <section class="max-w-6xl mx-auto px-2 sm:px-6 lg:px-8 pb-20 sm:pb-10">
            <slot />
        </section>
    </div>
</template>

<script>
import MainMenu from '@layouts/MainMenu'

export default {
    name: 'Default',

    components: {
        MainMenu,
    },
}
</script>
