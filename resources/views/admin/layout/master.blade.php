<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>

@include('admin.layout.partials.head')
    
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

   @include('admin.layout.partials.header')
  
   @include('admin.layout.partials.sidebar')

   @include('admin.layout.partials.content')

   @include('admin.layout.partials.footer')

   @include('admin.layout.partials.control_sidebar')
   
</div>
<!-- ./wrapper -->

@include('admin.layout.partials.footer_scripts')

</body>
</html>