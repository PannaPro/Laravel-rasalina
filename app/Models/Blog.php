<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\BlogCategory;

class Blog extends Model
{
    use HasFactory;
    protected $guarded = [];


    // метод образующий взаимоотношение один к одному в БД.
    // таблица Blog принадлежит к таблице BlogCategory по столбцу
    public function category(){

        return $this->belongsTo(BlogCategory::class, 'blog_category_id', 'id');
    }
}
