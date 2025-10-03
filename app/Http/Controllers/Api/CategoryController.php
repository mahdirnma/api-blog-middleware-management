<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Models\Category;
use App\Services\ApiResponseBuilder;
use App\Services\CategoryService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct(public CategoryService $service){}

    public function index()
    {
        $results = $this->service->getCategories();
        return (new ApiResponseBuilder())->data($results->data)->response();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        $result=$this->service->setCategory($request);
        $actionResult=$result->success?
            (new ApiResponseBuilder())->message('Category created successfully.'):
            (new ApiResponseBuilder())->message('Category created successfully fail.');
        return $actionResult->data($result->data)->response();
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        $result=$this->service->showCategory($category);
        $actionResult=$result->success?
            (new ApiResponseBuilder())->message('Category received successfully'):
            (new ApiResponseBuilder())->message('Category received successfully fail.');
        return $actionResult->data($result->data)->response();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
    }
}
