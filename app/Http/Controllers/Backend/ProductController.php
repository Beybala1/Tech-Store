<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductTranslation;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->latest()->get();
        return view('backend.products.index', get_defined_vars());
    }

    public function create()
    {
        $categories = Category::all();
        return view('backend.products.create',get_defined_vars());
    }

    public function store(Request $request)
    {
        // try {
            if ($request->hasFile('image')) {
                $product = new Product();
                $product->image = upload('products', $request->file('image'));
                $product->category_id = $request->category_id;
                $product->save();
                foreach (lang() as $language) {
                    $translation = new ProductTranslation();
                    $translation->title = $request->title[$language->code];
                    $translation->content = $request->content[$language->code];
                    $translation->alt = $request->alt[$language->code];
                    $translation->slug = $request->slug[$language->code];
                    $translation->locale = $language->code;
                    $translation->product_id = $product->id;
                    $translation->save();
                }
            }
            return to_route('products.index')->with('success', __('messages.success'));
        // } catch (\Exception $eh) {
        //     return back()->with('warning', __('messages.fail'));
        // }
    }

    public function edit(Product $product)
    {
        $categories = Category::latest()->get();
        return view('backend.products.edit', get_defined_vars());
    }

    public function update(Request $request, Product $product)
    {
        try {
            if ($request->hasFile('image')) {
                $imagePath = public_path($product->image);
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
                $product->image = upload('products', $request->file('image'));
            }
            $product->category_id = $request->category_id;
            foreach (lang() as $language) {
                $translationData = [
                    'title' => $request->title[$language->code],
                    'content' => $request->content[$language->code],
                    'alt' => $request->alt[$language->code],
                    'slug' => $request->slug[$language->code],
                    'locale' => $language->code,
                ];
                $product->translations()->updateOrCreate(['locale' => $language->code], $translationData);
            }

            $product->save();
            return to_route('products.index')->with('success', __('messages.success'));
        } catch (\Exception $eh) {
            return back()->with('warning', __('messages.fail'));
        }
    }


    public function destroy(Product $product)
    {
        $imagePath = public_path($product->image);

        if (file_exists($imagePath)) {
            unlink($imagePath);
        }

        $product->delete();
        return to_route('products.index')->with('success', __('messages.success'));
    }
}
