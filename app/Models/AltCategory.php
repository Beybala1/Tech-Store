<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class AltCategory extends Model implements TranslatableContract
{
    use Translatable;

    protected $guarded = [];

    public array $translatedAttributes = [
        'title',
        'slug',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function altSubCategories()
    {
        return $this->hasMany(AltSubCategory::class);
    }

    public function altCategoryTranslations()
    {
        return $this->hasMany(AltCategoryTranslation::class);
    }
}
