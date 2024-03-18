<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PartnerRequest;
use App\Partner;
use Illuminate\Http\Request;

class PartnerController extends Controller {
	public function getIndex() {
		$partners = Partner::orderBy( 'id', 'desc' )->get();

		return view( 'admin.pages.partners.index', compact( 'partners' ) );
	}

	public function getEdit( $id ) {
		$partner = Partner::find( $id );

		return view( 'admin.pages.partners.templates.edit', compact( 'partner' ) );
	}

	public function postIndex( PartnerRequest $request ) {
		$request->store();

		return response()->json( 'partner has been added successfully', 200 );
	}

	public function postEdit( PartnerRequest $request, $id ) {
		$request->edit( $id );

		return response()->json( 'partner has been updated successfully', 200 );
	}

	public function getDelete( $id ) {
		$partner = Partner::find( $id );

		$partner->delete();

		return redirect()->back();
	}
}
