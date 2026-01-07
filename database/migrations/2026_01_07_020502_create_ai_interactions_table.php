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
        Schema::create('ai_interactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable(); // ID nhân viên hoặc Khách (nếu có login)
            $table->foreignId('table_id')->nullable(); // Lưu vết xem AI đang trả lời cho bàn nào

            // Dữ liệu hội thoại
            $table->text('prompt');             // Câu lệnh gốc của khách (Ví dụ: "Tính tiền bàn 4")
            $table->json('ai_response');        // Toàn bộ phản hồi từ AI (bao gồm cả text và metadata)

            // Trích xuất từ AI (Dùng để Tracking & Debug)
            $table->string('detected_action')->nullable(); // Ví dụ: 'checkout', 'filter_menu', 'recommend'
            $table->json('extracted_params')->nullable();  // Ví dụ: {"table_number": 4, "category": "seafood"}

            // Đánh giá hiệu quả
            $table->boolean('is_successful')->default(true);
            $table->integer('response_time_ms')->nullable(); // Đo tốc độ phản hồi của API AI
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ai_interactions');
    }
};
