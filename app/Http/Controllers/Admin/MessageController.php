<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Message;
use Illuminate\Http\Request;

class MessageController extends Controller {
	//
	public function getIndex() {
		$messages = Message::orderBy( 'seen', 'asc' )->get();

		return view( 'admin.pages.messages.index', compact( 'messages' ) );
	}

	public function getMessage( $id ) {
		$message = Message::find( $id );

		$message->seen = 1;

		$message->save();

		return view( 'admin.pages.messages.single', compact( 'message' ) );
	}

	public function getDelete( $id ) {
		$message = Message::find( $id );

		$message->delete();

		return redirect()->back();
	}
}
