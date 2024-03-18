@extends('site.layouts.master')
@section('content')
    <div class="page-content">
        <section class="page-head">
            <div class="container">
                <div class="row text-center">
                    <div class="col">
                        <h1 class="main_heading" data-aos="fade-down"
                            data-aos-delay="100"> {{app()->getLocale() == 'en' ? 'Partners' : 'شركاء النجاح'}} </h1>
                        <ul class="breadcrumb">
                            <li>
                                <a href="{{route('site.index')}}">
                                    <i class="fa fa-home"></i>
                                    {{app()->getLocale() == 'en' ? 'Home' : 'الرئيسيه'}}
                                </a>
                            </li>
                            <li class="active"> {{app()->getLocale() == 'en' ? 'Partners' : 'شركاء النجاح'}} </li>
                        </ul>
                    </div>
                </div><!--End Row-->
            </div><!--end Container-->
        </section><!--End Section-->
        <!-- Section
        ================================-->
        <section>
            <div class="container">
                <div class="row text-center">
                    <div class="col">
                        <div class="about-content">
                            <div class="main_heading" data-aos="fade-down"
                                 data-aos-delay="50">{{$section->translations->first()->partners_title}}</div>
                            <p class="text" data-aos="fade-down"
                               data-aos-delay="100">{{$section->translations->first()->partners_description}}</p>

                        </div>
                    </div>
                </div><!--End Row-->
                <div class="row text-center" id="partners-area">
                    @include('site.pages.partners.templates.partners')
                </div><!--End Row-->
                <div class="w-100"></div>
                <div class="row text-center" data-aos="fade-down" data-aos-delay="700">
                    <button class="custom-btn" id="load-more-button"
                            data-last="{{$partners->lastPage()}}"
                            data-count="{{$partners->currentPage()}}">
                        {{app()->getLocale() == 'en' ? 'load more' : 'المزيد'}} <i
                                class="fa fa-long-arrow-alt-right"></i>
                    </button>
                </div>
            </div><!--End Container-->
            <span class="section_hint"> {{app()->getLocale() == 'en' ? 'Partners' : 'شركاء النجاح'}} </span>
        </section><!--End Section-->
        <!-- Section
        ================================-->
        <section class="section-color">
            <div class="container">
                <div class="row white-bc">
                    <div class="col-lg-4">
                        <h3 class="main_heading" data-aos="fade-down" data-aos-delay="50">
                            {{app()->getLocale() == 'en' ? 'What our customers say about us' : 'ماذا يقول عملاؤنا عنا'}}
                        </h3>
                    </div>
                    <div class="col-lg-8" data-aos="fade-down" data-aos-delay="100">
                        <div class="owl-carousel owl-theme testimonials">
                            @foreach($testimonials as $testimonial)
                                <div class="item">
                                    <div class="testimonial">
                                        <p class="text">
                                            <i class="fa fa-quote-left"></i>{{$testimonial->translations->first()->description}}
                                            <i class="fa fa-quote-right"></i>
                                        </p>
                                        <div class="user">
                                            <img src="{{asset('storage/app/testimonials/'.$testimonial->image)}}">
                                            <span> {{$testimonial->translations->first()->name}}</span>
                                            <span> {{$testimonial->translations->first()->position}}</span>
                                        </div>
                                    </div>
                                </div><!--End Item-->
                            @endforeach
                        </div><!--End OWL-->
                    </div><!--End col-->
                </div><!--End Row-->
            </div><!--End Container-->
            <span class="section_hint"> {{app()->getLocale() == 'en' ? 'Testimonial' : 'اراء العملاء'}} </span>
        </section><!--End Section-->
    </div>
@endsection
@section('js')
    <script>
        //load more button
        $(document).on('click', '#load-more-button', function () {

            var button = $(this);
            var url = "{{url()->current()}}";
            var last_page = parseInt($(this).attr('data-last'));
            var counter = parseInt($(this).attr('data-count')) + 1;

            $.ajax({
                url: url,
                method: 'GET',
                data: {page: counter, _token: $('input[name="_token"]').val()},
                success: function (response) {
                    button.attr('data-count', counter);
                    if (counter + 1 > last_page) {
                        button.css('display', 'none');
                    }
                    $('#partners-area').append(response);

                }
            });
            return false;
        });

    </script>
@endsection