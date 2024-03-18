@extends('site.layouts.master')
@section('content')
    <div class="page-content">
        <section class="page-head">
            <div class="container">
                <div class="row text-center">
                    <div class="col">
                        <h1 class="main_heading" data-aos="fade-down"
                            data-aos-delay="100"> {{app()->getLocale() == 'en' ? 'Our Projects' : 'مشاريعنا'}} </h1>
                        <ul class="breadcrumb">
                            <li>
                                <a href="{{route('site.index')}}">
                                    <i class="fa fa-home"></i>
                                    {{app()->getLocale() == 'en' ? 'Home' : 'الرئيسيه'}}
                                </a>
                            </li>
                            <li class="active"> {{app()->getLocale() == 'en' ? 'Our Projects' : 'مشاريعنا'}} </li>
                        </ul>
                    </div>
                </div><!--End Row-->
            </div><!--end Container-->
        </section><!--End Section-->
        <!-- Section
        ================================-->
        <section>
            <div class="container">
                <form class="row filter_form" action="{{url()->current()}}" method="get">
                    @csrf
                    <div class="col-lg-2 col-md-12 form-group">
                        <label>{{app()->getLocale() == 'en' ? 'Filter Projects' : 'تصفية المشاريع'}} </label>
                    </div>
                    <div class="col-lg-4 col-md-6 form-group">
                        <select class="form-control select" name="region_id">
                            <option disabled
                                    selected> {{app()->getLocale() == 'en' ? 'Select region' : 'اختر المنطقه'}} </option>
                            @foreach($regions as $region)
                                <option value="{{$region->id}}"> {{$region->translations->first()->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-lg-4 col-md-6 form-group">
                        <select class="form-control select">
                            <option disabled selected> {{app()->getLocale() == 'en' ? 'Select Category' : 'اختر التصنيف'}} </option>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}"> {{$category->translations->first()->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-lg-2 col-md-12">
                        <button><i class="fa fa-search"></i> {{app()->getLocale() == 'en' ? 'Find Project' : 'ابحث'}}</button>
                    </div>
                </form>
                <div class="row text-center" id="projects-area">
                    @include('site.pages.projects.templates.projects')

                </div><!--End Row-->
                <div class="w-100"></div>
                <div class="row text-center" data-aos="fade-down" data-aos-delay="500">
                    <button class="custom-btn" id="load-more-button"
                       data-last="{{$projects->lastPage()}}"
                       data-count="{{$projects->currentPage()}}">
                        {{app()->getLocale() == 'en' ? 'load more' : 'المزيد'}} <i class="fa fa-long-arrow-alt-right"></i>
                    </button>
                </div>
            </div><!--End Container-->
            <span class="section_hint"> {{app()->getLocale() == 'en' ? 'Projects' : 'المشاريع'}} </span>
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
                    $('#projects-area').append(response);

                }
            });
            return false;
        });

    </script>
@endsection