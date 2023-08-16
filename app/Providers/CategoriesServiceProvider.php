<?php

namespace App\Providers;
use App\Helpers\CategoryHelper;
use App\Models\PartyRelationship;
use Illuminate\Support\ServiceProvider;

class CategoriesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot()
    {
        $parentType = 'category'; // Loại party_type của danh mục chính
        $nestedCategories = CategoryHelper::getNestedCategories($parentType);

        // Share the $nestedCategories variable with all views
        view()->share('nestedCategories', $nestedCategories);


    }


}
