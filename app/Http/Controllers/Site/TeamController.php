<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Member;
use App\Testimonial;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    //

    public function getIndex()
    {
        $members = Member::with(['translations' => function($q) {
            $q->where('locale' , app()->getLocale());
        }])->orderBy('id' , 'desc')->paginate(8);

        $testimonials = Testimonial::with(['translations' => function ($q) {
            $q->where('locale', app()->getLocale());
        }])->orderBy('id' , 'desc')->get();

        if (\request()->ajax()){
            $members = Member::with(['translations' => function($q) {
                $q->where('locale' , app()->getLocale());
            }])->orderBy('id' , 'desc')->paginate(8 , ['*'] , 'page' ,\request()->page);

            return view('site.pages.members.templates.members' ,compact('members'));
        }

        return view('site.pages.members.index' ,compact('members','testimonials'));
    }
}
