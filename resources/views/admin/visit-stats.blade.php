
@extends('layouts.admin')


@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-6">网站访问统计</h1>

    <!-- 统计概览 -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-8">
        <div class="bg-white rounded-lg shadow p-6">
            <h3 class="text-lg font-semibold mb-2">总访问量</h3>
            <p class="text-3xl font-bold text-cyan-600">{{ number_format($totalVisits) }}</p>
        </div>
        <div class="bg-white rounded-lg shadow p-6">
            <h3 class="text-lg font-semibold mb-2">今日访问量</h3>
            <p class="text-3xl font-bold text-cyan-600">{{ number_format($todayVisits) }}</p>
        </div>
        <div class="bg-white rounded-lg shadow p-6">
            <h3 class="text-lg font-semibold mb-2">总独立访客</h3>
            <p class="text-3xl font-bold text-cyan-600">{{ number_format($uniqueVisitors) }}</p>
        </div>
        <div class="bg-white rounded-lg shadow p-6">
            <h3 class="text-lg font-semibold mb-2">今日独立访客</h3>
            <p class="text-3xl font-bold text-cyan-600">{{ number_format($todayUniqueVisitors) }}</p>
        </div>
    </div>

    <!-- 访问趋势 -->
    <div class="bg-white rounded-lg shadow p-6 mb-8">
        <h3 class="text-lg font-semibold mb-4">最近7天访问趋势</h3>
        <div class="h-64">
            <!-- 这里可以添加图表，比如使用 Chart.js -->
        </div>
    </div>

    <!-- 访问详情 -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
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

        <!-- 来源统计 -->
        <div class="bg-white rounded-lg shadow p-6">
            <h3 class="text-lg font-semibold mb-4">访问来源</h3>
            <div class="space-y-4">
                @foreach($referrers as $referrer)
                <div class="flex justify-between items-center">
                    <div class="flex-1">
                        <div class="font-medium">{{ $referrer->referer ?: '直接访问' }}</div>
                    </div>
                    <span class="font-semibold">{{ number_format($referrer->count) }}次</span>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection