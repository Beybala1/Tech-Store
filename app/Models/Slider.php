<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Slider extends Model implements TranslatableContract
{ 
    use Translatable;

    protected $guarded = [];

    public $translatedAttributes = [
        'title',
        'content',
        'alt',
    ];
}
