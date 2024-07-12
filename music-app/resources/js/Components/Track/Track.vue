<template>
    <div class="max-w-sm rounded overflow-hidden shadow-lg cursos-pointer" :class="{ 'border border-blue-500': active }">

        <div class="w-full">
            <img :src="`storage/${track.image}`" alt="">
        </div>

        <div class="px-6 py-4">
            <div class="font-bold text-xl mb-2">{{ track.title }}</div>
            <small class="font-gray-500 text-base">{{ track.artist }}</small>
        </div>

        {{$page.props}}
        <button @click="handleClick" class="bg-blue-300 hover:bg-blue-500 text-white font-bold py-2 px-6 rounded w-full m-1">Read</button>
        <Link v-if="$page.props.isAdmin" :href="route('tracks.edit', { track: track })" class="bg-lime-300 hover:bg-lime-500 text-white font-bold py-2 px-6 rounded w-full m-1">Modify</Link>
        <Link v-if="$page.props.isAdmin" as="button" method="delete" :href="route('tracks.destroy', { track: track })" class="bg-red-300 hover:bg-red-500 text-white font-bold py-2 px-6 rounded w-full m-1">Delete</Link>

    </div>
</template>

<script>
import { Link } from '@inertiajs/vue3';

export default {
    name: 'Track',
    components: {
        Link
    },
    emits: ['played'],
    props: {
        track: Array,
        active: {
            type: Boolean,
        },
    },
    methods: {
        handleClick() {
            this.$emit('played', this.track);
            // const url = "storage/" + this.track.music
            // let audio = new Audio(url)
            // audio.play()
        }
    }
}
</script>
