<!-- Footer
================================-->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <h3>
                    <i class="fa fa-link"></i>
                    {{app()->getLocale() == 'en' ? 'Quick Links' : 'لينكات سريعه'}}
                </h3>
                <ul>
                    <div class="row">
                        <li class="col-md-6 col-sm-4"><a href="{{route('site.index')}}"> {{app()->getLocale() == 'en' ? 'Home page' : 'الرئيسيه'}} </a></li>
                        <li class="col-md-6 col-sm-4"><a href="{{route('site.about')}}"> {{app()->getLocale() == 'en' ? 'About' : 'من نحن'}} </a></li>
                        <li class="col-md-6 col-sm-4"><a href="{{route('site.projects')}}"> {{app()->getLocale() == 'en' ? 'Projects' : 'المشاريع'}} </a></li>
                        <li class="col-md-6 col-sm-4"><a href="{{route('site.team')}}"> {{app()->getLocale() == 'en' ? 'Team' : 'فريق العمل'}} </a></li>
                        <li class="col-md-6 col-sm-4"><a href="{{route('site.partners')}}"> {{app()->getLocale() == 'en' ? 'Partners' : 'شركاء النجاح'}} </a></li>
                        <li class="col-md-6 col-sm-4"><a href="{{route('site.contact')}}"> {{app()->getLocale() == 'en' ? 'contact' : 'تواصل معنا'}} </a></li>
                    </div>
                </ul>
            </div><!--End col-->
            <div class="col-lg-3">
                <h3>
                    <i class="fab fa-instagram"></i>
                    {{app()->getLocale() == 'en' ? 'Latest gallery' : 'احدث الصور'}}
                </h3>
                <ul class="instagram_gall">
                    <div class="row">
                        @foreach(\App\Gallery::take(6)->orderBy('id' , 'desc')->get() as $image)
                            <li class="col-md-4 col-sm-4 col-6">
                                <a href="">
                                    <img src="{{asset('storage/app/gallery/'.$image->image)}}">
                                </a>
                            </li>
                        @endforeach
                    </div>
                </ul>
            </div><!--End col-->
            <div class="col-lg-5">
                <form class="newsletters" method="post" action="{{route('site.subscribe')}}">
                    @csrf
                    <h3>
                        <i class="fa fa-envelope"></i>
                        {{app()->getLocale() == 'en' ? 'Subscribe to our Newsletters' : 'اشترك في النشره الاخباريه'}}
                    </h3>
                    <input type="email" placeholder="{{app()->getLocale() == 'en' ? 'Email Address' : 'البريد الالكتروني'}}" class="form-control" name="email">
                    <button class="custom-btn save-btn" type="submit">
                        {{app()->getLocale() == 'en' ? 'Subscribe Now' : 'اشترك الان'}} <i class="fa fa-envelope"></i>
                    </button>
                </form><!--End Form-->
            </div>
        </div><!--End Row-->
    </div><!--End Container-->
    <span class="section_hint"> FOOTER </span>
</footer><!--End Footer-->