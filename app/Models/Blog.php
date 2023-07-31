<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Blog extends Model implements TranslatableContract
{
    use Translatable;

    protected $guarded = [];

    public array $translatedAttributes = [
        'title',
        'description',
        'alt',
        'slug',
    ];

    public function blogTranslations()
    {
        return $this->hasMany(BlogTranslation::class);
    }
}
