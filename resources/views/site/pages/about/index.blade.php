@extends('site.layouts.master')
@section('content')
    <div class="page-content">
        <section class="page-head">
            <div class="container">
                <div class="row text-center">
                    <div class="col">
                        <h1 class="main_heading" data-aos="fade-down"
                            data-aos-delay="100"> {{app()->getLocale() == 'en' ? 'About us' : 'من نحن'}} </h1>
                        <ul class="breadcrumb">
                            <li>
                                <a href="{{route('site.index')}}">
                                    <i class="fa fa-home"></i>
                                    {{app()->getLocale() == 'en' ? 'Home' : 'الرئيسيه'}}
                                </a>
                            </li>
                            <li class="active"> {{app()->getLocale() == 'en' ? 'About us' : 'من نحن'}} </li>
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
                    <div class="col-lg-5">
                        <div class="about-img">
                            <img src="{{asset('storage/app/about/'.$about->image)}}">
                            <div class="video-mask">
                                <a class="play_btn popup-youtube mfp-iframe"
                                   href="{{$about->video_link}}"
                                   data-aos="zoom-in" data-aos-delay="50">
                                    <img src="{{asset('public/site/images/play.png')}}">
                                </a>
                                <h3 data-aos="fade-down" data-aos-delay="100">
                                    <span> {{$about->years_of_success}} </span>
                                    <b> {{app()->getLocale() == 'en' ? 'YEARS OF' : 'سنوات من'}} </b>
                                    {{app()->getLocale() == 'en' ? 'SUCCESS WORKS' : 'العمل الناجح'}}.
                                </h3>
                            </div>
                        </div>
                    </div><!--End Col-->
                    <div class="col-lg-7">
                        <div class="about-content">
                            <h3 class="main_heading" data-aos="fade-down"
                                data-aos-delay="250">{{$about->translations->first()->title}}</h3>
                            @php
                                $x = 100;
                            @endphp
                            @foreach(explode("\n" , $about->translations->first()->description) as $item)
                                <p class="text" data-aos="fade-down" data-aos-delay="{{$x}}">{{$item}}</p>
                                @php
                                    $x = $x+50;
                                @endphp
                            @endforeach
                        </div>
                    </div>

                </div><!--End Row-->
            </div><!--End Container-->
            <span class="section_hint"> {{app()->getLocale() == 'en' ? 'About' : 'عنا'}} </span>
        </section><!--End Section-->
        <!-- Section
       ================================-->
        <section>
            <div class="container">
                <div class="row">
                    <div class="col">
                        <ul class="tabs nav nav-pills" id="pills-tab" role="tablist">
                            <li>
                                <a class="nav-link active" data-toggle="pill" href="#tab1">
                                    {{app()->getLocale() == 'en' ? 'Our Tour' : 'رحلتنا'}}
                                </a>
                            </li>
                            <li>
                                <a class="nav-link" data-toggle="pill" href="#tab2">
                                    {{app()->getLocale() == 'en' ? 'Our Mission' : 'مهمتنا'}}
                                </a>
                            </li>
                            <li>
                                <a class="nav-link" data-toggle="pill" href="#tab3">
                                    {{app()->getLocale() == 'en' ? 'Our Vision' : 'رؤيتنا'}}
                                </a>
                            </li>
                            <li>
                                <a class="nav-link" data-toggle="pill" href="#tab4">
                                    {{app()->getLocale() == 'en' ? 'Our Value\'s' : 'قيمنا'}}
                                </a>
                            </li>
                            <li>
                                <a class="nav-link" data-toggle="pill" href="#tab5">
                                    {{app()->getLocale() == 'en' ? 'Our Goals' : 'اهدافنا'}}
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content inner">
                            <div class="tab-pane fade show active" id="tab1" role="tabpanel">
                                <i class="fa fa-quote-left"></i>
                                @foreach(explode("\n" , $about->translations->first()->tour) as $item)
                                    {{$item}}
                                    <div class="w-100"><br></div>
                                @endforeach
                                <i class="fa fa-quote-right"></i>
                            </div>
                            <div class="tab-pane fade" id="tab2" role="tabpanel">
                                <i class="fa fa-quote-left"></i>
                                @foreach(explode("\n" , $about->translations->first()->mission) as $item)
                                    {{$item}}
                                    <div class="w-100"><br></div>
                                @endforeach
                                <i class="fa fa-quote-right"></i>
                            </div>
                            <div class="tab-pane fade" id="tab3" role="tabpanel">
                                <i class="fa fa-quote-left"></i>
                                @foreach(explode("\n" , $about->translations->first()->vision) as $item)
                                    {{$item}}
                                    <div class="w-100"><br></div>
                                @endforeach
                                <i class="fa fa-quote-right"></i>
                            </div>
                            <div class="tab-pane fade" id="tab4" role="tabpanel">
                                <i class="fa fa-quote-left"></i>
                                @foreach(explode("\n" , $about->translations->first()->value) as $item)
                                    {{$item}}
                                    <div class="w-100"><br></div>
                                @endforeach
                                <i class="fa fa-quote-right"></i>
                            </div>
                            <div class="tab-pane fade" id="tab5" role="tabpanel">
                                <i class="fa fa-quote-left"></i>
                                @foreach(explode("\n" , $about->translations->first()->goals) as $item)
                                    {{$item}}
                                    <div class="w-100"><br></div>
                                @endforeach
                                <i class="fa fa-quote-right"></i>
                            </div>
                        </div>
                    </div><!--End col-->
                </div><!--End Row-->
            </div><!--End Container-->
            <span class="section_hint"> {{app()->getLocale() == 'en' ? 'About' : 'عنا'}} </span>
        </section><!--End Section-->
        <!-- Section
        ================================-->
        <section class="section-color">
            <div class="container">
                <div class="row text-center">
                    <div class="col" data-aos="fade-down" data-aos-delay="100">
                        <div class="section-title">
                            <img src="{{asset('public/site/images/logo.png')}}">
                            <div class="main_heading">{{$section->translations->first()->gallery_title}}</div>
                            <p class="text">{{$section->translations->first()->gallery_description}}</p>
                        </div>
                    </div><!--End Col-->
                </div><!--End Row-->
                <ul class="gallery row">
                    @foreach($images as $image)
                    <li data-src="{{asset('storage/app/gallery/'.$image->image)}}"
                        class="gallery-item col-lg-3 col-md-4 col-sm-6" data-aos="fade-down" data-aos-delay="50">
                        <img class="shadow" src="{{asset('storage/app/gallery/'.$image->image)}}">
                        <div class="hover">
                            <i class="fa fa-link"></i>
                        </div>
                    </li>
                    @endforeach

                </ul>
            </div><!--End Container-->
            <span class="section_hint"> {{app()->getLocale() == 'en' ? 'Gallery' : 'معرض الصور'}} </span>
        </section><!--End Section-->
    </div>
@endsection