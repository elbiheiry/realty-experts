@extends('admin.layouts.master')
@section('content')
    <div class="content">

        <div class="col-sm-12">
            <div class="widget">
                <div class="widget-content">
                    <img src="http://localhost/rec/public/admin/images/brandbourne.png" style="
                        padding: 15px;
                        background-color: #00619b;
                    ">
                    <div class="col-md-4 col-sm-6">
                        <a href="{{route('admin.projects')}}" class="counter">
                            <h3 class="timer" data-to="{{\App\Project::count()}}" data-speed="1500"></h3>
                            <div class="count-name"> projects</div>
                        </a>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <a href="{{route('admin.subscribers')}}" class="counter">
                            <h3 class="timer" data-to="{{\App\Subscriber::count()}}" data-speed="1500"></h3>
                            <div class="count-name"> Subscribers</div>
                        </a>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <a href="{{route('admin.messages')}}" class="counter">
                            <h3 class="timer" data-to="{{\App\Message::count()}}" data-speed="1500"></h3>
                            <div class="count-name">Messages</div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection