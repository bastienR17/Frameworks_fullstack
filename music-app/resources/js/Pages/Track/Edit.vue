<template>

    <MusicLayout>
        <template #title>
            Modify a music
        </template>

        <template #action>
            <Link :href="route('tracks.index')" class="bg-blue-300 hover:bg-blue-600 text-white font-bold rounded py-2 px-4">
                Return
            </Link>
        </template>

        <template #content>
            <form @submit.prevent="submit">
                <div class="mb-3">
                    <label for="title" class="block text-gray-700 text-sm font-bold mb-3">Title</label>
                    <input v-model="form.title" type="text" id="title" placeholder="Title" class="shadow border rounded py-2 px-3 text-gray-700 appearance-none leading-tight focus:outline-none focus:shadow-outline mb-5">
                    <p class="text-red-400 text-xs italic">{{ form.errors.title }}</p>
                </div>

                <div class="mb-3">
                    <label for="artist" class="block text-gray-700 text-sm font-bold mb-3">Artist</label>
                    <input v-model="form.artist" type="text" name="title" id="title" placeholder="Artist" class="shadow border rounded py-2 px-3 text-gray-700 appearance-none leading-tight focus:outline-none focus:shadow-outline mb-5">
                    <p class="text-red-400 text-xs italic">{{ form.errors.artist }}</p>
                </div>

                <div class="mb-3">
                    <label for="display" class="block text-gray-700 text-sm font-bold mb-3">Display</label>
                    <select v-model="form.display" type="text" name="display" id="display" placeholder="display" class="shadow border rounded py-2 px-3 text-gray-700 appearance-none leading-tight focus:outline-none focus:shadow-outline mb-5">
                        <option :value="true">Oui</option>
                        <option :value="false">Non</option>
                    </select>
                    <p class="text-red-400 text-xs italic">{{ form.errors.display }}</p>
                </div>

                <input type="submit" value="Modify a music" class="bg-blue-300 hover:bg-blue-600 rounded py-2 px-4" :disabled="form.processing">

            </form>
        </template>

    </MusicLayout>

</template>

<script>
import MusicLayout from '@/Layouts/MusicLayout.vue';
import { Link } from '@inertiajs/vue3';

export default {
    name: 'Edit',
    components: {
        MusicLayout,
        Link
    },
    props: {
        track: Object,
    },
    data() {
        return {
            form: this.$inertia.form({
                title: this.track.title,
                artist: this.track.artist,
                display: this.track.display ? true : false,
            })
        }
    },
    methods: {
        submit() {
            this.form.put(route('tracks.update', { track: this.track }))
        }
    }
}
</script>
