@extends('admin.layouts.master')
@section('content')
    <div class="content">
        <div class="col-sm-12 page-heading">
            <div class="col-sm-6">
                <h2>Social links</h2>
            </div><!--End col-md-6-->
            <div class="col-sm-6">
                <ul class="breadcrumb">
                    <li><a href="{{route('admin.dashboard')}}">dashboard</a></li>
                    <li class="active">Social links</li>
                </ul>
            </div><!--End col-md-6-->
        </div>
        <div class="spacer-15"></div>
        <div class="widget">
            <div class="widget-content">
                <div class="col-sm-12">
                    <div class="add-user-form">
                        <form class="ajax-form" method="post" action="{{route('admin.links',['id' => $id])}}"
                              enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="member_id" value="{{$id}}">
                            <div class="col-sm-6 form-group">
                                <label>Linkedin : </label>
                                <input class="form-control" type="text" name="linkedin" value="{{$member->link()->exists() ? $member->link->linkedin : ''}}">
                            </div>
                            <div class="col-sm-6 form-group">
                                <label>Facebook : </label>
                                <input class="form-control" type="text" name="facebook" value="{{$member->link()->exists() ? $member->link->facebook : ''}}">
                            </div>
                            <div class="col-sm-6 form-group">
                                <label>Twitter : </label>
                                <input class="form-control" type="text" name="twitter" value="{{$member->link()->exists() ? $member->link->twitter : ''}}">
                            </div>
                            <div class="col-sm-6 form-group">
                                <label>Instagram : </label>
                                <input class="form-control" type="text" name="instagram" value="{{$member->link()->exists() ? $member->link->instagram : ''}}">
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