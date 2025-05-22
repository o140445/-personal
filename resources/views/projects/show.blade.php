@extends('layouts.app')

@section('title', $project['title'] . ' - 作品详情')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <!-- 项目头部 -->
    <div class="bg-gradient-to-r from-cyan-500 to-cyan-600 rounded-t-lg overflow-hidden">
        <div class="max-w-4xl mx-auto px-8 py-12 text-center">
            <h1 class="text-4xl font-bold text-white mb-4">{{ $project['title'] }}</h1>
            <p class="text-cyan-100 text-lg">{{ $project['description'] }}</p>
        </div>
    </div>

    <!-- 项目主体 -->
    <div class="bg-white rounded-b-lg shadow-lg">
        <div class="max-w-4xl mx-auto px-8 py-12">
            <!-- 项目图片 -->
            <div class="mb-12">
                <img src="{{ Storage::url($project['image']) }}" alt="{{ $project['title'] }}" class="w-full h-[400px] object-cover rounded-lg shadow-md">
            </div>

            <!-- 使用技术 -->
            <div class="mb-12">
                <h2 class="text-2xl font-bold text-cyan-900 mb-6">使用技术</h2>
                <div class="flex flex-wrap gap-3">
                    @foreach($project['technologies'] as $tech)
                    <span class="px-4 py-2 bg-cyan-50 text-cyan-600 rounded-full text-sm font-medium border border-cyan-100">{{ $tech }}</span>
                    @endforeach
                </div>
            </div>

            <!-- 项目内容 -->
            <div class="mb-12">
                <h2 class="text-2xl font-bold text-cyan-900 mb-6">项目内容</h2>
                <div class="prose prose-cyan max-w-none">
                    <div class="text-gray-600 leading-relaxed whitespace-pre-line">{{ $project['content'] }}</div>
                </div>
            </div>

            <!-- 技术挑战与解决方案 -->
            <!-- <div class="mb-12">
                <h2 class="text-2xl font-bold text-cyan-900 mb-6">技术挑战与解决方案</h2>
                <div class="space-y-8">
{{--                    @foreach($project['challenges'] as $index => $challenge)--}}
                    <div class="bg-gradient-to-r from-cyan-50 to-white p-8 rounded-xl shadow-sm border border-cyan-100">
                        <div class="flex items-start gap-4">
                            <div class="flex-shrink-0 w-12 h-12 bg-cyan-100 rounded-full flex items-center justify-center">
{{--                                <span class="text-cyan-600 font-bold">{{ $index + 1 }}</span>--}}
                            </div>
                            <div class="flex-grow">
                                <h3 class="text-xl font-semibold text-cyan-900 mb-3">挑战</h3>
{{--                                <p class="text-gray-600 mb-4">{{ $challenge }}</p>--}}
                                <div class="bg-white p-6 rounded-lg border border-cyan-100">
                                    <h4 class="text-lg font-medium text-cyan-900 mb-2">解决方案</h4>
{{--                                    <p class="text-gray-600">{{ $project['solutions'][$index] }}</p>--}}
                                </div>
                            </div>
                        </div>
                    </div>
{{--                    @endforeach--}}
                </div>
            </div> -->

            <!-- 返回按钮 -->
            <div class="flex justify-center">
                <a href="{{ route('projects.index') }}" class="inline-flex items-center px-6 py-3 bg-cyan-50 text-cyan-600 rounded-lg hover:bg-cyan-100 transition duration-300">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    返回项目列表
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
