<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\RegionRequest;
use App\Region;
use Illuminate\Http\Request;

class RegionController extends Controller
{
    //
	public function getIndex() {
		$regions = Region::orderBy( 'id', 'desc' )->get();

		return view( 'admin.pages.regions.index', compact( 'regions' ) );
	}

	public function getEdit( $id ) {
		$region = Region::find( $id );

		return view( 'admin.pages.regions.templates.edit', compact( 'region' ) );
	}

	public function postIndex( RegionRequest $request ) {
		$request->store();

		return response()->json( 'region has been added successfully', 200 );
	}

	public function postEdit( RegionRequest $request, $id ) {
		$request->edit( $id );

		return response()->json( 'region has been updated successfully', 200 );
	}

	public function getDelete( $id ) {
		$region = Region::find( $id );

		$region->delete();

		return redirect()->back();
	}
}
