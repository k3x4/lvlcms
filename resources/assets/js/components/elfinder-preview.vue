<template>
    <div class="img-wrap">
        <span v-if="imgPath.length" class="close" @click="imgPath = ''">&times;</span>
        <img v-if="existsPath.length" :src="existsPath" id="holder" style="max-height:100px;" />
        <img v-else :src="basePath + '/' + imgPath" id="holder" style="max-height:100px;" />
    </div>
</template>

<script>
    export default {

        data: {
            imgPath: null,
            existsPath: null,
            basePath: null
        }

    }
</script>
