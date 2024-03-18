<?php

namespace App\Http\Controllers\Site;

use App\HomeSection;
use App\Http\Controllers\Controller;
use App\Partner;
use App\Testimonial;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    //
    public function getIndex()
    {
        $section = HomeSection::with(['translations' => function ($q) {
            $q->where('locale', app()->getLocale());
        }])->first();

        $testimonials = Testimonial::with(['translations' => function ($q) {
            $q->where('locale', app()->getLocale());
        }])->orderBy('id' , 'desc')->get();

        $partners = Partner::orderBy('id' , 'desc')->paginate(12);

        if (\request()->ajax()){
            $partners = Partner::orderBy('id' , 'desc')->paginate(12 , ['*'] , 'page' , \request()->page);

            return view('site.pages.partners.templates.partners', compact('partners'));
        }
        return view('site.pages.partners.index', compact('partners' , 'testimonials' ,'section'));
    }
}
