<?php

namespace App\Model\Blog;

use Illuminate\Database\Eloquent\Model;
use App\Model\Blog\Article;
use App\Model\Blog\Tag;
use DB;

class Category extends Model
{
    public $timestamps = false;
    
    protected $fillable = [
        'user_id','title', 'keyword', 'description','slug', 'deleted_at', 'importent',
    ];

    public function articles(){
    	return $this->belongsToMany(Article::class);
    }

    public function tags(){
    	return $this->belongsToMany(Tag::class);
    }

    public function scopeGetCategoryBySlug($query, $slug){
    	return $query
    		->join('article_category', 'article_category.category_id', 'categories.id')
    		->join('articles', 'articles.id', 'article_category.article_id')
    		->select('articles.*')
    		->where('categories.slug', $slug);
    }

    public function scopeGetIdCategory($query, $slug){
        return $query
            ->select('id')
            ->where('slug', $slug);
    }

    public function scopeGetHitCategory($query){
        return $query
            ->join('article_category', 'article_category.category_id', 'categories.id')
            ->join('articles', 'articles.id', 'article_category.article_id')
            ->where('importent','yes')
            ->select('categories.*', DB::raw('count(articles.id) as countArticle'))
            ->groupBy('categories.id','categories.user_id','categories.title', 'categories.keyword', 'categories.description', 'categories.slug', 'categories.deleted_at', 'categories.importent')
            ->get();
    }

    public function scopeGetSumCategory($query){
        return $query->count();
    }

    public function scopeGetSelect2($query){
        return $query
            ->select('id', 'title as text')
            ->get();
    }

    public function scopeGetById($query, $id){
        return $query
            ->where('id', $id);
    }
}
