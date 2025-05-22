{{-- resources/views/admin/projects/_form.blade.php --}}
<div class="max-w-4xl mx-auto">
    <div class="bg-white rounded-xl shadow-sm overflow-hidden">
        {{-- 头部区域 --}}
        <div class="bg-gradient-to-r from-cyan-500 to-cyan-600 px-6 py-4">
            <h2 class="text-xl font-semibold text-white">{{ isset($project) ? '编辑项目' : '创建项目' }}</h2>
            <p class="mt-1 text-sm text-cyan-100">{{ isset($project) ? '修改项目信息和内容' : '添加新的项目' }}</p>
        </div>

        {{-- 消息提示区域 --}}
        <div id="messageBox" class="hidden">
            <div class="p-4">
                <p id="messageText" class="text-sm"></p>
            </div>
        </div>

        <form id="projectForm"
              action="{{ isset($project) ? route('admin.projects.update', $project) : route('admin.projects.store') }}"
              method="POST"
              enctype="multipart/form-data"
              class="p-6 space-y-6">
            @csrf
            @if(isset($project))
                @method('PUT')
            @endif

            {{-- 标题和描述区域 --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- 标题 -->
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700 mb-2">标题</label>
                    <input type="text" name="title" id="title"
                           class="w-full h-12 px-4 rounded-lg border-2 border-cyan-500 shadow-sm focus:border-cyan-500 focus:ring-cyan-500 transition-colors duration-200 bg-white"
                           value="{{ old('title', $project->title ?? '') }}" required>
                    @error('title')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- 状态 -->
                <div>
                    <label for="status" class="block text-sm font-medium text-gray-700 mb-2">状态</label>
                    <select name="status" id="status"
                            class="w-full h-12 px-4 rounded-lg border-2 border-cyan-500 shadow-sm focus:border-cyan-500 focus:ring-cyan-500 transition-colors duration-200 bg-white">
                        <option value="draft" {{ (isset($project) && $project->status === 'draft') ? 'selected' : '' }}>草稿</option>
                        <option value="published" {{ (isset($project) && $project->status === 'published') ? 'selected' : '' }}>已发布</option>
                    </select>
                    @error('status')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- 描述 -->
            <div>
                <label for="description" class="block text-sm font-medium text-gray-700 mb-2">简短描述</label>
                <textarea name="description" id="description" rows="3"
                          class="w-full px-4 py-3 rounded-lg border-2 border-cyan-500 shadow-sm focus:border-cyan-500 focus:ring-cyan-500 transition-colors duration-200 bg-white resize-none"
                          required>{{ old('description', $project->description ?? '') }}</textarea>
                @error('description')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- 内容 -->
            <div>
                <label for="content" class="block text-sm font-medium text-gray-700 mb-2">详细内容</label>
                <textarea name="content" id="content" rows="6"
                          class="w-full px-4 py-3 rounded-lg border-2 border-cyan-500 shadow-sm focus:border-cyan-500 focus:ring-cyan-500 transition-colors duration-200 bg-white resize-none"
                          required>{{ old('content', $project->content ?? '') }}</textarea>
                @error('content')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- 技术栈 -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">技术栈</label>
                <div class="space-y-4">
                    <!-- 已选技术栈展示 -->
                    <div id="selectedTechs" class="flex flex-wrap gap-2 min-h-[40px] p-3 bg-gray-50 rounded-lg border border-gray-200">
                        @if(isset($project) && !empty($project->technologies))
                            @foreach($project->technologies as $tech)
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-cyan-100 text-cyan-800 border border-cyan-200">
                                    {{ $tech }}
                                    <button type="button" class="ml-1 text-cyan-600 hover:text-cyan-800 remove-tech" data-tech="{{ $tech }}">
                                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    </button>
                                </span>
                            @endforeach
                        @endif
                    </div>

                    <!-- 技术栈选择器 -->
                    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">
                        @php
                            $techGroups = [
                                '后端' => ['PHP', 'Laravel', 'MySQL', 'Redis', 'MongoDB'],
                                '前端' => ['JavaScript', 'Vue.js', 'React', 'Tailwind CSS', 'Bootstrap'],
                                'DevOps' => ['Docker', 'Git', 'Linux', 'Nginx', 'AWS'],
                                '其他' => ['RESTful API', 'WebSocket', '微服务', 'CI/CD']
                            ];
                        @endphp

                        @foreach($techGroups as $group => $techs)
                            <div class="space-y-2">
                                <h4 class="text-xs font-medium text-gray-500 uppercase tracking-wider">{{ $group }}</h4>
                                <div class="space-y-2">
                                    @foreach($techs as $tech)
                                        <label class="relative inline-flex items-center w-full">
                                            <input type="checkbox"
                                                   name="technologies[]"
                                                   value="{{ $tech }}"
                                                   class="hidden peer tech-checkbox"
                                                   {{ isset($project) && in_array($tech, $project->technologies) ? 'checked' : '' }}>
                                            <div class="w-full px-3 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg cursor-pointer peer-checked:bg-cyan-50 peer-checked:border-cyan-500 peer-checked:text-cyan-700 hover:bg-gray-50 transition-all duration-200">
                                                {{ $tech }}
                                            </div>
                                        </label>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                @error('technologies')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- 项目图片 -->
            <div>
                <label for="image" class="block text-sm font-medium text-gray-700 mb-2">项目图片</label>
                <div class="flex items-start space-x-6">
                    <div class="w-40 h-40 relative group rounded-lg overflow-hidden">
                        <img id="imagePreview"
                             src="{{ isset($project) && $project->image ? Storage::url($project->image) : asset('images/placeholder.png') }}"
                             alt="{{ $project->title ?? '项目图片' }}"
                             class="w-full h-full object-cover">
                        <div id="imageOverlay"
                             class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-200 cursor-pointer">
                            <span class="text-white text-sm">点击更换图片</span>
                        </div>
                    </div>
                    <div class="flex-1">
                        <input type="file"
                               name="image"
                               id="image"
                               accept="image/*"
                               class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-cyan-50 file:text-cyan-700 hover:file:bg-cyan-100 transition-colors duration-200"
                               {{ !isset($project) ? 'required' : '' }}>
                        <p class="mt-2 text-sm text-gray-500">建议尺寸：800x600 像素，最大 2MB</p>
                    </div>
                </div>
                @error('image')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- 提交按钮 -->
            <div class="flex justify-end space-x-4 pt-4 border-t border-gray-200">
                <a href="{{ route('admin.projects.index') }}"
                   class="px-4 py-2 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50 transition-colors duration-200">
                    取消
                </a>
                <button type="submit"
                        id="submitBtn"
                        class="px-4 py-2 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-cyan-600 hover:bg-cyan-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-500 transition-all duration-200">
                    {{ isset($project) ? '保存更改' : '创建项目' }}
                </button>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('projectForm');
    const submitBtn = document.getElementById('submitBtn');
    const messageBox = document.getElementById('messageBox');
    const messageText = document.getElementById('messageText');

    // 显示消息函数
    function showMessage(message, type = 'success') {
        messageBox.className = `hidden p-4 rounded-lg ${type === 'success' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700'}`;
        messageText.textContent = message;
        messageBox.classList.remove('hidden');
    }

    // 表单提交处理
    form.addEventListener('submit', async function(e) {
        e.preventDefault();
        console.log('Form submission intercepted');

        // 禁用提交按钮
        submitBtn.disabled = true;
        submitBtn.innerHTML = `
            <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white inline-block" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
            处理中...
        `;

        try {
            const formData = new FormData(form);
            console.log('Form data:', Object.fromEntries(formData));

            const response = await fetch(form.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json'
                }
            });

            console.log('Response status:', response.status);
            const data = await response.json();
            console.log('Response data:', data);

            if (data.success) {
                showMessage(data.message, 'success');
                setTimeout(() => {
                    window.location.href = data.redirect;
                }, 1500);
            } else {
                showMessage(data.message, 'error');
                submitBtn.disabled = false;
                submitBtn.textContent = '{{ isset($project) ? "保存更改" : "创建项目" }}';
            }
        } catch (error) {
            console.error('Error:', error);
            showMessage('提交失败，请重试', 'error');
            submitBtn.disabled = false;
            submitBtn.textContent = '{{ isset($project) ? "保存更改" : "创建项目" }}';
        }
    });

    // 技术栈选择器
    const selectedTechs = document.getElementById('selectedTechs');
    const techCheckboxes = document.querySelectorAll('.tech-checkbox');

    // 处理技术选择
    techCheckboxes.forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            const tech = this.value;
            const techTag = document.querySelector(`[data-tech="${tech}"]`)?.parentElement;

            if (this.checked && !techTag) {
                const newTechTag = document.createElement('span');
                newTechTag.className = 'inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-cyan-100 text-cyan-800 border border-cyan-200';
                newTechTag.innerHTML = `
                    ${tech}
                    <button type="button" class="ml-1 text-cyan-600 hover:text-cyan-800 remove-tech" data-tech="${tech}">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                `;
                selectedTechs.appendChild(newTechTag);
                newTechTag.querySelector('.remove-tech').addEventListener('click', () => removeTech(tech));
            } else if (!this.checked && techTag) {
                techTag.remove();
            }
        });
    });

    // 处理技术移除
    function removeTech(tech) {
        const checkbox = document.querySelector(`input[type="checkbox"][value="${tech}"]`);
        if (checkbox) {
            checkbox.checked = false;
            checkbox.dispatchEvent(new Event('change'));
        }
    }

    // 图片预览
    const imageInput = document.getElementById('image');
    const imagePreview = document.getElementById('imagePreview');

    if (imageInput && imagePreview) {
        imageInput.addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    imagePreview.src = e.target.result;
                }
                reader.readAsDataURL(file);
            }
        });
    }

    // 初始化已选技术栈
    techCheckboxes.forEach(checkbox => {
        if (checkbox.checked) {
            checkbox.dispatchEvent(new Event('change'));
        }
    });
});
</script>
@endpush