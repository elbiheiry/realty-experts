@extends('site.layouts.master')
@section('content')
    <!-- Page Contaent
================================-->
    <div class="page-content">
        <section class="main_section">
            <div class="container">
                <div class="row text-center">
                    <div class="col">
                        <h1 class="main_heading" data-aos="fade-down"
                            data-aos-delay="100">{!! $section->translations->first()->first_section_title !!}</h1>
                        <h3 class="head_title" data-aos="fade-down" data-aos-delay="200">
                            “ {{$section->translations->first()->first_section_slogan}} ”</h3>
                        <p class="text" data-aos="fade-down" data-aos-delay="300">
                            {{$section->translations->first()->first_section_description}}
                        </p>
                    </div>
                </div><!--End Row-->
            </div><!--end Container-->
            <ul class="social" data-aos="zoom-in" data-aos-delay="400">
                <li>
                    <a href="https://www.facebook.com/{{$settings->facebook}}" target="_blank">
                        <i class="fab fa-facebook"></i>
                        <span>{{$settings->facebook}}</span>
                    </a>
                </li>
                <li>
                    <a href="https://twitter.com/{{$settings->twitter}}" target="_blank">
                        <i class="fab fa-twitter"></i>
                        <span>{{$settings->twitter}}</span>
                    </a>
                </li>
                <li>
                    <a href="https://www.instagram.com/{{$settings->instagram}}/" target="_blank">
                        <i class="fab fa-instagram"></i>
                        <span>{{$settings->instagram}}</span>
                    </a>
                </li>
            </ul><!--End Social-->
            <a href="#next" class="scroll">
                <div class="chevron"></div>
                <div class="chevron"></div>
                <div class="chevron"></div>
                <span class="text">{{app()->getLocale() == 'en' ? 'Scroll down' : 'الي اسفل '}}</span>
            </a>
        </section><!--End Section-->
        <!-- Section
        ================================-->
        <section id="next">
            <div class="container">
                <div class="row text-center">
                    <div class="col" data-aos="fade-down" data-aos-delay="100">
                        <div class="section-title">
                            <img src="{{asset('public/site/images/logo.png')}}">
                            <div class="main_heading"> {{$section->translations->first()->projects_title}}</div>
                            <p class="text">{{$section->translations->first()->projects_description}}</p>
                        </div>
                    </div><!--End col-->
                    @if(sizeof($projects) > 0)
                        <div class="w-100"></div>
                        <div class="col">
                            <div class="main-project shadow">
                                <div class="row">
                                    <div class="col-lg-7 cover" data-aos="fade-down" data-aos-delay="50">
                                        <img src="{{asset('storage/app/projects/'.$projects[0]->image)}}">
                                        @if($projects[0]->video_link)
                                        <a class="play_btn popup-youtube mfp-iframe"
                                           href="{{$projects[0]->video_link}}">
                                            <img src="{{asset('public/site/images/play.png')}}">
                                        </a>
                                        @endif
                                    </div>
                                    <div class="col-lg-5 content">
                                        <h3 class="head-title" data-aos="fade-down"
                                            data-aos-delay="100"> {{$projects[0]->translations->first()->name}} </h3>
                                        
                                        <ul data-aos="fade-down" data-aos-delay="200">
                                            <li>
                                                <i class="fa fa-map-marker"></i> <span>{{app()->getLocale() == 'en' ? 'Region' : 'المنطقه'}}</span>
                                                 {{$projects[0]->region->translate(app()->getLocale())->name}}
                                            </li>
                                            <li>
                                                <i class="fa fa-tag"></i> <span>{{app()->getLocale() == 'en' ? 'Category' : 'القسم'}}</span>
                                                 {{$projects[0]->category->translate(app()->getLocale())->name}}
                                            </li>
                                            @if($projects[0]->translations->first()->developer_company)
                                            <li>
                                                <i class="fa fa-link"></i> <span>{{app()->getLocale() == 'en' ? 'Developer Company' : 'الشركه المطوره'}}</span>
                                                 {{$projects[0]->translations->first()->developer_company}}
                                            </li>
                                            @endif
                                            @if($projects[0]->translations->first()->indirect_sales)
                                            <li>
                                                <i class="fa fa-user"></i>
                                                <span>{{app()->getLocale() == 'en' ? 'Indirect Sales' : 'المبيعات غير المباشرة'}}</span>
                                                 {{$projects[0]->translations->first()->indirect_sales}}
                                            </li>
                                            @endif
                                            @if($projects[0]->min_price && $projects[0]->max_price)
                                            <li>
                                                <i class="fa fa-dollar-sign"></i>
                                                 <span>{{app()->getLocale() == 'en' ? 'Price' : 'السعر'}} : </span> {{$projects[0]->min_price}}  : {{$projects[0]->max_price}}
                                            </li>
                                            @endif
                                            @if($projects[0]->min_space && $projects[0]->max_space)
                                            <li>
                                                <i class="fa fa-expand"></i>
                                                <span>{{app()->getLocale() == 'en' ? 'Space' : 'المساحه'}} : </span> {{$projects[0]->min_space}} {{app()->getLocale() == 'en' ? 'M' : 'م'}} 2 : {{$projects[0]->max_space}} {{app()->getLocale() == 'en' ? 'M' : 'م'}} 2
                                            </li>
                                            @endif
                                        </ul>
                                        <a href="{{route('site.project',['slug' => $projects[0]->slug])}}"
                                           class="custom-btn" data-aos="fade-down"
                                           data-aos-delay="250">
                                            {{app()->getLocale() == 'en' ? 'Read More Details' : 'عرض التفاصيل'}} <i
                                                    class="fa fa-long-arrow-alt-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="w-100"></div>
                        @if(sizeof($projects) > 1)
                            <div class="col" data-aos="fade-down" data-aos-delay="100">
                                <div class="owl-carousel owl-theme projects">
                                    @foreach($projects as $index => $project)
                                        @if($index != 0)
                                            <div class="item">
                                                <div class="proj-item">
                                                    <div class="proj-cover">
                                                        <img src="{{asset('storage/app/projects/'.$project->image)}}">
                                                        <a href="{{route('site.project' , ['slug' => $project->slug])}}"
                                                           class="hover">
                                                            <i class="fa fa-link"></i>
                                                        </a>
                                                    </div>
                                                    <div class="proj-cont">
                                                        <a href="{{route('site.project' , ['slug' => $project->slug])}}"> {{$project->translations->first()->name}}</a>
                                                        <ul>
                                                            <li>
                                                                <i class="fa fa-map-marker"></i> {{$projects[0]->region->translate(app()->getLocale())->name}}
                                                            </li>
                                                            <li>
                                                                <i class="fa fa-tag"></i> {{$projects[0]->category->translate(app()->getLocale())->name}}
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div><!--End PRoj Item-->
                                            </div><!--End ITem-->
                                        @endif
                                    @endforeach
                                </div><!--End OWL-->
                            </div><!--End Col-->
                        @endif
                    @endif
                    <div class="w-100"></div>
                    <div class="col text-center" data-aos="fade-down" data-aos-delay="200">
                        <a href="{{route('site.projects')}}" class="custom-btn">
                            {{app()->getLocale() == 'en' ? 'load more' : 'عرض المزيد'}} <i
                                    class="fa fa-long-arrow-alt-right"></i>
                        </a>
                    </div>
                </div><!--End Row-->
            </div><!--End Container-->
            <span class="section_hint"> {{app()->getLocale() == 'en' ? 'Projects' : 'المشاريع'}} </span>
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
                            <h3 class="head_title" data-aos="fade-down" data-aos-delay="300">
                                “{{$about->translations->first()->subtitle}}.”</h3>
                            <p class="text" data-aos="fade-down" data-aos-delay="350">
                                @php
                                    $descriptions = explode("\n" , $about->translations->first()->description);
                                @endphp
                                {{$descriptions[0]}}
                            </p>
                            <a href="{{route('site.about')}}" class="custom-btn" data-aos="fade-down"
                               data-aos-delay="400">
                                {{app()->getLocale() == 'en' ? 'read more' : 'عرض المزيد'}} <i
                                        class="fa fa-long-arrow-alt-right"></i>
                            </a>
                        </div>
                    </div><!--End col-->
                </div><!--End Row-->
            </div><!--End Container-->
            <span class="section_hint"> {{app()->getLocale() == 'en' ? 'About' : 'عنا'}} </span>
        </section><!--End Section-->
        <!-- Section
        ================================-->
        <section>
            <div class="container">
                <div class="row text-center">
                    <div class="col" data-aos="fade-down" data-aos-delay="100">
                        <div class="section-title">
                            <img src="{{asset('public/site/images/logo.png')}}">
                            <div class="main_heading">{{$section->translations->first()->team_title}}</div>
                            <p class="text">{{$section->translations->first()->team_description}}</p>
                        </div>
                    </div><!--End col-->
                    <div class="w-100"></div>
                    @foreach($members as $member)
                        <div class="col-lg-3 col-md-6" data-aos="fade-down" data-aos-delay="100">
                            <div class="team_item">
                                <div class="team_img">
                                    <img src="{{asset('storage/app/members/'.$member->image)}}">
                                    @if($member->link()->exists())
                                        <ul class="team_social">
                                            <li><i class="fa fa-plus"></i></li>
                                            @if($member->link['linkedin'])
                                                <li>
                                                    <a href="{{$member->link['linkedin']}}">
                                                        <i class="fab fa-linkedin"></i>
                                                    </a>
                                                </li>
                                            @endif
                                            @if($member->link['facebook'])
                                                <li>
                                                    <a href="{{$member->link['facebook']}}">
                                                        <i class="fab fa-facebook"></i>
                                                    </a>
                                                </li>
                                            @endif
                                            @if($member->link['twitter'])
                                                <li>
                                                    <a href="{{$member->link['twitter']}}">
                                                        <i class="fab fa-twitter"></i>
                                                    </a>
                                                </li>
                                            @endif
                                            @if($member->link['instagram'])
                                                <li>
                                                    <a href="{{$member->link['instagram']}}">
                                                        <i class="fab fa-instagram"></i>
                                                    </a>
                                                </li>
                                            @endif
                                        </ul>
                                    @endif
                                </div><!--End Team Img-->
                                <div class="team_cont">
                                    <h3> {{$member->translations->first()->name}} </h3>
                                    <p> {{$member->translations->first()->position}} </p>
                                </div><!--End Team Cont-->
                            </div><!--End Team Iteam-->
                        </div><!--End Col-->
                    @endforeach
                    <div class="w-100"></div>
                    <div class="col text-center" data-aos="fade-down" data-aos-delay="500">
                        <a href="{{route('site.team')}}" class="custom-btn">
                            {{app()->getLocale() == 'en' ? 'read more' : 'عرض المزيد'}} <i
                                    class="fa fa-long-arrow-alt-right"></i>
                        </a>
                    </div>
                </div><!--End Row-->
            </div><!--End Container-->
            <span class="section_hint"> {{app()->getLocale() == 'en' ? 'Team' : 'فريق العمل'}} </span>
        </section><!--End Section-->
        <!-- Section
        ================================-->
        <section class="section-color">
            <div class="container">
                <div class="row text-center">
                    <div class="col" data-aos="fade-down" data-aos-delay="100">
                        <div class="section-title">
                            <img src="{{asset('public/site/images/logo.png')}}">
                            <div class="main_heading">{{$section->translations->first()->partners_title}}</div>
                            <p class="text">{{$section->translations->first()->partners_description}}</p>
                        </div>
                    </div><!--End col-->
                    <div class="w-100"></div>
                    <div class="col" data-aos="fade-down" data-aos-delay="200">
                        <div class="owl-carousel owl-theme partners">
                            @foreach($partners as $partner)
                                <div class="item">
                                    <div class="partner_item">
                                        <img src="{{asset('storage/app/partners/'.$partner->image)}}">
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div><!--End col-->
                </div><!--End Row-->
            </div><!--End Container-->
            <span class="section_hint"> {{app()->getLocale() == 'en' ? 'Partners' : 'شركاء النجاح'}} </span>
        </section><!--End Section-->
        <!-- Section
        ================================-->
        @include('site.layouts.contact')
        <!--End Section-->
    </div><!--End Page Content-->
@endsection