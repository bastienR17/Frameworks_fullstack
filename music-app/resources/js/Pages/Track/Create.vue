<template>

    <MusicLayout>
        <template #title>
            Create my music
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
                    <label for="display" class="block w-full text-gray-700 text-sm font-bold mb-3">Display</label>
                    <select v-model="form.display" type="text" name="display" id="display" placeholder="display" class="shadow border rounded py-2 px-3 text-gray-700 appearance-none leading-tight focus:outline-none focus:shadow-outline mb-5">
                        <option :value="true">YES</option>
                        <option :value="false">NON</option>
                    </select>
                    <p class="text-red-400 text-xs italic">{{ form.errors.display }}</p>
                </div>

                <div class="mb-3">
                    <label for="image" class="block text-gray-700 text-sm font-bold mb-3">Image</label>
                    <input @input="form.image = $event.target.files[0]" type="file" name="image" id="image">
                    <p class="text-red-400 text-xs italic">{{ form.errors.image }}</p>
                </div>

                <div class="mb-3">
                    <label for="audio" class="block text-gray-700 text-sm font-bold mb-3">Music</label>
                    <input @input="form.music = $event.target.files[0]" type="file" name="music" id="music">
                    <p class="text-red-400 text-xs italic">{{ form.errors.music }}</p>
                </div>

                <input type="submit" value="Create music" class="bg-blue-700 hover:bg-blue-300 text-white rounded py-2 px-4"
                       :class="[form.processing ? 'bg-gray-500' : 'bg-blue-300 hover:bg-blue-600']" :disabled="form.processing">

            </form>

        </template>

    </MusicLayout>

</template>

<script>
import MusicLayout from '@/Layouts/MusicLayout.vue';
import { Link } from '@inertiajs/vue3';

export default {
    name: 'Create',
    components: {
        MusicLayout,
        Link
    },
    data() {
        return {
            form: this.$inertia.form({
                title: '',
                artist: '',
                image: null,
                music: null,
                display: true,
            })
        }
    },
    methods: {
        submit() {
            this.form.post(route('tracks.store'))
        }
    }
}
</script>
