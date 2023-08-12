<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\AltSubCategory;
use App\Models\Product;

class AltSubCategoryController extends Controller
{
    public function show(string $slug)
    {
        $altSubCategory = AltSubCategory::whereHas('altSubCategoryTranslations', function ($query) use ($slug) {
                $query->where('slug', $slug);
            })
            ->firstOrFail();

        $paginatedProducts = $altSubCategory->products()->paginate(1);
        $allProductLists = $altSubCategory->products()->get();
        return view("frontend.products", get_defined_vars());
    }
}