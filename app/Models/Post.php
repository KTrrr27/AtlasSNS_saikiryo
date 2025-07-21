<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['post', 'user_id']; // ← 重要！postとuser_idの複数保存を許可する

    public function user()
    {
        //user()が呼び出されたら認証済みのuserとUserクラスと1対1の関係でつながる
        return $this->belongsTo(User::class);
    }
}
