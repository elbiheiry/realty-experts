@extends('admin.layouts.master')
@section('content')
    <div class="content">
        <div class="col-sm-12 page-heading">
            <div class="col-sm-6">
                <h2>Home sections</h2>
            </div><!--End col-md-6-->
            <div class="col-sm-6">
                <ul class="breadcrumb">
                    <li><a href="{{route('admin.dashboard')}}">dashboard</a></li>
                    <li class="active">Home sections</li>
                </ul>
            </div><!--End col-md-6-->
        </div>
        <div class="spacer-15"></div>
        <div class="widget">
            <div class="widget-content">
                <div class="col-sm-12">
                    <div class="add-user-form">
                        <form class="ajax-form" method="post" action="{{route('admin.sections')}}"
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
                                            <img src="{{asset('storage/app/home/'.$section->image)}}"
                                                 class="img-responsive btn-product-image" style="cursor: pointer;">
                                            <input type="file" name="image" style="display: none;">
                                            <div class="text-danger text-center">Please click on image to change it
                                            </div>
                                            <div class="text-danger text-center">Image size should be: 1920 * 1080</div>
                                        </div>
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="english">
                                    <div class="col-sm-6 form-group">
                                        <label>First section title : </label>
                                        <input class="form-control" type="text" name="first_section_title_en" value="{{$section->translate('en')->first_section_title}}">
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label>First section subtitle : </label>
                                        <input class="form-control" type="text" name="first_section_slogan_en" value="{{$section->translate('en')->first_section_slogan}}">
                                    </div>
                                    <div class="col-sm-12 form-group">
                                        <label>First section description : </label>
                                        <textarea class="form-control" name="first_section_description_en">{{$section->translate('en')->first_section_description}}</textarea>
                                    </div>
                                    <div class="col-sm-12"><hr></div>
                                    <div class="col-sm-6 form-group">
                                        <label>Projects section title : </label>
                                        <input class="form-control" type="text" name="projects_title_en" value="{{$section->translate('en')->projects_title}}">
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label>Projects section description : </label>
                                        <textarea class="form-control" name="projects_description_en">{{$section->translate('en')->projects_description}}</textarea>
                                    </div>
                                    <div class="col-sm-12"><hr></div>
                                    <div class="col-sm-6 form-group">
                                        <label>Our team section title : </label>
                                        <input class="form-control" type="text" name="team_title_en" value="{{$section->translate('en')->team_title}}">
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label>Our team section description : </label>
                                        <textarea class="form-control" name="team_description_en">{{$section->translate('en')->team_description}}</textarea>
                                    </div>
                                    <div class="col-sm-12"><hr></div>
                                    <div class="col-sm-6 form-group">
                                        <label>Partners section title : </label>
                                        <input class="form-control" type="text" name="partners_title_en" value="{{$section->translate('en')->partners_title}}">
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label>Partners section description : </label>
                                        <textarea class="form-control" name="partners_description_en">{{$section->translate('en')->partners_description}}</textarea>
                                    </div>
                                    <div class="col-sm-12"><hr></div>
                                    <div class="col-sm-6 form-group">
                                        <label>Great moments section title : </label>
                                        <input class="form-control" type="text" name="gallery_title_en" value="{{$section->translate('en')->gallery_title}}">
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label>Great moments section description : </label>
                                        <textarea class="form-control" name="gallery_description_en">{{$section->translate('en')->gallery_description}}</textarea>
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="arabic">
                                    <div class="col-sm-6 form-group">
                                        <label>First section title : </label>
                                        <input class="form-control" type="text" name="first_section_title_ar" value="{{$section->translate('ar')->first_section_title}}">
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label>First section subtitle : </label>
                                        <input class="form-control" type="text" name="first_section_slogan_ar" value="{{$section->translate('ar')->first_section_slogan}}">
                                    </div>
                                    <div class="col-sm-12 form-group">
                                        <label>First section description : </label>
                                        <textarea class="form-control" name="first_section_description_ar">{{$section->translate('ar')->first_section_description}}</textarea>
                                    </div>
                                    <div class="col-sm-12"><hr></div>
                                    <div class="col-sm-6 form-group">
                                        <label>Projects section title : </label>
                                        <input class="form-control" type="text" name="projects_title_ar" value="{{$section->translate('ar')->projects_title}}">
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label>Projects section description : </label>
                                        <textarea class="form-control" name="projects_description_ar">{{$section->translate('ar')->projects_description}}</textarea>
                                    </div>
                                    <div class="col-sm-12"><hr></div>
                                    <div class="col-sm-6 form-group">
                                        <label>Our team section title : </label>
                                        <input class="form-control" type="text" name="team_title_ar" value="{{$section->translate('ar')->team_title}}">
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label>Our team section description : </label>
                                        <textarea class="form-control" name="team_description_ar">{{$section->translate('ar')->team_description}}</textarea>
                                    </div>
                                    <div class="col-sm-12"><hr></div>
                                    <div class="col-sm-6 form-group">
                                        <label>Partners section title : </label>
                                        <input class="form-control" type="text" name="partners_title_ar" value="{{$section->translate('ar')->partners_title}}">
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label>Partners section description : </label>
                                        <textarea class="form-control" name="partners_description_ar">{{$section->translate('ar')->partners_description}}</textarea>
                                    </div>
                                    <div class="col-sm-12"><hr></div>
                                    <div class="col-sm-6 form-group">
                                        <label>Great moments section title : </label>
                                        <input class="form-control" type="text" name="gallery_title_ar" value="{{$section->translate('ar')->gallery_title}}">
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label>Great moments section description : </label>
                                        <textarea class="form-control" name="gallery_description_ar">{{$section->translate('ar')->gallery_description}}</textarea>
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
