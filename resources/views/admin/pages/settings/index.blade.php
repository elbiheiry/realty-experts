@extends('admin.layouts.master')
@section('content')
    <div class="content">
        <div class="col-sm-12 page-heading">
            <div class="col-sm-6">
                <h2>Site settings</h2>
            </div><!--End col-md-6-->
            <div class="col-sm-6">
                <ul class="breadcrumb">
                    <li><a href="{{route('admin.dashboard')}}">dashboard</a></li>
                    <li class="active">Site settings</li>
                </ul>
            </div><!--End col-md-6-->
        </div>
        <div class="spacer-15"></div>
        <div class="widget">
            <div class="widget-content">
                <div class="col-sm-12">
                    <div class="add-user-form">
                        <form class="ajax-form" method="post" action="{{route('admin.settings.edit')}}"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="col-sm-6 form-group">
                                <label>Address [EN] : </label>
                                <input class="form-control" type="text" name="address_en" value="{{$settings->translate('en')->address}}">
                            </div>
                            <div class="col-sm-6 form-group">
                                <label>Address [AR] : </label>
                                <input class="form-control" type="text" name="address_ar" value="{{$settings->translate('ar')->address}}">
                            </div>
                            <div class="col-sm-6 form-group">
                                <label>Email : </label>
                                <input class="form-control" type="email" name="email" value="{{$settings->email}}">
                            </div>
                            <div class="col-sm-6 form-group">
                                <label>Phone : </label>
                                <input class="form-control" type="text" name="phone" value="{{$settings->phone}}">
                            </div>
                            <div class="col-sm-6 form-group">
                                <label>Whatsapp : </label>
                                <input class="form-control" type="text" name="whatsapp" value="{{$settings->whatsapp}}">
                            </div>
                            <div class="col-sm-6 form-group">
                                <label>Facebook : </label>
                                <input class="form-control" type="text" name="facebook" value="{{$settings->facebook}}">
                            </div>
                            <div class="col-sm-6 form-group">
                                <label>Twitter : </label>
                                <input class="form-control" type="text" name="twitter"
                                       value="{{$settings->twitter}}">
                            </div>
                            <div class="col-sm-6 form-group">
                                <label>Instagram : </label>
                                <input class="form-control" type="text" name="instagram"
                                       value="{{$settings->instagram}}">
                            </div>
                            <div class="col-sm-12 form-group">
                                <label>Map : </label>
                                <input class="form-control" type="text" name="map"
                                       value="{{$settings->map}}">
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