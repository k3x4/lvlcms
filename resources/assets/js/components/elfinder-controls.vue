<template>
<div>
    <elfinder-preview v-if="preview" :exists="exists" :base="base" :img-path="imgPath" @pathCleared="imgPath = ''"></elfinder-preview>
    <elfinder-button :input="name"></elfinder-button>
    <input :id="name" type="hidden" :name="name" :value="exists" v-model="imgPath" />
</div>
</template>

<script>
    export default {
        
        data() {
            return {
                preview: true,
                imgPath: ''
            }
        },

        props: {
            name: {
                default: '',
                required: true
            },
            exists: {
                default: ''
            },
            base: {
                default: '',
                required: true
            }
        }

    }
</script>
