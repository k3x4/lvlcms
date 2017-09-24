@extends('admin.layout.master')

@section('head')
@parent
<link rel="stylesheet" href="{{ asset('js/lib/jquery-colorbox/css/colorbox.css') }}">

        <!-- elFinder CSS (REQUIRED) -->
        <link rel="stylesheet" type="text/css" href="{{ asset('packages/barryvdh/elfinder/css/elfinder.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('packages/barryvdh/elfinder/css/theme.css') }}">
        
        <link rel="stylesheet" href="{{ asset('css/lib/elfinder/win10theme/css/theme.css') }}">
        
        <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>

        <!-- elFinder JS (REQUIRED) -->
        <script src="{{ asset('packages/barryvdh/elfinder/js/elfinder.min.js') }}"></script>
        

            <!-- elFinder translation (OPTIONAL) -->
            <script src="{{ asset('packages/barryvdh/elfinder/js/i18n/elfinder.el.js') }}"></script>


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
                        @if ($productImage)
                            <span class="close" v-show="imgExists" @click="removeImg">&times;</span>
                        @endif
                        <img id="holder" ref="holder" style="max-height:100px;" :src='imgExists' />
                    </div>
                    <span class="input-group-btn">
                        <a data-input="thumbnail" data-preview="holder" class="btn btn-primary lfm">
                            <i class="fa fa-picture-o"></i> Choose
                        </a>
                    </span>
                    {!! Form::hidden('image', $productImageRelative, [
                        'placeholder' => 'File path',
                        'id' => 'thumbnail',
                        'class' => 'form-control',
                        'ref' => 'imageInput'
                        ])
                    !!}
                </div>
                <div class="form-group">
                    <strong>Image:</strong>
                    <div class="img-wrap">
                        @if ($productImage)
                            <span class="close" v-show="imgExists" @click="removeImg">&times;</span>
                        @endif
                        <img id="holder" ref="holder" style="max-height:100px;" :src='imgExists' />
                    </div>
                    {!! Form::hidden('feature_image', $productImageRelative, [
                        'id' => 'feature_image',
                        'class' => 'form-control'
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
                    <div id="elfinder"></div>
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
<script src="{{ asset('packages/barryvdh/elfinder/js/standalonepopup.min.js') }}"></script>
<script type="text/javascript">
            $().ready(function() {
                $('#elfinder').elfinder({
                    // set your elFinder options here

                        lang: 'el', // locale

                    customData: { 
                        _token: '{{ csrf_token() }}'
                    },
                    url : '{{ route("elfinder.connector") }}',  // connector URL
                    soundPath: '{{ asset("packages/barryvdh/elfinder/sounds") }}'
                });
            });
        </script>
@endsection