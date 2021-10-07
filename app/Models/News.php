<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $fillable = [ 'name', 'desc', 'mainText', 'user_id', 'img' ];

    public function categories()
    {

        return $this->belongsToMany(Categories::class, 'news_categories', 'id_news', 'id_cat');
    }
}
