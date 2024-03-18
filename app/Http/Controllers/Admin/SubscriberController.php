<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Subscriber;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    //
	public function getIndex(  ) {
		$subscribers = Subscriber::orderBy('id' , 'desc')->get();

		return view('admin.pages.subscribers.index' , compact('subscribers'));
	}

	public function getDelete( $id ) {
		$subscriber = Subscriber::find($id);

		$subscriber->delete();

		return redirect()->back();
	}
}
