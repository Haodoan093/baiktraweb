<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sach extends Model
{
    use HasFactory;
    protected $table = 'sach'; 
    protected $primaryKey = 'ma_sach'; // Chỉ định khóa chính
    protected $fillable = ['ten_sach', 'mo_ta', 'so_luong', 'gia'];

}
