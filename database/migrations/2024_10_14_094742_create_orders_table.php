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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Tên khách hàng
            $table->string('address'); // Địa chỉ khách hàng
            $table->string('phone'); // Số điện thoại khách hàng
            $table->decimal('total_price', 8, 2); // Tổng giá trị đơn hàng
            $table->timestamps(); // Tự động tạo cột 'created_at' và 'updated_at'
        });
    }

    public function down()
    {
        Schema::dropIfExists('orders');
    }
};