<?php

namespace App\Services;

use App\Models\Tag;

class TagService
{
    public function getTags()
    {
        return app(TryService::class)(function (){
            return Tag::where('is_active',1)->get();
        });
    }

    public function setTags($request)
    {
        return app(TryService::class)(function () use ($request){
            return Tag::create($request->all());
        });
    }

    public function showTag($tag)
    {
        return app(TryService::class)(function () use ($tag){
            return $tag;
        });
    }

    public function updateTag($request, $tag)
    {
        return app(TryService::class)(function () use ($request, $tag){
            $tag->update($request->all());
            return $tag;
        });
    }
}
