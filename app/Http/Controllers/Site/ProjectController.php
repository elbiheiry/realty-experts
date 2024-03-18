<?php

namespace App\Http\Controllers\Site;

use App\Category;
use App\Http\Controllers\Controller;
use App\Project;
use App\Region;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    //
    public function getIndex(Request $request)
    {
        $regions = Region::with(['translations' => function ($q) {
            $q->where('locale', app()->getLocale());
        }])->orderBy('id', 'desc')->get();

        $categories = Category::with(['translations' => function ($q) {
            $q->where('locale', app()->getLocale());
        }])->orderBy('id', 'desc')->get();

        if (!empty($request->category_id) || !empty($request->region_id)) {
            $projects = Project::with(['translations' => function ($q) {
                $q->where('locale', app()->getLocale());
            }])->where('category_id', $request->category_id)
                ->orWhere('region_id', $request->region_id)
                ->orderBy('id', 'desc')->paginate(9);
        } else {
            $projects = Project::with(['translations' => function ($q) {
                $q->where('locale', app()->getLocale());
            }])->orderBy('id', 'desc')->paginate(9);
        }
        if (\request()->ajax()) {
            if (!empty($request->category_id) || !empty($request->region_id)) {
                $projects = Project::with(['translations' => function ($q) {
                    $q->where('locale', app()->getLocale());
                }])->where('category_id', $request->category_id)
                    ->orWhere('region_id', $request->region_id)
                    ->orderBy('id', 'desc')->paginate(9, ['*'], 'page', \request()->page);
            } else {
                $projects = Project::with(['translations' => function ($q) {
                    $q->where('locale', app()->getLocale());
                }])->orderBy('id', 'desc')->paginate(9, ['*'], 'page', \request()->page);
            }

            return view('site.pages.projects.templates.projects', compact('projects'));
        }

        return view('site.pages.projects.index', compact('projects', 'categories', 'regions'));
    }

    public function getProject($slug)
    {
        $project = Project::with(['translations' => function ($q) {
            $q->where('locale', app()->getLocale());
        }])->where('slug', $slug)->first();

        $relates = Project::with(['translations' => function ($q) {
            $q->where('locale', app()->getLocale());
        }])->where('id', '!=', $project->id)->take('4')->orderBy('id', 'desc')->get();

        return view('site.pages.projects.single', compact('project', 'relates'));

    }
}