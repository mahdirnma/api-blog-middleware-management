<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTagRequest;
use App\Http\Requests\UpdateTagRequest;
use App\Models\Tag;
use App\Services\ApiResponseBuilder;
use App\Services\TagService;
use App\Services\TryService;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct(public TagService $service){}

    public function index()
    {
        $result=$this->service->getTags();
        return (new ApiResponseBuilder())->data($result->data)->response();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTagRequest $request)
    {
        $result=$this->service->setTags($request);
        $actionResult=$result->success?
            (new ApiResponseBuilder())->message('tag added successfully'):
            (new ApiResponseBuilder())->message('tag not added successfully');
        return $actionResult->data($result->data)->response();
    }

    /**
     * Display the specified resource.
     */
    public function show(Tag $tag)
    {
        $result=$this->service->showTag($tag);
        $actionResult=$result->success?
            (new ApiResponseBuilder())->message('tag received successfully'):
            (new ApiResponseBuilder())->message('tag not received successfully');
        return $actionResult->data($result->data)->response();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTagRequest $request, Tag $tag)
    {
        $result=$this->service->updateTag($request, $tag);
        $actionResult=$result->success?
            (new ApiResponseBuilder())->message('tag updated successfully'):
            (new ApiResponseBuilder())->message('tag not updated successfully');
        return $actionResult->data($result->data)->response();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag)
    {
        //
    }
}
