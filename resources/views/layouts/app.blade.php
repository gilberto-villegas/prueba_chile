<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Sistema de Gestión Interno</title>

    <!-- Global stylesheets -->
    
    <!--link href="../../fonts.googleapis.com/css1381.css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css"-->
    <link href={{asset("global_assets/css/icons/icomoon/styles.css")}} rel="stylesheet" type="text/css">
    <link href={{asset("assets/css/bootstrap.min.css")}} rel="stylesheet" type="text/css">
    <link href={{asset("assets/css/bootstrap_limitless.min.css")}} rel="stylesheet" type="text/css">
    <link href={{asset("assets/css/layout.min.css")}} rel="stylesheet" type="text/css">
    <link href={{asset("assets/css/components.min.css")}} rel="stylesheet" type="text/css">
    <link href={{asset("assets/css/colors.min.css")}} rel="stylesheet" type="text/css">
    <!--mensajria-->
    <link href={{asset("css/sweetalert.css")}} rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->
    </head>
    <body>
        <!-- Main navbar -->
    <div class="navbar navbar-expand-md navbar-dark bg-indigo navbar-static">
        <div class="navbar-brand">
            <a href="index.html" class="d-inline-block">
                <img src="img/logo.gif" alt="cargando..">
            </a>
        </div>

        <div class="d-md-none">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
                <i class="icon-tree5"></i>
            </button>
        </div>

        <div class="collapse navbar-collapse" id="navbar-mobile">
            <ul class="navbar-nav">         </ul>

                <span class="navbar-text ml-md-3">
                    <!--
                    <span class="badge badge-mark border-orange-300 mr-2"></span>
                    Morning, Victoria!
                    -->
                </span>

           
            </ul>
        </div>
    </div>
    <!-- /main navbar -->

    @yield('content')

    
     <!-- Core JS files -->
    <script src={{asset("global_assets/js/main/jquery.min.js")}}></script>
    <script src={{asset("global_assets/js/main/bootstrap.bundle.min.js")}}></script>
    <script src={{asset("global_assets/js/plugins/loaders/blockui.min.js")}}></script>
    <script src={{asset("global_assets/js/plugins/ui/ripple.min.js")}}></script>
    <!-- /core JS files -->

    <!-- Theme JS files -->
    <script src={{asset("assets/js/app.js")}}></script>
    <!-- mensajeria -->
    <script src={{asset("js/sweetalert.js")}}></script>

    <!-- Include this after the sweet alert js file -->
    @include('sweet::alert')
    </body>
</html>