<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Sobotshane SIC</title>
    <link rel="icon" type="image/x-icon" href="{!! asset('template/src/assets/img/logo.jpg') !!}"/>
    <!-- ENABLE LOADERS -->
    <link href="{!! asset('template/layouts/modern-light-menu/css/light/loader.css') !!}" rel="stylesheet" type="text/css" />
    <link href="{!! asset('template/layouts/modern-light-menu/css/dark/loader.css') !!}" rel="stylesheet" type="text/css" />
    <script src="{!! asset('template/layouts/modern-light-menu/loader.js') !!}"></script>
    <!-- /ENABLE LOADERS -->
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="{!! asset('template/src/bootstrap/css/bootstrap.min.css') !!}" rel="stylesheet" type="text/css" />
    <link href="{!! asset('template/layouts/modern-light-menu/css/light/plugins.css') !!}" rel="stylesheet" type="text/css" />
    <link href="{!! asset('template/layouts/modern-light-menu/css/dark/plugins.css') !!}" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    
    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
       <link href="{!! asset('template/src/assets/css/light/authentication/auth-cover.css') !!}" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    
    
</head>
<body class="layout-boxed" page="starter-pack">

      
        <!--  BEGIN CONTENT AREA  -->
      @yield('content')
        <!--  END CONTENT AREA  -->


    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
 
    <script src="{!! asset('template/src/bootstrap/js/bootstrap.bundle.min.js') !!}"></script>

    <!-- END GLOBAL MANDATORY SCRIPTS -->

</body>
</html>