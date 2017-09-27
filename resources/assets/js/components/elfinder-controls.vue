<template>
    <elfinder-preview v-if="preview"></elfinder-preview>
    <elfinder-button></elfinder-button>
    <input :id="name" :class="class" type="hidden" :name="name" :value="value" v-model="imgPath"
</template>

<script>
    export default {
        
        data() {
            imgPath: null;
        },
        
        props() {
            preview: {
                default: true
            },
            name: {
                required: true,
                default: null,
            },
            class: {
                default: null,
            },
            value: {
                default: null,
            }
        }

    }
</script>
