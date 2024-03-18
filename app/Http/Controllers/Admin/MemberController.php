<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MemberRequest;
use App\Member;
use Illuminate\Http\Request;

class MemberController extends Controller {
	//
	public function getIndex() {
		$members = Member::orderBy( 'id', 'desc' )->get();

		return view( 'admin.pages.members.index', compact( 'members' ) );
	}

	public function getEdit( $id ) {
		$member = Member::find( $id );

		return view( 'admin.pages.members.templates.edit', compact( 'member' ) );
	}

	public function postIndex( MemberRequest $request ) {
		$request->store();

		return response()->json( 'member has been added successfully', 200 );
	}

	public function postEdit( MemberRequest $request, $id ) {
		$request->edit( $id );

		return response()->json( 'member has been updated successfully', 200 );
	}

	public function getDelete( $id ) {
		$member = Member::find( $id );

		$member->delete();

		return redirect()->back();
	}
}
