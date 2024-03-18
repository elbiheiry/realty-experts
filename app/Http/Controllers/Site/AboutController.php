<?php

namespace App\Http\Controllers\Site;

use App\About;
use App\Gallery;
use App\HomeSection;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    //

    public function getIndex()
    {
        $about = About::with(['translations' => function ($q) {
            $q->where('locale', app()->getLocale());
        }])->first();

        $section = HomeSection::with(['translations' => function ($q) {
            $q->where('locale', app()->getLocale());
        }])->first();

        $images = Gallery::orderBy('id', 'desc')->get();

        return view('site.pages.about.index', compact(
            'about', 'section', 'images'
        ));
    }
}
