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
                <h2>Subscribers</h2>
            </div><!--End col-md-6-->
            <div class="col-sm-6">
                <ul class="breadcrumb">
                    <li><a href="{{route('admin.dashboard')}}">dashboard</a></li>
                    <li class="active">Subscribers</li>
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
                            <th>email</th>
                            <th>Created at</th>
                            <th>Options</th>
                            </thead>
                            <tbody>
                            @foreach($subscribers as $index => $subscriber)
                                <tr class="ticket-tr">
                                    <td>{{$index+1}}</td>
                                    <td>{{$subscriber->email}}</td>
                                    <td>{{$subscriber->created_at}}</td>
                                    <td>
                                        <button
                                                data-url="{{route('admin.subscribers.delete' ,['id' => $subscriber->id])}}"
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