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
        Schema::create('order_details', function (Blueprint $table) {
            $table->id(); // Tạo cột id mặc định
            $table->unsignedBigInteger('order_id'); // Khóa ngoại tới bảng orders
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
            
            $table->unsignedBigInteger('sach_id'); // Khóa ngoại tới bảng sach
            $table->foreign('sach_id')->references('id')->on('sach')->onDelete('cascade');
            
            $table->integer('quantity'); // Số lượng sách trong đơn hàng
            $table->decimal('price', 8, 2); // Giá sách
            $table->timestamps();
        });
        
    }

    public function down()
    {
        Schema::dropIfExists('order_details');
    }
};