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
                <h2>Messages</h2>
            </div><!--End col-md-6-->
            <div class="col-sm-6">
                <ul class="breadcrumb">
                    <li><a href="{{route('admin.dashboard')}}">dashboard</a></li>
                    <li class="active">Messages</li>
                </ul>
            </div><!--End col-md-6-->
        </div>
        <div class="spacer-15"></div>
        <div class="widget">
            <div class="widget-content">

                <div class="col-sm-12">
                    <div class="table-responsive">
                        <table id="datatableX" class="table table-hover table-bordered display nowrap" cellspacing="0"
                               width="100%">
                            <thead>
                            <th>#</th>
                            <th>name</th>
                            <th>email</th>
                            <th>phone</th>
                            <th>Status</th>
                            <th>Created at</th>
                            <th>Options</th>
                            </thead>
                            <tbody>
                            @foreach($messages as $index => $message)
                                <tr class="ticket-tr {{$message->seen == 0 ? 'unseen' : 'seen'}}">
                                    <td>{{$index+1}}</td>
                                    <td>{{$message->name}}</td>
                                    <td>{{$message->email}}</td>
                                    <td>{{$message->phone}}</td>
                                    <td class="text-center">
                                        @if($message->seen == 0)
                                            <img src="{{asset('public/admin/images/unseen.png')}}" width="20px" title="unseen">
                                        @else
                                            <img src="{{asset('public/admin/images/seen.png')}}" width="20px" title="seen">
                                        @endif
                                    </td>
                                    <td>{{$message->created_at}}</td>
                                    <td>
                                        <a href="{{route('admin.messages.single' ,['id' => $message->id])}}"
                                           class="icon-btn fa fa-eye green-bc"
                                           title="show">
                                        </a>
                                        <button
                                                data-url="{{route('admin.messages.delete' ,['id' => $message->id])}}"
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