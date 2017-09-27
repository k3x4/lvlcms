<template>
    <div class="img-wrap">
        <span v-if="imgPath.length" class="close" @click="imgPath = ''">&times;</span>
        <img v-if="path.exists.length" :src="path.exists" id="holder" style="max-height:100px;" />
        <img v-else :src="path.base + '/' + imgPath" id="holder" style="max-height:100px;" />
    </div>
</template>

<script>
    export default {

        data() {
            imgPath: null
        },

        props() {
            path.exists: {
                default: null
            },
            path.base: {
                default: null
            }
        }

    }
</script>
