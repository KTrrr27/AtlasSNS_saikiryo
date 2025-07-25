<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    use HasFactory;

    // 重要 複数保存を許可する
    protected $fillable = ['following_id', 'followed_id'];
}
