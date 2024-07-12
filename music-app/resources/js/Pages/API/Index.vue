

<script>
import ApiTokenManager from '@/Pages/API/Partials/ApiTokenManager.vue';
import AppLayout from '@/Layouts/AppLayout.vue';
import Track from "@/Components/Track/Track.vue";
import {Link} from "@inertiajs/vue3";
import MusicLayout from "@/Layouts/MusicLayout.vue";


export default {
    name: 'index',
    components: {MusicLayout},

    data() {
        return {
            tokens: Array,
            availablePermissions: Array,
            defaultPermissions: Array,
        }
    },
}
</script>

<template>

    <MusicLayout>

        <template #title>
            vos clés api
        </template>


        <template #content>
            <table>

              
            </table>
        </template>

    </MusicLayout>

</template>
