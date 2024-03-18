<!DOCTYPE html>
<html>
    <head>
        <!-- Meta Tags
        ======================-->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="author" content="">
    
        <!-- Title Name
        ================================-->
        <title> Realty Experts Consultancy </title>
    
        <!-- Fave Icons
        ================================-->
        <link rel="shortcut icon" href="{{asset('public/admin/images/fav-icon.png')}}">
    
        <!-- Google Web Fonts 
        ===========================-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,600" rel="stylesheet">
    
        <!-- Css Base And Vendor 
        ===================================-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
              media="all">
        <link rel="stylesheet" href="{{asset('public/admin/vendor/datepicker/jquery.datetimepicker.min.css')}}">
        <link rel="stylesheet" href="{{asset('public/admin/vendor/jquery-ui/jquery-ui.min.css')}}">
        <link rel="stylesheet" href="{{asset('public/admin/vendor/animation/animate.css')}}">
    
        <!-- Site Css
        ====================================-->
        <link rel="stylesheet" href="{{asset('public/admin/css/style.css')}}">
        <link rel="stylesheet" href="{{asset('public/admin/css/theme/default-theme.css')}}">

        @yield('css')

        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        @yield('models')
        <div id="wrapper">
            <div class="main">
                @include('admin.layouts.sidebar')
                <div class="page-content">
                    @include('admin.layouts.header')
                    @yield('content')
                </div>
            </div><!--End Main-->
        </div><!--End wrapper-->
        
        <!-- JS Base And Vendor 
        ===================================-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="{{asset('public/admin/vendor/owl.carousel/owl.carousel.min.js')}}"></script>
        <script src="{{asset('public/admin/vendor/datepicker/jquery.datetimepicker.full.min.js')}}"></script>
        <script src="{{asset('public/admin/vendor/jquery-ui/jquery-ui.min.js')}}"></script>
        <script src="{{asset('public/admin/vendor/count-to/jquery.countTo.js')}}"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.15/datatables.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/dataTables.buttons.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/buttons.flash.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script type="text/javascript" src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/pdfmake.min.js"></script>
        <script type="text/javascript" src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/vfs_fonts.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/buttons.html5.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/buttons.print.min.js"></script>
        
        <!--JS Main
        ====================================-->
        <script src="{{asset('public/admin/js/main.js')}}"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="{{asset('public/admin/vendor/tinymce/js/tinymce/tinymce.min.js')}}"></script>
        <script src="{{asset('public/admin/js/admin.js')}}"></script>

        @yield('js')
    </body>
</html>