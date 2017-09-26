@extends('admin.layout.master')

@section('head')
@parent
<link rel="stylesheet" href="{{ asset('js/lib/jquery-colorbox/css/colorbox.css') }}">
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12 margin-bottom">
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('admin.products.index') }}"> Back</a>
        </div>
    </div>
</div>
@if (count($errors) > 0)
<div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="row">
    <div class="col-lg-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Edit Product <strong>{{ $product->title }}</strong></h3>
            </div>
            {!! Form::model($product, ['method' => 'PATCH','route' => ['admin.products.update', $product->id]]) !!}
            <div class="box-body">
                <div class="form-group">
                    <strong>Title:</strong>
                    {!! Form::text('title', null, ['placeholder' => 'Title','class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    <strong>Image:</strong>
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
                    <span class="input-group-btn">
                        <a href="" data-inputid="feature_image" class="btn btn-primary popup_selector">
                            <i class="fa fa-picture-o"></i> Select Image
                        </a>
                    </span>
                </div>    
                <div class="form-group">
                    <strong>Description:</strong>
                    {!! Form::textarea('description', null, ['placeholder' => 'Description','class' => 'form-control tinymce-textarea','style'=>'height:100px']) !!}
                </div>
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection

@section('footer_scripts')
@parent
<script src="{{ asset('js/lib/jquery-colorbox/js/jquery.colorbox-min.js') }}"></script>
<script src="{{ asset('packages/barryvdh/elfinder/js/standalonepopup.k3x4.js') }}"></script>
<script>
    new Vue({
        el: '.content',
        data: {
            imgPath: ''
        },
        /*mounted: function () {
            this.cropCheck = this.$refs.cropField.checked
        }*/
    });
</script>
@endsection