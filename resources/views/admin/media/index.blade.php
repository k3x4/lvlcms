@extends('admin.layout.master')

@section('head')
@parent
        <!-- elFinder CSS (REQUIRED) -->
        <link rel="stylesheet" type="text/css" href="{{ asset('packages/barryvdh/elfinder/css/elfinder.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('packages/barryvdh/elfinder/css/theme.css') }}">
 
        <link rel="stylesheet" href="{{ asset('css/lib/elfinder/win10theme/css/theme.css') }}">
        
        <link rel="stylesheet" type="text/css" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.8.23/themes/smoothness/jquery-ui.css">
        <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>

        <!-- elFinder JS (REQUIRED) -->
        <script src="{{ asset('packages/barryvdh/elfinder/js/elfinder.min.js') }}"></script>
        <script src="{{ asset('packages/barryvdh/elfinder/js/i18n/elfinder.el.js') }}"></script>

@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Media files</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div id="elfinder"></div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
                
            </div>
        </div>
        <!-- /.box -->
    </div>
</div>            
@endsection

@section('footer_scripts')
@parent
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