<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryRequest;
use Illuminate\Http\Request;

class CategoryController extends Controller {
	//
	public function getIndex() {
		$categories = Category::orderBy( 'id', 'desc' )->get();

		return view( 'admin.pages.categories.index', compact( 'categories' ) );
	}

	public function getEdit( $id ) {
		$category = Category::find( $id );

		return view( 'admin.pages.categories.templates.edit', compact( 'category' ) );
	}

	public function postIndex( CategoryRequest $request ) {
		$request->store();

		return response()->json( 'Category has been added successfully', 200 );
	}

	public function postEdit( CategoryRequest $request, $id ) {
		$request->edit( $id );

		return response()->json( 'Category has been updated successfully', 200 );
	}

	public function getDelete( $id ) {
		$category = Category::find( $id );

		$category->delete();

		return redirect()->back();
	}
}
