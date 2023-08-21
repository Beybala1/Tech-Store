<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\AltSubCategory;
use App\Models\Product;
use Illuminate\Http\Request;

class AltSubCategoryController extends Controller
{
    public function show(string $slug)
    {
        $altSubCategory = AltSubCategory::whereHas('altSubCategoryTranslations', function ($query) use ($slug) {
            $query->where('slug', $slug);
        })
            ->firstOrFail();

        $paginatedProducts = $altSubCategory->products()->latest()->paginate(12); // Display 15 products per page
        $totalResultsCount = count($altSubCategory->products); // Get total count of products

        return view("frontend.products", get_defined_vars());
    }

    public function sort(Request $request, string $slug)
    {
        // Retrieve the sorting order from the request
        $orderBy = $request->input('orderby', 'latest');

        $altSubCategory = AltSubCategory::whereHas('altSubCategoryTranslations', function ($query) use ($slug) {
            $query->where('slug', $slug);
        })->firstOrFail();

        $productsQuery = $altSubCategory->products();

        switch ($orderBy) {
            case 'mostExpensive_to_cheapest':
                $productsQuery->orderByDesc('price');
                break;
            case 'cheapest_to_mostExpensive':
                $productsQuery->orderBy('price');
                break;
            case 'name_A_Z':
                $productsQuery->orderBy(function ($query) use ($altSubCategory) {
                    $query->select('title')
                        ->from('product_translations')
                        ->whereColumn('product_id', 'products.id')
                        ->where('locale', app()->getLocale())
                        ->where('alt_sub_category_id', $altSubCategory->id)
                        ->orderBy('title', 'asc')
                        ->limit(1);
                });
                break;
            default:
                $productsQuery->latest();
                break;
        }

        $paginatedProducts = $productsQuery->paginate(12);
        $totalResultsCount = count($altSubCategory->products);

        return view("frontend.products", get_defined_vars());
    }
}
