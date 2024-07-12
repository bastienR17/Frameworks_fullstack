
<template>

   <music-layout>

   </music-layout>

    <div>

        <button @click="createApiKey">Generate API Key</button>


    </div>
</template>


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
    methods: {
        createApiKey() {
            this.$inertia.post('/api/keys/store').then(() => {
                // Handle success, e.g., show a message or refresh the list of API keys.
            }).catch(error => {
                console.error('Error creating API key:', error);
            });
        }
    }
}
</script>
