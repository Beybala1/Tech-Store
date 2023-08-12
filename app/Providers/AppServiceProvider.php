<?php

namespace App\Providers;

use App\Models\AltCategory;
use App\Models\AltSubCategory;
use App\Models\Category;
use App\Models\ContactInfo;
use App\Models\Product;
use App\Models\Social;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::defaultView('frontend.pagination.pagination');
        $categories = Category::with("altCategories.altSubCategories")->latest()->get();
        $contact_phone = ContactInfo::first();
        $contact_email = ContactInfo::skip(4)->first();
        $contactInfos = ContactInfo::get();
        $socials = Social::get();
        $category_links = Category::limit(7)->get();
        View::share([
            'categories' => $categories,
            'contact_phone' => $contact_phone,
            'contact_email' => $contact_email,
            'contactInfos' => $contactInfos,
            'socials' => $socials,
            'category_links' => $category_links,
        ]);
    }
}
