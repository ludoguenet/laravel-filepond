<script setup>
import {ref} from "vue";
import axios from "axios";

const sendForm = async () => {
    await axios.post('/api/send-form')
        .then((res) => {
            console.log(res);
        })
        .catch((err) => {
            console.log(err)
        });
}
</script>

<template>
    <form
        id="app"
        v-on:submit.prevent="sendForm"
    >


        <p>
            <input
                type="submit"
                value="Submit"
            >
        </p>
    </form>
</template>
