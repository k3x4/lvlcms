<template>
    <div class="img-wrap">
        <span v-if="imgPath.length || exists.length" class="close" @click="clearPath">&times;</span>
        <img v-if="exists.length" :src="exists" id="holder" style="max-height:100px;" />
        <img v-else-if="imgPath.length" :src="base + '/' + imgPath" id="holder" style="max-height:100px;" />
        <img v-else src="" id="holder" style="max-height:100px;" />
    </div>
</template>

<script>
    export default {

        props: {
            imgPath: {
                default: '',
                required: true
            },
            exists: {
                default: ''
            },
            base: {
                default: ''
            }
        },

        methods: {
            clearPath: function() {
                this.$emit('pathCleared');
            }
        }

    }
</script>
