<template>
    <span style="display:block;">
        <a href="" :data-inputid="input" class="btn btn-primary popup_selector">
            <i class="fa fa-picture-o"></i> Select Image
        </a>
    </span>
</template>

<script>
    export default {

        props: {
            input: {
                required: true,
                default: '',
            }
        }

    }
</script>
