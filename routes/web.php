<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\ProjectController as AdminProjectController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Middleware\VisitLogMiddleware;

// 确保所有路由都在 web 中间件组中
Route::middleware(['web', VisitLogMiddleware::class])->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');

    // 项目详情路由
    Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
    Route::get('/projects/{id}', [ProjectController::class, 'show'])->name('projects.show');

    // 管理员路由
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
        Route::post('login', [AuthController::class, 'login']);
        Route::post('logout', [AuthController::class, 'logout'])->name('logout');

        // 需要登录的路由
        Route::middleware(AdminMiddleware::class)->group(function () {
            Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
            Route::resource('projects', AdminProjectController::class);
        });
    });
});