@extends('admin.layout.master')

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
    <div class="col-lg-12 margin-tb">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Edit Product <strong>{{ $product->title }}</strong></h3>
            </div>
            {!! Form::model($product, ['method' => 'PATCH','route' => ['admin.products.update', $product->id]]) !!}
            <div class="box-body">
                <div class="form-group">
                    <strong>Title:</strong>
                    {!! Form::text('title', null, array('placeholder' => 'Title','class' => 'form-control')) !!}
                </div>
                <div class="form-group media-manager">
                    <media-modal v-if="showMediaManager" @media-modal-close="showMediaManager = false">
                        <media-manager
                            :is-modal="true"
                            :selected-event-name="product-image"
                            @media-modal-close="showMediaManager = false"
                            >
                        </media-manager>
                    </media-modal>

                    <button type="button" @click="showMediaManager = true">
                        Show Media Manager
                    </button>
                </div>
                <div class="form-group">
                    <strong>Description:</strong>
                    {!! Form::textarea('description', null, array('placeholder' => 'Description','class' => 'form-control tinymce-textarea','style'=>'height:100px')) !!}
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
    window.Laravel = {!! json_encode(['csrfToken' => csrf_token()]) !!}
    new Vue({
        el: '.media-manager',
        data: {
            showMediaManager: false,
        },
        mounted(){
            window.eventHub.$on('media-manager-selected-product-image', function (file) {
                // Do something with the file info...
                console.log(file.name);
                console.log(file.mimeType);
                console.log(file.relativePath);
                console.log(file.webPath);

                // Hide the Media Manager...
                this.showMediaManager = false;
            });
        }
    });
</script>
@endsection