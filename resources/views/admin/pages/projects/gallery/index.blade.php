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
    <div id="common-modal" class="modal fade" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content text-center">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit image</h5>
                </div>
                <div class="modal-data modal-body">

                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="content">
        <div class="col-sm-12 page-heading">
            <div class="col-sm-6">
                <h2>Gallery</h2>
            </div><!--End col-md-6-->
            <div class="col-sm-6">
                <ul class="breadcrumb">
                    <li><a href="{{route('admin.dashboard')}}">dashboard</a></li>
                    <li class="active">Gallery</li>
                </ul>
            </div><!--End col-md-6-->
        </div>
        <div class="spacer-15"></div>
        <div class="widget">
            <div class="widget-content">
                <div class="col-sm-12">
                    <div class="add-user-form">
                        <form class="ajax-form" method="post" action="{{route('admin.projects.images',['id' => $id])}}"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="col-sm-12">
                                <div class="form-group img-block">
                                    <img src="{{asset('public/admin/images/user.jpg')}}"
                                         class="img-responsive btn-product-image" style="cursor: pointer;">
                                    <input type="file" name="image" style="display: none;">
                                    <div class="text-danger text-center">Please click on image to change it
                                    </div>
                                    <div class="text-danger text-center">Image size should be: 1200 * 670</div>
                                </div>
                            </div>
                            <div class="col-sm-6 form-group">
                                <label>Description [EN]: </label>
                                <textarea class="form-control" name="description_en"></textarea>
                                <div class="text-danger text-center">This input can be null </div>
                            </div>
                            
                            <div class="col-sm-6 form-group">
                                <label>Description [AR]: </label>
                                <textarea class="form-control" name="description_ar"></textarea>
                                <div class="text-danger text-center">This input can be null </div>
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
                            <th>Image</th>
                            <th>Created at</th>
                            <th>Options</th>
                            </thead>
                            <tbody>
                            @foreach($images as $index => $image)
                                <tr class="ticket-tr">
                                    <td>{{$index+1}}</td>
                                    <td><img src="{{asset('storage/app/projects/'.$image->image)}}" width="300"></td>
                                    <td>{{$image->created_at}}</td>
                                    <td>
                                        <button data-url="{{route('admin.projects.images.edit',['id' => $image->id])}}"
                                                class="icon-btn green-bc btn-modal-view ">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                        <button
                                                data-url="{{route('admin.projects.images.delete' ,['id' => $image->id])}}"
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