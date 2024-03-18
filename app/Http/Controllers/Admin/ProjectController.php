<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProjectRequest;
use App\Project;
use App\Region;
use Illuminate\Http\Request;

class ProjectController extends Controller {
	//
	public function getIndex() {
		$projects   = Project::orderBy( 'id', 'desc' )->get();
		$categories = Category::orderBy( 'id', 'desc' )->get();
		$regions    = Region::orderBy( 'id', 'desc' )->get();

		return view( 'admin.pages.projects.index', compact( 'projects', 'regions', 'categories' ) );
	}

	public function getEdit( $id ) {
		$project    = Project::find( $id );
		$categories = Category::orderBy( 'id', 'desc' )->get();
		$regions    = Region::orderBy( 'id', 'desc' )->get();

		return view( 'admin.pages.projects.edit', compact( 'project', 'regions', 'categories' ) );
	}

	public function postIndex( ProjectRequest $request ) {
		$request->store();

		return response()->json( 'Project has been added successfully', 200 );
	}

	public function postEdit( ProjectRequest $request, $id ) {
		$request->edit( $id );

		return response()->json( 'Project has been edited successfully', 200 );
	}

	public function getDelete( $id ) {
		$project = Project::find( $id );

		$project->delete();

		return redirect()->back();
	}
}
