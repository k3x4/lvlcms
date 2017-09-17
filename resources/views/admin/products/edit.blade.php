@extends('admin.layout.master')

@section('head')
@parent
<script src="{{ asset('vendor/laravel-filemanager/js/lfm.js') }}"></script>
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
                    <strong>Image:</strong><br />
                    <div class="img-wrap">
                        <span class="close">&times;</span>
                        <img id="holder" style="max-height:100px;" src='{{ $productImage }}'><br />
                    </div>    
                    <span class="input-group-btn">
                        <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                            <i class="fa fa-picture-o"></i> Choose
                        </a>
                    </span>
                    {!! Form::hidden('image', $productImageRelative, ['placeholder' => 'File path', 'id' => 'thumbnail', 'class' => 'form-control']) !!}
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
<script>
$(document).ready(function () {

    $('#lfm').filemanager('image');
    
    $('.img-wrap .close').on('click', function() {
        $('#holder').attr('src', '');
        $('#thumbnail').val('');
    });

});
</script>
@endsection