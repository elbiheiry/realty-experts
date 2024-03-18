<html lang="en">
<head>
    <!-- Meta Tags
    ======================-->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="">
    <meta name="copyright" content="">
    <title> Realty Experts Consultancy </title>

    <!-- Fave Icons
    ================================-->
    <link rel="shortcut icon" href="{{asset('public/site/images/fav-icon.png')}}">

    <!-- CSS Files
    ================================-->
    <link rel="stylesheet" href="{{asset('public/site/vendor/bootstrap/bootstrap.min.css')}}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
          integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('public/site/vendor/owl.carousel/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('public/site/vendor/popup/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('public/site/vendor/light_gallery/lightgallery.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/site/vendor/aos/aos.css')}}">
    <link rel="stylesheet" href="{{asset('public/site/css/style.css')}}">
    @if(app()->getLocale() == 'ar')
        <link rel="stylesheet" href="{{asset('public/site/css/rtl.css')}}">
    @endif
</head>
<body>
@include('site.layouts.header')
@yield('content')
@include('site.layouts.footer')
<div class="copyrights">
    <button class="up-btn">
        <i class="fa fa-arrow-up"></i>
    </button>
    {{app()->getLocale() == 'en' ? 'COPYRIGHT © 2020, Realty Experts Consultancy , ALL RIGHTS RESERVED.' : 'حقوق الطبع والنشر © 2020 ، Realty Experts Consultancy ، جميع الحقوق محفوظة.'}}
</div>
<!-- Start Loader
====================================-->
<div class="loader">
    <div class="loader-inner">
        <img src="{{asset('public/site/images/logo_golden.png')}}">
        <div class="square-wrap">
            <div class="square"></div>
            <div class="square"></div>
            <div class="center"></div>
        </div>
    </div>
</div><!--End Loader-->
<!-- JS & Vendor Files
==========================================-->
<script src="{{asset('public/site/vendor/jquery/jquery.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="{{asset('public/site/vendor/bootstrap/bootstrap.min.js')}}"></script>
<script src="{{asset('public/site/vendor/owl.carousel/owl.carousel.js')}}"></script>
<script src="{{asset('public/site/vendor/popup/magnific-popup.js')}}"></script>
<script src="{{asset('public/site/vendor/light_gallery/lightgallery.min.js')}}"></script>
<script src="{{asset('public/site/vendor/aos/aos.js')}}"></script>
<script src="{{asset('public/site/js/main.js')}}"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    $(window).on("load", function () {
        if ($(window).width() > 991.9) {
            AOS.init({
                offset: 20,
                duration: 500,
                easing: 'ease-in-out'
            });
        }
        ;
    });
    $(document).on('submit', '.newsletters', function () {
        var form = $(this);
        var url = form.attr('action');
        var formData = new FormData(form[0]);
        $('.save-btn').attr('disabled' , true).html('{{app()->getLocale() == 'en' ? 'Please wait' : 'برجاء الانتظار'}}');

        $.ajax({
            url: url,
            method: 'POST',
            dataType: 'json',
            data: formData,
            contentType: false,
            cache: false,
            processData: false,
            success: function (response) {
                swal({
                    title: "{{app()->getLocale() == 'en' ? 'Good job!' : 'تم بنجاح'}}",
                    text: response,
                    icon: "success",
                    button: "{{app()->getLocale() == 'en' ? 'Ok' : 'تاكيد'}}"
                }).then(function (value) {
                    $('.save-btn').attr('disabled' , false).html('{{app()->getLocale() == "en" ? "Subscribe Now" : "اشترك الان"}} <i class="fa fa-envelope"></i>');
                    form[0].reset();
                });
            },
            error: function (jqXHR) {
                var response = $.parseJSON(jqXHR.responseText);
                $('.save-btn').attr('disabled' , false).html('{{app()->getLocale() == "en" ? "Subscribe Now" : "اشترك الان"}} <i class="fa fa-envelope"></i>');
                swal({
                    title: "{{app()->getLocale() == 'en' ? 'Error' : 'خطا'}}",
                    text: response,
                    icon: "error",
                    button: "{{app()->getLocale() == 'en' ? 'Ok' : 'تاكيد'}}"
                });
            }
        });

        $.ajaxSetup({
            headers:
                {
                    'X-CSRF-Token': $('input[name="_token"]').val()
                }
        });
        return false;
    });
</script>
@yield('js')
</body>
</html>