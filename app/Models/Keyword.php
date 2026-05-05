<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Override;

class Keyword extends Model
{
    protected $fillable = ['name','slug'];

    public function articles()
    {
        return $this->belongsToMany(Article::class, 'article_keyword');
    }
    
    public function getRouteKeyName()
    {
        return "slug";
    }
}
