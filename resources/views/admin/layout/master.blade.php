<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Admin panel | @yield('page_title') - @yield('page_description')</title>

        @section('head')

        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.6 -->
        <link rel="stylesheet" href="{{ asset('adminlte/bootstrap/css/bootstrap.min.css') }}">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{ asset('adminlte/dist/css/AdminLTE.min.css') }}">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        
        <link rel="stylesheet" href="{{ asset('adminlte/dist/css/skins/skin-blue.min.css') }}">

        @show

    </head>

    <body class="hold-transition skin-blue sidebar-mini">
        
        <div class="wrapper">

            @include('admin.layout.partials.header')

            @include('admin.layout.partials.sidebar')
            
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>@yield('page_title') <small>@yield('page_description')</small></h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
                        <li class="active">Here</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
        
                    @yield('content')
                    
                </section>
                <!-- /.content -->    
            
            </div>
            <!-- /.content-wrapper -->
    
            @include('admin.layout.partials.footer')

            @include('admin.layout.partials.control_sidebar')

        </div>
        <!-- ./wrapper -->

        @include('admin.layout.partials.footer_scripts')

    </body>
</html>