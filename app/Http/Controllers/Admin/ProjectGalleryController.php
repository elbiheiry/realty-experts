<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProjectGalleryRequest;
use App\ProjectGallery;
use Illuminate\Http\Request;

class ProjectGalleryController extends Controller
{
    //
    public function getIndex($id)
    {
        $images = ProjectGallery::where('project_id', $id)->orderBy('id', 'desc')->get();

        return view('admin.pages.projects.gallery.index', compact('images','id'));
    }

    public function getEdit($id)
    {
        $image = ProjectGallery::find($id);

        return view('admin.pages.projects.gallery.templates.edit', compact('image'));
    }

    public function postIndex(ProjectGalleryRequest $request, $id)
    {
        $request->store($id);

        return response()->json('Image has been added successfully', 200);
    }

    public function postEdit(ProjectGalleryRequest $request, $id)
    {
        $request->edit($id);

        return response()->json('Image has been updated successfully', 200);
    }

    public function getDelete($id)
    {
        $image = ProjectGallery::find($id);

        $image->delete();

        return redirect()->back();
    }
}
