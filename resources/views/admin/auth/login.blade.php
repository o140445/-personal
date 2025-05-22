<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>后台登录</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-cyan-50">
    <div class="min-h-screen flex items-center justify-center">
        <div class="max-w-md w-full bg-white rounded-lg shadow-lg p-8">
            <h2 class="text-2xl font-bold text-center text-cyan-900 mb-8">后台登录</h2>

            @if($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
                @endforeach
            </div>
            @endif

            <form action="{{ route('admin.login') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label class="block text-cyan-900 font-medium mb-2">邮箱</label>
                    <input type="email" name="email" value="{{ old('email') }}" required
                           class="w-full px-3 py-2 border border-cyan-200 rounded-lg focus:outline-none focus:border-cyan-500">
                </div>

                <div class="mb-6">
                    <label class="block text-cyan-900 font-medium mb-2">密码</label>
                    <input type="password" name="password" required
                           class="w-full px-3 py-2 border border-cyan-200 rounded-lg focus:outline-none focus:border-cyan-500">
                </div>

                <div class="mb-6">
                    <label class="inline-flex items-center">
                        <input type="checkbox" name="remember" class="form-checkbox text-cyan-600">
                        <span class="ml-2 text-cyan-900">记住我</span>
                    </label>
                </div>

                <button type="submit"
                        class="w-full bg-cyan-500 text-white px-4 py-2 rounded-lg hover:bg-cyan-600">
                    登录
                </button>
            </form>
        </div>
    </div>
</body>
</html>