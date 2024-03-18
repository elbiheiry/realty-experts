<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MemberLinkRequest;
use App\Member;
use Illuminate\Http\Request;

class MemberLinkController extends Controller {
	public function getIndex( $id ) {
		$member = Member::find( $id );

		return view( 'admin.pages.members.links.index', compact( 'member' ,'id' ) );
	}

	public function postIndex( MemberLinkRequest $request, $id ) {
		$request->store( $id );

		return response()->json( 'links has been added successfully', 200 );
	}

}
