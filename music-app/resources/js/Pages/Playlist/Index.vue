<template>

    <MusicLayout>

        <template #title>
            List of playlists
        </template>

        <template #action>
            <Link :href="route('playlists.create')" class="bg-blue-300 hover:bg-blue-600 text-white font-bold rounded py-2 px-4">
                Create a playlist
            </Link>
        </template>

        <template #content>
            <table>
                <thead>
                    <tr>
                        <td>#</td>
                        <td>Title</td>
                        <td>Musics number</td>
                        <td>Created at</td>
                        <td>Actions</td>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(playlist, i) in playlists" :key="playlist.uuid">
                        <td>{{ i + 1 }}</td>
                        <td>{{ playlist.title }}</td>
                        <td>{{ playlist.tracks_count }} musics</td>
                        <td>{{ playlist.created_at }}</td>
                        <td>
                            <Link :href="route('playlists.show', { playlist: playlist })" class="bg-blue-300 hover:bg-blue-600 text-white font-bold rounded py-2 px-4">
                                Voir
                            </Link>
                            <Link :href="route('playlists.edit', { playlist: playlist })" class="bg-lime-300 hover:bg-lime-600 text-white font-bold rounded py-2 px-4">
                                Modify
                            </Link>
                            <button @click="deletePlaylist(playlist.uuid)" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                Delete
                            </button>


                        </td>
                    </tr>
                </tbody>
            </table>
        </template>

    </MusicLayout>

</template>

<script>

import MusicLayout from '@/Layouts/MusicLayout.vue';
import { Link } from '@inertiajs/vue3';

export default {
    name: 'Index',
    components: {
        MusicLayout,
        Link
    },
    props: {
        playlists: Array,
    },
    methods: {
        deletePlaylist(playlistId) {
            if (confirm('voulez vous vraiment supprimer cette playlist ?')) {
                this.$inertia.delete(route('playlists.destroy', { playlist: playlistId }), {
                    onSuccess: () => {

                        this.$inertia.reload();

                    }
                });
            }
        }
    }
}

</script>
