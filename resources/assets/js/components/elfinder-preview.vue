<template>
    <div class="img-wrap">
        <span v-if="imgPath.length" class="close" @click="imgPath = ''">&times;</span>
        @if ($productImage)                      
            <img src="{{ $productImage }}" id="holder" ref="holder" style="max-height:100px;" />
        @else
            <img v-if="imgPath.length" :src="'{{ url('images') }}' + '/' + imgPath" id="holder" ref="holder" style="max-height:100px;" />
        @endif 
    </div>
    {!! Form::hidden('feature_image', $productImageRelative, [
                        'id' => 'feature_image',
                        'class' => 'form-control',
                        'v-model' => 'imgPath'
                        ])
    !!}
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
