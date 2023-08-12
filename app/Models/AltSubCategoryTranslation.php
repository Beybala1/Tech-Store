<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AltSubCategoryTranslation extends Model
{

    public $timestamps = false;

    protected $guarded = [];

    public function altSubCategory()
    {
        return $this->belongsTo(AltSubCategory::class);
    }
}
