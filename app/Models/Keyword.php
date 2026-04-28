<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Override;

class Keyword extends Model
{
    protected $fillable = ['name','slug'];

    
    public function getRouteKeyName()
    {
        return "slug";
    }
}
