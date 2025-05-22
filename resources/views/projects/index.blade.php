@extends('layouts.app')

@section('title', '项目列表')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <!-- 页面标题 -->
    <div class="text-center mb-16">
        <h1 class="text-4xl font-bold text-cyan-900 mb-4">项目列表</h1>
        <p class="text-lg text-cyan-600">这里展示了我参与开发的一些代表性项目</p>
    </div>

    <!-- 项目列表 -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach($projects as $project)
        <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition duration-300 border border-cyan-50">
            <!-- 项目图片 -->
            <div class="relative">
                <img src="{{ Storage::url($project['image']) }}" alt="{{ $project['title'] }}" class="w-full h-56 object-cover">
            </div>

            <!-- 项目内容 -->
            <div class="p-6">
                <h2 class="text-xl font-bold text-cyan-900 mb-3">{{ $project['title'] }}</h2>
                <p class="text-gray-600 mb-4 line-clamp-2">{{ $project['description'] }}</p>

                <!-- 技术标签 -->
                <div class="flex flex-wrap gap-2 mb-6">
                    @foreach($project['technologies'] as $tech)
                    <span class="px-3 py-1 bg-cyan-50 text-cyan-600 rounded-full text-sm border border-cyan-100">{{ $tech }}</span>
                    @endforeach
                </div>

                <!-- 查看详情按钮 -->
                <a href="{{ route('projects.show', $project['id']) }}"
                   class="inline-flex items-center justify-center w-full bg-gradient-to-r from-cyan-500 to-cyan-600 text-white px-6 py-3 rounded-lg hover:from-cyan-600 hover:to-cyan-700 transition duration-300">
                    查看详情
                    <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </a>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
