<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'required|max:255',
            'description' => 'required',
            'content' => 'nullable',
            'image' => $this->project ? 'nullable|image|max:2048' : 'required|image|max:2048',
            'technologies' => 'required|array',
            'client' => 'nullable|max:255',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'website_url' => 'nullable|url|max:255',
            'github_url' => 'nullable|url|max:255',
            'challenges' => 'nullable|array',
            'solutions' => 'nullable|array',
            'is_featured' => 'boolean',
            'sort_order' => 'integer',
            'status' => 'in:draft,published',
        ];
    }

    public function attributes()
    {
        return [
            'title' => '项目标题',
            'slug' => '项目标识',
            'description' => '项目描述',
            'content' => '项目内容',
            'image' => '项目图片',
            'technologies' => '技术栈',
            'client' => '客户名称',
            'start_date' => '开始日期',
            'end_date' => '结束日期',
            'website_url' => '项目网址',
            'github_url' => 'GitHub地址',
            'challenges' => '技术挑战',
            'solutions' => '解决方案',
            'is_featured' => '是否精选',
            'sort_order' => '排序顺序',
            'status' => '项目状态',
        ];
    }
}
