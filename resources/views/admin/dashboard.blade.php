@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-6">仪表盘</h1>

    <!-- 访问统计卡片 -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-8">
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-cyan-100 text-cyan-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                </div>
                <div class="ml-4">
                    <h3 class="text-lg font-semibold text-gray-600">总访问量</h3>
                    <p class="text-3xl font-bold text-cyan-600">{{ number_format($visitStats['total']) }}</p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-cyan-100 text-cyan-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <div class="ml-4">
                    <h3 class="text-lg font-semibold text-gray-600">今日访问</h3>
                    <p class="text-3xl font-bold text-cyan-600">{{ number_format($visitStats['today']) }}</p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-cyan-100 text-cyan-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                </div>
                <div class="ml-4">
                    <h3 class="text-lg font-semibold text-gray-600">独立访客</h3>
                    <p class="text-3xl font-bold text-cyan-600">{{ number_format($visitStats['unique']) }}</p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-cyan-100 text-cyan-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <div class="ml-4">
                    <h3 class="text-lg font-semibold text-gray-600">今日独立访客</h3>
                    <p class="text-3xl font-bold text-cyan-600">{{ number_format($visitStats['today_unique']) }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- 访问趋势和项目统计 -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
        <!-- 访问趋势 -->
        <div class="bg-white rounded-lg shadow p-6">
            <h3 class="text-lg font-semibold mb-4">最近7天访问趋势</h3>
            <div class="h-64">
                <!-- 这里可以添加图表，比如使用 Chart.js -->
            </div>
        </div>

        <!-- 项目统计 -->
        <div class="bg-white rounded-lg shadow p-6">
            <h3 class="text-lg font-semibold mb-4">项目统计</h3>
            <div class="grid grid-cols-3 gap-4">
                <div class="text-center">
                    <div class="text-3xl font-bold text-cyan-600">{{ $projectStats['total'] }}</div>
                    <div class="text-sm text-gray-600">总项目数</div>
                </div>
                <div class="text-center">
                    <div class="text-3xl font-bold text-green-600">{{ $projectStats['published'] }}</div>
                    <div class="text-sm text-gray-600">已发布</div>
                </div>
                <div class="text-center">
                    <div class="text-3xl font-bold text-yellow-600">{{ $projectStats['draft'] }}</div>
                    <div class="text-sm text-gray-600">草稿</div>
                </div>
            </div>
        </div>
    </div>

    <!-- 最常访问页面 -->
    <div class="bg-white rounded-lg shadow p-6">
        <h3 class="text-lg font-semibold mb-4">最常访问页面</h3>
        <div class="space-y-4">
            @foreach($topPages as $page)
            <div class="flex justify-between items-center">
                <div class="flex-1">
                    <div class="font-medium">{{ $page->page_title ?: '未命名页面' }}</div>
                    <div class="text-sm text-gray-500">{{ $page->url }}</div>
                </div>
                <span class="font-semibold">{{ number_format($page->count) }}次</span>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection