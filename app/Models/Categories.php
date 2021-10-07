<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;

    public function news()
    {

        return $this->belongsToMany(News::class, 'news_categories', 'id_cat', 'id_news');
    }
}
