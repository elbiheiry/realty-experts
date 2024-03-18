<?php

namespace App\Http\Controllers\Admin;

use App\HomeSection;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\HomeSectionRequest;
use Illuminate\Http\Request;

class HomeSectionController extends Controller {
	//
	public function getIndex() {
		$section = HomeSection::first();

		return view( 'admin.pages.home.index', compact( 'section' ) );
	}

	public function postEdit( HomeSectionRequest $request ) {
		$request->edit();

		return response()->json( 'Data has been updated successfully', 200 );
	}
}
