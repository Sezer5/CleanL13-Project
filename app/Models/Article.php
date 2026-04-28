<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = ['title','desc','thumbnail'];

    public function keywords(){
        $this->belongsToMany(Keyword::class);
    }
}
