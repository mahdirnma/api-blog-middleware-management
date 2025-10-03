<?php

namespace App\Services;

use App\Models\Category;

class CategoryService
{
    public function getCategories()
    {
        return app(TryService::class)(function (){
            return Category::where('is_active',1)->get();
        });
    }

    public function setCategory($request)
    {
        return app(TryService::class)(function () use ($request){
            return Category::create($request->all());
        });
    }

    public function showCategory($category)
    {
        return app(TryService::class)(function () use ($category){
            return $category;
        });
    }

    public function updateCategory($request, $category)
    {
        return app(TryService::class)(function () use ($request, $category){
            $category->update($request->all());
            return $category;
        });
    }
    public function deleteCategory($category){
        return app(TryService::class)(function () use ($category){
            $category->update(['is_active'=>0]);
        });
    }
}
