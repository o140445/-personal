@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-cyan-900">项目管理</h1>
        <a href="{{ route('admin.projects.create') }}"
           class="bg-cyan-500 text-white px-4 py-2 rounded-lg hover:bg-cyan-600">
            添加项目
        </a>
    </div>

    @if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
        {{ session('success') }}
    </div>
    @endif

    <div class="bg-white rounded-lg shadow overflow-hidden">
        <table class="min-w-full">
            <thead class="bg-cyan-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-cyan-900 uppercase tracking-wider">项目</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-cyan-900 uppercase tracking-wider">技术栈</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-cyan-900 uppercase tracking-wider">状态</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-cyan-900 uppercase tracking-wider">操作</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-cyan-100">
                @foreach($projects as $project)
                <tr>
                    <td class="px-6 py-4">
                        <div class="flex items-center">
                            <div class="h-10 w-10 flex-shrink-0">
                                <img class="h-10 w-10 rounded-full object-cover"
                                     src="{{ asset('storage/' . $project->image) }}"
                                     alt="{{ $project->title }}">
                            </div>
                            <div class="ml-4">
                                <div class="text-sm font-medium text-cyan-900">{{ $project->title }}</div>
                                <div class="text-sm text-cyan-600">{{ Str::limit($project->description, 50) }}</div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex flex-wrap gap-1">
                            @foreach($project->technologies as $tech)
                            <span class="px-2 py-1 text-xs bg-cyan-100 text-cyan-600 rounded-full">{{ $tech }}</span>
                            @endforeach
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <span class="px-2 py-1 text-xs rounded-full {{ $project->is_featured ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                            {{ $project->status == 'published' ? '已发布' : '未发布' }}
                        </span>
                    </td>
                    <td class="px-6 py-4 text-sm">
                        <a href="{{ route('admin.projects.edit', $project) }}"
                           class="text-cyan-600 hover:text-cyan-900 mr-3">编辑</a>
                        <form action="{{ route('admin.projects.destroy', $project) }}"
                              method="POST"
                              class="inline-block"
                              onsubmit="return confirm('确定要删除这个项目吗？');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-900">删除</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $projects->links() }}
    </div>
</div>
@endsection
