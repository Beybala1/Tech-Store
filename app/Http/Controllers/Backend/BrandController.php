<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::latest()->get();
        return view('backend.brand.index', get_defined_vars());
    }

    public function create()
    {
        return view('backend.brand.create');
    }

    public function store(Request $request)
    {
        try {
            Brand::create([
                'title' => $request->title,
            ]);

            return to_route('brand.index')->with('success', __('messages.success'));
        } catch (\Exception $eh) {
            return back()->with('warning', __('messages.fail'));
        }
    }

    public function edit(Brand $brand)
    {
        return view('backend.brand.edit', get_defined_vars());
    }

    public function update(Request $request, Brand $brand)
    {
        try {
            $brand->update([
                'title'=>$request->title
            ]);

            return to_route('brand.index')->with('success', __('messages.success'));
        } catch (\Exception $eh) {
            return back()->with('warning', __('messages.fail'));
        }
    }


    public function destroy(Brand $brand)
    {
        $brand->delete();
        return to_route('brand.index')->with('success', __('messages.success'));
    }
}
