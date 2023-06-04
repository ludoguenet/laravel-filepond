<script setup>
import {ref} from "vue";
import vueFilePond, { setOptions } from "vue-filepond";
import "filepond/dist/filepond.min.css";
import "filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.css";
import FilePondPluginFileValidateType from "filepond-plugin-file-validate-type";
import FilePondPluginImagePreview from "filepond-plugin-image-preview";
import axios from "axios";

const FilePond = vueFilePond(
    FilePondPluginFileValidateType,
    FilePondPluginImagePreview
);

const gallery = ref([]);

const handleFilePondInit = () => {
    console.log("FilePond has initialized");

    setOptions({
        server: {
            url: '/filepond',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            },
        },
    });
}

const handleProcessFile = (error, file) => {
    gallery.value.push(file.serverId);
    console.log(gallery);
}

const sendForm = async () => {
    await axios.post('/api/send-form', {
        gallery: gallery.value,
    })
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

        <file-pond
            name="test"
            ref="pond"
            label-idle="Drop files here..."
            v-bind:allow-multiple="true"
            accepted-file-types="image/jpeg, image/png"
            v-on:processfile="handleProcessFile"
            v-on:init="handleFilePondInit"
        />


        <p>
            <input
                type="submit"
                value="Submit"
            >
        </p>
    </form>
</template>
