<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable=[
        'title',
        'description',
        'published_at',
        'category_id',
        'tag_id',
        'is_active',
    ];
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function tag(){
        return $this->belongsTo(Tag::class);
    }

}
