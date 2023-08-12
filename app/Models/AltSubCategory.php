<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class AltSubCategory extends Model implements TranslatableContract
{
    use Translatable;

    protected $guarded = [];

    public $translatedAttributes = [
        'title',
        'slug',
    ];

    public function altCategory()
    {
        return $this->belongsTo(AltCategory::class);
    }

    public function altSubCategoryTranslations()
    {
        return $this->hasMany(AltSubCategoryTranslation::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
