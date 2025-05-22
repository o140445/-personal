@extends('layouts.app')

@section('title', '游戏币 - PHP全栈开发工程师')

@section('content')
<!-- 个人介绍 -->
<section class="bg-gradient-to-r from-cyan-500 to-cyan-600 text-white py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <img src="{{ asset($profile['image']) }}" alt="{{ $profile['name'] }}" class="w-32 h-32 rounded-full mx-auto mb-8 border-4 border-white shadow-lg">
            <h1 class="text-4xl font-bold mb-4">{{ $profile['name'] }}</h1>
            <p class="text-xl text-cyan-100 mb-8">{{ $profile['title'] }}</p>
            <p class="max-w-2xl mx-auto text-cyan-50 mb-12">
                {{ $profile['description'] }}
            </p>
            <div class="flex justify-center space-x-6">
                <a href="#projects"
                   class="inline-flex items-center px-6 py-3 border-2 border-white text-white rounded-lg hover:bg-white hover:text-cyan-600 transition duration-300">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                    </svg>
                    查看作品
                </a>
                <a href="#contact"
                   class="inline-flex items-center px-6 py-3 bg-white text-cyan-600 rounded-lg hover:bg-cyan-50 transition duration-300">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                    联系我
                </a>
            </div>
        </div>
    </div>
</section>

<!-- 服务介绍 -->
<section class="py-20 bg-cyan-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl font-bold text-center text-cyan-900 mb-12">我的服务</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($services as $service)
            <div class="bg-white p-8 rounded-lg shadow-lg hover:shadow-xl transition duration-300">
                <div class="text-cyan-600 mb-4">
                    <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-cyan-900 mb-4">{{ $service['title'] }}</h3>
                <p class="text-cyan-600 mb-4">{{ $service['description'] }}</p>
                <ul class="space-y-2">
                    @foreach($service['items'] as $item)
                    <li class="flex items-center text-cyan-600">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        {{ $item }}
                    </li>
                    @endforeach
                </ul>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- 技能展示 -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl font-bold text-center text-cyan-900 mb-12">专业技能</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
            <!-- 开发技能 -->
            <div>
                <h3 class="text-xl font-semibold text-cyan-900 mb-6">开发技能</h3>
                @foreach($skills['development'] as $skill)
                <div class="mb-6">
                    <div class="flex justify-between mb-2">
                        <span class="text-cyan-600 font-medium">{{ $skill['name'] }}</span>
                        <span class="text-cyan-600">{{ $skill['percentage'] }}%</span>
                    </div>
                    <div class="h-2 bg-cyan-100 rounded-full">
                        <div class="h-2 bg-cyan-600 rounded-full" style="width: {{ $skill['percentage'] }}%"></div>
                    </div>
                </div>
                @endforeach
            </div>
            <!-- DevOps技能 -->
            <div>
                <h3 class="text-xl font-semibold text-cyan-900 mb-6">DevOps技能</h3>
                @foreach($skills['devops'] as $skill)
                <div class="mb-6">
                    <div class="flex justify-between mb-2">
                        <span class="text-cyan-600 font-medium">{{ $skill['name'] }}</span>
                        <span class="text-cyan-600">{{ $skill['percentage'] }}%</span>
                    </div>
                    <div class="h-2 bg-cyan-100 rounded-full">
                        <div class="h-2 bg-cyan-600 rounded-full" style="width: {{ $skill['percentage'] }}%"></div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<!-- 精选项目 -->
<section class="py-20 bg-cyan-50" id="projects">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl font-bold text-center text-cyan-900 mb-12">精选项目</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($projects as $project)
            <div class="bg-white rounded-lg overflow-hidden shadow-lg hover:shadow-xl transition duration-300">
                <img src="{{ Storage::url($project['image']) }}" alt="{{ $project['title'] }}" class="w-full h-48 object-cover">
                <div class="p-6">
                    <h3 class="text-xl font-semibold text-cyan-900 mb-2">{{ $project['title'] }}</h3>
                    <p class="text-cyan-600 mb-4">{{ $project['description'] }}</p>
                    <div class="flex flex-wrap gap-2 mb-4">
                        @foreach($project['technologies'] as $tech)
                        <span class="px-3 py-1 bg-cyan-100 text-cyan-600 rounded-full text-sm">{{ $tech }}</span>
                        @endforeach
                    </div>
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

        <!-- 查看更多按钮 -->
        <div class="text-center mt-12">
            <a href="{{ route('projects.index') }}"
               class="inline-flex items-center px-6 py-3 border-2 border-cyan-500 text-cyan-600 rounded-lg hover:bg-cyan-50 transition duration-300">
                查看更多项目
                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                </svg>
            </a>
        </div>
    </div>
</section>

<!-- 联系方式 -->
<section id="contact" class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl font-bold text-center text-cyan-900 mb-12">联系方式</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-2xl mx-auto">
            <!-- 微信 -->
            <div class="bg-cyan-50 p-8 rounded-lg text-center" onclick="showWechatQR()">
                <div class="text-cyan-600 mb-4">
                    <svg class="w-12 h-12 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-cyan-900 mb-2">微信</h3>
                <button  class="text-cyan-600 hover:text-cyan-700">
                    {{ $contact['wechat'] }}
                </button>
            </div>

            <!-- 邮箱 -->
            <div class="bg-cyan-50 p-8 rounded-lg text-center">
                <a href="mailto:{{ $contact['email'] }}">

                    <div class="text-cyan-600 mb-4">
                        <svg class="w-12 h-12 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-cyan-900 mb-2">邮箱</h3>
                    <div class="text-cyan-600 hover:text-cyan-700">
                        {{ $contact['email'] }}
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- 微信二维码弹窗 -->
<div id="wechatQRModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
    <div class="bg-white p-6 rounded-lg max-w-sm w-full mx-4">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-lg font-semibold text-cyan-900">扫描二维码添加微信</h3>
            <button onclick="hideWechatQR()" class="text-gray-500 hover:text-gray-700">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        <img src="{{ asset('images/wechat-qr.jpg') }}" alt="微信二维码" class="w-full rounded-lg">
    </div>
</div>

<script>
function showWechatQR() {
    document.getElementById('wechatQRModal').classList.remove('hidden');
    document.getElementById('wechatQRModal').classList.add('flex');
}

function hideWechatQR() {
    document.getElementById('wechatQRModal').classList.add('hidden');
    document.getElementById('wechatQRModal').classList.remove('flex');
}

// 点击弹窗外部关闭弹窗
document.getElementById('wechatQRModal').addEventListener('click', function(e) {
    if (e.target === this) {
        hideWechatQR();
    }
});
</script>

<!-- 常见问题 -->
<section class="py-20 bg-cyan-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl font-bold text-center text-cyan-900 mb-12">常见问题</h2>
        <div class="max-w-3xl mx-auto space-y-6">
            @foreach($faqs as $faq)
            <div class="bg-white rounded-lg shadow-lg p-8 border border-cyan-50 hover:shadow-xl transition duration-300">
                <h3 class="text-xl font-semibold text-cyan-900 mb-4">{{ $faq['question'] }}</h3>
                <p class="text-cyan-600">{{ $faq['answer'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
