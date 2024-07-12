<template>

    <MusicLayout>

        <template #title>
            Title Playlist
        </template>

        <template #action>
            <Link :href="route('playlists.index')" class="bg-lime-300 hover:bg-lime-600 text-white font-bold rounded py-2 px-4">
                Return
            </Link>
        </template>

        <template #content>
            <TrackList :tracks="tracks" />
        </template>

    </MusicLayout>

</template>

<script>
import MusicLayout from '@/Layouts/MusicLayout.vue';
import TrackList from '@/Components/Track/TrackList.vue';
import { Link } from '@inertiajs/vue3';

export default {
    name: 'Show',
    components: {
        MusicLayout,
        Link,
        TrackList
    },
    props: {
        playlist: Object,
        tracks: Array,
    }
}
</script>
