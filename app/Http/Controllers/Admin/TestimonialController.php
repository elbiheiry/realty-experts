<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TestimonialRequest;
use App\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller {
	public function getIndex() {
		$testimonials = Testimonial::orderBy( 'id', 'desc' )->get();

		return view( 'admin.pages.testimonials.index', compact( 'testimonials' ) );
	}

	public function getEdit( $id ) {
		$testimonial = Testimonial::find( $id );

		return view( 'admin.pages.testimonials.templates.edit', compact( 'testimonial' ) );
	}

	public function postIndex( TestimonialRequest $request ) {
		$request->store();

		return response()->json( 'testimonial has been added successfully', 200 );
	}

	public function postEdit( TestimonialRequest $request, $id ) {
		$request->edit( $id );

		return response()->json( 'testimonial has been updated successfully', 200 );
	}

	public function getDelete( $id ) {
		$testimonial = Testimonial::find( $id );

		$testimonial->delete();

		return redirect()->back();
	}
}
