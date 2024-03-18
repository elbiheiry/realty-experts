@extends('admin.layouts.master')
@section('models')
    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form class="modal-content text-center" id="delete-form">
                <div class="modal-body text-center">
                    <h4 class="alert-text">Are you sure ? </h4>
                </div>
                <div class="modal-footer">
                    <button class="icon-btn fa fa-trash red-bc" type="submit" title="delete">
                    </button>
                    <button type="button" class="icon-btn fa fa-times" title="cancel" data-dismiss="modal">
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('content')
    <div class="content">
        <div class="col-sm-12 page-heading">
            <div class="col-sm-6">
                <h2>Projects</h2>
            </div><!--End col-md-6-->
            <div class="col-sm-6">
                <ul class="breadcrumb">
                    <li><a href="{{route('admin.dashboard')}}">dashboard</a></li>
                    <li class="active">Projects</li>
                </ul>
            </div><!--End col-md-6-->
        </div>
        <div class="spacer-15"></div>
        <div class="widget">
            <div class="widget-content">
                <div class="col-sm-12">
                    <div class="add-user-form">
                        <form class="ajax-form" method="post" action="{{route('admin.projects')}}"
                              enctype="multipart/form-data">
                            @csrf
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active"><a href="#main" aria-controls="main" role="tab"
                                                                          data-toggle="tab">Main data</a></li>
                                <li role="presentation"><a href="#english" aria-controls="english" role="tab"
                                                           data-toggle="tab">English</a></li>
                                <li role="presentation"><a href="#arabic" aria-controls="arabic" role="tab"
                                                           data-toggle="tab">Arabic</a></li>
                            </ul>
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="main">
                                    <div class="col-sm-6">
                                        <div class="form-group img-block">
                                            <label>Project main image : </label>
                                            <img src="{{asset('public/admin/images/user.jpg')}}"
                                                 class="img-responsive btn-product-image" style="cursor: pointer;">
                                            <input type="file" name="image" style="display: none;">
                                            <div class="text-danger text-center">Please click on image to change it
                                            </div>
                                            <div class="text-danger text-center">Image size should be: 782 * 635</div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group img-block">
                                            <label>Project brochure (if exists) : </label>
                                            <img src="{{asset('public/admin/images/img-upload.png')}}"
                                                 class="img-responsive btn-product-image" style="cursor: pointer;">
                                            <input type="file" name="brochure" style="display: none;">
                                            <div class="text-danger text-center" style="padding-top: 20px;">Please click on image to change it
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label>Categories : </label>
                                        <select class="form-control" name="category_id">
                                            <option value="0">Choose category</option>
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}">{{$category->translate('en')->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label>Regions : </label>
                                        <select class="form-control" name="region_id">
                                            <option value="0">Choose region</option>
                                            @foreach($regions as $region)
                                                <option value="{{$region->id}}">{{$region->translate('en')->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label>Video link : </label>
                                        <input class="form-control" type="text" name="video_link">
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label>Map link : </label>
                                        <input class="form-control" type="text" name="map">
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label>Minimum price for this unit : </label>
                                        <input class="form-control" type="text" name="min_price">
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label>Maximum price for this unit : </label>
                                        <input class="form-control" type="text" name="max_price">
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label>Minimum space for this unit : </label>
                                        <input class="form-control" type="text" name="min_space">
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label>Maximum space for this unit : </label>
                                        <input class="form-control" type="text" name="max_space">
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="english">
                                    <div class="col-sm-6 form-group">
                                        <label>Name : </label>
                                        <input class="form-control" type="text" name="name_en">
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label>Subtitle : </label>
                                        <input class="form-control" type="text" name="subtitle_en">
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label>Indirect sales : </label>
                                        <input class="form-control" type="text" name="indirect_sales_en">
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label>Developer company : </label>
                                        <input class="form-control" type="text" name="developer_company_en">
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label>Payment method : </label>
                                        <input class="form-control" type="text" name="payment_methods_en">
                                    </div>
                                    <div class="col-sm-12 form-group">
                                        <label>Description : </label>
                                        <textarea class="form-control tiny-editor" name="description_en"></textarea>
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="arabic">
                                    <div class="col-sm-6 form-group">
                                        <label>Name : </label>
                                        <input class="form-control" type="text" name="name_ar">
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label>Subtitle : </label>
                                        <input class="form-control" type="text" name="subtitle_ar">
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label>Indirect sales : </label>
                                        <input class="form-control" type="text" name="indirect_sales_ar">
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label>Developer company : </label>
                                        <input class="form-control" type="text" name="developer_company_ar">
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label>Payment method : </label>
                                        <input class="form-control" type="text" name="payment_methods_ar">
                                    </div>
                                    <div class="col-sm-12 form-group">
                                        <label>Description : </label>
                                        <textarea class="form-control tiny-editor" name="description_ar"></textarea>
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
        <div class="spacer-15"></div>
        <div class="widget">
            <div class="widget-content">
                <div class="col-sm-12">
                    <div class="table-responsive">
                        <table id="datatableX" class="table table-hover table-bordered display nowrap" cellspacing="0"
                               width="100%">
                            <thead>
                            <th>#</th>
                            <th>Name</th>
                            <th>Created at</th>
                            <th>Options</th>
                            </thead>
                            <tbody>
                            @foreach($projects as $index => $project)
                                <tr class="ticket-tr">
                                    <td>{{$index+1}}</td>
                                    <td>{{$project->translate('en')->name}}</td>
                                    <td>{{$project->created_at}}</td>
                                    <td>
                                        <a href="{{route('admin.projects.images',['id' => $project->id])}}"
                                           class="icon-btn blue-bc">
                                            <i class="fa fa-image"></i>
                                        </a>
                                        <a href="{{route('admin.projects.edit',['id' => $project->id])}}"
                                                class="icon-btn green-bc">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <button
                                                data-url="{{route('admin.projects.delete' ,['id' => $project->id])}}"
                                                data-toggle="modal"
                                                data-target="#delete" class="icon-btn fa fa-trash red-bc deleteBTN"
                                                title="delete">
                                        </button>

                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div><!--End Widget-->

    </div>
@endsection