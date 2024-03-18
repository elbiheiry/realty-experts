<!-- Header
================================-->
<header>
    <div class="container">
        <nav class="navbar navbar-expand-lg">
            <a href="{{route('site.index')}}" class="navbar-brand">
                <img src="{{asset('public/site/images/logo_golden.png')}}">
            </a>
            <div class="header_btns">
                <a href="tel:{{$settings->phone}}"><i
                            class="fa fa-phone"></i> {{app()->getLocale() == 'en' ? 'Call Us' : 'تواصل معنا'}} </a>
                <a href="https://web.whatsapp.com/send?phone=+{{$settings->whatsapp}}/" target="_blank"
                   class="whats-web">
                    <i class="fab fa-whatsapp"></i>
                    {{app()->getLocale() == 'en' ? 'Start Chat' : 'ابدا بالمحادثه'}}
                </a>
                <a href="https://wa.me/+{{$settings->whatsapp}}" target="_blank" class="whats-mob">
                    <i class="fab fa-whatsapp"></i>
                </a>
                @if(app()->getLocale() == 'en')
                    <a href="{{route('site.locale' , ['locale' => 'ar'])}}" class="lang">
                        AR
                    </a>
                @else
                    <a href="{{route('site.locale' , ['locale' => 'en'])}}" class="lang">
                        EN
                    </a>
                @endif
                <button class="menu-btn" type="button" data-toggle="collapse" data-target="#main-nav">
                    <i class="fa fa-bars"></i>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="main-nav">
                <ul class="navbar-nav">
                    <button class="close-btn" type="button" data-toggle="collapse" data-target="#main-nav">
                        <i class="fa fa-times"></i>
                    </button>
                    <li class="{{request()->routeIs('site.index') ? 'active' : ''}}"><a href="{{route('site.index')}}"> {{app()->getLocale() == 'en' ? 'Home' : 'الرئيسيه'}} </a></li>
                    <li class="{{request()->routeIs('site.about') ? 'active' : ''}}"><a href="{{route('site.about')}}"> {{app()->getLocale() == 'en' ? 'About' : 'من نحن'}} </a></li>
                    <li class="{{request()->routeIs('site.projects') || request()->routeIs('site.project') ? 'active' : ''}}"><a href="{{route('site.projects')}}"> {{app()->getLocale() == 'en' ? 'Projects' : 'المشاريع'}} </a></li>
                    <li class="{{request()->routeIs('site.team') ? 'active' : ''}}"><a href="{{route('site.team')}}"> {{app()->getLocale() == 'en' ? 'Team' : 'فريق العمل'}} </a></li>
                    <li class="{{request()->routeIs('site.partners') ? 'active' : ''}}"><a href="{{route('site.partners')}}"> {{app()->getLocale() == 'en' ? 'Partners' : 'شركاء النجاح'}}</a></li>
                    <li class="{{request()->routeIs('site.contact') ? 'active' : ''}}"><a href="{{route('site.contact')}}"> {{app()->getLocale() == 'en' ? 'contact' : 'تواصل معنا'}} </a></li>
                    <li id="hover-bg"></li>
                </ul>
            </div>
        </nav><!--End Nav-->
    </div><!--End Container fluid-->
</header>