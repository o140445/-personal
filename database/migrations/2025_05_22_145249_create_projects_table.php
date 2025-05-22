<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title');                    // 项目标题
            $table->text('description');                // 项目描述
            $table->text('content')->nullable();        // 项目详细内容
            $table->string('image');                    // 项目封面图片
            $table->json('technologies');               // 使用的技术栈
            $table->string('client')->nullable();       // 客户名称
            $table->date('start_date')->nullable();     // 开始日期
            $table->date('end_date')->nullable();       // 结束日期
            $table->string('website_url')->nullable();  // 项目网址
            $table->string('github_url')->nullable();   // GitHub仓库地址
            $table->json('challenges')->nullable();     // 技术挑战
            $table->json('solutions')->nullable();      // 解决方案
            $table->boolean('is_featured')->default(false); // 是否在首页展示
            $table->integer('sort_order')->default(0);  // 排序顺序
            $table->timestamps();                       // 创建和更新时间
            $table->softDeletes();                      // 软删除
        });
    }

    public function down()
    {
        Schema::dropIfExists('projects');
    }
};