<template>
    <music-layout></music-layout>
    <div>
        <button @click="createApiKey">Generate API Key</button>
    </div>
    <div>
        <h2>Vos clés API</h2>
        <ul>
            <li v-for="token in tokens" :key="token.id">{{ token.name }} - {{ token.key }}</li>
        </ul>
    </div>
</template>

<script>
import MusicLayout from "@/Layouts/MusicLayout.vue";
import axios from 'axios';

export default {
    name: 'index',
    components: {MusicLayout},
    data() {
        return {
            tokens: [],
            availablePermissions: [],
            defaultPermissions: [],
        }
    },
    methods: {
        async createApiKey() {
            try {
                await this.$inertia.post('/api/keys/store');
                this.fetchApiKeys();
            } catch (error) {
                console.error('pas bon crée', error);
            }
        },
        async fetchApiKeys() {
            try {
                const response = await axios.get('/api/keys');
                this.tokens = response.data;
            } catch (error) {
                console.error('marche po', error);
            }
        }
    },
    mounted() {
        this.fetchApiKeys();
    }
}
</script>
