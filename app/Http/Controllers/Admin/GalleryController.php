<?php

namespace App\Http\Controllers\Admin;

use App\Gallery;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\GalleryRequest;
use Illuminate\Http\Request;

class GalleryController extends Controller {
	//
	public function getIndex() {
		$images = Gallery::orderBy( 'id', 'desc' )->get();

		return view( 'admin.pages.gallery.index', compact( 'images' ) );
	}

	public function getEdit( $id ) {
		$image = Gallery::find( $id );

		return view( 'admin.pages.gallery.templates.edit', compact( 'image' ) );
	}

	public function postIndex( GalleryRequest $request ) {
		$request->store();

		return response()->json( 'Image has been added successfully', 200 );
	}

	public function postEdit( GalleryRequest $request, $id ) {
		$request->edit( $id );

		return response()->json( 'Image has been updated successfully', 200 );
	}

	public function getDelete( $id ) {
		$image = Gallery::find( $id );

		$image->delete();

		return redirect()->back();
	}
}
