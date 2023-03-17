<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FrontSlide extends Model
{
    use HasFactory;

    protected $guarded = [];

    // в протектед guarded - мы перечисляем колонки которые нельзя заполнять пользователю
    // fillabe - те что заполнять можно.

    // protected $fillable = [
    //     'title',
    //     'short_title',
    //     'home_slide',
    //     'video_url',
    // ];
}
