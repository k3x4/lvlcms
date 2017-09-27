<template>
    <span :class="button.class">
        <a href="" :data-inputid="input.name" :class="'btn btn-primary ' + anchor.class">
            <i class="fa fa-picture-o"></i> Select Image
        </a>
    </span>
</template>

<script>
    export default {
        data: {
            input.name: null,
            button.class: null,
            anchor.class: null
        }
    }
</script>
