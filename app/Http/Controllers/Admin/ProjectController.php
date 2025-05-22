<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProjectRequest;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::latest()->paginate(10);
        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        return view('admin.projects.create');
    }

    public function store(ProjectRequest $request)
    {
        $data = $request->validated();

        // 处理图片上传
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('projects', 'public');
        }


        // 创建项目
        Project::create($data);

       // 输出json
        return response()->json([
            'success' => true,
            'message' => '项目创建成功！',
            'redirect' => route('admin.projects.index')
        ]);

        // 重定向到项目列表
    }

    public function edit(Project $project)
    {
        Log::info('Project edit request', [
            'project' => $project,
        ]);
        return view('admin.projects.edit', compact('project'));
    }

    public function update(ProjectRequest $request, Project $project)
    {
        $data = $request->validated();

        // 处理图片上传
        if ($request->hasFile('image')) {
            // 删除旧图片
            if ($project->image) {
                Storage::disk('public')->delete($project->image);
            }
            $data['image'] = $request->file('image')->store('projects', 'public');
        }

        // 处理技术栈
//        $data['technologies'] = array_filter($data['technologies']);

        // 更新项目
        $project->update($data);

        // 输出json
        return response()->json([
            'success' => true,
            'message' => '项目更新成功！',
            'redirect' => route('admin.projects.index')
        ]);
    }

    public function destroy(Project $project)
    {
        // 删除项目图片
        if ($project->image) {
            \Illuminate\Support\Facades\Storage::disk('public')->delete($project->image);
        }

        $project->delete();

        return redirect()->route('admin.projects.index')
            ->with('success', '项目删除成功！');
    }
}
