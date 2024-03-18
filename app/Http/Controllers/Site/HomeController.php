<?php

namespace App\Http\Controllers\Site;

use App\About;
use App\HomeSection;
use App\Http\Controllers\Controller;
use App\Member;
use App\Partner;
use App\Project;
use App\Subscriber;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class HomeController extends Controller
{
    //
    public function getIndex()
    {
        $section = HomeSection::with(['translations' => function ($q) {
            $q->where('locale', app()->getLocale());
        }])->first();

        $projects = Project::with(['translations' => function ($q) {
            $q->where('locale', app()->getLocale());
        }])->take(6)->orderBy('id', 'desc')->get();

        $about = About::with(['translations' => function ($q) {
            $q->where('locale', app()->getLocale());
        }])->first();

        $members = Member::with(['translations' => function ($q) {
            $q->where('locale', app()->getLocale());
        }])->take(4)->orderBy('id', 'desc')->get();

        $partners = Partner::take(7)->get();

        return view('site.pages.index', compact('section', 'partners', 'projects', 'about', 'members'));
    }

    public function postSubscribe(Request $request)
    {
        $v = validator($request->all(), [
            'email' => 'required|email|unique:subscribers,email'
        ], [
            'email.required' => app()->getLocale() == 'en' ? 'Please enter your email address' : 'برجاء ادخال البريد الالكتروني',
            'email.email' => app()->getLocale() == 'en' ? 'Please enter a valid email address' : 'برجاء ادخال بريد الكتروني صحيح',
            'email.unique' => app()->getLocale() == 'en' ? 'Email address is already subscribed' : 'هذا البريد الالكتروني مسجل بالفعل',
        ]);

        if ($v->fails()) {
            return response()->json($v->errors()->first(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        $subscriber = new Subscriber();

        $subscriber->email = $request->email;

        if ($subscriber->save()) {
            return response()->json(
                app()->getLocale() == 'en' ? 'Thanks for subscribing with us' : 'شكرا لك علي تسجيلك في القائمه البريديه الخاصه بنا'
                , Response::HTTP_OK);
        }

        return response()->json(
            app()->getLocale() == 'en' ? 'We are having a little trouble right now , please try again later' : 'توجد مشكله بسيطه في اتمام طلبك بالرجاء المحاوله مره اخري لاحقا'
            , Response::HTTP_INTERNAL_SERVER_ERROR);
    }
}
