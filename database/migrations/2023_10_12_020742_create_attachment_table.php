<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('attachment', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('post_id')->constrained()->onDelete('cascade');
            $table->string('thumbnail');
            $table->string('structure');                // .mcstructure のパス
            $table->string('structure_name')->unique(); // mystructure:xxxxx など
            $table->string('attachment');               // 画像もしくは3Dエクスポートされたデータのパス
            $table->enum('attachment_type', [
                'image',
                '3dmodel',
            ]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attachment');
    }
};
