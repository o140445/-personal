<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\VisitLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VisitStatsController extends Controller
{
    public function index()
    {
        // 总访问量
        $totalVisits = VisitLog::count();

        // 今日访问量
        $todayVisits = VisitLog::whereDate('created_at', today())->count();

        // 独立访客数（按IP统计）
        $uniqueVisitors = VisitLog::distinct('ip')->count('ip');

        // 今日独立访客
        $todayUniqueVisitors = VisitLog::whereDate('created_at', today())
            ->distinct('ip')
            ->count('ip');

        // 最近7天访问趋势
        $weeklyTrend = VisitLog::where('created_at', '>=', now()->subDays(7))
            ->select(
                DB::raw('DATE(created_at) as date'),
                DB::raw('COUNT(*) as visits'),
                DB::raw('COUNT(DISTINCT ip) as unique_visitors')
            )
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        // 最常访问的页面
        $topPages = VisitLog::select('url', 'page_title', DB::raw('COUNT(*) as count'))
            ->groupBy('url', 'page_title')
            ->orderByDesc('count')
            ->limit(10)
            ->get();

        // 来源统计
        $referrers = VisitLog::select('referer', DB::raw('COUNT(*) as count'))
            ->whereNotNull('referer')
            ->groupBy('referer')
            ->orderByDesc('count')
            ->limit(10)
            ->get();

        return view('admin.visit-stats', compact(
            'totalVisits',
            'todayVisits',
            'uniqueVisitors',
            'todayUniqueVisitors',
            'weeklyTrend',
            'topPages',
            'referrers'
        ));
    }
}