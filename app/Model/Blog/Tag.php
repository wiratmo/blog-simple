<?php

namespace App\Model\Blog;

use Illuminate\Database\Eloquent\Model;
use App\Model\Blog\Article;
use App\Model\Blog\Category;

class Tag extends Model
{
    public function articles(){
    	return $this->belongsToMany(Article::class);
    }

    public function categories(){
    	return $this->belongsToMany(Category::class);
    }

    public function scopeGetIdTag($query, $slug){
    	return $query
    		->select('id')
    		->where('slug', $slug);
    }
}
