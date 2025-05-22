<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\VisitLog;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function dashboard()
    {
        // 访问统计
        $visitStats = [
            'total' => VisitLog::count(),
            'today' => VisitLog::whereDate('created_at', today())->count(),
            'unique' => VisitLog::distinct('ip')->count('ip'),
            'today_unique' => VisitLog::whereDate('created_at', today())
                ->distinct('ip')
                ->count('ip'),
        ];

        // 最近7天访问趋势
        $weeklyVisits = VisitLog::where('created_at', '>=', now()->subDays(7))
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
            ->limit(5)
            ->get();

        // 项目统计
        $projectStats = [
            'total' => Project::count(),
            'published' => Project::where('status', 'published')->count(),
            'draft' => Project::where('status', 'draft')->count(),
        ];

        return view('admin.dashboard', compact(
            'visitStats',
            'weeklyVisits',
            'topPages',
            'projectStats'
        ));
    }
}