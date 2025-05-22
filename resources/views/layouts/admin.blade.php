<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>后台管理</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- 添加字体图标 -->
    <link href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-50">
    <div class="min-h-screen">
        <!-- 顶部导航 -->
        <nav class="bg-white shadow-sm border-b border-gray-100">
            <div class=" mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 flex items-center">
                            <a href="{{ route('admin.dashboard') }}" class="text-xl font-bold text-cyan-600 flex items-center">

                                后台管理
                            </a>
                        </div>
                    </div>
                    <div class="flex items-center space-x-4">
                        <!-- 添加通知图标 -->
                        <button class="text-gray-500 hover:text-cyan-600 relative">
                            <i class="fas fa-bell"></i>
                            <span class="absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full h-4 w-4 flex items-center justify-center">3</span>
                        </button>
                        <!-- 用户菜单 -->
                        <div class="relative" x-data="{ open: false }">
                            <button @click="open = !open" class="flex items-center text-gray-700 hover:text-cyan-600">
                                <img class="h-8 w-8 rounded-full" src="https://ui-avatars.com/api/?name=Admin&background=0D9488&color=fff" alt="用户头像">
                                <span class="ml-2">管理员</span>
                                <i class="fas fa-chevron-down ml-2 text-xs"></i>
                            </button>
                            <!-- 下拉菜单 -->
                            <div x-show="open" @click.away="open = false" class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1">
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                    <i class="fas fa-user mr-2"></i>个人设置
                                </a>
                                <form action="{{ route('admin.logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                        <i class="fas fa-sign-out-alt mr-2"></i>退出登录
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <div class="flex">
            <!-- 侧边栏 -->
            <div class="w-64 min-h-screen bg-white border-r border-gray-100">
                <div class="py-4">
                    <nav class="mt-5 px-2 space-y-1">
                        <a href="{{ route('admin.dashboard') }}"
                           class="group flex items-center px-2 py-2 text-base font-medium rounded-md {{ request()->routeIs('admin.dashboard') ? 'bg-cyan-50 text-cyan-600' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}">
                            <i class="fas fa-tachometer-alt mr-3 {{ request()->routeIs('admin.dashboard') ? 'text-cyan-600' : 'text-gray-400 group-hover:text-gray-500' }}"></i>
                            仪表盘
                        </a>

                        <a href="{{ route('admin.projects.index') }}"
                           class="group flex items-center px-2 py-2 text-base font-medium rounded-md {{ request()->routeIs('admin.projects.*') ? 'bg-cyan-50 text-cyan-600' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}">
                            <i class="fas fa-project-diagram mr-3 {{ request()->routeIs('admin.projects.*') ? 'text-cyan-600' : 'text-gray-400 group-hover:text-gray-500' }}"></i>
                            项目管理
                        </a>

                        <!-- 添加系统设置菜单 -->
                        <div class="pt-4 mt-4 border-t border-gray-100">
                            <h3 class="px-3 text-xs font-semibold text-gray-500 uppercase tracking-wider">
                                系统设置
                            </h3>
                            <div class="mt-2 space-y-1">
                                <a href="#" class="group flex items-center px-2 py-2 text-base font-medium rounded-md text-gray-600 hover:bg-gray-50 hover:text-gray-900">
                                    <i class="fas fa-cog mr-3 text-gray-400 group-hover:text-gray-500"></i>
                                    基本设置
                                </a>
                                <a href="#" class="group flex items-center px-2 py-2 text-base font-medium rounded-md text-gray-600 hover:bg-gray-50 hover:text-gray-900">
                                    <i class="fas fa-shield-alt mr-3 text-gray-400 group-hover:text-gray-500"></i>
                                    安全设置
                                </a>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>

            <!-- 主要内容区域 -->
            <div class="flex-1">
                <main class="py-10">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <!-- 添加页面标题 -->
                        <!-- <div class="mb-6">
                            <h1 class="text-2xl font-semibold text-gray-900">{{ $title ?? '仪表盘' }}</h1>
                            <p class="mt-1 text-sm text-gray-500">{{ $description ?? '欢迎使用后台管理系统' }}</p>
                        </div> -->
                        @yield('content')
                    </div>
                </main>
            </div>
        </div>
    </div>

    <!-- 添加 Alpine.js 用于交互 -->
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @stack('scripts')
</body>
</html>