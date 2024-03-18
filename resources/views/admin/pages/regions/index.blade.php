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
                    <h5 class="modal-title" id="exampleModalLabel">Edit region</h5>
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
                <h2>regions</h2>
            </div><!--End col-md-6-->
            <div class="col-sm-6">
                <ul class="breadcrumb">
                    <li><a href="{{route('admin.dashboard')}}">dashboard</a></li>
                    <li class="active">regions</li>
                </ul>
            </div><!--End col-md-6-->
        </div>
        <div class="spacer-15"></div>
        <div class="widget">
            <div class="widget-content">
                <div class="col-sm-12">
                    <div class="add-user-form">
                        <form class="ajax-form" method="post" action="{{route('admin.regions')}}"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="col-sm-6 form-group">
                                <label>Name [En] : </label>
                                <input class="form-control" type="text" name="name_en">
                            </div>
                            <div class="col-sm-6 form-group">
                                <label>Name [Ar] : </label>
                                <input class="form-control" type="text" name="name_ar">
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
                            @foreach($regions as $index => $region)
                                <tr class="ticket-tr">
                                    <td>{{$index+1}}</td>
                                    <td>{{$region->translate('en')->name}}</td>
                                    <td>{{$region->created_at}}</td>
                                    <td>
                                        <button data-url="{{route('admin.regions.edit',['id' => $region->id])}}"
                                                class="icon-btn green-bc btn-modal-view ">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                        @if($region->id != 1)
                                            <button
                                                    data-url="{{route('admin.regions.delete' ,['id' => $region->id])}}"
                                                    data-toggle="modal"
                                                    data-target="#delete" class="icon-btn fa fa-trash red-bc deleteBTN"
                                                    title="delete">
                                            </button>
                                        @endif
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