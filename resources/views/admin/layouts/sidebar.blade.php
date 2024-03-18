<div class="side-menu">
    <div class="logo">
        <div class="main-logo"><img src="{{asset('public/admin/images/logo.png')}}"></div>
    </div><!--End Logo-->
    <aside class="sidebar">
        <ul class="side-menu-links">
            <li class="{{request()->routeIs('admin.dashboard') ? 'active' : ''}}">
                <a rel="nofollow" rel="noreferrer" href="{{route('admin.dashboard')}}">Dashboard</a>
            </li>
            <li class="{{request()->routeIs('admin.sections') ? 'active' : ''}}">
                <a rel="nofollow" rel="noreferrer" href="{{route('admin.sections')}}">Home sections</a>
            </li>
            <li class="{{request()->routeIs('admin.about') ? 'active' : ''}}">
                <a rel="nofollow" rel="noreferrer" href="{{route('admin.about')}}">About us</a>
            </li>
            <li class="{{request()->routeIs('admin.projects') ? 'active' : ''}}">
                <a rel="nofollow" rel="noreferrer" href="{{route('admin.projects')}}">Projects</a>
            </li>
            <li class="{{request()->routeIs('admin.categories') ? 'active' : ''}}">
                <a rel="nofollow" rel="noreferrer" href="{{route('admin.categories')}}">Categories</a>
            </li>
            <li class="{{request()->routeIs('admin.regions') ? 'active' : ''}}">
                <a rel="nofollow" rel="noreferrer" href="{{route('admin.regions')}}">Regions</a>
            </li>
            <li class="{{request()->routeIs('admin.partners') ? 'active' : ''}}">
                <a rel="nofollow" rel="noreferrer" href="{{route('admin.partners')}}">Partners</a>
            </li>
            <li class="{{request()->routeIs('admin.gallery') ? 'active' : ''}}">
                <a rel="nofollow" rel="noreferrer" href="{{route('admin.gallery')}}">Gallery</a>
            </li>
            <li class="{{request()->routeIs('admin.members') ? 'active' : ''}}">
                <a rel="nofollow" rel="noreferrer" href="{{route('admin.members')}}">Team members</a>
            </li>
            <li class="{{request()->routeIs('admin.testimonials') ? 'active' : ''}}">
                <a rel="nofollow" rel="noreferrer" href="{{route('admin.testimonials')}}">Testimonials</a>
            </li>
        </ul>
    </aside>
</div>