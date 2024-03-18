<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Message;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;


class ContactController extends Controller
{
    //
    public function getIndex()
    {
        return view('site.pages.contact.index');
    }

    public function postIndex(Request $request)
    {
        $v = validator($request->all() , [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'subject' => 'required',
            'message' => 'required'
        ] , [
            'name.required' => app()->getLocale() == 'en' ? 'Please enter your full name' : 'برجاء ادخال الاسم بالكامل',
            'email.required' => app()->getLocale() == 'en' ? 'Please enter your email address' : 'برجاء ادخال بريدك الالكتروني',
            'email.email' => app()->getLocale() == 'en' ? 'Please enter a valid email' : 'برجاء ادخال بريد الكتروني صحيح',
            'phone.required' => app()->getLocale() == 'en' ? 'Please enter your phone number' : 'برجاء ادخال رقم الهاتف',
            'subject.required' => app()->getLocale() == 'en' ? 'Please enter your subject' : 'برجاء ادخال عنوان الرساله',
            'message.required' => app()->getLocale() == 'en' ? 'Please enter your message' : 'برجاء ادخال رسالتك'
        ]);

        if ($v->fails()) {
            return response()->json($v->errors()->first() , Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        $message = new Message();

        $message->name = $request->name;
        $message->email = $request->email;
        $message->phone = $request->phone;
        $message->subject = $request->subject;
        $message->message = $request->message;

        if ($message->save()){
            return response()->json(
                app()->getLocale() == 'en' ? 'Thanks for your message we will contact your ASAP' : 'شكرا علي رسالتك سيتم التواصل معك في اقرب وقت ممكن'
                , Response::HTTP_OK);
        }
    }
}
