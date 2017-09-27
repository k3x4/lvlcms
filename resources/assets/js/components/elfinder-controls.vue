<template>
    <elfinder-preview v-if="preview"></elfinder-preview>
    <elfinder-button></elfinder-button>
    <input :id="name" :class="class" type="hidden" :name="name" :value="value" v-model="imgPath"
</template>

<script>
    export default {
        
        data: {
            name: null,
            class: null,
            value: null,
            imgPath: null;
        },
        
        props: {
            preview: {
                default: true
            }
        }
    }
</script>
