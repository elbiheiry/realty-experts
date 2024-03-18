@extends('admin.layouts.master')
@section('content')
    <div class="content">
        <div class="col-sm-12 page-heading">
            <div class="col-sm-6">
                <h2>About us</h2>
            </div><!--End col-md-6-->
            <div class="col-sm-6">
                <ul class="breadcrumb">
                    <li><a href="{{route('admin.dashboard')}}">dashboard</a></li>
                    <li class="active">About us</li>
                </ul>
            </div><!--End col-md-6-->
        </div>
        <div class="spacer-15"></div>
        <div class="widget">
            <div class="widget-content">
                <div class="col-sm-12">
                    <div class="add-user-form">
                        <form class="ajax-form" method="post" action="{{route('admin.about.edit')}}"
                              enctype="multipart/form-data">
                            @csrf
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active"><a href="#main" aria-controls="main" role="tab" data-toggle="tab">Main data</a></li>
                                <li role="presentation"><a href="#english" aria-controls="english" role="tab" data-toggle="tab">English</a></li>
                                <li role="presentation"><a href="#arabic" aria-controls="arabic" role="tab" data-toggle="tab">Arabic</a></li>
                            </ul>
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="main">
                                    <div class="col-sm-12">
                                        <div class="form-group img-block">
                                            <img src="{{asset('storage/app/about/'.$about->image)}}"
                                                 class="img-responsive btn-product-image" style="cursor: pointer;">
                                            <input type="file" name="image" style="display: none;">
                                            <div class="text-danger text-center">Please click on image to change it
                                            </div>
                                            <div class="text-danger text-center">Image size should be: 540 * 380</div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label>Video link : </label>
                                        <input class="form-control" type="text" name="video_link" value="{{$about->video_link}}">
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label>Years of success : </label>
                                        <input class="form-control" type="text" name="years_of_success" value="{{$about->years_of_success}}">
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="english">
                                    <div class="col-sm-6 form-group">
                                        <label>Title : </label>
                                        <input class="form-control" type="text" name="title_en" value="{{$about->translate('en')->title}}">
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label>Subtitle : </label>
                                        <input class="form-control" type="text" name="subtitle_en" value="{{$about->translate('en')->subtitle}}">
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label>Description : </label>
                                        <textarea class="form-control" name="description_en">{{$about->translate('en')->description}}</textarea>
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label>Our tour : </label>
                                        <textarea class="form-control" name="tour_en">{{$about->translate('en')->tour}}</textarea>
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label>Our mission : </label>
                                        <textarea class="form-control" name="mission_en">{{$about->translate('en')->mission}}</textarea>
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label>Our vision : </label>
                                        <textarea class="form-control" name="vision_en">{{$about->translate('en')->vision}}</textarea>
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label>Our value's : </label>
                                        <textarea class="form-control" name="value_en">{{$about->translate('en')->value}}</textarea>
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label>Our goals : </label>
                                        <textarea class="form-control" name="goals_en">{{$about->translate('en')->goals}}</textarea>
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="arabic">
                                    <div class="col-sm-6 form-group">
                                        <label>Title : </label>
                                        <input class="form-control" type="text" name="title_ar" value="{{$about->translate('ar')->title}}">
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label>Subtitle : </label>
                                        <input class="form-control" type="text" name="subtitle_ar" value="{{$about->translate('ar')->subtitle}}">
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label>Description : </label>
                                        <textarea class="form-control" name="description_ar">{{$about->translate('ar')->description}}</textarea>
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label>Our tour : </label>
                                        <textarea class="form-control" name="tour_ar">{{$about->translate('ar')->tour}}</textarea>
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label>Our mission : </label>
                                        <textarea class="form-control" name="mission_ar">{{$about->translate('ar')->mission}}</textarea>
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label>Our vision : </label>
                                        <textarea class="form-control" name="vision_ar">{{$about->translate('ar')->vision}}</textarea>
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label>Our value's : </label>
                                        <textarea class="form-control" name="value_ar">{{$about->translate('ar')->value}}</textarea>
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label>Our goals : </label>
                                        <textarea class="form-control" name="goals_ar">{{$about->translate('ar')->goals}}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 form-group">
                                <button class="custom-btn" id="save-btn">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div><!--End Widget-->
    </div>
@endsection
