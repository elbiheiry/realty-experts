@extends('admin.layouts.master')
@section('content')
    <div class="content">
        <div class="spacer-15"></div>
        <div class="col-sm-12">
            <div class="widget">
                <div class="widget-content">
                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-sm-6">
                                <blockquote>Name : {{$message->name}}</blockquote>
                            </div>
                            <div class="col-sm-6">
                                <blockquote>Email : {{$message->email}}</blockquote>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <blockquote>Phone : {{$message->phone}}</blockquote>
                            </div>
                            <div class="col-sm-6">
                                <blockquote>Subject : {{$message->subject}}</blockquote>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <blockquote>{{$message->message}}</blockquote>
                            </div>

                        </div>
                    </div>
                </div>
            </div><!--End Widget-->
        </div>
    </div>
@endsection