@extends('site.layouts.master')
@section('content')
    <div class="modal fade" id="contact" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content text-center">
                <form id="fupForm" name="form1" action="{{route('site.contact')}}" method="post">
                    <button type="button" data-dismiss="modal" class="icon">
                        <i class="fa fa-times"></i>
                    </button>
                    <div class="form-title">{{app()->getLocale() == 'en' ? 'Get In Touch' : 'تواصل معنا'}}</div>
                    <div class="form-group">
                        <input type="hidden" name="subject" value="{{$project->translations->first()->name}}">
                        <input type="text" class="form-control" id="name"
                               placeholder="{{app()->getLocale() == 'en' ? 'Name' : 'الاسم بالكامل'}}" name="name">
                        <input type="email" class="form-control" id="email"
                               placeholder="{{app()->getLocale() == 'en' ? 'Email Address' : 'البريد الالكتروني'}}"
                               name="email">
                        <input type="text" class="form-control" id="phone"
                               placeholder="{{app()->getLocale() == 'en' ? 'Phone Number' : 'رقم الهاتف'}}"
                               name="phone">
                        <textarea class="form-control" id="message"
                                  placeholder="{{app()->getLocale() == 'en' ? 'Message' : 'الرساله'}}"
                                  name="message"></textarea>
                    </div>
                    <button class="custom-btn"
                            id="butsave"> {{app()->getLocale() == "en" ? "Send Message" : "ارسال"}} </button>
                </form>
            </div>
        </div>
    </div>
    <div class="page-content">
        <section class="page-head project-head">
            <div class="container">
                <div class="row text-center">
                    <div class="col">
                        <h1 class="main_heading" data-aos="fade-down"
                            data-aos-delay="100">{{$project->translations->first()->name}}</h1>
                        @if($project->translations->first()->subtitle)
                            <h3 class="head_title" data-aos="fade-down" data-aos-delay="200">
                            “ {{$project->translations->first()->subtitle}} ”</h3>
                        @endif
                    </div>
                </div><!--End Row-->
            </div><!--end Container-->
        </section><!--End Section-->
        <!-- Section
        ================================-->
        <section class="inner_proj section-color">
            <div class="container">
                <div class="row text-center">
                    <div class="col">
                        <div class="main-project shadow">
                            <div class="row">
                                <div class="col-lg-7 cover" data-aos="fade-down" data-aos-delay="50">
                                    <img src="{{asset('storage/app/projects/'.$project->image)}}">
                                    @if($project->video_link)
                                    <a class="play_btn popup-youtube mfp-iframe" href="{{$project->video_link}}">
                                        <img src="{{asset('public/site/images/play.png')}}">
                                    </a>
                                    @endif
                                </div>
                                <div class="col-lg-5 content">
                                    
                                    <ul data-aos="fade-down" data-aos-delay="200">
                                        <li>
                                            <i class="fa fa-map-marker"></i> <span>{{app()->getLocale() == 'en' ? 'Region' : 'المنطقه'}}</span>
                                             {{$project->region->translate(app()->getLocale())->name}}
                                        </li>
                                        <li>
                                            <i class="fa fa-tag"></i> <span>{{app()->getLocale() == 'en' ? 'Category' : 'القسم'}}</span>
                                             {{$project->category->translate(app()->getLocale())->name}}
                                        </li>
                                        @if($project->translations->first()->developer_company)
                                        <li>
                                            <i class="fa fa-link"></i> <span>{{app()->getLocale() == 'en' ? 'Developer Company' : 'الشركه المطوره'}}</span>
                                             {{$project->translations->first()->developer_company}}
                                        </li>
                                        @endif
                                        @if($project->translations->first()->indirect_sales)
                                        <li>
                                            <i class="fa fa-user"></i>
                                            <span>{{app()->getLocale() == 'en' ? 'Indirect Sales' : 'المبيعات غير المباشرة'}}</span>
                                             {{$project->translations->first()->indirect_sales}}
                                        </li>
                                        @endif
                                        @if($project->min_price && $project->max_price)
                                        <li>
                                            <i class="fa fa-dollar-sign"></i>
                                             <span>{{app()->getLocale() == 'en' ? 'Price' : 'السعر'}} : </span> {{$project->min_price}}  : {{$project->max_price}}
                                        </li>
                                        @endif
                                        @if($project->min_space && $project->max_space)
                                        <li>
                                            <i class="fa fa-expand"></i>
                                            <span>{{app()->getLocale() == 'en' ? 'Space' : 'المساحه'}} : </span> {{$project->min_space}} {{app()->getLocale() == 'en' ? 'M' : 'م'}} 2 : {{$project->max_space}} {{app()->getLocale() == 'en' ? 'M' : 'م'}} 2
                                        </li>
                                        @endif
                                    </ul>
                                    @if($project->brochure)
                                        <a href="{{asset('storage/app/projects/'.$project->brochure)}}"
                                           class="custom-btn" data-aos="fade-down" data-aos-delay="250">
                                            {{app()->getLocale() == 'en' ? 'Download Brochure' : 'تحميل الكتالوج'}}
                                            <i class="fa fa-download"></i>
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!--End Row-->
                <div class="row">
                    @if($project->translations->first()->description)
                    <div class="col-lg-9 col-md-12 col-sm-12">
                        <div class="project_details">
                            {!! $project->translations->first()->description !!}
                           
                       </div>
                    </div><!--End Col-->
                    @endif
                    <div class="col-lg-3 col-md-12 col-sm-12">
                        <div class="feature payment shadow" data-aos="fade-down" data-aos-delay="50">
                            @if($project->min_price && $project->max_price)
                            <span> {{app()->getLocale() == 'en' ? 'Payment Methods' : 'طرق الدفع'}}</span> {{$project->translations->first()->payment_methods}}
                            @endif
                            <div class="w-100">
                                <a href="#contact" class="custom-btn" data-toggle="modal"
                                   data-target="#contact">
                                    {{app()->getLocale() == 'en' ? 'request a quote' : 'استعلام'}} <i
                                            class="fa fa-link"></i>
                                </a>
                            </div>
                        </div><!--End Feature-->
                    </div><!--End Col-->
                </div><!--End Col-->
                @if(sizeof($project->images) > 0)
                    <ul class="gallery row">
                        <div class="w-100">
                            <div class="sec-tit"><i class="fa fa-image"></i> {{app()->getLocale() == 'en' ? 'Project Gallery' : 'معرض الصور'}}</div>
                        </div>
                        @foreach($project->images as $image)
                            <li
                            data-fancybox="gallery"
							data-caption="{{app()->getLocale() == 'en' ? $image->description_en : $image->description_ar}}"
                            data-src="{{asset('storage/app/projects/'.$image->image)}}" 
                            class="gallery-item col-lg-4 col-md-6 col-sm-6"
                            data-aos="fade-down"
                            data-aos-delay="50">
                                <img src="{{asset('storage/app/projects/'.$image->image)}}">
                                <div class="hover"> <i class="fa fa-link"></i></div>
                            </li>
                        @endforeach
                    </ul>
                @endif

                @if($project->map)
                <div class="row">
                    <div class="w-100">
                        <div class="sec-tit"><i
                                    class="fa fa-map-marker"></i> {{app()->getLocale() == 'en' ? 'Project Address' : 'موقع المشروع'}}
                        </div>
                    </div>
                    <div class="col">
                        <iframe src="{{$project->map}}"
                                width="100%" height="400" frameborder="0" style="border:0;" allowfullscreen=""
                                aria-hidden="false" tabindex="0"></iframe>
                    </div>
                </div>
                @endif
            </div><!--End Container-->
        </section><!--End Section-->
        <!-- Section
        ================================-->
        <section>
            <div class="container">
                <div class="row text-center">
                    <div class="col" data-aos="fade-down" data-aos-delay="100">
                        <div class="section-title">
                            <img src="{{asset('public/site/images/logo.png')}}">
                            <div class="main_heading"> {{app()->getLocale() == 'en' ? 'Related Projects' : 'مشاريع المتعلقه'}}</div>
                        </div>
                    </div><!--End col-->
                    <div class="w-100"></div>
                    <div class="col" data-aos="fade-down" data-aos-delay="100">
                        <div class="owl-carousel owl-theme projects">
                            @foreach($relates as $relate)
                                <div class="item">
                                    <div class="proj-item ">
                                        <div class="proj-cover">
                                            <img src="{{asset('storage/app/projects/'.$relate->image)}}">
                                            <a href="{{route('site.project',['slug' => $relate->slug])}}" class="hover">
                                                <i class="fa fa-link"></i>
                                            </a>
                                        </div>
                                        <div class="proj-cont">
                                            <a href="{{route('site.project',['slug' => $relate->slug])}}"> {{$relate->translations->first()->name}}</a>
                                            <ul>
                                                <li>
                                                    <i class="fa fa-map-marker"></i> {{$relate->region->translate(app()->getLocale())->name}}
                                                </li>
                                                <li>
                                                    <i class="fa fa-tag"></i> {{$relate->category->translate(app()->getLocale())->name}}
                                                </li>
                                            </ul>
                                        </div>
                                    </div><!--End PRoj Item-->
                                </div><!--End ITem-->
                            @endforeach
                        </div><!--End OWL-->
                    </div><!--End Col-->
                </div><!--End Row-->
            </div><!--End Container-->
            <span class="section_hint"> {{app()->getLocale() == 'en' ? 'Projects' : 'المشاريع'}} </span>
        </section><!--End Section-->
    </div>
@endsection
@section('js')
    <script>
        $(document).on('submit', '#fupForm', function () {
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
                        $('#butsave').attr('disabled', false).html('{{app()->getLocale() == "en" ? "Send Message" : "ارسال"}} ');
                        form[0].reset();
                    });
                },
                error: function (jqXHR) {
                    var response = $.parseJSON(jqXHR.responseText);
                    $('#butsave').attr('disabled', false).html('{{app()->getLocale() == "en" ? "Send Message" : "ارسال"}} ');
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