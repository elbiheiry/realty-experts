<div class="top-header">
    <div class="toggle-icon"  data-toggle="tooltip" data-placement="right" title="Toggle Menu">
        <span></span>
        <span></span>
        <span></span>
    </div>
    <ul class="top-header-links">
        <div class="dropdown">
            <a href="{{route('admin.settings')}}" class="custom-btn" title="settings"><i class="fa fa-cog"></i></a>
        </div>
        <div class="dropdown">
            <a href="{{route('admin.subscribers')}}" class="custom-btn" title="subscribers">
                <i class="fa fa-users"></i>
                <div class="count">{{\App\Subscriber::count()}}</div>
            </a>
        </div>
        <div class="dropdown">
            <a href="{{route('admin.messages')}}" class="custom-btn" title="settings">
                <i class="fa fa-envelope-o"></i>
                <div class="count">{{\App\Message::where('seen' , 0)->count()}}</div>
            </a>
        </div>
        <div class="dropdown profile">
            <button class="custom-btn dropdown-toggle" type="button" data-toggle="dropdown">
                <img src="{{asset('public/admin/images/user.jpg')}}">
                {{admin()->user()->name}}
                <i class="fa fa-angle-down pro-ico"></i>
            </button>
            <ul class="dropdown-menu profile-dropdown">
                <div class="heading">
                    <img src="{{asset('public/admin/images/user.jpg')}}">
                    <h3>{{admin()->user()->name}}</h3>
                </div>
                <ul>
                    <li>
                        <a href="{{route('admin.logout')}}">
                            <i class="fa fa-power-off"></i>
                            logout
                        </a>
                    </li>
                </ul>
            </ul>
        </div>
    </ul>
</div>