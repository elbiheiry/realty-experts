@extends('site.layouts.master')
@section('content')
    <div class="page-content">
        <section class="page-head">
            <div class="container">
                <div class="row text-center">
                    <div class="col">
                        <h1 class="main_heading" data-aos="fade-down"
                            data-aos-delay="100"> {{app()->getLocale() == 'en' ? 'contact us' : 'تواصل معنا'}} </h1>
                        <ul class="breadcrumb">
                            <li>
                                <a href="{{route('site.index')}}">
                                    <i class="fa fa-home"></i>
                                    {{app()->getLocale() == 'en' ? 'Home' : 'الرئيسيه'}}
                                </a>
                            </li>
                            <li class="active"> {{app()->getLocale() == 'en' ? 'contact us' : 'تواصل معنا'}} </li>
                        </ul>
                    </div>
                </div><!--End Row-->
            </div><!--end Container-->
        </section><!--End Section-->
        <!-- Section
        ================================-->
        <section class="section-color">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <form class="contact_form" method="post" action="{{route('site.contact')}}">
                            @csrf
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="main_heading">
                                        {{app()->getLocale() == 'en' ? 'Don’t Hesitate To Contact Us' : 'لا تتردد في التواصل معنا'}}
                                    </div>
                                    <p class="text">
                                        {{app()->getLocale() == 'en' ? 'Power of choice is untrammelled & when nothing prevents our being able' : 'قوة الاختيار غير مقيدة و لا شيء يمنعنا من ذلك'}}
                                    </p>
                                    <ul class="social">
                                        <li>
                                            <a href="https://www.facebook.com/{{$settings->facebook}}" target="_blank">
                                                <i class="fab fa-facebook"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="https://twitter.com/{{$settings->twitter}}" target="_blank">
                                                <i class="fab fa-twitter"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="https://www.instagram.com/{{$settings->instagram}}/"
                                               target="_blank">
                                                <i class="fab fa-instagram"></i>
                                            </a>
                                        </li>
                                    </ul><!--End Social-->
                                </div>
                                <div class="col-lg-8">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control"
                                                       placeholder="{{app()->getLocale() == 'en' ? 'Name' : 'الاسم بالكامل'}}"
                                                       name="name">
                                                <i class="fa fa-user"></i>
                                            </div>
                                        </div><!--End Col-->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="{{app()->getLocale() == 'en' ? 'Phone Number' : 'رقم الهاتف'}}"
                                                       name="phone">
                                                <i class="fa fa-phone"></i>
                                            </div>
                                        </div><!--End Col-->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control"
                                                       placeholder="{{app()->getLocale() == 'en' ? 'Email Address' : 'البريد الالكتروني'}}"
                                                       name="email">
                                                <i class="fa fa-envelope"></i>
                                            </div>
                                        </div><!--End Col-->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="subject" placeholder="{{app()->getLocale() == 'en' ? 'Subject' : 'العنوان'}}">
                                                <i class="fa fa-tag"></i>
                                            </div>
                                        </div><!--End Col-->
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <textarea class="form-control" placeholder="{{app()->getLocale() == 'en' ? 'Message' : 'الرساله'}}"
                                                          name="message"></textarea>
                                                <i class="fa fa-comment"></i>
                                            </div>
                                        </div><!--End Col-->
                                        <div class="col">
                                            <button class="custom-btn" id="butsave">
                                                {{app()->getLocale() == "en" ? "Send Message" : "ارسال"}} <i class="fa fa-long-arrow-alt-right"></i>
                                            </button>
                                        </div>
                                    </div><!--End Row-->
                                </div><!--End col-->
                            </div><!--End Row-->
                        </form><!--End Form-->
                    </div><!--End Col-->
                </div><!--End Row-->
            </div><!--End Container-->
            <span class="section_hint"> {{app()->getLocale() == 'en' ? 'Contact' : 'تواصل معنا'}} </span>
        </section><!--End Section-->

        @include('site.layouts.contact')
    </div>
@endsection
@section('js')
    <script>
        $(document).on('submit', '.contact_form', function () {
            var form = $(this);
            var url = form.attr('action');
            var formData = new FormData(form[0]);
            $('#butsave').attr('disabled', true).html('{{app()->getLocale() == 'en' ? 'Please wait' : 'برجاء الانتظار'}}');

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
                        $('#butsave').attr('disabled', false).html('{{app()->getLocale() == "en" ? "Send Message" : "ارسال"}} <i class="fa fa-long-arrow-alt-right"></i>');
                        form[0].reset();
                    });
                },
                error: function (jqXHR) {
                    var response = $.parseJSON(jqXHR.responseText);
                    $('#butsave').attr('disabled', false).html('{{app()->getLocale() == "en" ? "Send Message" : "ارسال"}} <i class="fa fa-long-arrow-alt-right"></i>');
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
@endsection