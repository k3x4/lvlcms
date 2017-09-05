@extends('admin.layout.master')

@section('title', 'Admin panel')

@section('head')
@parent
<link rel="stylesheet" href="{{ asset('adminlte/dist/css/skins/skin-blue.min.css') }}">
@endsection

@section('body_classes', 'hold-transition skin-blue sidebar-mini')

@section('content')

<div class="wrapper">

    @include('admin.layout.partials.header')

    @include('admin.layout.partials.sidebar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Page Header
                <small>Optional description</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
                <li class="active">Here</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <div class='row'>
                <div class='col-md-6'>
                    <!-- Box -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Randomly Generated Tasks</h3>
                            <div class="box-tools pull-right">
                                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                                <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                            </div>
                        </div>
                        <div class="box-body">
                            @foreach($tasks as $task)
                            <h5>
                                {{ $task['name'] }}
                                <small class="label label-{{$task['color']}} pull-right">{{$task['progress']}}%</small>
                            </h5>
                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-{{$task['color']}}" style="width: {{$task['progress']}}%"></div>
                            </div>
                            @endforeach

                        </div><!-- /.box-body -->
                        <div class="box-footer">
                            <form action='#'>
                                <input type='text' placeholder='New task' class='form-control input-sm' />
                            </form>
                        </div><!-- /.box-footer-->
                    </div><!-- /.box -->
                </div><!-- /.col -->
                <div class='col-md-6'>
                    <!-- Box -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Second Box</h3>
                            <div class="box-tools pull-right">
                                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                                <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                            </div>
                        </div>
                        <div class="box-body">
                            A separate section to add any kind of widget. Feel free
                            to explore all of AdminLTE widgets by visiting the demo page
                            on <a href="https://almsaeedstudio.com">Almsaeed Studio</a>.
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
                </div><!-- /.col -->

            </div><!-- /.row -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    
    @include('admin.layout.partials.footer')

    @include('admin.layout.partials.control_sidebar')

</div>
<!-- ./wrapper -->

@endsection

@section('footer_scripts')
@parent
<!-- AdminLTE App -->
<script src="{{ asset('adminlte/dist/js/app.min.js') }}"></script>
@endsection