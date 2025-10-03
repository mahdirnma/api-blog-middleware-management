<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use App\Services\ApiResponseBuilder;
use App\Services\ApiResponseService;
use App\Services\PostService;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct(public PostService $service){}

    public function index()
    {
        $results = $this->service->getPosts();
        return (new ApiResponseBuilder())->data($results->data)->response();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        $result=$this->service->setPost($request);
        $actionResult = $result->success?
            (new ApiResponseBuilder())->message('Post created successfully.'):
            (new ApiResponseBuilder())->message('Post creation failed.');
        return $actionResult->data($result->data)->response();
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        $result=$this->service->getPost($post);
        $actionResult = $result->success?
            (new ApiResponseBuilder())->message('Post received successfully.'):
            (new ApiResponseBuilder())->message('Post received failed.');
        return $actionResult->data($result->data)->response();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $result = $this->service->updatePost($request, $post);
        $actionResult = $result->success ?
            (new ApiResponseBuilder())->message('Post updated successfully.') :
            (new ApiResponseBuilder())->message('Post update failed.');
        return $actionResult->data($result->data)->response();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
