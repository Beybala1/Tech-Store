<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogTranslation extends Model
{
    public $timestamps = false;

    protected $guarded = [];

    public function blog()
    {
        return $this->belongsTo(Blog::class);
    }
}
