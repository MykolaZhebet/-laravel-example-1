<script setup>
import { ref } from "vue";
import axios from 'axios';
//API call Trigger by button
const responseRef = ref('default value');

const triggerEndpoint = async () => { 
    try {
        let response = await axios.get('/api/hello');
        responseRef.value = response.data.message;
    } catch (error) { 
        console.log(error);
    }

}
//API call Trigger by button
</script>
<template>
    <div>
        <h2>Home page</h2>
        <router-link to="/vue/test">Test page link</router-link>
        <button @click.prevent="triggerEndpoint">Trigger BE API request</button>
        <p v-if="responseRef">Response will be here: {{ responseRef }}</p>
    </div>
</template>