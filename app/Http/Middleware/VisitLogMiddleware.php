<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\VisitLog;

class VisitLogMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        // 只记录页面访问，不记录API请求
        if ($request->isMethod('GET') && !$request->is('api/*')) {
            VisitLog::create([
                'ip' => $request->ip(),
                'url' => $request->fullUrl(),
                'referer' => $request->header('referer'),
                'user_agent' => $request->userAgent(),
                'page_title' => $this->getPageTitle($response),
            ]);
        }

        return $response;
    }

    private function getPageTitle($response)
    {
        if ($response->headers->get('content-type') === 'text/html') {
            $content = $response->getContent();
            if (preg_match('/<title>(.*?)<\/title>/i', $content, $matches)) {
                return $matches[1];
            }
        }
        return null;
    }
}