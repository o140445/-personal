<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('visit_logs', function (Blueprint $table) {
            $table->id();
            $table->string('ip', 45);
            $table->string('url');
            $table->string('referer')->nullable();
            $table->string('user_agent')->nullable();
            $table->string('page_title')->nullable();
            $table->integer('stay_time')->nullable(); // 停留时间（秒）
            $table->timestamps();

            // 添加索引
            $table->index('created_at');
            $table->index('ip');
        });
    }

    public function down()
    {
        Schema::dropIfExists('visit_logs');
    }
};