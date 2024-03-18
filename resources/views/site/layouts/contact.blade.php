<section class="contact">
    <div class="contact_map" data-aos="fade-down" data-aos-delay="100">
        <img src="{{asset('public/site/images/logo_golden.png')}}">
        <ul>
            <li>
                <i class="fa fa-map-marker-alt"></i>
                <div>
                    <span> {{app()->getLocale() == 'en' ? 'Address' : 'العنوان'}}</span>
                    {{$settings->translations->first()->address}}
                </div>
            </li>
            <li>
                <i class="fa fa-phone"></i>
                <div>
                    <span> {{app()->getLocale() == 'en' ? 'Phone Number' : 'رقم الهاتف'}} </span>
                    <a href="tel:{{$settings->phone}}">{{$settings->phone}}</a>
                    /<a href="tel:{{$settings->whatsapp}}">{{$settings->whatsapp}}</a>
                </div>
            </li>
            <li>
                <i class="fa fa-envelope-open"></i>
                <div>
                    <span> {{app()->getLocale() == 'en' ? 'Email Address' : 'البريد الالكتروني'}}</span>
                    <a href="mailto:{{$settings->email}}">{{$settings->email}}</a>
                </div>
            </li>
        </ul>
        <a href="{{route('site.contact')}}" class="custom-btn">
            {{app()->getLocale() == 'en' ? 'Get In Touch' : 'تواصل معنا'}} <i class="fa fa-long-arrow-alt-right"></i>
        </a>
    </div>
    <iframe src="{{$settings->map}}"
            width="100%" height="600" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false"
            tabindex="0"></iframe>
</section>