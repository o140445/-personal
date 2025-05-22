<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects =  Project::where('status', 'published')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('projects.index', compact('projects'));
    }

    public function show($id)
    {
        $projects = Project::where('status', 'published')
            ->orderBy('created_at', 'desc')
            ->get()
            ->keyBy('id');

        if (!isset($projects[$id])) {
            abort(404);
        }

        $project = $projects[$id];
        return view('projects.show', compact('project'));
    }
}
